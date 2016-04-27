<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php
	$homepage   = get_field( 'homepage' );
	$event_menu = get_field( 'event_nav_menu' );
?>

<div id="primary" class="content-area event-page">
	<main id="main" class="site-main" role="main">
		<div class="breadcrumb">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">home</a> / <strong><?php single_post_title(); ?></strong>
		</div>

		<?php
			if ( $homepage ) :

				$post = $homepage[0];

				// Include the single page content template.
				get_template_part( 'template-parts/content', 'page' );
			
			else :
		?>

			<?php
				$venue = get_field('venue');
				$location = get_field('location');
				$start_date = date("d/m/Y", strtotime(get_field('start_date')));
				$end_date = (get_field('end_date') && get_field('start_date') != get_field('end_date')) ? ' - ' . date("d/m/Y", strtotime(get_field('end_date'))) : '';
			?>

			<div class="event-title">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>

			<?php event_nav_menu( $event_menu, $homepage ); ?>

			<?php if ( ! empty( $start_date ) ) : ?>
				<div id="date" class="event-date">
					<h3 class="event-header"><?php _e( 'Date', 'bvseventos' ); ?></h3>
					<?php echo $start_date . $end_date; ?>
				</div>
			<?php endif; ?>

			<div id="event-content" class="event-content">
				<h3 class="event-header"><?php _e( 'Description', 'bvseventos' ); ?></h3>
				<?php
					if ( $post->post_content ) {
                        echo wpautop($post->post_content);
                    } elseif ( get_the_excerpt() ) {
                        the_excerpt();
                    }
                ?>
			</div>
			
			<?php if ( ! empty( $location ) ) : ?>
				<div id="location" class="event-location">
					<h3 class="event-header"><?php _e( 'Location', 'bvseventos' ); ?></h3>
					<span>
						<?php
							if ( ! empty( $venue ) )
								echo $venue;
							else
								echo $location['address'];
						?>
					</span>
					<div class="acf-map">
						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>
				</div>
			<?php endif; ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			?>

		<?php endif; ?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php //if ( ! $homepage ) { get_sidebar(); } ?>

<?php get_footer(); ?>
