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
		<div class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">home</a> / <a href="/eventosbvs/reuniao-ABC/schedule/scientific-program/">Programa Científico</a> / <strong><?php single_post_title(); ?></strong></div>
		
		
		
		<!-- 
		***** Necessita programação *****
		criar loop que traga todos os posts do post type "session" que pertençam à "schedule = scientific program" 
		-->
		
		<div class="detail">
			<div class="author-profile">
				<div class="s-author">
					<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
					<div class="autor-data">
						<div class="author-name"><a href="">Joshua H. Reeve</a></div>
						<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
					</div>
				</div>
				<div class="short-bio">
					<strong><?php _e( 'Curriculum Vitae Resumido','bvs-eventos' ); ?></strong>
					<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dolor metus, pulvinar vel sapien vulputate, dapibus vehicula justo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam eu dolor sapien. Mauris eros dui, posuere nec risus vel, ultricies elementum libero. Nullam dictum enim ac finibus egestas. Curabitur dictum porta felis cursus ornare. Curabitur ac pretium metus, nec pretium odio. Nunc aliquam rhoncus rhoncus. Proin tempus nulla eget interdum scelerisque. Praesent bibendum faucibus pellentesque. Nunc imperdiet commodo lacinia. Vestibulum ac augue venenatis, rutrum tortor non, auctor turpis. Donec eget leo tincidunt, luctus enim quis, venenatis mi. Praesent rhoncus nulla eget mauris sollicitudin mattis. Pellentesque sagittis quis tortor eget tempor. Nullam purus tortor, feugiat quis sollicitudin in, tincidunt sit amet ex.</p>
					<p>Donec vestibulum massa nisl, ut posuere augue interdum dignissim. Nullam consequat tristique ipsum, eu luctus felis cursus in. Vestibulum dignissim mi eget ultricies consectetur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent vestibulum nulla id turpis imperdiet pretium. Morbi quis viverra felis, vel consectetur ante. Donec elementum orci id justo viverra, in sodales diam egestas. Duis vel feugiat turpis, id vulputate mauris. Etiam porttitor posuere enim, non vehicula arcu vehicula quis. Vivamus vitae sapien sapien. Duis non arcu in magna posuere imperdiet id elementum sapien. Pellentesque lobortis urna eget erat luctus, eu fringilla odio maximus. Pellentesque tempor augue et eros sollicitudin, sed mattis eros vulputate. Praesent lacinia lacus efficitur venenatis scelerisque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
				</div>
				<div class="related-content">
					<!--
					***** Necessita programação *****
					-->
					<?php _e( 'Veja também de','bvs-eventos' ); ?> <strong><?php single_post_title(); ?></strong>
					<ul>
						<li><a href="">Cras vitae magna sit amet nunc lobortis ultricies</a></li>
						<li><a href="">In vitae odio at velit feugiat facilisis. Morbi finibus mattis arcu</a></li>
						<li><a href="">Cras non purus faucibus, vehicula lorem vel, aliquet augue</a></li>
					</ul>
				</div>
			</div>
		</div>
	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<aside id="secondary" class="sidebar" role="complementary">
	<!-- *****  Requer programação ***** -->
	<ul class="social-links">
		<li><strong><i class="fa fa-link"></i> Site</strong><br/>
			<small><a href="#">http://author-website.com</a></small>
		</li>
		<li><strong><i class="fa fa-twitter"></i> Twitter</strong><br/>
			<small><a href="#">http://author-website.com</a></small>
		</li>
		<li><strong><i class="fa fa-facebook"></i> Facebook</strong><br/>
			<small><a href="#">http://author-website.com</a></small>
		</li>
		<li><strong><i class="fa fa-linkedin"></i> LinkedIn</strong><br/>
			<small><a href="#">http://author-website.com</a></small>
		</li>
		<li><strong><i class="fa fa-mortar-board"></i> Curriculum Vitae</strong><br/>
			<small><a href="#">http://author-website.com</a></small>
		</li>
	</ul>
</aside>
<?php get_footer( 'schedule' ); ?>
