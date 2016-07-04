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
        'order'   => 'ASC',
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
            $author_ids = get_post_meta( $post->ID, 'author' );
            $attachment = get_field( 'attachments', $post->ID );
            $video = get_field( 'video', $post->ID );
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
	                    <?php if ( $author_ids[0] ) : // Participants Loop ?>
	                        <?php foreach ($author_ids[0] as $id) : ?>
	                            <?php $picture = get_field( 'picture', $id ); ?>
	                            <div class="s-author">
	                                <?php if ($picture) : ?>
	                                    <div class="author-pic"><img src="<?php echo $picture['url']; ?>" /></div>
	                                <?php endif; ?>
	                                <div class="author-data">
	                                    <div class="author-name"><a href="<?php echo get_the_permalink($id); ?>"><?php echo get_the_title($id); ?></a></div>
	                                    <div class="author-inst"><span class="job-title"><?php the_field( 'job_title', $id ); ?></span> - <span class="affiliation"><?php the_field( 'affiliation', $id ); ?></span></div>
	                                </div>
	                            </div>
	                        <?php endforeach; ?>
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