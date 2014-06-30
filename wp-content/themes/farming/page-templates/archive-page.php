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
					

						
						// array to hold all of the categories (even repeated)
						$allCatArray = array();

						// query to be used in a loop through custom posts. exclusive for (resource_link)
						$args = array( 'post_type' => 'resource_link', 'posts_per_page' => -1);
						$loop = new WP_Query( $args );

								// while loop to iterate through every post using previous query
								// purpose of this loop is to get all the categories
								while ( $loop->have_posts() ) : $loop->the_post();
											

											// echo get_post_meta($post->ID,'link_title',true);
											// echo "<br>";

								// storing all categories in an array which is returned by default
								$all= get_the_category( );
								
								// storing each category in a different array
								array_push($allCatArray, $all[0]->cat_name);

								endwhile;

								wp_reset_query();

								// fetching only unique categories to eliminate redanduncies
								$uniqueCatArray = array_unique($allCatArray);
								array_multisort($uniqueCatArray);
								array_filter($uniqueCatArray);
								


								for ($i=0; $i < count($uniqueCatArray); $i++) { 
							

											$args = array( 'post_type' => 'resource_link', 'posts_per_page' => -1 ,'category_name' => $uniqueCatArray[$i]);
											$loop = new WP_Query( $args );
											?>
							


													<div class="accordion">
											            <dl>				
											              <dt><a class='accordionTitle' <?php echo 'style="background-color:';	echo '#48B749';	echo ' ;" ';?> onMouseOver="this.style.backgroundColor='<?php  echo '#299546';?>'"	onMouseOut="this.style.backgroundColor='<?php  echo '#48B749';?>'"> <?php echo $uniqueCatArray[$i] ?></a></dt>

											              <dd class="accordionItem accordionItemCollapsed">
											                
											                <div class="row">
       


											<?php
												while ( $loop->have_posts() ) : $loop->the_post();
												
												?>
												
													<div class="col-lg-6">

										                 <div class="panel panel-success">
														  <a class="link_title" href='<?php echo get_post_meta($post->ID,'link_address',true); ?>'>
														  <div class="panel-heading">
														    <h3 class="panel-title">
														    <?php echo get_post_meta($post->ID,'link_title',true); ?></h3>
														  </div>
														 
														  <div class="panel-body">
														  	
														    <?php echo get_post_meta($post->ID,'link_description',true);?>
														  </div>
														</div>
														 </a>

													</div>


												<?php
												endwhile;
												wp_reset_query();
												?>

													</div>
												 
												              </dd>

												            </dl>


												<?php
								}

						?>






















          </div>
      
      

	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
