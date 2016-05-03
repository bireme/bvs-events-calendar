<?php
/**
 * The template for displaying all single events
 *
 * @package WordPress
 * @subpackage BVS_Eventos
 * @since BVS Eventos 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-event' ); ?>>
	<header class="entry-header">
		<?php the_title( '<span class="event-title">', '</span>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( get_field('venue') ) : ?>
			<div class="session-venue">
				<?php echo strip_tags(get_field('venue')); ?>
			</div>
		<?php endif; ?>

		<?php if ( get_field('start_date') ) : ?>
			<div class="session-date">
				<?php
					$start_date = date("d/m/Y", strtotime(get_field('start_date')));
					$end_date = (get_field('end_date') && get_field('start_date') != get_field('end_date')) ? ' - ' . date("d/m/Y", strtotime(get_field('end_date'))) : '';
					
					echo '<span>' . __( 'Date', 'bvseventos' ) . ': </span>' . $start_date . $end_date;
				?>
			</div>
		<?php endif; ?>

		<span class="event-details">
			<a href="<?php the_permalink(); ?>"><?php _e('See more details', 'bvseventos'); ?></a>
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
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'bvseventos' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
