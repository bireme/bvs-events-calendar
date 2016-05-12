<?php
    
    if ( function_exists('register_nav_menus') ) {
    	register_nav_menus( array(
    		'top_menu' => 'Top Menu',
    	) );
    }

    if ( function_exists('register_sidebar') ) {
    	register_sidebar( array(
            'name' => __( 'Logo', 'bvs-events-calendar' ),
            'id' => 'logo-sidebar',
            'description' => __( 'Widget to upload image logo.', 'bvs-events-calendar' ),
            'before_widget' => '<div id="logo">',
    		'after_widget'  => '</div>',
    		
    	) );

    	register_sidebar( array(
            'name' => __( 'Auxiliar Top', 'bvs-events-calendar' ),
            'id' => 'auxiliar-top',
            'description' => __( 'Top bar auxiliar.', 'bvs-events-calendar' ),
            'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h2 class="widgettitle">',
    		'after_title'   => '</h2>',
    	) );
    }

    function get_days($end, $start) {
        $end_date   = strtotime($end);
        $start_date = $start ? strtotime($start) : 0;
        $diff       = $end_date - $start_date;

        return floor($diff/(60*60*24))+1;
    }

    function get_session_dates($session_ids) {
        foreach ($session_ids as $id) {
            $initial_date = strtotime(get_field( 'initial_date_and_time', $id ));
            $session_dates[] = date("Ymd", $initial_date );
        }

        $session_dates = array_unique($session_dates);

        foreach ($session_dates as $date) {
            $dates[$date] = array();
            foreach ($session_ids as $id) {
                $initial_date = strtotime(get_field( 'initial_date_and_time', $id ));
                if ( date("Ymd", $initial_date ) == $date )
                    $dates[$date][] = $id;
            }
        }

        return $dates;
    }

    function custom_excerpt_more($more) {
        global $post;
        return ' ... <a class="moretag" href="'. get_permalink($post->ID) . '">' . __( 'Continue reading', 'bvs-events-calendar' ) . '</a>';
    }
    add_filter('excerpt_more', 'custom_excerpt_more');

    function child_theme_setup() {
        // override parent theme's 'more' text for excerpts
        remove_filter( 'excerpt_more', 'twentysixteen_excerpt_more' ); 
    }
    add_action( 'after_setup_theme', 'child_theme_setup' );

    function get_video_data($url) {
        $args = array();
        if (strpos($url, 'youtube') > 0) {
            $parts = parse_url($url);
            parse_str($parts['query'], $query);
            $args['embed'] = "https://www.youtube.com/embed/" . $query['v'];
            $args['type']  = 'youtube';
            $args['id']    = $query['v'];

            return $args;
        } elseif (strpos($url, 'vimeo') > 0) {
            $parts = parse_url($url);
            $id  = end(split('/', $parts['path']));
            $args['embed'] = "https://player.vimeo.com/video/" . $id;
            $args['type']  = 'vimeo';
            $args['id']    = $id;

            return $args;
        } else {
            return false;
        }
    }

    function slideshare_embed($url, $output = 'json') {
        $api_request = "http://www.slideshare.net/api/oembed/2?url=" . $url . "&format=" . $output;

        if ( $output == 'json' ) {
            $response = file_get_contents($api_request);
            if ($response){
                $obj = json_decode($response);
                $html = $obj->html;

                $doc = new DOMDocument();
                $doc->loadHTML($html);
                $iframes = $doc->getElementsByTagName('iframe');

                foreach($iframes as $node) {
                    $src = $node->getAttribute('src');
                }

                return $src;
            }
        } elseif ( $output == 'xml' ) {
            $xml = simplexml_load_file($api_request);
            if ( $xml ) {
                $doc = new DOMDocument();
                $doc->loadHTML($xml->html);
                $iframes = $doc->getElementsByTagName('iframe');

                foreach($iframes as $node) {
                    $src = $node->getAttribute('src');
                }

                return $src;
            }
        }
    }

    function event_nav_menu_meta_box_markup($obj) {
        wp_nonce_field(basename(__FILE__), "event-nav-menu-nonce");

        ?>
            <div>
                <p><strong><?php _e( 'Menu', 'bvs-events-calendar' ); ?></strong></p>
                <label class="screen-reader-text" for="event-nav-menu"><?php _e( 'Menu', 'bvs-events-calendar' ); ?></label>
                <select name="event-nav-menu" id="event-nav-menu">
                    <?php 
                        $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
                        ?>
                            <option></option>
                        <?php
                        foreach($menus as $menu) {
                            if($menu->term_id == get_post_meta($obj->ID, "event_nav_menu", true)) {
                                ?>
                                    <option value="<?php echo $menu->term_id; ?>" selected><?php echo $menu->name; ?></option>
                                <?php    
                            } else {
                                ?>
                                    <option value="<?php echo $menu->term_id; ?>"><?php echo $menu->name; ?></option>
                                <?php
                            }
                        }
                    ?>
                </select>
            </div>
        <?php  
    }

    function event_nav_menu_meta_box() {
        add_meta_box("event-nav-menu-meta-box", __( "Navigation Menu", "bvs-events-calendar" ), "event_nav_menu_meta_box_markup", "event", "side", "high", null);
    }
    add_action("add_meta_boxes", "event_nav_menu_meta_box");

    function save_event_nav_menu_meta_box($post_id, $post, $update) {
        if (!isset($_POST["event-nav-menu-nonce"]) || !wp_verify_nonce($_POST["event-nav-menu-nonce"], basename(__FILE__)))
            return $post_id;

        if(!current_user_can("edit_post", $post_id))
            return $post_id;

        if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
            return $post_id;

        if('event' != $post->post_type)
            return $post_id;

        $event_nav_menu = "";

        if(isset($_POST["event-nav-menu"])) {
            $event_nav_menu = $_POST["event-nav-menu"];
        }   
        update_post_meta($post_id, "event_nav_menu", $event_nav_menu);
    }
    add_action("save_post", "save_event_nav_menu_meta_box", 10, 3);

    function event_nav_menu( $event_menu, $homepage ) {
        global $post;

        if ( $event_menu ) :

            wp_nav_menu( array(
                'menu' => $event_menu,
                'container_id' => 'event-menu'
            ) );

        elseif ( !$homepage && !is_page() ) :

            $schedule   = '';
            $location   = get_field('location');
            $registrations = get_field('registrations');
            $start_date = date("d/m/Y", strtotime(get_field('start_date')));

            $args = array(
                'post_type' => 'schedule',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                'meta_query' => array(
                    array(
                        'key' => 'event',
                        'value' => serialize(strval($post->ID)),
                        'compare' => 'LIKE'
                    )
                )
            );

            $query = null;
            $query = new WP_Query($args);

            if ( $query->have_posts() )
                $schedule = get_permalink( $query->post->ID );
        ?>

            <div id="event-menu">
                <ul>
                    <?php if ( $schedule ) : ?>
                        <li><a href="<?php echo $schedule; ?>"><?php _e( 'Schedule', 'bvs-events-calendar' ); ?></a></li>
                    <?php endif; ?>
                    <?php if ( $start_date ) : ?>
                        <li><a href="#date"><?php _e( 'Date', 'bvs-events-calendar' ); ?></a></li>
                    <?php endif; ?>
                    <?php if ( $post->post_content || $post->post_excerpt ) : ?>
                        <li><a href="#event-content"><?php _e( 'Description', 'bvs-events-calendar' ); ?></a></li>
                    <?php endif; ?>
                    <?php if ( $registrations ) : ?>
                        <li><a href="#registrations"><?php _e( 'Registrations', 'bvs-events-calendar' ); ?></a></li>
                    <?php endif; ?>
                    <?php if ( $location ) : ?>
                        <li><a href="#location"><?php _e( 'Location', 'bvs-events-calendar' ); ?></a></li>
                    <?php endif; ?>
                </ul>
            </div>

        <?php endif;
    }

    function event_breadcrumb($post_id) {
        $post_title = get_the_title( $post_id );
        $related_meta = array();

        if ( function_exists( 'pll_current_language' ) ) {
            $current_lang = pll_current_language();
            $default_lang = pll_default_language();
            $lang = $current_lang != $default_lang ? $current_lang : '';
        } else {
            $lang = '';
        }

        $fields = array(
            'event' => 'event',
            'schedule' => 'schedule',
            'session' => 'session',
            'subsession' => 'subsession',
        );

        $related_meta[] = array(
            'id' => $post_id,
            'title' => $post_title,
            'permalink' => get_permalink( $post_id )
        );

        $meta = get_post_meta( $post_id );
        $related = array_intersect_key( $meta, $fields );

        while ( !empty($related) && count($related) == 1 ) {
            $key = key($related);
            $value = unserialize($related[$key][0]);            
            $title = get_the_title( $value[0] );

            $related_meta[] = array(
                'id' => $value[0],
                'title' => $title,
                'permalink' => get_permalink( $value[0] )
            );

            $meta = get_post_meta( $value[0] );
            $related = array_intersect_key( $meta, $fields );
        }

        $related_meta[] = array(
            'id' => 0,
            'title' => 'Home',
            'permalink' => esc_url( home_url( "/".( $lang )."/" ) )
        );

        echo event_breadcrumb_html( $related_meta );
    }

    function event_breadcrumb_html($meta) {
        global $post;
        $breadcrumb = array();
        $meta = event_breadcrumb_shortener($meta);

        foreach ($meta as $key => $value) {
            if ( $key == count($meta)-1 ) {
                $breadcrumb[] = '<div id="breadcrumb"><ul class="crumbs"><li class="first"><a href="' . $value['permalink'] . '" style="z-index:'. $key .';"><span></span>' . $value['title'] . '</a></li>';
            }
            elseif ( $key == 0 ) {
                $post_type = get_post_type();

                if ( $post_type == 'participant' && $value['id'] != $post->ID ) {
                    $breadcrumb[] = '<li><a href="' . $value['permalink'] .'" style="z-index:' . $key . ';">' . $value['title'] . '</a></li></ul></div>';
                }
                else {
                    $breadcrumb[] = '<li><a href="javascript:void(0);"><strong>' . $value['title'] . '</strong></a></li></ul></div>';
                }
            }
            else {
                $breadcrumb[] = '<li><a href="' . $value['permalink'] .'" style="z-index:' . $key . ';">' . $value['title'] . '</a></li>';
            }
        }

        $breadcrumb = implode('', array_reverse($breadcrumb));

        return $breadcrumb;
    }

    function event_breadcrumb_shortener($meta) {
        $sizes = array(
            2 => 100,
            3 => 50,
            4 => 33,
            5 => 25,
            6 => 20
        );

        $size = $sizes[count($meta)] ? $sizes[count($meta)] : 2;

        foreach ($meta as $key => $value) {
            if (strlen(utf8_decode($value['title'])) > $size) {
                $title = substr(utf8_decode($value['title']), 0, $size-3) . "...";
                $meta[$key]['title'] = utf8_encode($title);
            }            
        }

        return $meta;
    }

    add_filter('pll_the_language_link', 'pll_home_language_switcher', 10, 2);
    function pll_home_language_switcher($url, $slug) {
        global $wp;
        $home = untrailingslashit(pll_home_url());
        $current_url = home_url(add_query_arg(array(),$wp->request));

        $is_index = $home == $current_url ? true : false;

        if ( $is_index ) {
            $posts = get_posts(array(
                'post_type' => 'event',
                'lang' => $slug,
                'showposts' => 1
            ));

            $url = ( !$posts || $url === null ) ? null : $url;
        }

        return $url;
    }

    add_action('get_header', 'referer_setcookie');
    function referer_setcookie() {
        global $id;
        global $post;

        if ( 'participant' == get_post_type() ) {
            $home = home_url();
            $referer = $_SERVER['HTTP_REFERER'];
            
            if (strpos($referer, $home) !== false) {
                if ( defined( 'POLYLANG_VERSION' ) ) {
                    global $polylang;
                    $lang = pll_current_language();

                    if ( !isset($_COOKIE['referer_id']) ) {
                        $id = url_to_postid( $referer );
                        setcookie( 'referer_id', $id, time()+3600*24, COOKIEPATH, COOKIE_DOMAIN );
                    } else {
                        $id = $_COOKIE['referer_id'];
                    }

                    $post_type = get_post_type( $id );
                    $related_ids = $polylang->model->get_translations($post_type, $id);
                    $id = $related_ids[$lang];
                } else {
                    $id = url_to_postid( $referer );
                }
            }
            else {
                $id = $post->ID;
                unset($_COOKIE['referer_id']);
                setcookie('referer_id', null, -1, COOKIEPATH);
            }
        } else {
            unset($_COOKIE['referer_id']);
            setcookie('referer_id', null, -1, COOKIEPATH);
        }
    }

    function suggest_event_meta_box_markup($obj) {
        ?>
            <div>
                <p><?php _e( 'Suggest this event to the VHL Portal', 'bvs-events-calendar' ); ?></p>
                <p>
                    <label class="screen-reader-text" for="suggest-event"><?php _e( 'Send event', 'bvs-events-calendar' ); ?></label>
                    <button name="suggest-event" id="suggest-event" class="button button-primary"><?php _e( 'Send event', 'bvs-events-calendar' ); ?></button>
                </p>
            </div>
            <script type="text/javascript">
                jQuery(document).ready(function($){
                    $('#suggest-event').click(function() {                        
                        var title = document.forms["post"]["post_title"].value;
                        var start_date = $('#acf-start_date').attr('data-field_key');
                        var start_date_format = document.forms["post"]["fields["+start_date+"]"].value;
                        var end_date = $('#acf-end_date').attr('data-field_key');
                        var end_date_format = document.forms["post"]["fields["+end_date+"]"].value;

                        document.forms["suggest-event-form"]["title"].value = title;
                        document.forms["suggest-event-form"]["start_day"].value = start_date_format.substring(6,8);
                        document.forms["suggest-event-form"]["start_month"].value = start_date_format.substring(4,6);
                        document.forms["suggest-event-form"]["start_year"].value = start_date_format.substring(0,4);
                        document.forms["suggest-event-form"]["end_day"].value = end_date_format.substring(6,8);
                        document.forms["suggest-event-form"]["end_month"].value = end_date_format.substring(4,6);
                        document.forms["suggest-event-form"]["end_year"].value = end_date_format.substring(0,4);

                        $('.suggest-event-form').submit();

                        return false;
                    });
                });
            </script>
        <?php  
    }

    function suggest_event_meta_box() {
        add_meta_box("suggest-event-meta-box", __( "Suggest Event", "bvs-events-calendar" ), "suggest_event_meta_box_markup", "event", "side", "high", null);
    }
    add_action("add_meta_boxes", "suggest_event_meta_box");

    function suggest_event_form() {
        global $pagenow;
        $post_type = $_GET['post_type'] ? $_GET['post_type'] : get_post_type( $_GET['post'] );

        if (is_admin() &&  $post_type == 'event' && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {
        ?>
            <form name="suggest-event-form" class="suggest-event-form" target="_blank" method="post" action="http://bvsalud.org/direve/suggest-event/">
                <input type="hidden" name="title" value="">
                <input type="hidden" name="start_day" value="">
                <input type="hidden" name="start_month" value="">
                <input type="hidden" name="start_year" value="">
                <input type="hidden" name="end_day" value="">
                <input type="hidden" name="end_month" value="">
                <input type="hidden" name="end_year" value="">
                <input type="hidden" name="site" value="<?php echo home_url( '/' ); ?>">
            </form>
        <?php
        }
    }
    add_action('admin_footer', 'suggest_event_form');

?>