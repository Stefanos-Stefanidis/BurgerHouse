(function  ($) {
	var data;
	var userMail;
		$(document).ready(function(){

			$("#subscribe").click(function(){
				subscribe();
			});
		
		});

	function subscribe() {

		$("#result").text("");
		var email = $("#userMail").val().replace(/\s+/g, '');
		if (validateEmail(email)) {
			$("#result").text(email + " Has subscribed").css("color", "green");
			$( "#result" ).fadeIn().fadeOut(1900);

			userMail = $('#userMail').val();		
			data = "usermail="+ userMail;

			$.ajax({
				type: "POST",
				url: 'newslettter',
				data: data

			});
			
			$('#userMail').val("");

		} else {
			$("#result").text(email + " is not valid");
				$("#result").css("color", "red");
				$( "#result" ).fadeIn().fadeOut(1900);
			}
	}

	function validateEmail(email) {
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	}

})(jQuery);