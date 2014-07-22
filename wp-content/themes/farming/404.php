<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<div class='not-found'>
				<header class="page-header">
					<h1> Whhhoooooooaaaaaa </h1>
				</header>
				<img src='http://localhost/farming/wp-content/uploads/2014/07/matrix.jpg' />
			
				<div class="page-content">

					<br />

					<h3><?php _e( 'Easy man, that page is... like... non-existent...', 'twentyfourteen' ); ?></h3>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
