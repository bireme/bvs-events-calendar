<?php
/**
 * The template for displaying all participants
 *
 * @package WordPress
 * @subpackage BVS_Eventos
 * @since BVS Eventos 1.0
 */
?>

<?php
    $picture = get_field( 'picture' );
    $job_title = get_field( 'job_title' );
    $affiliation = get_field( 'affiliation' );
    $separator = ( $job_title && $affiliation ) ? ' - ' : '';
    $the_excerpt = get_the_excerpt();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-event' ); ?>>
    <div class="entry-content">
        <div class="s-author">
            <?php if ($picture) : ?>
                <div class="author-pic"><img src="<?php echo $picture['url']; ?>" /></div>
            <?php endif; ?>
            <div class="author-data">
                <div class="author-name"><?php the_title(); ?></div>
                <div class="author-inst">
                    <span class="job-title"><?php echo $job_title; ?></span><?php echo $separator; ?><span class="affiliation"><?php echo $affiliation; ?></span>
                </div>
            </div>
        </div>

        <?php if ( ! empty( $the_excerpt ) ) : ?>
        <div class="p-summary">
            <?php echo $the_excerpt; ?>
        </div>
        <?php endif; ?>

        <span class="event-details">
            <a href="<?php the_permalink(); ?>"><?php _e('See more details', 'bvs-events-calendar'); ?></a>
        </span>

        <?php if ( has_tag() ) : ?>
        <div class="event-tags">
            <i class="fa fa-tags"></i>
            <?php
                $tags = wp_get_post_tags($post->ID);
                $tag_name = wp_list_pluck( $tags, 'name' );
                echo implode(', ', $tag_name);
            ?> 
        </div>
        <?php endif; ?>

        <?php
            edit_post_link(
                sprintf(
                    /* translators: %s: Name of current post */
                    __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'bvs-events-calendar' ),
                    get_the_title()
                ),
                '<span class="edit-link">',
                '</span>'
            );
        ?>
    </div><!-- .entry-content -->
</article><!-- #post-## -->
