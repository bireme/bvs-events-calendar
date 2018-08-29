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

    $site     = get_field('site');
    $twitter  = get_field('twitter');
    $facebook = get_field('facebook');
    $linkedin = get_field('linkedin');
    $cv       = get_field('curriculum_vitae');

    $class = 'full-width';

    if ( $site || $twitter || $facebook || $linkedin || $cv ) {
        $class = '';
    }

    // Find connected presentations
    $connected = new WP_Query( array(
        'connected_type' => 'presentations_to_participants',
        'connected_items' => $post,
        'nopaging' => true
    ) );
?>

<div id="primary" class="content-area <?php echo $class; ?>">
    <main id="main" class="site-main" role="main">
    
        <?php event_breadcrumb( $id ); ?>

        <div class="detail">
            <div class="author-profile">
                <div class="s-author">
                    <?php
                        $picture = get_field( 'picture' );
                        $job_title = get_field( 'job_title' );
                        $affiliation = get_field( 'affiliation' );
                        $separator = ( $job_title && $affiliation ) ? ' - ' : '';
                    ?>
                    <?php if ($picture) : ?>
                        <div class="author-pic"><img src="<?php echo $picture['url']; ?>" /></div>
                    <?php endif; ?>
                    <div class="author-data">
                        <div class="author-name"><?php single_post_title(); ?></div>
                        <div class="author-inst">
                            <span class="job-title"><?php echo $job_title; ?></span><?php echo $separator; ?><span class="affiliation"><?php echo $affiliation; ?></span>
                        </div>
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

                <?php if ( $connected->have_posts() ) : // Presentations Loop ?>
                    <div class="related-content">
                        <?php if ( defined( 'POLYLANG_VERSION' ) ) : ?>
                            <?php pll_e('Related Presentations'); ?>
                        <?php else : ?>
                            <?php _e( 'Related Presentations','bvs-events-calendar' ); ?>
                        <?php endif; ?>

                        <?php while( $connected->have_posts() ) : $connected->the_post(); ?>
                            <div class="presentation-desc">
                                <?php
                                    $session = get_post_meta( $post->ID, 'session' );
                                    $location = get_field( 'location', $session[0][0] );
                                    $end_datetime = strtotime(get_field( 'end_date', $post->ID ));
                                    $initial_datetime = strtotime(get_field( 'initial_date', $post->ID ));

                                    $date = date_i18n("d/F/Y - l", $initial_datetime);
                                    $date .= ' ' . date("h:i A", $initial_datetime ) . ' - ' . date("h:i A", $end_datetime );
                                ?>
                                <div class="single-session-date"><?php echo $date; ?></div>
                                <?php if ( $session ) : ?>
                                <div class="session-label"><?php echo get_the_title( $session[0][0] ); ?></div>
                                <?php endif; ?>
                                <?php if ( $location ) : ?>
                                <div class="location"><?php echo $location; ?></div>
                                <?php endif; ?>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main><!-- .site-main -->

    <?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php $post = $obj; ?>

<?php if ( empty($class) ) : ?>
<aside id="secondary" class="sidebar" role="complementary">
    <ul class="social-links">
        <?php if ( $site ) { ?>
            <li><strong><i class="fa fa-link"></i> <?php _e( 'Site', 'bvs-events-calendar' ); ?></strong><br/>
                <small><a href="<?php the_field( 'site' ); ?>" target="_blank"><?php echo $site; ?></a></small>
            </li>
        <?php } ?>
        <?php if ( $twitter ) { ?>
            <li><strong><i class="fa fa-twitter"></i> <?php _e( 'Twitter', 'bvs-events-calendar' ); ?></strong><br/>
                <small><a href="<?php the_field( 'twitter' ); ?>" target="_blank"><?php echo $twitter; ?></a></small>
            </li>
        <?php } ?>
        <?php if ( $facebook ) { ?>
            <li><strong><i class="fa fa-facebook"></i> <?php _e( 'Facebook', 'bvs-events-calendar' ); ?></strong><br/>
                <small><a href="<?php the_field( 'facebook' ); ?>" target="_blank"><?php echo $facebook; ?></a></small>
            </li>
        <?php } ?>
        <?php if ( $linkedin ) { ?>
            <li><strong><i class="fa fa-linkedin"></i> <?php _e( 'LinkedIn', 'bvs-events-calendar' ); ?></strong><br/>
                <small><a href="<?php the_field( 'linkedin' ); ?>" target="_blank"><?php echo $linkedin; ?></a></small>
            </li>
        <?php } ?>
        <?php if ( $cv ) { ?>
            <li><strong><i class="fa fa-mortar-board"></i> <?php _e( 'Curriculum Vitae', 'bvs-events-calendar' ); ?></strong><br/>
                <small><a href="<?php the_field( 'curriculum_vitae' ); ?>" target="_blank"><?php echo $cv; ?></a></small>
            </li>
        <?php } ?>
    </ul>
</aside>
<?php endif; ?>

<?php get_footer(); ?>
