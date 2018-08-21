<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	
		<?php event_breadcrumb($post->ID); ?>

	    <div class="program">
	        <?php
	            $obj = $post;
	            $end_datetime = strtotime(get_field( 'end_date_and_time', $post->ID ));
	            $initial_datetime = strtotime(get_field( 'initial_date_and_time', $post->ID ));

                // Find connected participants
                $connected = new WP_Query( array(
                    'connected_type' => 'sessions_to_participants',
                    'connected_items' => $post,
                    'nopaging' => true
                ) );
	        ?>
	        <div class="program-day">
	        	<div class="single-session-date">
	                <?php echo date_i18n("d/F/Y - l", $initial_datetime); ?>
	            </div>
		        <div class="session" id="s<?php echo $post->ID; ?>">
		        	<div class="session-time">
                    	<?php echo date("h:i A", $initial_datetime ) . ' - ' . date("h:i A", $end_datetime ); ?>
                	</div>
		            <div class="session-data">
		            	<?php if ( get_the_excerpt() ) : ?>
		                	<div class="view-detail "><?php _e( 'Details','bvs-events-calendar' ); ?> <i class="fa fa-eye"></i></div>
		                <?php endif; ?>
		                <div class="single-session-title"><?php the_title(); ?></div>
		                <div class="location"><?php the_field( 'location', $post->ID ); ?></div>
		                <div class="author-list">
		                    <?php if ( $connected->have_posts() ) : // Display connected participants ?>
                        		<?php while( $connected->have_posts() ) : $connected->the_post(); ?>
		                        	<?php
		                        		$id = get_the_ID();
                                        $job_title = get_field( 'job_title', $id );
                                        $affiliation = get_field( 'affiliation', $id );
                                        $separator = ( $job_title && $affiliation ) ? ' - ' : '';
                                        $role = p2p_get_meta( get_post()->p2p_id, 'role', true );
                                		$comma = $role ? ', ' : '';
                                    ?>
		                            <div class="s-author">
		                                <div class="author-data">
		                                    <div class="author-name">
		                                    	<a href="<?php echo get_the_permalink($id); ?>"><?php echo get_the_title($id); ?></a><span class="author-role"><?php echo $comma . $role; ?></span>
		                                    </div>
		                                    <div class="author-inst">
		                                    	<span class="job-title"><?php echo $job_title; ?></span><?php echo $separator; ?><span class="affiliation"><?php echo $affiliation; ?></span>
		                                    </div>
		                                </div>
		                            </div>
		                        <?php endwhile; ?>
		                    <?php endif; ?>
		                </div>
		                <?php if ( get_the_excerpt() ) : ?>
			                <div class="detail s-summary summary">
		                        <strong><?php _e( 'Summary','bvs-events-calendar' ); ?></strong>
		                        <?php the_excerpt(); ?>
		                    </div>
		                <?php endif; ?>

		                <?php $post = $obj; ?>
		                
		                <?php get_template_part( 'template-parts/subsession' ); ?>

		                <?php $post = $obj; ?>

		                <?php get_template_part( 'template-parts/presentation' ); ?>

		            </div>
		        </div>
		    </div>
	    </div>
	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
