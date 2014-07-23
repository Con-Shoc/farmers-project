<?php
/*
Plugin Name: Highlight Search Terms
Plugin URI: http://status301.net/wordpress-plugins/highlight-search-terms
Description: Wraps search terms in the HTML5 mark tag when referer is a search engine or within wp search results. No options to set. Read <a href="http://wordpress.org/extend/plugins/highlight-search-terms/other_notes/">Other Notes</a> for instructions and examples for styling the highlights. <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=ravanhagen%40gmail%2ecom&item_name=Highlight%20Search%20Terms&item_number=0%2e6&no_shipping=0&tax=0&bn=PP%2dDonationsBF&charset=UTF%2d8&lc=us" title="Thank you!">Tip jar</a>.
Version: 1.3
Author: RavanH
Author URI: http://status301.net/
*/

/*  Copyright 2010  RavanH  (email : ravanhagen@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, <http://www.gnu.org/licenses/> or
    write to the Free Software Foundation Inc., 59 Temple Place, 
    Suite 330, Boston, MA  02111-1307  USA.

    The GNU General Public License does not permit incorporating this
    program into proprietary programs.
*/

if(!empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME']))
	die('You can not access this page directly!');

/* --------------------
 *      CONSTANTS
 * -------------------- */

define('HLST_VERSION','1.3');

/* -----------------
 *      CLASS
 * ----------------- */

class HighlightSearchTerms {

	/**
	* Plugin variables
	*/

	static $areas = array(		// Change or extend this to match themes content div ID or classes.
			'article',
			'#groups-dir-list', '#members-dir-list', // BuddyPress compat
			'li.bbp-body', // bbPress compat
			'.hentry',	// The hilite script will test div ids/classes and use the first one it
			'.post',
			'#content',	// finds so put the most common one first, then follow with the less
			'#main',	// used or common outer wrapper div ids.
			'.content',	// When referencing an *ID name*, just be sure to begin with a '#'.
			'#middle',	// When referencing a *class name*, try to put the tag in front,
			'#container',	// followed by a '.' and then the class name to *improve script speed*.
			'.container',
			'.page',
			'#wrapper'	
			);		// Using the tag 'body' is known to cause conflicts.


	/**
	* Plugin functions
	*/

	public static function init() {
		// -- HOOKING INTO WP -- //
		add_action('init', array(__CLASS__, 'register_script'));
		
		// Set query string as js variable in header
		add_action('wp_head', array(__CLASS__, 'query') );

	}

	public static function register_script() {		
		wp_enqueue_script('hlst-extend', plugins_url('hlst-extend.js', __FILE__), array('jquery'), HLST_VERSION, true);
	}
	
	// Get query variables and print header script
	public static function query() {
		$filtered = array();
		$searches = array();

		$searches[] = esc_attr( apply_filters( 'get_search_query', get_query_var( 's' ) ) );
		$searches[] = esc_attr( apply_filters( 'get_search_query', get_query_var( 'bbp_search' ) ) ); // a bbPress search
		
		foreach ($searches as $search) {
			$terms =  array();
			if( preg_match_all('/([^\s"\']+)|"([^"]*)"|\'([^\']*)\'/', $search, $terms) ) {
				foreach($terms[0] as $term) {
					$term = esc_attr(trim(str_replace(array('"','\'','%22'), '', $term)));
					if ( !empty($term) )
						$filtered[] = '"'.$term.'"';
				}
			}
		}

		echo '
<!-- Highlight Search Terms ' . HLST_VERSION . ' ( RavanH - http://status301.net/wordpress-plugins/highlight-search-terms/ ) -->
<script type="text/javascript">
var hlst_query = new Array(' . implode(',',$filtered) . ');
var hlst_areas = new Array("' . implode('","',self::$areas) . '");
</script>
';
	} 
	
}

HighlightSearchTerms::init();

