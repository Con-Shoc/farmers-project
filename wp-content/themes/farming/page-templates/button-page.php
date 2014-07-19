<?php
/**
 * Template Name: Button Page
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

<!-- custom field for the button page intro -->


	<div id="primary" class="content-area">
		<div id="content" class="site-content button-page-margins" role="main">
			<div class="page_intro">
				<?php echo the_field('page_intro'); ?> 
			 </div>
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

				endwhile;


			?>
			
		<?php
 
			// check if the repeater field has rows of data
			if( have_rows('button') ):

			 	// loop through the rows of data
			    while ( have_rows('button') ) : the_row();

					// display the image for the button
					$button_image = get_sub_field('button-image');

					// get the boolean value of whether or not to create spacing between the buttons
					$button_text_spacing = get_sub_field('button_text_spacing');

					

						// case where a border is requested
						if($button_text_spacing) {
		?>					

						<h1 class="entry-title button_text_spacing"><?php echo the_sub_field('button_text_spacing');?></h1>
							<div class='menu_button' <?php echo 'style="background-color:';	the_sub_field('button_color');	echo ' ;" ';?> onMouseOver="this.style.backgroundColor='<?php  echo hex2rgbDark(get_sub_field('button_color'));?>'"	onMouseOut="this.style.backgroundColor='<?php the_sub_field('button_color'); ?>'"> 

						
						<?php
						// case where a border is not requested
						} elseif (empty($button_text_spacing)) { ?>
							<div class='menu_button' <?php echo 'style="background-color:';	the_sub_field('button_color');	echo ' ;" ';?> onMouseOver="this.style.backgroundColor='<?php  echo hex2rgbDark(get_sub_field('button_color'));?>'"	onMouseOut="this.style.backgroundColor='<?php the_sub_field('button_color'); ?>'"> 
						<?php
						}?>
						<a class="menu_link" href="<?php the_sub_field('button_link'); ?>">
						
						<?php 
						                		if(empty($button_image)){
						                		?>
						                		<img class="button_image" src="./wp-content/themes/farming/images/blank.png" alt="<?php echo 'no image'; ?>" />
						                		
							                		<div class="button_text" style="margin-right:2em;">
												         <!-- display a sub field value -->
													        <p class="button_name">
													        	<?php the_sub_field('button_name'); ?>
													        </p>

													       	</br>

													        <!-- display the blurb for the button -->
													       <p class="button_blurb">
													       		<?php the_sub_field('button_blurb'); ?> 
													       	</p>
													  
														</div>
														</a>

											        </div>
						                		<?php
						                		}


						                		else{
						                		?>
						                		<img class="button_image" src="<?php echo $button_image['url']; ?>" alt="<?php echo $button_image['alt']; ?>" />
						                		
								                		<div class="button_text">
													         <!-- display a sub field value -->
														        <p class="button_name">
														        	<?php the_sub_field('button_name'); ?>
														        </p>

														       	</br>

														        <!-- display the blurb for the button -->
														       <p class="button_blurb">
														       		<?php the_sub_field('button_blurb'); ?> 
														       	</p>
														  
															</div>
															</a>

												        </div>
						                		<?php } ?>	

						

					<?php 

					?>
						
						
			        

			        <?php

			    endwhile;

			else :

			    // no rows found

			endif;
 
		?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
// get_sidebar();
get_footer();