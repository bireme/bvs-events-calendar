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
	<div class="program">
		<div class="program-day" id="20160222">
			<div class="session conference" id="s02">
				<div class="session-time">
					22/Fevereiro/2016 - Segunda-Feira | 9:00 AM - 10:00 AM
				</div>
				<div class="session-data">
					<div class="session-title">Keynote</a></div>
					<div class="location">Sala A</div>
					<div class="presentation-list">
						<div class="presentation" id="p01">
							<div class="presentation-title">
								<a href="">Donec vestibulum massa nisl, ut posuere augue interdum dignissim</a>
							</div>
							
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="/eventosbvs/reuniao-ABC/participant/joshua-h-reeve/">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="s-players">
									<div id="tabs">
										<ul>
											<li><a href="#tabs-1"><i class="fa fa-youtube"></i> Vídeo</a></li>
											<li><a href="#tabs-2"><i class="fa fa-slideshare"></i> SlideShare</a></li>
										</ul>
										<div id="tabs-1">
											<iframe width="700" height="350" src="https://www.youtube.com/embed/DSUIvacY4XA" frameborder="0" allowfullscreen></iframe>	
										</div>
										<div id="tabs-2">
											<iframe src="//www.slideshare.net/slideshow/embed_code/key/f5RBYdkIZcwpW7" width="700" height="350" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px; max-width: 100%;" allowfullscreen> </iframe>
										</div>
									</div>
								</div>

								<div class="summary">
									<strong>Resumo</strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href="">Download Apresentação</a></span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer( 'schedule' ); ?>
