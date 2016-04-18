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
?>