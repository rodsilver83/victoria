<!doctype html>
<html class="no-js" lang="ES">
	<head>
		<meta charset="utf-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
		<title>Victoria 147 | Somos una organización que busca redefinir el concepto de la mujer actual.</title>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/foundation.css" />
		<link rel='stylesheet' href="<?php bloginfo('template_directory'); ?>/css/style.css">
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/general_enclosed_foundicons.css">
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/general_foundicons.css">
		<link rel="stylesheet" href="<?php echo WP_PLUGIN_URL ?>/wp-team-manager/css/tm-style.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<script src="<?php bloginfo('template_directory'); ?>/js/vendor/jquery.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/vendor/jquery.stellar.min.js"></script>
		<style>
			.who-we-are{
				<?php
				$post = get_post(5377);
				setup_postdata($post);
				$url_who = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				
				?>
				background: url("<?php echo $url_who?>") no-repeat center 25px fixed;
			}
			.intro-bg{
				<?php
				$post = get_post(5763);
				setup_postdata($post);
				$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				
				?>
				background: url("<?php echo $url?>") no-repeat center center fixed;
			}
		</style>
	</head>
	<body>
		<div id='wrapper'>
			<div id='header'>

				<!-- The Menu -->
				<div id="main-menu" class="transparent-h contain-to-grid sticky">
				  <nav class="top-bar transparent-h" data-topbar role="navigation" data-options="sticky_on: large">
				    <ul class="title-area hidden">
					    <li class="name">
					      <a href="#">
					      	<img src="<?php echo  bloginfo('template_directory'); ?>/img/victoria-logo-top.png" alt="Victoria 147">
					      </a>
					    </li>
					     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
					    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
					  </ul>

						<section class="top-bar-section top-bar-menu">
					    <!-- Right Nav Section -->
					    <div id="searchbar">
								<?php echo get_search_form()?>
					    </div>
					    <ul class="right">
								<li>
					      <div class="top-social-btns justify-social">
					      	<div id="search" class="the-search search-w">
					      	</div>
					      	<a href="https://www.facebook.com/pages/Victoria147/475358795836280" target="_blank" class="social-btn social-sprite-w fb-btn"></a>
					      	<a href="https://twitter.com/V147_org" target="_blank" class="social-btn social-sprite-w tw-btn"></a>
					      	<a href="http://instagram.com/victoria147org" target="_blank" class="social-btn social-sprite-w insta-btn"></a>
					      	<a href="https://www.youtube.com/user/CanalV147" target="_blank" class="social-btn social-sprite-w yt-btn"></a>
					      </div>
								</li>
					    </ul>

					    <!-- Left Nav Section -->
					    <ul class="left">
					      <li class="has-dropdown">
					      	<a href="#" id="go_who" class="the-menu-top bordered-menu">¿Quiénes somos?</a>
					      	 <ul class="dropdown the-submenu-top">
					          <li><a href="#" id="go_historia" class="the-submenu-item bordered-menu">Historia</a></li>
					          <li><a href="#" id="go_mision" class="the-submenu-item bordered-menu">Misión e Impacto</a></li>
					          <li><a href="#" id="go_wedo" class="the-submenu-item bordered-menu">¿Qué hacemos?</a></li>
					          <li><a href="#" id="go_staff" class="the-submenu-item bordered-menu">Staff</a></li>
					        </ul>
					      </li>
					      <li class="has-dropdown">
					      	<a href="#" class="the-menu-top bordered-menu double-lined-menu">Emprendedora Victoria147</a>
					        <ul class="dropdown the-submenu-top">
									<?php
									
									$cat_args=array(
										'orderby' => 'name',
										'order' => 'ASC',
										'include'=> array(55) 
									);
									$rsRedEmprendedoras=get_categories($cat_args);
									$linkEmprendedoras= get_category_link( $rsRedEmprendedoras[0]->term_id );
									?>

			          <li><a href="<?php /* print $linkEmprendedoras*/ print("/category/red-de-emprendedoras")?>" class="the-submenu-item bordered-menu">Red de Emprendedoras</a></li>

										<?php
										
										$cat_args=array(
											'orderby' => 'name',
											'order' => 'ASC',
											'include'=> array(56) 
										);
										$rsRedFellows=get_categories($cat_args);
										$linkFellows = get_category_link( $rsRedFellows[0]->term_id );
										
										?>

					          <li><a href="<?php echo $linkFellows?>" class="the-submenu-item bordered-menu">Red de Fellows</a></li>
					          <li><a href="<?php echo site_url('unete-y-acelera-tu-negocio')?>" class="the-submenu-item bordered-menu">Únete y acelera tu negocio</a></li>

					    			<li><a href="/academia-147" class="the-submenu-item bordered-menu">Academia Victoria147</a></li>
					        </ul>
					      </li>
					      <li class="has-dropdown">
									<a href="#" class="the-menu-top bordered-menu">Mujer Victoria147</a>
									<ul class="dropdown the-submenu-top">
										<?php
										$cat_args=array(
											'orderby' => 'name',
											'order' => 'ASC',
											'include'=> array(65) 
										);
										$rsDescargables=get_categories($cat_args);
										$linkDescargables = get_category_link( $rsDescargables[0]->term_id );
										?>
					          <li><a href="<?php echo $linkDescargables?>" class="the-submenu-item bordered-menu">Descargas 147</a></li>
										<?php
										
										$cat_args=array(
											'orderby' => 'name',
											'order' => 'ASC',
											'include'=> array(66) 
										);
										$rsVideos=get_categories($cat_args);
										$linkVideos = get_category_link( $rsVideos[0]->term_id );
										
										?>
						
					          <li><a href="<?php echo $linkVideos?>" class="the-submenu-item bordered-menu">Videos</a></li>
					        </ul>
					      </li>
					      <li class="has-dropdown">
					      	<a href="#" class="the-menu-top bordered-menu double-lined-menu">Productos V147</a>
					      	<ul class="dropdown the-submenu-top">
					          <li><a href="#" class="the-submenu-item bordered-menu">Balance</a></li>
					          <li><a href="#" class="the-submenu-item bordered-menu">Performance</a></li>
					          <li><a href="#" class="the-submenu-item bordered-menu">Imagen</a></li>
					          <li><a href="#" class="the-submenu-item bordered-menu">Placer por placer</a></li>
					        </ul>
					      </li>
					      <li>
					      	<a href="#" id="go_contact" class="the-menu-top bordered-menu">Contáctanos</a>
					      </li>
					    </ul>
					  </section>
				  </nav>
				</div>
			</div>
			<div id="main-intro" class="intro-bg">
				<div class="intro-spacer"></div>
				<div id="content" class="row">
					<div class="large-12 columns">
						<img src="<?php bloginfo('template_directory'); ?>/img/victoria-mail-logo.png" alt="Victoria 147" width="50%" height="auto">
					</div>
					<div class="large-12 columns intro-bottom">
						<blockquote class="intro-quote">“Somos una organización que busca redefinir el concepto de la mujer actual.”</blockquote class="intro">
							<br>
						<a href="#" id="go_to_sections" class="intro-scroll">
							<p class="text-center">SCROLL</p>
							<img src="<?php bloginfo('template_directory'); ?>/img/scroll.png">
						</a>
					</div>
				</div>
			</div>
			
					<!--- @@ pnm begin -->
					<?php
						$html = "<div id='the_sections' class='row news-sections'>";
						$html .= "<div class='large-12 news-headliner'>";
							$html .= "<h1>Nuestras Secciones</h1>";
						$html .= "</div>";

			$cat_args=array(
				'orderby' => 'name',
				'order' => 'ASC',
				'include'=> array(62,59,58,60,61,63) 
			);
			$categories=get_categories($cat_args);
			foreach($categories as $category) 
			{ 

				if($category->count > 0 )
				{
					$args=array(
					'showposts' => 1,
					'category__in' => array($category->term_id),
					'category'=>$category->term_id,
					'caller_get_posts'=>1, 
					'hide_empty'=>1,
					);
					//Testing the content of the post before it prints da HTML

					$posts=get_posts($args);

					if($posts[0]->post_content!='')
					{
						unset($posts);
						$category_link= get_category_link( $category->term_id );
						$title_link=sprintf( __( "Ver todos los art&iacute;culos de %s" ), $category->name );
						$posts=get_posts($args);
						foreach($posts as $post) 
						{
							setup_postdata($post); 
							
							$post_link=post_permalink();
							$post_title=get_the_title();
							$template_directory=get_bloginfo('template_directory');
							
							$attr = array(
								'class'=>'the-squared-image',
								'alt'	=> trim( strip_tags( $post->post_excerpt ) ),
								'title'	=> trim( strip_tags( $post->post_title ) ),
							);
							$post_thumbnail =  get_the_post_thumbnail( $post->ID, array(500,500)); 
							$post_thumbnail = (!empty($post_thumbnail))?$post_thumbnail: "<img src='http://placepuppy.it/500/500' class='the-squared-image' width='100%' height='auto'>";
							$html .= "
							<div class='large-4 columns column-section'>
								<a href='${category_link}' title='${title_link}' class='column-name'>{$category->name}</a>

								<a href='${post_link}' class='the-post-link'>
									<p class='column-post-title'>{$post_title}</p>
									<img src='${template_directory}/img/plus-sign.png' class='column-plus-sign' width='10%' height='auto'>
									<section class='section-actionable'></section>
								</a>

								<div class='section-image'>
									
									${post_thumbnail}
								</div>
							</div>
							";
						} // foreach($posts)
					} // post_content
				} // count 
			} // foreach($categories)
			$html .= "</div>";
			print("${html}");
			
			?>

			<div class="content-slider">
				<ul class="example-orbit" data-orbit
			    data-options="animation:slide;
	        pause_on_hover:true;
	        animation_speed:800;
	        timer_speed: 10000;
	        navigation_arrows:true;
	        pause_on_hover: true;
	        bullets:false;">
				<?php
				$html='';
				$cat_args=array(
					'orderby' => 'name',
					'order' => 'ASC',
					'include'=> array(54,68) 
				);

				$categories=get_categories($cat_args);
				foreach($categories as $category) 
				{ 
					$args=array(
					'showposts' => 3,
					'category__in' => array($category->term_id),
					'caller_get_posts'=>1, 
					'hide_empty'=>1,
					);
					//Testing the content of the post before it prints da HTML
					$posts=get_posts($args);
					foreach($posts as $post) 
					{
						setup_postdata($post); 
						// $post_content = wordwrap($post_wrapped, 20);
						$post_thumbnail =  get_the_post_thumbnail( $post->ID, array(1920,750)); 
						$post_thumbnail = (!empty($post_thumbnail))?$post_thumbnail: "<img src='http://placepuppy.it/500/500' class='the-squared-image' width='100%' height='auto'>";
						$post_link=post_permalink();
						$post_title=get_the_title();
						$html  .= "<li>
						<a href='${post_link}' title='".get_the_title()."'>
							${post_thumbnail}
						</a>
				    <div class='orbit-caption'>
							<a href='${post_link}' class='the-post-link'>".get_the_title()." <span>Ver más</spa></a>
				    </div>
					  </li>
				    ";
					}
				}
				print ${'html'};
				?>
				</ul>
			</div>

			<div class="who-we-are">
				<div class="row container-about">
					<div class="who">
						<div class="large-5 columns"></div>
  					<div id="who-full" class="large-7 columns">
  						<h1>¿Quiénes Somos?</h1>
  						<p><?php
							$post = get_post(5377);
							setup_postdata($post);
							//print("ajajajajajj");
							the_content();
  						?></p>
  					</div>
					</div>
				</div>
					<div id="historia" class="row hist">
						<div class="large-6 columns"></div>
						<div class="large-6 columns">
							<div class="about-titles">
								<img src="<?php echo bloginfo('template_directory'); ?>/img/home-icon.png" width="8%" height="auto"> 
								<h3>Historia</h3>
							</div>
							<p><?php
							$post = get_post(5559);
							setup_postdata($post);
							the_content();
							?></p>
						</div>
					</div>
					<div id="mision" class="row mision">
						<div class="large-6 columns"></div>
						<div class="large-6 columns">
							<div class="about-titles">
								<img src="<?php echo bloginfo('template_directory'); ?>/img/star-icon.png" width="8%" height="auto"> 
								<h3>Misión</h3>
							</div>
							<p><?php
							$post = get_post(5381);
							setup_postdata($post);
							the_content();
							?></p>
						</div>
					</div>
					<div class="row vision">
						<div class="large-6 columns"></div>
						<div class="large-6 columns">
							<div class="about-titles">
								<img src="<?php echo bloginfo('template_directory'); ?>/img/eye-icon.png" width="8%" height="auto"> 
								<h3>Impacto</h3>
							</div>
							<p><?php
								$post = get_post(5383);
								setup_postdata($post);
								the_content();
							?></p>
						</div>
					</div>
				</div>
			</div>
			<!-- What do we do -->
			<img src="<?php echo bloginfo('template_directory'); ?>/img/pleca.png" id="what-do-we-do" class="pleca">
			<div class="what">
				<div class="row">
					<div class="large-12">
						<h1>¿Qué Hacemos?</h1>
						<p>
							<?php
								$post = get_post(5385);
								setup_postdata($post);
								the_content();
							?>
						</p>

					</div>
				</div>
			</div>
			<!-- What do we do -->
			<!-- Staff -->
			<div id="the-staff" class="content-team">
				<div class="row staff-goto">
					<a href="#" id="go_to_staff" class="intro-scroll">
						<p class="text-center staff">STAFF</p>
						<img src="<?php bloginfo('template_directory'); ?>/img/scroll-round.png" width="5%">
					</a>
				</div>
				<!-- Rhombus -->
				<div data-stellar-ratio="0.3" data-stellar-vertical-offset="-450" id="rhombus1" class="v-rhombus"></div>
				<div data-stellar-ratio="1.9" data-stellar-vertical-offset="-450" id="rhombus2" class="v-rhombus"></div>
				<div data-stellar-ratio="0.6" data-stellar-vertical-offset="-450" id="rhombus3" class="v-rhombus"></div>
				<div data-stellar-ratio="0.4" data-stellar-vertical-offset="-450" id="rhombus4" class="v-rhombus"></div>
				<div data-stellar-ratio="0.9" data-stellar-vertical-offset="-450" id="rhombus5" class="v-rhombus"></div>
				<div data-stellar-ratio="1.2" data-stellar-vertical-offset="-450" id="rhombus6" class="v-rhombus"></div>
				<div data-stellar-ratio="0.9" data-stellar-vertical-offset="-450" id="rhombus7" class="v-rhombus"></div>
				<div data-stellar-ratio="0.4" data-stellar-vertical-offset="-450" id="rhombus8" class="v-rhombus"></div>
				<div data-stellar-ratio="0.7" data-stellar-vertical-offset="-450" id="rhombus9" class="v-rhombus"></div>
				<div data-stellar-ratio="0.3" data-stellar-vertical-offset="-450" id="rhombus10" class="v-rhombus"></div>
				<div data-stellar-ratio="1.9" data-stellar-vertical-offset="-450" id="rhombus11" class="v-rhombus"></div>

				<!-- Team Members -->
				<?php echo do_shortcode("[team_manager category='0' orderby='menu_order' limit='0' post__in='' exclude='' layout='grid' image_layout='rounded' ]")?>
			</div>

			<div id="contact-section" >
				<!--div class="regular-contact">
					<h1><hr>Formulario de contacto normal<hr></h1>
					<?php echo do_shortcode( '[contact-form-7 id="41" title="Formulario de Contacto"]' ); ?>
				</div-->
				<div class="row">
					<div class="large-12 columns contact-header">
						<h1>Contacto</h1>
						<p>Pónte en contacto con nosotras</p>
					</div>
					<!-- The Buttons -->
					<ul class="tabs" data-tab role="tablist">
					  <li class="tab-title contact-selector" role="presentational">
					  	<a href="#panel2-1" role="tab" tabindex="0" aria-selected="true" controls="panel2-1" class="contact-button-selector">Soy Emprendedora</a>
					  </li>
					  <li class="tab-title contact-selector" role="presentational">
					  	<a href="#panel2-2" role="tab" tabindex="0"aria-selected="false" controls="panel2-2" class="contact-button-selector">Empresas y Medios</a>
					  </li>
					  <li class="tab-title contact-selector" role="presentational">
					  	<a href="#panel2-3" role="tab" tabindex="0" aria-selected="false" controls="panel2-3" class="contact-button-selector">Trabaja con Nosotros</a>
					  </li>
					</ul>
					<div class="tabs-content">
					  <section role="tabpanel" aria-hidden="false" class="content contact-wrapper" id="panel2-1">
					 
