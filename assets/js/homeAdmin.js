(function ($) {

	$(document).ready(function () {
		
		$("#selectCategory").chosen();
		
		$("#menu-btn").mouseenter(function () {
			$(".nav-left").css({
				"left": "0%"
			});
			$("#menu-btn").css({
				"visibility": "hidden"
			});
			$("body").addClass("margin-left");
		});

		$(".nav-left").mouseleave(function () {
			$(".nav-left").css({
				"left": "-210px"
			});
			$("body").removeClass("margin-left");
			$("#menu-btn").css({
				"visibility": "visible"
			});

		});
	
		$(".go-to-data-attr").click(function () {

			var menuItem = $(this).data("menuItem");

			document.getElementById(menuItem).click();

		});

	});


})(jQuery);