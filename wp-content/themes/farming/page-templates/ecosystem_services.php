<?php
/**
 * Template Name: Content Page
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

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>
			
		

        
           <div class="accordion">
            <dl>
            	<?php
            	// read the accordion section field
            if( have_rows('accordion_section') ):

			 	// loop through the rows of data
			    while ( have_rows('accordion_section') ) : the_row();

				// read sub fields into variables
				$accordion_title = get_sub_field('accordion_title');
				$accordion_content = get_sub_field('accordion_content');

				$content_image = get_sub_field('content_image');
        ?>
              <dt><a class="accordionTitle" href="#"><?php echo $accordion_title ?></a></dt>
              <dd class="accordionItem accordionItemCollapsed">
                <p><?php echo $accordion_content ?></p>
                
                <?php if($content_image != ''): ?>
                	<img src="<?php echo $content_image['url']; ?>" alt="<?php echo $content_image['alt']; ?>" />
                <?php endif; ?>
                
              </dd>
              <?php
          endwhile;

          endif; ?>
            </dl>
          </div>
      

	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