<iframe src='http://www.victoria147.com/formulario-de-contacto-para-emprendedoras'></iframe>

					  </section>
<section role="tabpanel" aria-hidden="false" class="content contact-wrapper" id="panel2-2">
					 
<iframe src='http://www.victoria147.com/formulario-de-contacto-para-emprendedoras'></iframe>

					  </section>
					  <section role="tabpanel" aria-hidden="true" class="content contact-wrapper" id="panel2-3">

Aquí va el otro form
					  </section>
					</div><!-- /.tabs-content -->

				</div><!-- /.row -->
			</div><!-- /#contact-section -->

			<div id="delimiter"></div>
		</div>
		<!-- The Scrolling Script -->
		
	<div id='footer'>
		<div class="row">
			<div class="large-4 columns footer-logo">
				<img src="<?php echo bloginfo('template_directory'); ?>/img/victoria147-logo-sm.png" alt="Victoria 147">
			</div>
			<div class="large-4 columns footer-social">
				<div class="social-btm">
	      	<a href="https://www.facebook.com/pages/Victoria147/475358795836280" target="_blank" class="social-btn-footer fb-btn social-sprite-w"></a>
	      	<a href="https://twitter.com/V147_org" target="_blank" class="social-btn-footer tw-btn social-sprite-w"></a>
	      	<a href="http://instagram.com/victoria147org" target="_blank" class="social-btn-footer insta-btn social-sprite-w"></a>
	      	<a href="https://www.youtube.com/user/CanalV147" target="_blank" class="social-btn-footer yt-btn social-sprite-w"></a>
	      </div>
			</div>
			<div class="large-4 columns footer-copy">
				<a href="" class="footer-links">Aviso de Privacidad</a>
				<p><small>© Todos los Derechos Reservados</small></p>
			</div>
		</div>
	</div>

		<?php wp_footer(); ?>

		<script src="<?php bloginfo('template_directory'); ?>/js/foundation.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/foundation/foundation.orbit.js"></script>
    <script>
      $(document).foundation({
      	orbit: {
			    animation: 'slide',
			    timer_speed: 1000,
			    pause_on_hover: true,
			    animation_speed: 500,
			    navigation_arrows: true,
			    bullets: true,
			    slide_number: false,
			    next_class: 'orbit-next',
			    prev_class: 'orbit-prev',
			    next_on_click: true,
			    bullets_active_class: 'active'
			  }
      });
    </script>
	</body>
</html>
