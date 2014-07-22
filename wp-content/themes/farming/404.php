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

			
			
				<div class="not-found" style="background: no-repeat center url(./wp-content/uploads/2014/07/matrix.jpg);'">
					<div class="neo-text">
						<span class="neo-arrow genericon genericon-next"></span>
						<h1> Whhhoooooooaaaaaa </h1>
						<p>
							Easy man, that page is... like... non-existent...
						</p>
					</div>
				</div>

		 <div class="error_result_option_1">
			Since you couldnt find your page, why not try searching for it?
		 	<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
				<label>
				<div class="no_result_search">
					<input type="search" class="no_result_search-field" placeholder="Search For..." value="" name="s" title="Search for:" />
					<input type="submit" class="no_result_search_submit" name="Submit" value="Search Site" />
				</div>
				</label>
			</form>
		</div>
			
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
