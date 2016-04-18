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
        	$end_datetime = strtotime(get_field( 'end_time', $post->ID ));
            $initial_datetime = strtotime(get_field( 'initial_time', $post->ID ));
        ?>

        <div class="subsession-list session panel">
            <div class="subsession-time">
                <?php echo date("H:i A", $initial_datetime ) . ' - ' . date("H:i A", $end_datetime ); ?>
            </div>
            <div class="session-data">
                <div class="subsession-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                <div class="location"><?php the_field( 'location', $post->ID ); ?></div>
                <div class="author-list">
                    <?php $author_ids = get_post_meta( $post->ID, 'author' ); ?>
                    <?php if ( $author_ids[0] ) : // Participants Loop ?>
                        <?php foreach ($author_ids[0] as $id) : ?>
                            <div class="s-author">
                                <div class="author-data">
                                    <div class="author-name"><a href="<?php echo get_the_permalink($id); ?>"><?php echo get_the_title($id); ?></a></div>
                                    <div class="author-inst"><span class="job-title"><?php the_field( 'job_title', $id ); ?></span>  - <span class="affiliation"><?php the_field( 'affiliation', $id ); ?></span></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <?php get_template_part( 'template-parts/presentation' ); ?>

            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>