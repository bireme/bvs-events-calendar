<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

		</div><!-- .site-content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'primary-menu',
						 ) );
					?>
				</nav><!-- .main-navigation -->
			<?php endif; ?>

			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
						) );
					?>
				</nav><!-- .social-navigation -->
			<?php endif; ?>

			<div class="site-info">
				<?php
					/**
					 * Fires before the twentysixteen footer text for footer customization.
					 *
					 * @since Twenty Sixteen 1.0
					 */
					do_action( 'twentysixteen_credits' );
				?>
				<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentysixteen' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentysixteen' ), 'WordPress' ); ?></a>
			</div><!-- .site-info -->
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>	
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.easing.1.3.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.anyslider.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
	$(function () {
	    $('.slider1').anyslider({
            interval: 0,
            keyboard: false,
            speed: 500,
            showBullets: false,
        });
	});

	$('.view-detail').click(function() {
		$(this).next().toggleClass('more-detail');
	});

	$(function() {
		$( '#tabs' ).tabs();
	});

	$(document).ready(function(){  

        //get the height and width of the page  
        var window_width = $(window).width();  
        var window_height = $(window).height();  

        //vertical and horizontal centering of modal window(s)  
        /*we will use each function so if we have more then 1 
        modal window we center them all*/  
        $('.modal_window').each(function(){  

            //get the height and width of the modal  
            var modal_height = $(this).outerHeight();  
            var modal_width = $(this).outerWidth();  

            //calculate top and left offset needed for centering  
            var top = (window_height-modal_height)/2;  
            var left = (window_width-modal_width)/2;  

            //apply new top and left css values  
            $(this).css({'top' : top , 'left' : left});  

        });

        $('.activate_modal').click(function(){  

            //get the id of the modal window stored in the name of the activating element  
            var modal_id = $(this).attr('name');  

            //use the function to show it  
            show_modal(modal_id);  

        });

        $('.close_modal').click(function(){  

            //use the function to close it  
            close_modal();  

        });

    });

    //THE FUNCTIONS  

    function close_modal(){  

        //hide the mask  
        $('#mask').fadeOut(500);  

        //hide modal window(s)  
        $('.modal_window').fadeOut(500);  

    } 

    function show_modal(modal_id){  

        //set display to block and opacity to 0 so we can use fadeTo  
        $('#mask').css({ 'display' : 'block', opacity : 0});  

        //fade in the mask to opacity 0.8  
        $('#mask').fadeTo(500,0.8);  

         //show the modal window  
        $('#'+modal_id).fadeIn(500);  

    }  
</script>
</body>
</html>
