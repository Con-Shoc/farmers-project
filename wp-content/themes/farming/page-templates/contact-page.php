<?php
/**
 * Template Name: Contact Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content button-page-margins" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

				endwhile;
				?>
				
				<div class="contact_content"><?php the_field('contact_description');?></div>
				
				<?php
				$myvalue = get_field( 'contact_shortcode'); 

	
			    echo do_shortcode("$myvalue");
			?>
			
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
// get_sidebar();
get_footer();
