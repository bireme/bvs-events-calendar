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
    $args = array(
        'post_type' => 'subsession',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order'   => 'ASC',
        'orderby'   => 'meta_value',
        'meta_key'  => 'initial_time',
        'meta_query' => array(
            array(
                'key' => 'session',
                'value' => serialize(strval($post->ID)),
                'compare' => 'LIKE'
            )
        )
    );

    $subsession_query = null;
    $subsession_query = new WP_Query($args);
?>

<?php if( $subsession_query->have_posts() ) : // Subsessions Loop ?>
    <?php while ( $subsession_query->have_posts() ) : $subsession_query->the_post(); ?>
        <?php
            $obj = $post;
        	$end_datetime = strtotime(get_field( 'end_time', $post->ID ));
            $initial_datetime = strtotime(get_field( 'initial_time', $post->ID ));
        ?>

        <div class="subsession-list session panel">
            <div class="subsession-time">
                <?php echo date("H:i A", $initial_datetime ) . ' - ' . date("H:i A", $end_datetime ); ?>
            </div>
            <div class="session-data">
                <?php if ( get_the_excerpt() ) : ?>
                    <div class="view-detail "><?php _e( 'Details','bvs-events-calendar' ); ?> <i class="fa fa-eye"></i></div>
                <?php endif; ?>
                <div class="subsession-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                <div class="location"><?php the_field( 'location', $post->ID ); ?></div>
                <div class="author-list">
                    <?php
                        // Find connected participants
                        $connected = new WP_Query( array(
                            'connected_type' => 'subsessions_to_participants',
                            'connected_items' => $post,
                            'nopaging' => true
                        ) );
                    ?>
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
                    <div class="detail ss-summary summary">
                        <strong><?php _e( 'Summary','bvs-events-calendar' ); ?></strong>
                        <?php the_excerpt(); ?>
                    </div>
                <?php endif; ?>

                <?php $post = $obj; ?>

                <?php get_template_part( 'template-parts/presentation' ); ?>

            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>