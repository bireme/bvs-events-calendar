<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<?php

	global $post;

    $args = array(
        'post_type' => 'presentation',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'meta_value',
        'meta_key' => 'initial_date',
        'meta_query' => array(
            array(
                'key' => 'session',
                'value' => serialize(strval($post->ID)),
                'compare' => 'LIKE'
            )
        )
    );

    $presentation_query = null;
    $presentation_query = new WP_Query($args);
?>

<?php if( $presentation_query->have_posts() ) : // Presentations Loop ?>
    <?php while ( $presentation_query->have_posts() ) : $presentation_query->the_post(); ?>
        <?php
            $end_datetime = strtotime(get_field( 'end_date', $post->ID ));
            $initial_datetime = strtotime(get_field( 'initial_date', $post->ID ));
            $attachment = get_field( 'attachments', $post->ID );
            $video = get_field( 'video', $post->ID );

            // Find connected participants
            $connected = new WP_Query( array(
                'connected_type' => 'presentations_to_participants',
                'connected_items' => $post,
                'nopaging' => true
            ) );
        ?>
        <div class="presentation-list">
            <div class="presentation">
                <div class="session-time">
                    <?php echo date("H:i A", $initial_datetime ) . ' - ' . date("H:i A", $end_datetime ); ?>
                </div>
                <div class="presentation-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </div>
                <div class="view-detail "><?php _e( 'Details','bvs-events-calendar' ); ?> <i class="fa fa-eye"></i></div>
                <div class="detail">
                    <div class="author-list">
	                    <?php if ( $connected->have_posts() ) : // Display connected participants ?>
                            <?php while( $connected->have_posts() ) : $connected->the_post(); ?>
	                            <?php
                                    $id = get_the_ID();
                                    $picture = get_field( 'picture', $id );
                                    $job_title = get_field( 'job_title', $id );
                                    $affiliation = get_field( 'affiliation', $id );
                                    $separator = ( $job_title && $affiliation ) ? ' - ' : '';
                                    $role = p2p_get_meta( get_post()->p2p_id, 'role', true );
                                    $comma = $role ? ', ' : '';
                                ?>
	                            <div class="s-author">
	                                <?php if ($picture) : ?>
	                                    <div class="author-pic"><img src="<?php echo $picture['url']; ?>" /></div>
	                                <?php endif; ?>
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
                    <div class="summary">
                        <strong><?php _e( 'Summary','bvs-events-calendar' ); ?></strong>
                        <?php
                            if ( get_the_excerpt() ) {
                                the_excerpt();
                            } elseif ( get_the_content() ) {
                                the_content();
                            }
                        ?>
                    </div>
                    <?php if( has_tag() ) : ?>
                        <div class="s-tags">
                            <strong><?php _e('Tags'); ?>:</strong>
                            <?php the_tags( '<span>', '</span><span>', '</span>' ); ?>
                        </div>
                    <?php endif; ?>
                    <div class="s-links">
                    	<?php if ( $attachment ) : ?>
                        	<span><i class="fa fa-cloud-download"></i> <a href="<?php echo $attachment['url']; ?>" target="_blank"><?php _e( 'Download Presentation','bvs-events-calendar' ); ?></a></span>
                        <?php endif; ?>
                        <?php if ( $video ) : ?>
                        	<span><i class="fa fa-play-circle"></i> <a href="<?php echo $video; ?>" target="_blank"><?php _e( 'Watch Video','bvs-events-calendar' ); ?></a></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>