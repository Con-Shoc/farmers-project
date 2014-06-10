
	<?php 

// a function that will convert a hex color to a darker rgb
	function hex2rgbDark($hex) {
      $hex = str_replace("#", "", $hex);

      if(strlen($hex) == 3) {
         $r = hexdec(substr($hex,0,1).substr($hex,0,1));
         $g = hexdec(substr($hex,1,1).substr($hex,1,1));
         $b = hexdec(substr($hex,2,1).substr($hex,2,1));
         

   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
      
  
   }
   $rgb = array($r-70, $g-70, $b-70);
   return 'rgb('.implode(",", $rgb).')'; // returns the rgb values separated by commas

}

	?>
