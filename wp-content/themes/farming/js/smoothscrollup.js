jQuery(document).ready(function($){
	$(window).scroll(function(){
        if ($(this).scrollTop() < 0) {
			$('#smoothup') .fadeOut();
        } else {
			$('#smoothup') .fadeIn();
        }
    });
	$('#smoothup').on('click', function(){
		$('html, body').animate({scrollTop:0}, 'medium');
		return false;
		});
});