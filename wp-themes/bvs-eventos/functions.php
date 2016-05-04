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

    function event_breadcrumb() {
        global $post;
        $post_title = get_the_title();

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

        $breadcrumb = array();
        $before_bc = '<div class="breadcrumb"><a href="' . esc_url( home_url( "/".( $lang )."/" ) ) . '">home</a> / ';
        $after_bc = (strlen($post_title) > 50) ? '<strong>' . substr($post_title, 0, 50) . "...</strong>" : '<strong>' . $post_title . '</strong>';
        $after_bc .= '</div>';

        $meta = get_post_meta( $post->ID );
        $related = array_intersect_key( $meta, $fields );

        while ( !empty($related) && count($related) == 1 ) {
            $key = key($related);
            $value = unserialize($related[$key][0]);            
            $title = get_the_title( $value[0] );
            
            if (strlen($title) > 50)
                $title = substr($title, 0, 50) . "...";
            
            $breadcrumb[] = '<a href="' . get_permalink( $value[0] ) .'">' . $title . '</a> / ';

            $meta = get_post_meta( $value[0] );
            $related = array_intersect_key( $meta, $fields );
        }

        $breadcrumb = implode('', array_reverse($breadcrumb));

        echo $before_bc . $breadcrumb . $after_bc;
    }

?>