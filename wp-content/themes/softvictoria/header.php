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
<body class="f-topbar-fixed">
<div id='wrapper'>
<div id="header">

<!-- The Menu -->
<div id="main-menu" class=" non-transparent-h fixed">
 <nav class="top-bar transparent-h p-menu-fixed" data-topbar="" role="navigation" data-options="sticky_on: large">
   <ul class="title-area">
   <li class="name">
     <a href="/">
     	<img src="<?php bloginfo('template_directory'); ?>/img/victoria-logo-top.png" alt="Victoria 147">
     </a>
   </li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
   <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
 </ul>

 <section class="top-bar-section top-bar-menu">
   <!-- Right Nav Section -->
   <div id="searchbar" class="inset-search">
   	<?=get_search_form()?>
   </div>
   <ul class="right">
     <div class="top-social-btns">
     	<div id="search" class="the-search search-blk">
     	</div>
     	<a href="https://www.facebook.com/pages/Victoria147/475358795836280" target="_blank" class="social-btn fb-btn social-sprite-blk"></a>
     	<a href="https://twitter.com/V147_org" target="_blank" class="social-btn tw-btn social-sprite-blk"></a>
     	<a href="http://instagram.com/victoria147org" target="_blank" class="social-btn insta-btn social-sprite-blk"></a>
     	<a href="https://www.youtube.com/user/CanalV147" target="_blank" class="social-btn yt-btn social-sprite-blk"></a>
     </div>
   </ul>

   <!-- Left Nav Section -->
   <ul class="left">
     <li class="has-dropdown not-click">
     	<a href="#" class="the-menu-top menu-color">¿Quiénes somos?</a>
     	<ul class="dropdown the-submenu-top p-submenu-fixed"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link show-for-small"><a class="parent-link js-generated" href="#">¿Quiénes somos?</a></li>
         <li><a href="/#historia" class="the-submenu-item submenu-colored bordered-submenu">Historia</a></li>
         <li><a href="/#mision" class="the-submenu-item submenu-colored bordered-submenu">Misión y Visión</a></li>
         <li><a href="/#what-do-we-do" class="the-submenu-item submenu-colored bordered-submenu">¿Qué hacemos?</a></li>
         <li><a href="/#the-staff" class="the-submenu-item submenu-colored bordered-submenu">Staff</a></li>
       </ul>
     </li>
     <li class="has-dropdown not-click">
     	<a href="#" class="the-menu-top double-lined-menu menu-color">Emprendedora Victoria147</a>
       <ul class="dropdown the-submenu-top p-submenu-fixed"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link show-for-small"><a class="parent-link js-generated" href="#">Emprendedora Victoria147</a></li>

						<?php
						
						$cat_args=array(
							'orderby' => 'name',
							'order' => 'ASC',
							'include'=> array(55) 
						);
						$rsRedEmprendedoras=get_categories($cat_args)[0];
						$linkEmprendedoras= get_category_link( $rsRedEmprendedoras->term_id );
						?>
         <li><a href="<?=$linkEmprendedoras?>" class="the-submenu-item submenu-colored bordered-submenu">Red de Emprendedoras</a></li>


					<?php
					
					$cat_args=array(
						'orderby' => 'name',
						'order' => 'ASC',
						'include'=> array(56) 
					);
					$rsRedFellows=get_categories($cat_args)[0];
					$linkFellows = get_category_link( $rsRedFellows->term_id );
					
					?>
         <li><a href="<?=$linkFellows?>" class="the-submenu-item submenu-colored bordered-submenu">Red de Fellows</a></li>
         <li><a href="<?php echo site_url('unete-y-acelera-tu-negocio')?>" class="the-submenu-item submenu-colored bordered-submenu">Únete y acelera tu negocio</a></li>

					<?php
					$cat_args=array(
						'orderby' => 'name',
						'order' => 'ASC',
						'include'=> array(57) 
					);
					$rsAcademia147=get_categories($cat_args)[0];
					$linkAcademia147= get_category_link( $rsAcademia147->term_id );
					?>
         <li><a href="<?=$linkAcademia147?>" class="the-submenu-item submenu-colored bordered-submenu">Academia Victoria147</a></li>
       </ul>
     </li>
     <li class="has-dropdown not-click">
     	<a href="#" class="the-menu-top menu-color">Mujer Victoria147</a>
     	<ul class="dropdown the-submenu-top p-submenu-fixed"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link show-for-small"><a class="parent-link js-generated" href="#">Mujer Victoria147</a></li>
         <li><a href="#" class="the-submenu-item submenu-colored bordered-submenu">Descargables</a></li>
         <li><a href="#" class="the-submenu-item submenu-colored bordered-submenu">Videos</a></li>
       </ul>
     </li>
     <li class="has-dropdown not-click">
     	<a href="#" class="the-menu-top double-lined-menu menu-color">Productos V147</a>
     	<ul class="dropdown the-submenu-top p-submenu-fixed"><li class="title back js-generated"><h5><a href="javascript:void(0)">Back</a></h5></li><li class="parent-link show-for-small"><a class="parent-link js-generated" href="#">Productos V147</a></li>
         <li><a href="#" class="the-submenu-item submenu-colored bordered-submenu">Balance</a></li>
         <li><a href="#" class="the-submenu-item submenu-colored bordered-submenu">Performance</a></li>
         <li><a href="#" class="the-submenu-item submenu-colored bordered-submenu">Imagen</a></li>
         <li><a href="#" class="the-submenu-item submenu-colored bordered-submenu">Placer por placer</a></li>
       </ul>
     </li>
     <li>
     	<a href="/#contact-section" class="the-menu-top menu-color">Contáctanos</a>
     </li>
   </ul>
 </section></nav>
</div>
</div>