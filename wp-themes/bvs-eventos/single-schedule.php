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
	<div class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">home</a> / <strong><?php single_post_title(); ?></strong></div>
	
	<!-- 
	***** Necessita programação *****
	Sumario do evento  
	-->
	<div class="event-summary slider-wrapper">
		<div class="slider slider1">
			<div class="sum-day">
				<strong>22/Fevereiro/2016 - Segunda-feira</strong>
				<div class="slider-wrapper">
					<div class="slider-s slider2">
						<div class="sum-sessions">
							<div class="ss-item"><span class="initial-time">8:30</span><span class="ss-ttl"><a href="#s01">Abertura</a></span></div>
							<div class="ss-item"><span class="initial-time">9:00</span><span class="ss-ttl"><a href="#s02">Conferência</a></span></div>
							<div class="ss-item"><span class="initial-time">10:00</span><span class="ss-ttl"><a href="#s03">Painel 1</a></span></div>
							<div class="ss-item"><span class="initial-time">10:00</span><span class="ss-ttl"><a href="#s04">Painel 2</a></span></div>
							<div class="ss-item"><span class="initial-time">12:00</span><span class="ss-ttl"><a href="#s05">Break</a></span></div>
							<div class="ss-item"><span class="initial-time">14:00</span><span class="ss-ttl"><a href="#s06">Painel 3</a></span></div>
							<div class="ss-item"><span class="initial-time">14:00</span><span class="ss-ttl"><a href="#s07">Painel 4</a></span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="sum-day">
				<strong>23/Fevereiro/2016 - Terça-feira</strong>
				<div class="slider-wrapper">
					<div class="slider-s slider2">
						<div class="sum-sessions">
							<div class="ss-item"><span class="initial-time">9:00</span><span class="ss-ttl"><a href="#s08">Conferência</a></span></div>
							<div class="ss-item"><span class="initial-time">10:30</span><span class="ss-ttl"><a href="#s09">Conferência</a></span></div>
							<div class="ss-item"><span class="initial-time">12:00</span><span class="ss-ttl"><a href="#s10">Break</a></span></div>
							<div class="ss-item"><span class="initial-time">14:00</span><span class="ss-ttl"><a href="#s11">Painel 5</a></span></div>
							<div class="ss-item"><span class="initial-time">14:00</span><span class="ss-ttl"><a href="#s12">Painel 6</a></span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="sum-day">
				<strong>24/Fevereiro/2016 - Quarta-feira</strong>
				<div class="slider-wrapper">
					<div class="slider-s slider2">
						<div class="sum-sessions">
							<div class="ss-item"><span class="initial-time">9:00</span><span class="ss-ttl"><a href="#s13">Conferência</a></span></div>
							<div class="ss-item"><span class="initial-time">10:30</span><span class="ss-ttl"><a href="#s14">Conferência</a></span></div>
							<div class="ss-item"><span class="initial-time">12:00</span><span class="ss-ttl"><a href="#s15">Break</a></span></div>
							<div class="ss-item"><span class="initial-time">14:00</span><span class="ss-ttl"><a href="#s16">Painel 7</a></span></div>
							<div class="ss-item"><span class="initial-time">14:00</span><span class="ss-ttl"><a href="#s17">Painel 8</a></span></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Sumario do evento
	-->
	

	
	<!-- 
	***** Necessita programação *****
	criar loop que traga todos os posts do post type "session" que pertençam à "schedule = scientific program" 
	-->
	<div class="program">
		<div class="program-day" id="20160222">
			<div class="schedule-date">
				<!-- 
				***** Necessita programação *****
				Trazer o conteúdo do field "strat_date" do post type "event = reuniao-abc"
				Atenção: será necessário fazer um loop para exibir todas as ocorrências dentro do período entre os valores dos fields "strat_date" e "end_date"
				-->
				22/Fevereiro/2016 - Segunda-Feira	
			</div>
			<div class="session" id="s01">
				<div class="session-time">
					8:30 AM - 9:00 AM
				</div>
				<div class="session-data">
					<div class="session-title"><a href="">Solenidade de Abertura</a></div>
					<div class="location">Sala A</div>
					<div class="author-list">
						<div class="s-author">
							<div class="author-data">
								<div class="author-name"><a href="">Hector Rodriguez</a></div>
								<div class="author-inst>"<span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
							</div>
						</div>
					</div>
					<div class="s-links"><span><i class="fa fa-play-circle"></i> <a href="#" class="activate_modal" name="opn_01"><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
					<div id='mask' class='close_modal'></div>
					<div class="modal_window" id="opn_01">
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
					</div>
				</div>
			</div>
			<div class="session conference" id="s02">
				<div class="session-time">
					9:00 AM - 10:00 AM
				</div>
				<div class="session-data">
					<div class="session-title"><a href="/eventosbvs/reuniao-ABC/session/keynote/">Keynote</a></div>
					<div class="location">Sala A</div>
					<div class="presentation-list">
						<div class="presentation">
							<div class="presentation-title">
								<a href="/eventosbvs/reuniao-ABC/session/keynote/#p01">Cras vitae magna sit amet nunc lobortis ultricies</a>
							</div>
							<div class="view-detail "><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
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
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="session panel" id="s03">
				<div class="session-time">
					10:00 AM - 12:00 PM
				</div>
				<div class="session-data">
					<div class="session-title"><a href="">Painel 1 - Lorem Ipsum Dolor</a></div>
					<div class="location">Sala A</div>
					<div class="author-list">
						<div class="s-author">
							<div class="author-data">
								<div class="author-name"><a href="">Walter White</a></div>
								<div class="author-inst"><span class="job-title">Coordenador</span></div>
							</div>
						</div>
					</div>
					<div class="presentation-list">
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Cras vitae magna sit amet nunc lobortis ultricies</a>
							</div>
							<div class="view-detail "><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
							</div>
						</div>
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Donec vestibulum massa nisl, ut posuere augue interdum dignissim</a>
							</div>
							<div class="view-detail"><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
								
							</div>
						</div>
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Donec vestibulum massa nisl, ut posuere augue interdum dignissim</a>
							</div>
							<div class="view-detail"><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="session panel" id="s04">
				<div class="session-time">
					10:00 AM - 12:00 PM
				</div>
				<div class="session-data">
					<div class="session-title"><a href="">Painel 2 - Vestibulum dignissim mi eget ultricies consectetur</a></div>
					<div class="location">Sala A</div>
					<div class="author-list">
						<div class="s-author">
							<div class="author-data">
								<div class="author-name"><a href="">Walter White</a></div>
								<div class="author-inst"><span class="job-title">Coordenador</span></div>
							</div>
						</div>
					</div>
					<div class="presentation-list">
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Cras vitae magna sit amet nunc lobortis ultricies</a>
							</div>
							<div class="view-detail "><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
							</div>
						</div>
							<div class="presentation">
								<div class="presentation-title">
									<a href="">Donec vestibulum massa nisl, ut posuere augue interdum dignissim</a>
								</div>
								<div class="view-detail"><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
								<div class="detail">
									<div class="author-list">
										<div class="s-author">
											<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
											<div class="autor-data">
												<div class="author-name"><a href="">Joshua H. Reeve</a></div>
												<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
											</div>
										</div>
									</div>
									<div class="summary">
										<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
										<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
									</div>
									<div class="s-tags">
										<strong>Tags</strong>
										<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
									</div>
									<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
									
								</div>
							</div>
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Donec vestibulum massa nisl, ut posuere augue interdum dignissim</a>
							</div>
							<div class="view-detail"><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="session break" id="s05">
				<div class="session-time">
					12:00 PM - 14:00 PM
				</div>
				<div class="session-data">
					<div class="session-title"><a href="">Intervalo para Almoço</a></div>
				</div>
			</div>
			<div class="session panel" id="s06">
				<div class="session-time">
					10:00 AM - 12:00 PM
				</div>
				<div class="session-data">
					<div class="session-title"><a href="">Painel 3 - Lorem Ipsum Dolor</a></div>
					<div class="location">Sala A</div>
					<div class="author-list">
						<div class="s-author">
							<div class="author-data">
								<div class="author-name"><a href="">Walter White</a></div>
								<div class="author-inst"><span class="job-title">Coordenador</span></div>
							</div>
						</div>
					</div>
					<div class="presentation-list">
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Cras vitae magna sit amet nunc lobortis ultricies</a>
							</div>
							<div class="view-detail "><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
							</div>
						</div>
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Donec vestibulum massa nisl, ut posuere augue interdum dignissim</a>
							</div>
							<div class="view-detail"><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
								
							</div>
						</div>
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Donec vestibulum massa nisl, ut posuere augue interdum dignissim</a>
							</div>
							<div class="view-detail"><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="session panel" id="s07">
				<div class="session-time">
					10:00 AM - 12:00 PM
				</div>
				<div class="session-data">
					<div class="session-title"><a href="">Painel 4 - Vestibulum dignissim mi eget ultricies consectetur</a></div>
					<div class="location">Sala A</div>
					<div class="author-list">
						<div class="s-author">
							<div class="author-data">
								<div class="author-name"><a href="">Walter White</a></div>
								<div class="author-inst"><span class="job-title">Coordenador</span></div>
							</div>
						</div>
					</div>
					<div class="presentation-list">
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Cras vitae magna sit amet nunc lobortis ultricies</a>
							</div>
							<div class="view-detail "><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
							</div>
						</div>
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Donec vestibulum massa nisl, ut posuere augue interdum dignissim</a>
							</div>
							<div class="view-detail"><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
								
							</div>
						</div>
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Donec vestibulum massa nisl, ut posuere augue interdum dignissim</a>
							</div>
							<div class="view-detail"><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="program-day" id="20160223">
			<div class="schedule-date">
				<!-- 
				***** Necessita programação *****
				Trazer o conteúdo do field "strat_date" do post type "event = reuniao-abc"
				Atenção: será necessário fazer um loop para exibir todas as ocorrências dentro do período entre os valores dos fields "strat_date" e "end_date"
				-->
				23/Fevereiro/2016 - Terça-Feira	
			</div>
			<div class="session conference" id="s08">
				<div class="session-time">
					9:00 AM - 10:30 AM
				</div>
				<div class="session-data">
					<div class="session-title"><a href="">Conferência</a></div>
					<div class="location">Sala A</div>
					<div class="presentation-list">
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Cras vitae magna sit amet nunc lobortis ultricies</a><a href="">Cras vitae magna sit amet nunc lobortis ultricies</a>
							</div>
							<div class="author-list">
								<div class="s-author">
									<div class="author-data">
										<div class="author-name"><a href="">Hector Rodriguez</a></div>
										<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
									</div>
								</div>
							</div>
							<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="session conference" id="s09">
				<div class="session-time">
					10:30 AM - 12:00 PM
				</div>
				<div class="session-data">
					<div class="session-title"><a href="">Conferência</a></div>
					<div class="location">Sala A</div>
					<div class="presentation-list">
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Cras vitae magna sit amet nunc lobortis ultricies</a><a href="">Cras vitae magna sit amet nunc lobortis ultricies</a>
							</div>
							<div class="author-list">
								<div class="s-author">
									<div class="author-data">
										<div class="author-name"><a href="">Hector Rodriguez</a></div>
										<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
									</div>
								</div>
							</div>
							<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="session break" id="s10">
				<div class="session-time">
					12:00 PM - 14:00 PM
				</div>
				<div class="session-data">
					<div class="session-title"><a href="">Intervalo para Almoço</a></div>
				</div>
			</div>
			<div class="session panel" id="s11">
				<div class="session-time">
					14:00 PM - 18:00 PM
				</div>
				<div class="session-data">
					<div class="session-title"><a href="">Painel 5 - Lorem Ipsum Dolor</a></div>
					<div class="location">Sala A</div>
					<div class="author-list">
						<div class="s-author">
							<div class="author-data">
								<div class="author-name"><a href="">Walter White</a></div>
								<div class="author-inst"><span class="job-title">Coordenador</span></div>
							</div>
						</div>
					</div>
					<div class="presentation-list">
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Cras vitae magna sit amet nunc lobortis ultricies</a>
							</div>
							<div class="view-detail "><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
							</div>
						</div>
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Donec vestibulum massa nisl, ut posuere augue interdum dignissim</a>
							</div>
							<div class="view-detail"><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
								
							</div>
						</div>
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Donec vestibulum massa nisl, ut posuere augue interdum dignissim</a>
							</div>
							<div class="view-detail"><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="session panel" id="s12">
				<div class="session-time">
					14:00 PM - 18:00 PM
				</div>
				<div class="session-data">
					<div class="session-title"><a href="">Painel 6 - Vestibulum dignissim mi eget ultricies consectetur</a></div>
					<div class="location">Sala B</div>
					<div class="author-list">
						<div class="s-author">
							<div class="author-data">
								<div class="author-name"><a href="">Walter White</a></div>
								<div class="author-inst"><span class="job-title">Coordenador</span></div>
							</div>
						</div>
					</div>
					<div class="presentation-list">
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Cras vitae magna sit amet nunc lobortis ultricies</a>
							</div>
							<div class="view-detail "><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
							</div>
						</div>
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Donec vestibulum massa nisl, ut posuere augue interdum dignissim</a>
							</div>
							<div class="view-detail"><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
								
							</div>
						</div>
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Donec vestibulum massa nisl, ut posuere augue interdum dignissim</a>
							</div>
							<div class="view-detail"><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="program-day" id="20160224">
			<div class="schedule-date">
				<!-- 
				***** Necessita programação *****
				Trazer o conteúdo do field "strat_date" do post type "event = reuniao-abc"
				Atenção: será necessário fazer um loop para exibir todas as ocorrências dentro do período entre os valores dos fields "strat_date" e "end_date"
				-->
				24/Fevereiro/2016 - Quarta-Feira	
			</div>
			<div class="session conference" id="s13">
				<div class="session-time">
					9:00 AM - 10:30 AM
				</div>
				<div class="session-data">
					<div class="session-title"><a href="">Conferência</a></div>
					<div class="location">Sala A</div>
					<div class="presentation-list">
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Cras vitae magna sit amet nunc lobortis ultricies</a><a href="">Cras vitae magna sit amet nunc lobortis ultricies</a>
							</div>
							<div class="author-list">
								<div class="s-author">
									<div class="author-data">
										<div class="author-name"><a href="">Hector Rodriguez</a></div>
										<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
									</div>
								</div>
							</div>
							<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="session conference" id="s14">
				<div class="session-time">
					10:30 AM - 12:00 PM
				</div>
				<div class="session-data">
					<div class="session-title"><a href="">Conferência</a></div>
					<div class="location">Sala A</div>
					<div class="presentation-list">
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Cras vitae magna sit amet nunc lobortis ultricies</a><a href="">Cras vitae magna sit amet nunc lobortis ultricies</a>
							</div>
							<div class="author-list">
								<div class="s-author">
									<div class="author-data">
										<div class="author-name"><a href="">Hector Rodriguez</a></div>
										<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
									</div>
								</div>
							</div>
							<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="session break" id="s15">
				<div class="session-time">
					12:00 PM - 14:00 PM
				</div>
				<div class="session-data">
					<div class="session-title"><a href="">Intervalo para Almoço</a></div>
				</div>
			</div>
			<div class="session panel" id="s16">
				<div class="session-time">
					14:00 PM - 18:00 PM
				</div>
				<div class="session-data">
					<div class="session-title"><a href="">Painel 7 - Lorem Ipsum Dolor</a></div>
					<div class="location">Sala A</div>
					<div class="author-list">
						<div class="s-author">
							<div class="author-data">
								<div class="author-name"><a href="">Walter White</a></div>
								<div class="author-inst"><span class="job-title">Coordenador</span></div>
							</div>
						</div>
					</div>
					<div class="presentation-list">
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Cras vitae magna sit amet nunc lobortis ultricies</a>
							</div>
							<div class="view-detail "><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
							</div>
						</div>
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Donec vestibulum massa nisl, ut posuere augue interdum dignissim</a>
							</div>
							<div class="view-detail"><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
								
							</div>
						</div>
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Donec vestibulum massa nisl, ut posuere augue interdum dignissim</a>
							</div>
							<div class="view-detail"><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="session panel" id="s17">
				<div class="session-time">
					14:00 PM - 18:00 PM
				</div>
				<div class="session-data">
					<div class="session-title"><a href="">Painel 8 - Vestibulum dignissim mi eget ultricies consectetur</a></div>
					<div class="location">Sala B</div>
					<div class="author-list">
						<div class="s-author">
							<div class="author-data">
								<div class="author-name"><a href="">Walter White</a></div>
								<div class="author-inst"><span class="job-title">Coordenador</span></div>
							</div>
						</div>
					</div>
					<div class="presentation-list">
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Cras vitae magna sit amet nunc lobortis ultricies</a>
							</div>
							<div class="view-detail "><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
							</div>
						</div>
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Donec vestibulum massa nisl, ut posuere augue interdum dignissim</a>
							</div>
							<div class="view-detail"><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
								
							</div>
						</div>
						<div class="presentation">
							<div class="presentation-title">
								<a href="">Donec vestibulum massa nisl, ut posuere augue interdum dignissim</a>
							</div>
							<div class="view-detail"><?php _e( 'Detalhes','bvs-eventos' ); ?> <i class="fa fa-eye"></i></div>
							<div class="detail">
								<div class="author-list">
									<div class="s-author">
										<div class="author-pic"><img src="/eventosbvs/reuniao-ABC/wp-content/uploads/sites/2/2016/02/boy-512.png" /></div>
										<div class="autor-data">
											<div class="author-name"><a href="">Joshua H. Reeve</a></div>
											<div class="author-inst"><span class="job-title">Cargo</span> - <span class="affiliation">Instituição</span></div>
										</div>
									</div>
								</div>
								<div class="summary">
									<strong><?php _e( 'Resumo','bvs-eventos' ); ?></strong>
									<p>In at est tempor, aliquet orci vitae, lobortis elit. Integer condimentum molestie leo quis tincidunt. Proin et cursus orci, eget ultricies purus. Vestibulum augue tellus, commodo sed lacinia a, cursus eget est. Cras hendrerit dictum egestas. Cras non purus faucibus, vehicula lorem vel, aliquet augue. Nunc et dignissim mauris. Donec odio sapien, varius sed facilisis eu, hendrerit scelerisque velit. Nullam fermentum ultrices lorem, ut euismod tellus scelerisque ullamcorper. Cras eget tristique enim, in facilisis velit.</p>
								</div>
								<div class="s-tags">
									<strong>Tags</strong>
									<span>Ciência da Informação</span><span>Bibliotecas Digitais</span><span>Acesso Aberto</span><span>Mineração de Dados</span>
								</div>
								<div class="s-links"><span><i class="fa fa-cloud-download"></i> <a href=""><?php _e( 'Download Apresentação','bvs-eventos' ); ?></a></span> <span><i class="fa fa-play-circle"></i> <a href=""><?php _e( 'Ver Video','bvs-eventos' ); ?></a></span></div>
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
