<?php
/**
 * Template Name: Content Page
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
				$accordion_title = get_sub_field('accordion_title');
				$accordion_content = get_sub_field('accordion_content');

				$accordion_content_image = get_sub_field('accordion_content_image');
        ?>
              <dt><a class='accordionTitle' <?php echo 'style="background-color:';	the_sub_field('accordion_color');	echo ' ;" ';?> onMouseOver="this.style.backgroundColor='<?php  echo hex2rgbDark(get_sub_field('accordion_color'));?>'"	onMouseOut="this.style.backgroundColor='<?php the_sub_field('accordion_color'); ?>'" href="#"><?php echo $accordion_title ?></a></dt>

              <dd class="accordionItem accordionItemCollapsed">
                <?php echo $accordion_content ?>
                <?php if($accordion_content_image != ''): ?>
                	<img class="accordionimage" src="<?php echo $accordion_content_image['url']; ?>" alt="<?php echo $accordion_content_image['alt']; ?>" />
                <?php endif; ?>



                				<!-- sub repeater loop for buttons within accordions -->
						                <?php

						                if( have_rows('accordion_button') ):

						                	?>
						                <?php
						                while( have_rows('accordion_button') ): the_row();
						                $accordion_button_image = get_sub_field('accordion_button_image');
						                ?>


						                <div class='menu_button' <?php echo 'style="background-color:';	the_sub_field('accordion_button_color');	echo ' ;" ';?> onMouseOver="this.style.backgroundColor='<?php  echo hex2rgbDark(get_sub_field('accordion_button_color'));?>'"	onMouseOut="this.style.backgroundColor='<?php the_sub_field('accordion_button_color'); ?>'">
						                
						                	<a class="menu_link" href="<?php the_sub_field('accordion_button_link'); ?>">
						                		<img class="button_image" src="<?php echo $accordion_button_image['url']; ?>" alt="<?php echo $accordion_button_image['alt']; ?>" />
						                			
						                			<div class="button_text">
						                				<!-- display a sub field value -->
											        	<p class="button_name">
											        	<?php the_sub_field('accordion_button_name'); ?>
											        	</p>

											        	</br>

											        	<p class="button_blurb">
											       		<?php the_sub_field('accordion_button_blurb'); ?> 
											       		</p>
						                			</div>
						                	</a>

						           		 </div>


						                <?php
						                endwhile;
						                endif;
						               ?>



                
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
