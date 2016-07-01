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
	global $id;
	$obj = $post;
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	
		<?php event_breadcrumb( $id ); ?>

		<div class="detail">
			<div class="author-profile">
				<div class="s-author">
					<?php $picture = get_field( 'picture' ); ?>
					<?php if ($picture) : ?>
						<div class="author-pic"><img src="<?php echo $picture['url']; ?>" /></div>
					<?php endif; ?>
					<div class="author-data">
						<div class="author-name"><?php single_post_title(); ?></div>
						<div class="author-inst"><span class="job-title"><?php the_field( 'job_title' ); ?></span> - <span class="affiliation"><?php the_field( 'affiliation' ); ?></span></div>
					</div>
				</div>
				<div class="short-bio summary">
					<?php
						if ( $post->post_content ) {
                            echo wpautop($post->post_content);
                        } elseif ( get_the_excerpt() ) {
                            the_excerpt();
                        }
                    ?>
				</div>
				<?php
					$args = array(
					    'post_type' => 'presentation',
					    'post_status' => 'publish',
					    'posts_per_page' => -1,
					    'order'   => 'DESC',
					    'meta_query' => array(
					        array(
					            'key' => 'author',
					            'value' => serialize(strval($post->ID)),
					            'compare' => 'LIKE'
					        )
					    )
					);

					$query = null;
					$query = new WP_Query($args);
				?>

				<?php if( $query->have_posts() ) : // Presentations Loop ?>
					<div class="related-content">
						<?php _e( 'See also by','bvs-events-calendar' ); ?> <strong><?php single_post_title(); ?></strong>
						<ul>
							<?php while ( $query->have_posts() ) : $query->the_post(); ?>
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php endwhile; ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php $post = $obj; ?>

<aside id="secondary" class="sidebar" role="complementary">
	<ul class="social-links">
		<?php if ( get_field( 'site' ) ) { ?>
			<li><strong><i class="fa fa-link"></i> <?php _e( 'Site', 'bvs-events-calendar' ); ?></strong><br/>
				<small><a href="<?php the_field( 'site' ); ?>" target="_blank"><?php the_field( 'site' ); ?></a></small>
			</li>
		<?php } ?>
		<?php if ( get_field( 'twitter' ) ) { ?>
			<li><strong><i class="fa fa-twitter"></i> <?php _e( 'Twitter', 'bvs-events-calendar' ); ?></strong><br/>
				<small><a href="<?php the_field( 'twitter' ); ?>" target="_blank"><?php the_field( 'twitter' ); ?></a></small>
			</li>
		<?php } ?>
		<?php if ( get_field( 'facebook' ) ) { ?>
			<li><strong><i class="fa fa-facebook"></i> <?php _e( 'Facebook', 'bvs-events-calendar' ); ?></strong><br/>
				<small><a href="<?php the_field( 'facebook' ); ?>" target="_blank"><?php the_field( 'facebook' ); ?></a></small>
			</li>
		<?php } ?>
		<?php if ( get_field( 'linkedin' ) ) { ?>
			<li><strong><i class="fa fa-linkedin"></i> <?php _e( 'LinkedIn', 'bvs-events-calendar' ); ?></strong><br/>
				<small><a href="<?php the_field( 'linkedin' ); ?>" target="_blank"><?php the_field( 'linkedin' ); ?></a></small>
			</li>
		<?php } ?>
		<?php if ( get_field( 'curriculum_vitae' ) ) { ?>
			<li><strong><i class="fa fa-mortar-board"></i> <?php _e( 'Curriculum Vitae', 'bvs-events-calendar' ); ?></strong><br/>
				<small><a href="<?php the_field( 'curriculum_vitae' ); ?>" target="_blank"><?php the_field( 'curriculum_vitae' ); ?></a></small>
			</li>
		<?php } ?>
	</ul>
</aside>

<?php get_footer(); ?>
