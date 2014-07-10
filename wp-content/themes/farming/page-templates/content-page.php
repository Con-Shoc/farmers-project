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
					// get_template_part( 'content', 'page' );
					the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );

				
				endwhile;
			?>



		<?php if( have_rows('slide') ): ?>

			<div class="flexslider">
			    <ul class="slides">
			    <?php
			    $rows = get_field('slide');
			    if($rows) {
			 
			        foreach($rows as $row) {
			            // retrieve size 'large' for background image
			            $bgimg = $row['bg_image']['sizes']['large'];
			 
			            $output = "<li style='background-image: url(". $bgimg ."); background-size:100%; max-height: 325px; min-height: 270px;'>\n";
			            $output .= "  <div class='slide-text'>\n";
			            // $output .= "  <h2>". $row['slide_heading'] ."</h2>\n";
			            $output .= "  " . $row['slide_text'];
			            $output .= "  </div>\n";
			            $output .= "</li>\r\n\n";
			 
			            echo $output;
			        }
			    }
			    ?>
			    
			    </ul>
			</div>
		<?php
			endif;
				// Start the Loop.
				while ( have_posts() ) : the_post();
				the_content();

				endwhile

		?>
		 
       	<?php 
       		if( have_rows('tab_menu') ): 
       			while ( have_rows('tab_menu') ): the_row();
       				if( have_rows('tab') ): 
       					$active_flag = true; ?>
						<div class="tab-menu">
						<ul class="nav nav-tabs" data-tabs="tabs">
						<?php 
						while( have_rows('tab') ): the_row();

							$tab_title = get_sub_field('tab_title');
			   				$tab_content = get_sub_field('tab_content');

							if($active_flag): 
								 ?>
								<li class="active"><a data-toggle="tab" href="<?php echo '#' . str_replace(' ', '', $tab_title); ?>"><?php echo $tab_title ?></a></li>
								<?php 
								$active_flag = false;?>
			       			<?php  
			       			else:
			       			?>
				       			<li><a data-toggle="tab" href="<?php echo '#' . str_replace(' ', '', $tab_title); ?>"><?php echo $tab_title; ?></a></li>

				       		<?php 
       						endif;
       					endwhile;
       				endif; ?>

       				</ul> 
       				
       

       		
					<?php
       				if(have_rows('tab')): ?>
						<div class="tab-content">
       					<?php 
       					$active_flag = true;
       					while(have_rows('tab')): the_row();?>
		       				
			       			<?php 
			       			

			       			$tab_title = get_sub_field('tab_title');
			       			$tab_content = get_sub_field('tab_content'); ?>

			       			<?php 
			       			if($active_flag): ?>
			       				<div id="<?php echo str_replace(' ', '', $tab_title); ?>" class="tab-pane fade in active">
						      	<?php echo $tab_content ?>
						      	<?php

			                	if( have_rows('tab_button') ):
					                while( have_rows('tab_button') ): the_row();
						                $accordion_button_image = get_sub_field('tab_button_image');
						                $blankImage=__DIR__.'/../images/blank.png';
						                ?>


						                <div class='accordion_button' <?php echo 'style="background-color:';	the_sub_field('tab_button_color');	echo ' ;" ';?> onMouseOver="this.style.backgroundColor='<?php  echo hex2rgbDark(get_sub_field('tab_button_color'));?>'"	onMouseOut="this.style.backgroundColor='<?php the_sub_field('tab_button_color'); ?>'">
						                
						                	<a class="accordion_link" href="<?php the_sub_field('tab_button_link'); ?>">
						                		
						           
						                			<div class="accordion_button_text">
						                				<!-- display a sub field value -->
											        	<p class="accordion_button_name">
											        	<?php the_sub_field('tab_button_name'); ?>
											        	</p>

											        	</br>

											        	<p class="accordion_button_blurb">
											       		<?php the_sub_field('tab_button_blurb'); ?> 
											       		</p>
						                			</div>
						                	</a>

						           		 </div>


					                <?php
					                endwhile;
			                	endif;
			                	$active_flag = false;
								?>

							    </div>
							<?php 
						    else: ?>
						    	<div id="<?php echo str_replace(' ', '', $tab_title); ?>" class="tab-pane fade">
						      	<?php echo $tab_content ?>
						      	<?php

			                	if( have_rows('tab_button') ): ?>
			                		<?php 
			                		while( have_rows('tab_button') ): the_row();
						                $accordion_button_image = get_sub_field('tab_button_image');
						                $blankImage=__DIR__.'/../images/blank.png';
						                ?>


						                <div class='accordion_button' <?php echo 'style="background-color:';	the_sub_field('tab_button_color');	echo ' ;" ';?> onMouseOver="this.style.backgroundColor='<?php  echo hex2rgbDark(get_sub_field('tab_button_color'));?>'"	onMouseOut="this.style.backgroundColor='<?php the_sub_field('tab_button_color'); ?>'">
						                
						                	<a class="accordion_link" href="<?php the_sub_field('tab_button_link'); ?>">
						                		
						           
						                			<div class="accordion_button_text">
						                				<!-- display a sub field value -->
											        	<p class="accordion_button_name">
											        	<?php the_sub_field('tab_button_name'); ?>
											        	</p>

											        	</br>

											        	<p class="accordion_button_blurb">
											       		<?php the_sub_field('tab_button_blurb'); ?> 
											       		</p>
						                			</div>
						                	</a>

						           		 </div>


					                	<?php
					                endwhile;
			                	endif;
								?>

						    	</div>

		       				<?php 
		       				endif;
		       			endwhile; ?>

		       			</div>
		       		<?php endif;
		       		?>

		       	<?php
		       	endwhile;
			endif; ?>
		




		<!-- Accordion Starts  -->
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
	              	<dt><a class='accordionTitle' <?php echo 'style="background-color:';	the_sub_field('accordion_color');	echo ' ;" ';?> onMouseOver="this.style.backgroundColor='<?php  echo hex2rgbDark(get_sub_field('accordion_color'));?>'"	onMouseOut="this.style.backgroundColor='<?php the_sub_field('accordion_color'); ?>'" ><?php echo $accordion_title ?></a></dt>

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
			                $blankImage=__DIR__.'/../images/blank.png';
			                ?>


			                <div class='accordion_button' <?php echo 'style="background-color:';	the_sub_field('accordion_button_color');	echo ' ;" ';?> onMouseOver="this.style.backgroundColor='<?php  echo hex2rgbDark(get_sub_field('accordion_button_color'));?>'"	onMouseOut="this.style.backgroundColor='<?php the_sub_field('accordion_button_color'); ?>'">
			                
			                	<a class="accordion_link" href="<?php the_sub_field('accordion_button_link'); ?>">
			                		
			           
			                			<div class="accordion_button_text">
			                				<!-- display a sub field value -->
								        	<p class="accordion_button_name">
								        	<?php the_sub_field('accordion_button_name'); ?>
								        	</p>

								        	</br>

								        	<p class="accordion_button_blurb">
								       		<?php the_sub_field('accordion_button_blurb'); ?> 
								       		</p>
			                			</div>
			                	</a>

			           		 </div>


		                <?php
		                endwhile;
	                endif;?>
			                
					<?php
					// Start nested accordion, almost identical to parent accordion
	                if( have_rows('nested_accordion') ):
			                	?>
		                <div class="nested_accordion">
						<dl>
						<?php
	                	while (have_rows('nested_accordion')): the_row();

	                		// read sub fields into variables
							$nested_accordion_title = get_sub_field('nested_accordion_title');
							$nested_accordion_content = get_sub_field('nested_accordion_content');

							$nested_accordion_image = get_sub_field('nested_accordion_image');
			        		?>
			              	<dt><a class='accordionTitle' <?php echo 'style="background-color:';	the_sub_field('nested_accordion_color');	echo ' ;" ';?> onMouseOver="this.style.backgroundColor='<?php  echo hex2rgbDark(get_sub_field('nested_accordion_color'));?>'"	onMouseOut="this.style.backgroundColor='<?php the_sub_field('nested_accordion_color'); ?>'" ><?php echo $nested_accordion_title ?></a></dt>

			              	<dd class="accordionItem accordionItemCollapsed">
			                <?php echo $nested_accordion_content ?>
					        <?php if($nested_accordion_image != ''): ?>
			                	<img class="accordionimage" src="<?php echo $nested_accordion_image['url']; ?>" alt="<?php echo $nested_accordion_image['alt']; ?>" />
			                <?php endif; ?>



    				<!-- sub repeater loop for buttons within accordions -->
			                <?php

			                if( have_rows('nested_accordion_button') ):
			                	?>
			                <?php
				                while( have_rows('nested_accordion_button') ): the_row();
					                $nested_button_image = get_sub_field('nested_button_image');
					                $blankImage=__DIR__.'/../images/blank.png';
					                ?>


					                <div class='menu_button' <?php echo 'style="background-color:';	the_sub_field('nested_button_color');	echo ' ;" ';?> onMouseOver="this.style.backgroundColor='<?php  echo hex2rgbDark(get_sub_field('nested_button_color'));?>'"	onMouseOut="this.style.backgroundColor='<?php the_sub_field('nested_button_color'); ?>'">
					                
				                	<a class="menu_link" href="<?php the_sub_field('nested_button_link'); ?>">
												                		
			                		<?php 
			                		if(empty($nested_button_image)){
				                		?>
				                		<img class="button_image" src="./wp-content/themes/farming/images/blank.png" alt="<?php echo 'no image'; ?>" />
				                		<?php
				                		}


			                		else{
			                			?>
			                			<img class="button_image" src="<?php echo $nested_button_image['url']; ?>" alt="<?php echo $nested_button_image['alt']; ?>" />
		                			<?php } ?>	
		                			<div class="button_text">
		                				<!-- display a sub field value -->
							        	<p class="button_name">
							        	<?php the_sub_field('nested_button_name'); ?>
							        	</p>

							        	</br>

							        	<p class="button_blurb">
							       		<?php the_sub_field('nested_button_blurb'); ?> 
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
			        	endwhile; ?>
			        	</dl>
			        	</div>
		        	<?php endif; ?>
              	</dd>
              	<?php
          		endwhile;
				?>
          
	        <?php
	        endif;
	        ?>

        	</dl>
        </div>

          <!-- Accordion Stops -->
		<?php if( have_rows('button') ):

			while( have_rows('button') ): the_row(); ?>

			<div class='accordion_button' <?php echo 'style="background-color:';	the_sub_field('button_color');	echo ' ;" ';?> onMouseOver="this.style.backgroundColor='<?php  echo hex2rgbDark(get_sub_field('button_color'));?>'"	onMouseOut="this.style.backgroundColor='<?php the_sub_field('button_color'); ?>'">
			                
            	<a class="accordion_link" href="<?php the_sub_field('button_link'); ?>">
            		
       
            			<div class="accordion_button_text">
            				<!-- display a sub field value -->
				        	<p class="accordion_button_name">
				        	<?php the_sub_field('button_name'); ?>
				        	</p>

				        	</br>

				        	<p class="accordion_button_blurb">
				       		<?php the_sub_field('button_blurb'); ?> 
				       		</p>
            			</div>
            	</a>

       		 </div>

       		 <?php 
       		 endwhile;
       		 endif; ?>
      
      

	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
