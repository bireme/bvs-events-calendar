<?php

	register_nav_menus( array(
		'top_menu' => 'Top Menu',
	) );

	register_sidebar( array(
        'name' => __( 'Logo', 'bvs-eventos' ),
        'id' => 'logo-sidebar',
        'description' => __( 'Widget to upload image logo.', 'bvs-eventos' ),
        'before_widget' => '<div id="logo">',
		'after_widget'  => '</div>',
		
	) );

	register_sidebar( array(
        'name' => __( 'Auxiliar top', 'bvs-eventos' ),
        'id' => 'auxiliar-top',
        'description' => __( 'Top bar auxiliar.', 'bvs-eventos' ),
        'before_widget' => '<span id="%1$s" class="widget %2$s">',
		'after_widget'  => '</span>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );

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
        return ' ... <a class="moretag" href="'. get_permalink($post->ID) . '">' . __( 'Continue reading', 'bvseventos' ) . '</a>';
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

    function add_theme_scripts() {
        wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array(), '3', true );
        wp_enqueue_script( 'google-map-init', get_stylesheet_directory_uri() . '/js/google-maps.js', array('google-map', 'jquery'), '0.1', true );
    }
    add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

    function event_nav_menu_meta_box_markup($obj) {
        wp_nonce_field(basename(__FILE__), "event-nav-menu-nonce");

        ?>
            <div>
                <p><strong><?php _e( 'Menu', 'bvseventos' ); ?></strong></p>
                <label class="screen-reader-text" for="event-nav-menu"><?php _e( 'Menu', 'bvseventos' ); ?></label>
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
        add_meta_box("event-nav-menu-meta-box", __( "Navigation Menu", "bvseventos" ), "event_nav_menu_meta_box_markup", "event", "side", "high", null);
    }
    add_action("add_meta_boxes", "event_nav_menu_meta_box");

    function save_event_nav_menu_meta_box($post_id, $post, $update) {
        if (!isset($_POST["event-nav-menu"]) || !wp_verify_nonce($_POST["event-nav-menu-nonce"], basename(__FILE__)))
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
                    <li><a href="<?php echo get_settings('home'); ?>">Home</a></li>
                    <?php if ( $schedule ) : ?>
                        <li><a href="<?php echo $schedule; ?>"><?php _e( 'Schedule', 'bvseventos' ); ?></a></li>
                    <?php endif; ?>
                    <?php if ( $start_date ) : ?>
                        <li><a href="#date"><?php _e( 'Date', 'bvseventos' ); ?></a></li>
                    <?php endif; ?>
                    <?php if ( $post->post_content || $post->post_excerpt ) : ?>
                        <li><a href="#event-content"><?php _e( 'Description', 'bvseventos' ); ?></a></li>
                    <?php endif; ?>
                    <?php if ( $location ) : ?>
                        <li><a href="#location"><?php _e( 'Location', 'bvseventos' ); ?></a></li>
                    <?php endif; ?>
                </ul>
            </div>

        <?php endif;
    }

?>