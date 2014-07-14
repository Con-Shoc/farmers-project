<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- Flex Slider -->
	<link rel="stylesheet" href="./wp-content/plugins/woothemes-FlexSlider/flexslider.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="./wp-content/plugins/woothemes-FlexSlider/jquery.flexslider.js"></script>
	
		<script type="text/javascript">
   (function($) {
      $(window).load(function(){
      $('.flexslider').flexslider({
      	 slideshow: false,
      	 useCSS: true,
      	 touch: true,
      	 controlNav: false,
        // animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
   })(jQuery);



</script>

	<!-- End of FlexSlider -->


	
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>
</head>
<!-- <a id="top"> </a> -->

<body <?php body_class(); ?>>


<section class="site-width" style="min-width:100%;">

<div id="page" class="hfeed site">
	<?php if ( get_header_image() ) : ?>
	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a>
	</div>
	<?php endif; ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-main">
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img class="logo" src="./wp-content/themes/farming/images/logo.png"/>
				</a>
			</h1>

			<div class="search-toggle">
				<a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'twentyfourteen' ); ?></a>
			</div>



			<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
				<button class="menu-toggle"><?php _e( 'Primary Menu', 'twentyfourteen' ); ?></button>
 				<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'twentyfourteen' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
 			</nav>


<nav>
			<a id="simple-menu" href="#sidr"><button class="menu-toggle"></button></a>

<div id="sidr">
  <!-- Your content -->
 <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
</div>

<script>
jQuery(document).ready(function() {
  jQuery('#simple-menu').sidr({
    
      side: 'right'
    });
});
</script>
</nav>


		</div>

		<div id="search-container" class="search-box-wrapper hide">
			<div class="search-box">
				<?php get_search_form(); ?>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="main" class="site-main">
	<div class="breadcrumbs">
    <?php
    if ( !is_front_page() ) {
	    if(function_exists('bcn_display'))
	    {
	        bcn_display();
	    }
	}
    ?>

</div>
<a href="#top" id="smoothup" class="top-scroll">
^ </br>
Scroll Up</a>

</div>
