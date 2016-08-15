(function  ($) {
	var data;
	var username;
	var comment;
	$(document).ready(function(){


		$(document).ajaxStart(function(){
       		$("#wait").css("display", "block");
   		 });
	    $(document).ajaxComplete(function(){
	        $("#wait").css("display", "none");
	    });
		
		$("#addComment").click(function(){
			addComment();
			$("#usernameComment").text("");
			$("#commentBox").text("");
			setTimeout(
				function() {
					auto_load();
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
	function auto_load(){
		$.ajax({
			url: "commentsRefresh",
			cache: false,
			success: function(data){
				$("#loadAjax").html(data);
			} 
		});
	}

})(jQuery);