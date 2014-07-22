<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<div class="page-content button-page-margins">
	<div class="no_result_header"> 
	<span class=" no_result_warning genericon genericon-warning"></span>
	<div>
	<p class="no_result_text">Sorry bro! No Results found! </p>
	<p class="no_result_frown">:(</p>
	</div>

	</div

	<!-- <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?> -->

	<!-- <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'twentyfourteen' ), admin_url( 'post-new.php' ) ); ?></p> -->
	 <div class="no_result_option_1">
	 Well since we couldn't find your item, wanna try again?
	 	<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
			<label>
			<div class="no_result_search">
				<span class="screen-reader-text">Search for:</span>
				<input type="search" class="search-field" placeholder="Search For..." value="" name="s" title="Search for:" />
				<input type="submit" class="search_submit" name="Submit" value="Search Site" />
			</div>
			</label>
		</form>
	<?php elseif ( is_search() ) : ?>

	<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyfourteen' ); ?></p>
	<?php get_search_form(); ?>

	<?php else : ?>

	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentyfourteen' ); ?></p>
	<?php get_search_form(); ?>

	<?php endif; ?>
</div><!-- .page-content -->
