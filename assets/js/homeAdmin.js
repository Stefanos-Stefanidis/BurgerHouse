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
	
		$(".add-item").click(function () {
			document.getElementById("addProductli").click();

		});

		$(".edit-list").click(function () {
			document.getElementById("editli").click();

		});
		$(".manage-comment").click(function () {
			document.getElementById("mngCommentli").click();

		});

		$(".view-offers").click(function () {
			document.getElementById("offersli").click();
		});

		$(".view-orders").click(function () {
			document.getElementById("viewOrdersli").click();
		});

		$(".view-subscribers").click(function () {
			document.getElementById("subscribersli").click();
		});
		$(".view-charts").click(function () {
			document.getElementById("chartsli").click();
		});

	});


})(jQuery);