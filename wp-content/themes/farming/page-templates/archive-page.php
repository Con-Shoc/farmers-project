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
			
		
		<?php query_posts('post_type=resource_link'); 

			$categories = array();


			// Fill an array of all distinct cateogories for links and resources
			while(have_posts()): the_post();

				$current = get_the_category()[0]->cat_name;

				// Checks to make syure duplicate entries are not included. This prevents too many accordions from being created.
				if(!in_array($current, $categories)):

					$result = array_push($categories, $current);

				endif;

			endwhile;

			// Cycle through each category and and create an accordion.
			foreach($categories as $category) {
			

		?>

        <div class="accordion">
            <dl>				
              <dt><a class='accordionTitle' <?php echo 'style="background-color:';	echo 'red';	echo ' ;" ';?> onMouseOver="this.style.backgroundColor='<?php  echo 'blue';?>'"	onMouseOut="this.style.backgroundColor='<?php  echo 'red';?>'"> <?php echo $category ?></a></dt>

              <dd class="accordionItem accordionItemCollapsed">
                
                <div class="row">
                <?php 

                	query_posts('post_type=resource_link');

                	while ( have_posts() ): the_post();

                		// Checks if the current post belongs to the current accordion category.
	                	if(get_the_category()[0]->cat_name == $category):


							$link_title = get_field('link_title');

							$link_address = get_field('link_address');

							$link_description = get_field('link_description');
					?>


					<div class="col-lg-6">

		                 <div class="panel panel-success">
						  <a class="link_title" href='<?php echo $link_address ?>'>
						  <div class="panel-heading">
						    <h3 class="panel-title">
						    <?php echo $link_title ?></h3>
						  </div>
						  </a>
						  <div class="panel-body">
						    <?php echo $link_description;?>
						  </div>
						</div>

					</div>


					<?php
                		endif;

                	endwhile; ?>
				</div>
 
              </dd>

            </dl>

            <?php
             } ?>

          </div>
      
      

	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
