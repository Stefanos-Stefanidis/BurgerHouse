(function  ($) {
	var data;
	var username;
	var comment;
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
			//addComment();
			setTimeout(
				function() {
					auto_load();
				}, 500);
		});

		$("#nextComment").click(function(){
			//nextComment();
			setTimeout(
				function() {
                    next();
				}, 500);
		});

        $("#previousComment").click(function(){
            setTimeout(
                function() {
                    previous();
                }, 500);
        });
	});
	

	function addComment() {

		comment = $("#commentBox").val();

		
		data = "comment="+comment;

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
	function next(){
		$.ajax({
			url: "next",
			cache: false,
			success: function(data){
				$("#loadAjax").html(data);
			} 
		});
	}

    function previous(){
        $.ajax({
            url: "previous",
            cache: false,
            success: function(data){
                $("#loadAjax").html(data);
            }
        });
    }

})(jQuery)