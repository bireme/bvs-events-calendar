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

    <?php        
        $args = array(
            'post_type' => 'session',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'order'   => 'ASC',
            'orderby'   => 'meta_value',
            'meta_key'  => 'initial_date_and_time',
            'meta_query' => array(
                array(
                    'key' => 'schedule',
                    'value' => serialize(strval($post->ID)),
                    'compare' => 'LIKE'
                )
            )
        );

        $session_query = null;
        $session_query = new WP_Query($args);
    ?>

    <?php if( $session_query->have_posts() ) : // Sessions Loop ?>
        <?php
            $session_ids = wp_list_pluck( $session_query->posts, 'ID' );
            $session_dates = array();
            $dates = get_session_dates($session_ids);
        ?>
        <div class="event-summary slider-wrapper">
            <div class="slider slider1">
                <?php foreach ($dates as $key => $value) : ?>
                    <div class="sum-day">
                        <strong><?php echo date_i18n("d/F/Y - l", strtotime($key) ); ?></strong>
                        <div class="slider-wrapper">
                            <div class="slider-s slider2">
                                <div class="sum-sessions">
                                    <?php foreach ($value as $v) { ?>
                                        <div class="ss-item">
                                            <span class="initial-time"><?php echo date("H:i", strtotime(get_field( 'initial_date_and_time', $v ))); ?></span><span class="ss-ttl"><a href="#s<?php echo $v; ?>"><?php echo get_the_title($v); ?></a></span>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="program">
            <?php while ( $session_query->have_posts() ) : $session_query->the_post(); ?>
                <?php
                    $obj = $post;
                    $end_datetime = strtotime(get_field( 'end_date_and_time', $post->ID ));
                    $initial_datetime = strtotime(get_field( 'initial_date_and_time', $post->ID ));
                    if ( ! isset($previous_initial_datetime) || date("Ymd", $initial_datetime ) != $previous_initial_datetime ) :
                        $previous_initial_datetime = date("Ymd", $initial_datetime );
                ?>
                    <div class="program-day">
                        <div class="schedule-date">
                            <?php echo date_i18n("d/F/Y - l", $initial_datetime ); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="session" id="s<?php echo $post->ID; ?>">
                    <div class="session-time">
                        <?php echo date("H:i A", $initial_datetime ) . ' - ' . date("H:i A", $end_datetime ); ?>
                    </div>
                    <div class="session-data">
                        <div class="view-detail "><?php _e( 'Details','bvs-events-calendar' ); ?> <i class="fa fa-eye"></i></div>
                        <div class="session-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
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
                        <div class="detail s-summary summary">
                            <strong><?php _e( 'Summary','bvs-events-calendar' ); ?></strong>
                            <?php
                                if ( get_the_excerpt() ) {
                                    the_excerpt();
                                } elseif ( get_the_content() ) {
                                    the_content();
                                }
                            ?>
                        </div>

                        <?php get_template_part( 'template-parts/subsession' ); ?>

                        <?php $post = $obj; ?>

                        <?php get_template_part( 'template-parts/presentation' ); ?>

                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

    </main><!-- .site-main -->

    <?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
