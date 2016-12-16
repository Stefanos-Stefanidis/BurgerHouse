(function  ($) {
	var data;
	var username;
	var comment;
	var next ="ss";
	$(document).ready(function(){


		$(document).ajaxStart(function(){
       		$("#wait").css("display", "block");
       		$("#loading-wrapper").css("display", "block");
   		 });
	    $(document).ajaxComplete(function(){
	        $("#wait").css("display", "none");
       		$("#loading-wrapper").css("display", "none");
	    });
		
		$("#addComment").click(function(){
			addComment();
			setTimeout(
				function() {
					auto_load();
				}, 500);
		});

		$("#nextComment").click(function(){
			//nextComment();
			setTimeout(
				function() {
					pagination();
				}, 500);
		});
	});
	

	function addComment() {

		username = $("#usernameComment").val();
		comment = $("#commentBox").val();

		
		data = "username="+ username;
		data += "&comment="+comment;

		$.ajax({
			type: "POST",
			url: 'commentsSubmit',
			data: data

		});
	}
	function nextComment() {
		data = "test="+next;

		$.ajax({
			type: 'POST',
			url: 'next',
			data: data

		});
	}
	function auto_load(){
		$.ajax({
			url: "commentsRefresh",
			cache: false,
			success: function(data){
				$("#loadAjax").html(data);
			} 
		});
	}
	function pagination(){
		$.ajax({
			url: "next",
			cache: false,
			success: function(data){
				$("#loadAjax").html(data);
			} 
		});
	}


})(jQuery);