(function  ($) {
	
	var data;
	var limit = 5;
	var comment;
	var rate = 0;
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
		if (jQuery('#commentBox').length) {
			
			scrolledOnce = true;
			$(window).scroll(function() {
				if($(window).scrollTop() + $(window).height() + 93  > $(document).height() && scrolledOnce ) {
					limit = limit +5;
					next(limit);
					scrolledOnce = false;
				}
			 });
		}
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
	function next(limitVar){

		data = "limit="+limitVar;
        $.ajax({
            type: "POST",
			url: '/next',
			cache: false,
			data: data,
			success: function(data){
				if (data == 'false') {
					scrolledOnce = false;
					// location.reload();
					return;
				}
				scrolledOnce = true;
				$("#loadAjax").html(data);
			} 
		});
		
		return;
		data = "prid=12";
		$.ajax({
			url: "next",
			cache: false,
			success: function(data){
				if (data == 'false') {
					location.reload();
					return;
				}
				console.log('hey');
				$("#loadAjax").html(data);
			} 
		});
	}

    function previous(){
        $.ajax({
            url: "previous",
            cache: false,
            success: function(data){
				if (data == 'false') {
					location.reload();
					return;
				}
                $("#loadAjax").html(data);
            }
        });
	}
	
	$('.rating input').click(function () { 
		rate = $(this).attr('value');
		Cookies.set('rate',rate);
	});

})(jQuery)