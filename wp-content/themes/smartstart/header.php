<!DOCTYPE html>

<!--[if IE 7]>                  <html class="ie7 no-js"  <?php language_attributes(); ?>     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js"  <?php language_attributes(); ?>     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" <?php language_attributes(); ?>>  <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title><?php wp_title('|', true, 'right'); ?></title>

	<?php if( of_get_option('ss_favicon') ): ?>
		<link rel="icon" type="image/png" href="<?php echo of_get_option('ss_favicon'); ?>">
	<?php endif; ?>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel='stylesheet'  href='<?php echo home_url('/'); ?>//wp-content/themes/victoria147/bloggers.css' type='text/css' media='all' />
	
	<?php wp_head(); ?>
        <script src="<?php echo home_url('/'); ?>//wp-content/themes/victoria147/js/jquery.tools.min.js" type="text/javascript"></script>
        <script src="<?php echo home_url('/'); ?>//wp-content/themes/victoria147/js/v147.js" type="text/javascript"></script>
        
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-16381531-18', 'victoria147.org');
  ga('send', 'pageview');

</script>                
        
</head>

<body <?php body_class(); ?>>


<!-- Google Code for Registro Victoria 147 Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 971171267;
var google_conversion_language = "es";
var google_conversion_format = "2";
var google_conversion_color = "ffffff";
var google_conversion_label = "YhelCIXH2wgQw8uLzwM";
var google_conversion_value = 0;
var google_remarketing_only = false;
/* ]]> */
</script>

<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>

<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/971171267/?value=0&amp;label=YhelCIXH2wgQw8uLzwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<header id="header" class="container clearfix ingenia-group">

	<a href="<?php echo home_url('/'); ?>" id="logo" title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>">
		<?php if( of_get_option('ss_logo') ): ?>
			<img src="<?php echo of_get_option('ss_logo'); ?>" alt="<?php bloginfo('name'); ?>">
		<?php else: ?>
			<h1><?php bloginfo('name'); ?></h1>
		<?php endif; ?>
	</a>

	<nav id="main-nav">
		
		<?php echo ss_framework_main_navigation(); ?>

	</nav><!-- end #main-nav -->
	
</header><!-- end #header -->