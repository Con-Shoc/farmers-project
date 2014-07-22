<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<div id="primary" class="content-area">
		<div id="content" class="site-content button-page-margins" role="main">
			<div id="content" class="site-content button-page-margins" role="main">
		<div class="no_result_header"> 
			<span class=" no_result_warning genericon genericon-warning"></span>
			<div>
				<p class="no_result_text">Sorry bro! No Results found! </p>
				<p class="no_result_frown">:(</p>
			</div>
			<span class=" no_result_warning_2 genericon genericon-warning"></span>
		</div>

		
		 <div class="no_result_option_1">
		 Well since we couldn't find your search item, wanna try again?
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
</div><!-- #main-content -->

<?php
// get_sidebar();
get_footer();
