<?php
/**
 * Template Name: Archive Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
include(__DIR__.'/../colorFunction.php');
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
				$section_title = get_sub_field('section_title');

				$accordion_color = get_sub_field('accordion_color');				

				
        ?>
              <dt><a class='accordionTitle' <?php echo 'style="background-color:';	the_sub_field('accordion_color');	echo ' ;" ';?> onMouseOver="this.style.backgroundColor='<?php  echo hex2rgbDark(get_sub_field('accordion_color'));?>'"	onMouseOut="this.style.backgroundColor='<?php the_sub_field('accordion_color'); ?>'" ><?php echo $section_title ?></a></dt>

              <dd class="accordionItem accordionItemCollapsed">
                <?php 

                	// Read link repeater fields
                	if( have_rows('link') ):

					while (have_rows('link') ): the_row();

					// Read subfields
					$link_title = get_sub_field('link_title');

					$link_address = get_sub_field('link_address');

					$link_description = get_sub_field('link_description');

                 ?>


                 <a class="link_title" href='<?php echo $link_address ?>'><?php echo $link_title ?></a> <?php echo $link_description ?>

                
              </dd>
              <?php

          endwhile;
			endif;
          endwhile;
          endif; ?>
            </dl>
          </div>
      
      

	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
