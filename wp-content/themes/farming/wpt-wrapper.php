<?php
$transitions = wpt_get_used_transitions();
?>
<!doctype html>
<html lang="en">
<head>
<title>Home</title>
<link rel="stylesheet" type="text/css" href="<?php echo WPT_PLUGIN_URL?>/ah_files/animate-html.css" />
<style>
div.ah_loader {
<?php
/** Font family **/
if($font = get_option('wpt_font'))
	echo 'font-family:'.  ($font).';';

/** Bold or normal **/
echo 'font-weight:'.(get_option('wpt_bold') == '0'? 'normal': 'bold').';';

/** Font size **/
if($size = intval(get_option('wpt_font_size')))
	echo 'font-size:'. $size.'px;';

/** Text color **/
if($color = get_option('wpt_txt_color'))
	echo 'color:'.  htmlspecialchars($color).';';

/** Box color **/
if($color = get_option('wpt_box_color'))
	echo 'background-color:'.  htmlspecialchars($color).';';
?>
}
body {
<?php
/** Page background color **/
if($color = get_option('wpt_bg_color'))
	echo 'background-color:'.  htmlspecialchars($color).';';
?>
}
</style>
<script src="<?php echo WPT_PLUGIN_URL?>/ah_files/js/libs/swfobject.js" type="text/javascript"></script>
<script src="<?php echo WPT_PLUGIN_URL?>/ah_files/js/libs/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="<?php echo WPT_PLUGIN_URL?>/ah_files/js/libs/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="<?php echo WPT_PLUGIN_URL?>/ah_files/js/animate-html.js" type="text/javascript"></script>
<script>
//Custom home page
AnimateHtml.index = "<?php bloginfo('url')?>/?wpt-wrapped=1";
AnimateHtml.flash_dir = "<?php echo WPT_PLUGIN_URL?>/ah_files";
AnimateHtml.config = {
	transitions_path: "<?php echo WPT_PLUGIN_URL ?>/ah_files/transitions",
	assets_path: "<?php echo WP_CONTENT_URL ?>/ah_assets",
	home: "<?php bloginfo('url')?>"
};
AnimateHtml.useTransitions([<?php
for($i = 0; $i < count($transitions); $i++ ){
	echo $i? ',': '';
	echo '"'.esc_html($transitions[$i]).'"';
}
?>]);

$(window).load(function(){AnimateHtml.init()});
</script>
</head>
<body>
<div id="ah_blocker" class="ah_blocker full_width">
	<center><div class="ah_loader">Loading...</div></center>
</div>
</body>
</html>
<!-- Powered by www.PageTransitions.com -->