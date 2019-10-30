$(document).ready(function(){

	
	//Click event to scroll to top
	$('#go-top').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});

$(window).load(function() {
	$(".loader-container").delay(500).fadeOut( "slow", function() {
		$(".loader-circle").css('animation','none');
	});
})