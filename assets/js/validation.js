(function  ($) {
var data;
var userMail;
	$(document).ready(function(){


		$("#validate").click(function(){

			validate();
		});
	});

	function validate() {

	$("#result").text("");
	var email = $("#userMail").val();

	if (email.indexOf("@") > -1 && email.indexOf(".") >-1 ) {
		$("#result").text(email + " Has subscribed");
		$("#result").css("color", "green");
		$( "#result" ).fadeIn();
		$( "#result" ).fadeOut(1900);

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
			$( "#result" ).fadeIn();
			$( "#result" ).fadeOut( 1900);
		}
	}


})(jQuery);