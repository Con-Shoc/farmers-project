//Get reference to AnimateHtml object
var ah;
try {
	ah = window.parent.AnimateHtml;	
	ah.addEventListener("stop", ahStop, null, "iframe");
	ah.addEventListener("fail", ahStop, null, "iframe");
}catch(e){}

//Detect if flash is installed
if(ah){
	var flash_info = window.parent.swfobject.getFlashPlayerVersion();
	if(!flash_info.major){
		window.parent.location.href = ah.index;
	}
}

/**
 * Once page transition is finished
 *
 */
function ahStop(){
	
	/** 	
	We recommend to reload the text styles once page transition is stopped
	1) move all your font definitions into fonts.css
	2) add the following line into the header
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory')?>/fonts.css" id="css_fonts">
	**/
   
	if(window.jQuery){	
		var obj = jQuery("#css_fonts");
		if(obj.length){
			obj.attr("href", obj.attr("href"));
		}
	}
}

/**
 * This function is called once before page transition generator app process starts
 * Use this function to hide all dynamic blocks such as:
 * ads, user name, facebook or twitter widgets, random quotes etc.
 *
 */
function ahBeforeProcess(){
	
	//Hide dynamic blocks
	if(window.jQuery){
		jQuery(".ah_dynamic").hide();
	}
}