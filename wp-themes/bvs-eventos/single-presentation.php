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
	$description = '';
    $author_ids = get_post_meta( $post->ID, 'author' );
    $attachment = get_field( 'attachments', $post->ID );
    $video = get_field( 'video', $post->ID );
    $ext = pathinfo($attachment['url'], PATHINFO_EXTENSION);
    $vt = get_video_data($video);
    $slideshare = get_field( 'slideshare', $post->ID );
    $session = get_post_meta( $post->ID, 'session' );
    $end_datetime = strtotime(get_field( 'end_date', $post->ID ));
	$initial_datetime = strtotime(get_field( 'initial_date', $post->ID ));
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php event_breadcrumb($post->ID); ?>

		<div class="session">
			<div class="single-session-date">
	            <?php echo date_i18n("d/F/Y - l", $initial_datetime); ?>
	        </div>
	        <div class="session-time">
	        	<?php echo date("H:i A", $initial_datetime ) . ' - ' . date("H:i A", $end_datetime ); ?>
	    	</div>
	    	<?php if ( $session ) : ?>
		    	<div class="session-label"><?php echo get_the_title( $session[0][0] ); ?></div>
		    	<div class="location"><?php the_field( 'location', $session[0][0] ); ?></div>
		    <?php endif; ?>
	    </div>
		<div class="single-session-title"><?php single_post_title(); ?></div>
		<div class="presentation">
			<div class="detail">
				<?php if ( $vt || $slideshare ) : ?>
					<div class="s-players">
						<div id="tabs">
							<ul>
								<?php if ( $vt ) : ?>
									<li><a href="#tabs-<?php echo $vt['type']; ?>"><i class="fa fa-<?php echo $vt['type']; ?>"></i> <?php _e( 'Video','bvs-events-calendar' ); ?></a></li>
								<?php endif; ?>
								<?php if ( $slideshare ) : ?>
									<li><a href="#tabs-slideshare"><i class="fa fa-slideshare"></i> <?php _e( 'SlideShare','bvs-events-calendar' ); ?></a></li>
								<?php endif; ?>
							</ul>
							<?php if ( $vt ) : ?>
								<div id="tabs-<?php echo $vt['type']; ?>">
									<iframe title="<?php _e( 'Video','bvs-events-calendar' ); ?>" src="<?php echo $vt['embed']; ?>" width="700" height="350" allowfullscreen>
										<?php _e('Your reading system does not support inline frames or support has been disabled. Please follow'); ?> <a href="<?php echo $video; ?>"><?php _e('this link'); ?></a> <?php _e('to open the associated content.'); ?>
									</iframe>
								</div>
							<?php endif; ?>
							<?php if ( $slideshare ) : ?>
								<div id="tabs-slideshare">
									<iframe title="<?php _e( 'SlideShare','bvs-events-calendar' ); ?>" src="<?php echo slideshare_embed($slideshare); ?>" width="700" height="350" allowfullscreen>
										<?php _e('Your reading system does not support inline frames or support has been disabled. Please follow'); ?> <a href="<?php echo $slideshare; ?>"><?php _e('this link'); ?></a> <?php _e('to open the associated content.'); ?>
									</iframe>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
				<div class="author-list">
					<?php if ( $author_ids[0] ) : // Participants Loop ?>
                        <?php foreach ($author_ids[0] as $id) : ?>
                            <?php
                                $job_title = get_field( 'job_title', $id );
                                $affiliation = get_field( 'affiliation', $id );
                                $separator = ( $job_title && $affiliation ) ? ' - ' : '';
                            ?>
							<div class="s-author">
								<div class="author-data">
									<div class="author-name">
                                        <a href="<?php echo get_the_permalink($id); ?>"><?php echo get_the_title($id); ?></a>
                                    </div>
									<div class="author-inst">
                                        <span class="job-title"><?php echo $job_title; ?></span><?php echo $separator; ?><span class="affiliation"><?php echo $affiliation; ?></span>
                                    </div>
								</div>
							</div>
						<?php endforeach; ?>
    				<?php endif; ?>
				</div>
				<div class="summary">
					<?php						
						if ( $post->post_content ) {
                            $description = wpautop($post->post_content);
                        } elseif ( get_the_excerpt() ) {
                            $description = get_the_excerpt();
                        }

                        if ( ! empty($description) ) : ?>
                        	<strong><?php _e( 'Summary','bvs-events-calendar' ); ?></strong>
                        	<?php echo $description; ?>
                        <?php endif;
                    ?>
				</div>
				<?php if( has_tag() ) : ?>
					<div class="s-tags">
						<strong><?php _e('Tags', 'bvs-events-calendar'); ?>:</strong>
						<?php the_tags( '<span>', '</span><span>', '</span>' ); ?>
					</div>
				<?php endif; ?>
				<?php if ( $attachment ) : ?>
					<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href="<?php echo $attachment['url']; ?>" target="_blank"><?php _e( 'Download Presentation','bvs-events-calendar' ); ?></a></span></div>
				<?php endif; ?>
			</div>
		</div>
	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
