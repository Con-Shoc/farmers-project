<?php
/**
 * Template Name: Full Width Page
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
		<div id="content" class="site-content" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>



		
		<div class="flexslider">
		    <ul class="slides">
		    <?php
		    $rows = get_field('slide');
		    if($rows) {
		 
		        foreach($rows as $row) {
		            // retrieve size 'large' for background image
		            $bgimg = $row['bg_image']['sizes']['large'];
		 
		            $output = "<li style='background-image: url(". $bgimg .");'>\n";
		            $output .= "  <div class='slide-text'>\n";
		            $output .= "  <h2>". $row['slide_heading'] ."</h2>\n";
		            $output .= "  " . $row['slide_text'];
		            $output .= "  </div>\n";
		            $output .= "</li>\r\n\n";
		 
		            echo $output;
		        }
		    }
		    ?>
		    
		    </ul>
		</div>






		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
