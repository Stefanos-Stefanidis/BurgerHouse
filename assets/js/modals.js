(function  ($) {

	$(document).ready(function(){


		$('.open-modal').click(function (e) { 
			e.preventDefault();
			//modal_img
			var imgSrc = $(this).children().attr('src');
			console.log($(this).children().attr('src'))
			console.log($(this).children())
			$('#modalImg').attr('src', imgSrc);
			$('#modalImg').attr('lazy', imgSrc);
			$('#modal_img').show();
			
		});
	});


})(jQuery);