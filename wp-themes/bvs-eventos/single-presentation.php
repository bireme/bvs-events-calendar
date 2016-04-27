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
    $author_ids = get_post_meta( $post->ID, 'author' );
    $attachment = get_field( 'attachments', $post->ID );
    $ext = pathinfo($attachment['url'], PATHINFO_EXTENSION);
    $video = get_field( 'video', $post->ID );
    $vt = get_video_data($video);
    $slideshare = get_field( 'slideshare', $post->ID );
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="breadcrumb">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">home</a> / <strong><?php single_post_title(); ?></strong>
		</div>
		<div class="program">
			<div class="program-day">
				<div class="session conference">
					<div class="session-data">
						<div class="single-session-title"><?php single_post_title(); ?></div>
						<div class="presentation-list">
							<div class="presentation" id="p01">
								<div class="detail">
									<div class="author-list">
										<?php if ( $author_ids[0] ) : // Participants Loop ?>
					                        <?php foreach ($author_ids[0] as $id) : ?>
					                            <?php $picture = get_field( 'picture', $id ); ?>
												<div class="s-author">
													<?php if ($picture) : ?>
														<div class="author-pic"><img src="<?php echo $picture['url']; ?>" /></div>
													<?php endif; ?>
													<div class="autor-data">
														<div class="author-name"><a href="<?php echo get_the_permalink($id); ?>"><?php echo get_the_title($id); ?></a></div>
														<div class="author-inst"><span class="job-title"><?php the_field( 'job_title', $id ); ?></span> - <span class="affiliation"><?php the_field( 'affiliation', $id ); ?></span></div>
													</div>
												</div>
											<?php endforeach; ?>
	                    				<?php endif; ?>
									</div>
									<?php if ( $vt || $slideshare || $attachment ) : ?>
										<div class="s-players">
											<div id="tabs">
												<ul>
													<?php if ( $vt ) : ?>
														<li><a href="#tabs-<?php echo $vt['type']; ?>"><i class="fa fa-<?php echo $vt['type']; ?>"></i> <?php _e( 'Video','bvseventos' ); ?></a></li>
													<?php endif; ?>
													<?php if ( $slideshare ) : ?>
														<li><a href="#tabs-slideshare"><i class="fa fa-slideshare"></i> <?php _e( 'SlideShare','bvseventos' ); ?></a></li>
													<?php endif; ?>
												</ul>
												<?php if ( $vt ) : ?>
													<div id="tabs-<?php echo $vt['type']; ?>">
														<iframe title="<?php _e( 'Video','bvseventos' ); ?>" src="<?php echo $vt['embed']; ?>" width="700" height="350" allowfullscreen>
															<?php _e('Your reading system does not support inline frames or support has been disabled. Please follow'); ?> <a href="<?php echo $video; ?>"><?php _e('this link'); ?></a> <?php _e('to open the associated content document.'); ?>
														</iframe>
													</div>
												<?php endif; ?>
												<?php if ( $slideshare ) : ?>
													<div id="tabs-slideshare">
														<iframe title="<?php _e( 'SlideShare','bvseventos' ); ?>" src="<?php echo slideshare_embed($slideshare); ?>" width="700" height="350" allowfullscreen>
															<?php _e('Your reading system does not support inline frames or support has been disabled. Please follow'); ?> <a href="<?php echo $slideshare; ?>"><?php _e('this link'); ?></a> <?php _e('to open the associated content.'); ?>
														</iframe>
													</div>
												<?php endif; ?>
											</div>
										</div>
									<?php endif; ?>
									<div class="summary">
										<strong><?php _e( 'Resumo','bvseventos' ); ?></strong>
										<?php
											if ( $post->post_content ) {
					                            echo wpautop($post->post_content);
					                        } elseif ( get_the_excerpt() ) {
					                            the_excerpt();
					                        }
					                    ?>
									</div>
									<?php if( has_tag() ) : ?>
										<div class="s-tags">
											<strong><?php _e('Tags', 'bvseventos'); ?>:</strong>
											<?php the_tags( '<span>', '</span><span>', '</span>' ); ?>
										</div>
									<?php endif; ?>
									<?php if ( $attachment ) : ?>
										<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href="<?php echo $attachment['url']; ?>" target="_blank"><?php _e( 'Download Apresentação','bvseventos' ); ?></a></span></div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
