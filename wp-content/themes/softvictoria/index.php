<!doctype html>
<html class="no-js" lang="eES">
	<head>
		<meta charset="utf-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
		<title>Victoria 147 | Bienvenido</title>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/foundation.css" />
		<link rel='stylesheet' href="<?php bloginfo('template_directory'); ?>/css/style.css">
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/general_enclosed_foundicons.css">
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/general_foundicons.css">
		<link rel="stylesheet" href="<?php echo WP_PLUGIN_URL ?>/wp-team-manager/css/tm-style.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr.js"></script>
	</head>
	<body>
		<div id='wrapper'>
			<div id='header'>
				<!-- Default Main Menu -->
				<div id="main-menu" class="row">
		      <div class="large-2 columns top-menu-columns">
		        <a href="#" class="small button top-menu-btn">¿Quiénes somos?</a>
		      </div>
		      <div class="large-2 columns top-menu-columns">
		        <a href="#" class="small button double-lined-btn">Emprendedora Victoria 147</a>
		      </div>
		      <div class="large-2 columns top-menu-columns">
		        <a href="#" class="small button top-menu-btn">Mujer Victoria 147</a>
		      </div>
		      <div class="large-2 columns top-menu-columns">
		        <a href="#" class="small button double-lined-btn">Productos Victoria147</a>
		      </div>
		      <div class="large-2 columns top-menu-columns">
		        <a href="#" class="small button top-menu-btn">Contáctanos</a>
		      </div>
		      <div class="large-2 columns top-social-btns">
		      	<div class="the-search">
		      		<i class="foundicon-search"></i>
		      	</div>
		      	<a href="https://www.facebook.com/pages/Victoria147/475358795836280" target="_blank" class="social-btn fb-btn"></a>
		      	<a href="https://twitter.com/V147_org" target="_blank" class="social-btn tw-btn"></a>
		      	<a href="http://instagram.com/victoria147org" target="_blank" class="social-btn insta-btn"></a>
		      	<a href="https://www.youtube.com/user/CanalV147" target="_blank" class="social-btn yt-btn"></a>
		      </div>
				</div>
				<!-- On Scroll Menu -->
				<div class="contain-to-grid sticky hidden">
				  <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
				    <ul class="title-area">
					    <li class="name">
					      <h1><a href="#">My Site</a></h1>
					    </li>
					     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
					    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
					  </ul>

					  <section class="top-bar-section">
					    <!-- Right Nav Section -->
					    <ul class="right">
					      <li class="active"><a href="#">Right Button Active</a></li>
					      <li class="has-dropdown">
					        <a href="#">Right Button Dropdown</a>
					        <ul class="dropdown">
					          <li><a href="#">First link in dropdown</a></li>
					          <li class="active"><a href="#">Active link in dropdown</a></li>
					        </ul>
					      </li>
					    </ul>

					    <!-- Left Nav Section -->
					    <ul class="left">
					      <li><a href="#">Left Nav Button</a></li>
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
						<a href="" class="intro-scroll">
							<p class="text-center">SCROLL</p>
							<img src="<?php bloginfo('template_directory'); ?>/img/scroll.png">
						</a>
					</div>
				</div>
			</div>
			<!--- @@ pnm begin -->
			<?php
			$html = "<div class='row news-sections'>";
			$html .= "<div class='large-12'>";
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
						$title_link=sprintf( __( "View all posts in %s" ), $category->name );
						$posts=get_posts($args);
						foreach($posts as $post) 
						{
							setup_postdata($post); 
							$html .= "
							<div class='large-4 columns column-section'>
								<!-- a href='${category_link}' title='${title_link}'>{$category->name}</a-->
								<div class='section-actionable'><a href='".get_permalink()."'>".get_the_title()."</a> ea ea eaea</div>
								<div class='section-image'>
									<img src='http://placepuppy.it/500/500' class='the-squared-image' width='100%' height='auto'>
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
			<h1><hr><hr></h1>
			<!-- @@ pnm end-->
			<!-- Team Members -->
			<div class="content-team">
				<div id='content-teams'>
					<?php echo do_shortcode("[team_manager category='0' orderby='menu_order' limit='0' post__in='' exclude='' layout='grid' image_layout='rounded' ]")?>
				</div>
			</div>
			<!-- End Team Members -->

			<h1><hr><hr></h1>
			<?php echo do_shortcode( '[contact-form-7 id="41" title="Formulario de Contacto"]' ); ?>

			<div id="delimiter"></div>
		</div>
<?php get_footer();?>