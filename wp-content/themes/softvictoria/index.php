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
					      	<img src="<?= bloginfo('template_directory'); ?>/img/victoria-logo-top.png" alt="Victoria 147">
					      </a>
					    </li>
					     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
					    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
					  </ul>

						<section class="top-bar-section top-bar-menu">
					    <!-- Right Nav Section -->
					    <div id="searchbar">
					    	<form action="" autocomplete="on">
							  	<input id="searchinput" name="search" type="text" placeholder="¿Qué estás buscando?">
							  	<input id="search_submit" class="button search-sm" value="Encontrar" type="submit">
							  </form>
					    </div>
					    <ul class="right">
					      <div class="top-social-btns justify-social">
					      	<div id="search" class="the-search search-w">
					      	</div>
					      	<a href="https://www.facebook.com/pages/Victoria147/475358795836280" target="_blank" class="social-btn social-sprite-w fb-btn"></a>
					      	<a href="https://twitter.com/V147_org" target="_blank" class="social-btn social-sprite-w tw-btn"></a>
					      	<a href="http://instagram.com/victoria147org" target="_blank" class="social-btn social-sprite-w insta-btn"></a>
					      	<a href="https://www.youtube.com/user/CanalV147" target="_blank" class="social-btn social-sprite-w yt-btn"></a>
					      </div>
					    </ul>

					    <!-- Left Nav Section -->
					    <ul class="left">
					      <li class="has-dropdown">
					      	<a href="#" class="the-menu-top bordered-menu">¿Quiénes somos?</a>
					      	 <ul class="dropdown the-submenu-top">
					          <li><a href="#historia" class="the-submenu-item bordered-menu">Historia</a></li>
					          <li><a href="#mision" class="the-submenu-item bordered-menu">Misión y Visión</a></li>
					          <li><a href="#what-do-we-do" class="the-submenu-item bordered-menu">¿Qué hacemos?</a></li>
					          <li><a href="#the-staff" class="the-submenu-item bordered-menu">Staff</a></li>
					        </ul>
					      </li>
					      <li class="has-dropdown">
					      	<a href="#" class="the-menu-top bordered-menu double-lined-menu">Emprendedora Victoria147</a>
					        <ul class="dropdown the-submenu-top">
					          <li><a href="#" class="the-submenu-item bordered-menu">Red de Emprendedoras</a></li>
					          <li><a href="#" class="the-submenu-item bordered-menu">Red de Fellows</a></li>
					          <li><a href="#" class="the-submenu-item bordered-menu">Únete y acelera tu negocio</a></li>
					          <li><a href="#" class="the-submenu-item bordered-menu">Academia Victoria147</a></li>
					        </ul>
					      </li>
					      <li class="has-dropdown">
					      	<a href="#" class="the-menu-top bordered-menu">Mujer Victoria147</a>
					      	<ul class="dropdown the-submenu-top">
					          <li><a href="#" class="the-submenu-item bordered-menu">Descargables</a></li>
					          <li><a href="#" class="the-submenu-item bordered-menu">Videos</a></li>
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
					      	<a href="#" class="the-menu-top bordered-menu">Contáctanos</a>
					      </li>
					    </ul>
					  </section>
				  </nav>
				</div>
			</div>
			<div id="main-intro">
				<div class="intro-spacer"></div>
				<div id="content" class="row">
					<div class="large-12 columns">
						<img src="<?php bloginfo('template_directory'); ?>/img/victoria-mail-logo.png" alt="Victoria 147" width="50%" height="auto">
					</div>
					<div class="large-12 columns intro-bottom">
						<blockquote class="intro-quote">“Somos una organización que busca redefinir el concepto de la mujer actual.”</blockquote class="intro">
							<br>
						<a href="#the_sections" class="intro-scroll">
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
				'include'=> array(11,33,30,29,28,25,26) 
			);
			$categories=get_categories($cat_args);
			foreach($categories as $category) 
			{ 

				if($category->count > 0 )
				{
					$args=array(
					'showposts' => 1,
					'category__in' => array($category->term_id),
					'caller_get_posts'=>1, 
					'hide_empty'=>1,
					);
					//Testing the content of the post before it prints da HTML

					$posts=get_posts($args)[0];

					if($posts->post_content!='')
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
				<ul class="example-orbit" data-orbit>
				<?php
				$html='';
				$cat_args=array(
					'orderby' => 'name',
					'order' => 'ASC',
					'include'=> array(54) 
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
						$post_thumbnail =  get_the_post_thumbnail( $post->ID, array(500,500)); 
						$post_thumbnail = (!empty($post_thumbnail))?$post_thumbnail: "<img src='http://placepuppy.it/500/500' class='the-squared-image' width='100%' height='auto'>";
						$post_link=post_permalink();
						$post_title=get_the_title();
						$html  .= "<li>
						${post_thumbnail}
				    <div class='orbit-caption'>
							<a href='${post_link}' class='the-post-link'>".get_the_title()."</a>
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
  					<div class="large-7 columns">
  						<h1>¿Quiénes Somos?</h1>
  						<p>Mlkshk scenester Tumblr yr, sriracha PBR Shoreditch disrupt irony craft beer. Bushwick seitan shabby chic, bicycle rights fingerstache +1 Godard direct trade keffiyeh vinyl mlkshk.</p>
  					</div>
					</div>
				</div>
					<div id="historia" class="row hist">
						<div class="large-6 columns"></div>
						<div class="large-6 columns">
							<div class="about-titles">
								<img src="<?=bloginfo('template_directory'); ?>/img/home-icon.png" width="8%" height="auto"> 
								<h3>Historia</h3>
							</div>
							<p>Keffiyeh umami banjo, food truck Carles bitters mixtape keytar chillwave tote bag meggings four loko. Pork belly Austin Echo Park typewriter quinoa Etsy kogi, sustainable Tonx locavore hashtag mlkshk cliche Tumblr. Bespoke +1 put a bird on it, fixie vinyl readymade beard four loko blog tofu raw denim PBR&B gentrify.</p>
						</div>
					</div>
					<div id="mision" class="row mision">
						<div class="large-6 columns"></div>
						<div class="large-6 columns">
							<div class="about-titles">
								<img src="<?=bloginfo('template_directory'); ?>/img/star-icon.png" width="8%" height="auto"> 
								<h3>Misión</h3>
							</div>
							<p>Keffiyeh umami banjo, food truck Carles bitters mixtape keytar chillwave tote bag meggings four loko. Pork belly Austin Echo Park typewriter quinoa Etsy kogi, sustainable Tonx locavore hashtag mlkshk cliche Tumblr. Bespoke +1 put a bird on it, fixie vinyl readymade beard four loko blog tofu raw denim PBR&B gentrify.</p>
						</div>
					</div>
					<div class="row vision">
						<div class="large-6 columns"></div>
						<div class="large-6 columns">
							<div class="about-titles">
								<img src="<?=bloginfo('template_directory'); ?>/img/eye-icon.png" width="8%" height="auto"> 
								<h3>Visión</h3>
							</div>
							<p>Keffiyeh umami banjo, food truck Carles bitters mixtape keytar chillwave tote bag meggings four loko. Pork belly Austin Echo Park typewriter quinoa Etsy kogi, sustainable Tonx locavore hashtag mlkshk cliche Tumblr.</p>
						</div>
					</div>
				</div>
			</div>
			<!-- What do we do -->
			<img src="<?=bloginfo('template_directory'); ?>/img/pleca.png" id="what-do-we-do" class="pleca">
			<div class="what">
				<div class="row">
					<div class="large-12">
						<h1>¿Qué Hacemos?</h1>
						<p>Mlkshk scenester Tumblr yr, sriracha PBR Shoreditch disrupt irony craft beer. Bushwick seitan shabby chic, bicycle rights fingerstache</p>
						<iframe width="560" height="315" src="//www.youtube.com/embed/8raJMJoIHF8" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
			<!-- What do we do -->
			<!-- Staff -->
			<div id="the-staff" class="content-team">
				<div class="row staff-goto">
					<a href="#the-staff" class="intro-scroll">
						<p class="text-center staff">STAFF</p>
						<img src="<?php bloginfo('template_directory'); ?>/img/scroll-round.png" width="5%">
					</a>
				</div>
				<!-- Rhombus -->
				<div data-stellar-ratio="0.3" data-stellar-vertical-offset="-450" id="rhombus1"></div>
				<div data-stellar-ratio="1.9" data-stellar-vertical-offset="-450" id="rhombus2"></div>
				<div data-stellar-ratio="0.6" data-stellar-vertical-offset="-450" id="rhombus3"></div>
				<div data-stellar-ratio="0.4" data-stellar-vertical-offset="-450" id="rhombus4"></div>
				<div data-stellar-ratio="0.9" data-stellar-vertical-offset="-450" id="rhombus5"></div>
				<div data-stellar-ratio="1.2" data-stellar-vertical-offset="-450" id="rhombus6"></div>
				<div data-stellar-ratio="0.9" data-stellar-vertical-offset="-450" id="rhombus7"></div>
				<div data-stellar-ratio="0.4" data-stellar-vertical-offset="-450" id="rhombus8"></div>

				<!-- Team Members -->
				<?php echo do_shortcode("[team_manager category='0' orderby='menu_order' limit='0' post__in='' exclude='' layout='grid' image_layout='rounded' ]")?>
			</div>

			<div id="contact-section">

				<h1><hr>Formulario de contacto normal<hr></h1>
				<?php echo do_shortcode( '[contact-form-7 id="41" title="Formulario de Contacto"]' ); ?>
				<h1><hr>Formulario de contacto para emprendedoras<hr></h1>
				<?php echo do_shortcode( '[contact-form-7 id="5370" title="___Contacto Emprendedoras"]' ); ?>

				<h1><hr>Formulario para trabajar con nosotros<hr></h1>
				<?php echo do_shortcode( '[contact-form-7 id="5371" title="___Trabaja con Nosotros"]' ); ?>

				<h1><hr>Formulario de contacto para empresas<hr></h1>
				<?php echo do_shortcode( '[contact-form-7 id="5372" title="___Contacto Empresas"]' ); ?>

			</div>

			<div id="delimiter"></div>
		</div>
		<!-- The Scrolling Script -->
		
	<div id='footer'>
		<div class="row">
			<div class="large-4 columns footer-logo">
				<img src="<?=bloginfo('template_directory'); ?>/img/victoria147-logo-sm.png" alt="Victoria 147">
			</div>
			<div class="large-4 columns">

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
