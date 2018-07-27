<?php
/**
 * The Participant archive template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage BVS_Eventos
 * @since BVS Eventos 1.0
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <?php if ( have_posts() ) : ?>

            <header><h1 class="event-label"><?php _e( 'Participants', 'bvs-events-calendar' ); ?></h1></header>

            <?php
            // Start the loop.
            while ( have_posts() ) : the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'template-parts/participant' );

            // End the loop.
            endwhile;

            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'bvs-events-calendar' ),
                'next_text'          => __( 'Next page', 'bvs-events-calendar' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bvs-events-calendar' ) . ' </span>',
            ) );

        // If no content, include the "No posts found" template.
        else :
            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>

        </main><!-- .site-main -->
    </div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
