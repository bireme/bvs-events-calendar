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

?>