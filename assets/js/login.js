(function  ($) {

	$(document).ready(function(){

		$("#show-register").click(function(){
				$( "#register-panel" ).show();
				$( "#fade-bg" ).show();	
		});
		$("#close-register").click(function(){
				$( "#register-panel" ).hide();
				$( "#fade-bg" ).hide();	
		});

	});
	$("#register").click(function(){

		if ($("#first_name" ).val()=="") {		
			$("#regMsg").text("You must fill a username");
			$( "#regMsg" ).show();
			setTimeout(function(){
				$( "#regMsg" ).fadeOut();
			}, 3000);
		}else if($("#last_name" ).val()==""){
			$("#regMsg").text("You must fill a surname");
			$( "#regMsg" ).show();
			setTimeout(function(){
				$( "#regMsg" ).fadeOut();
			}, 3000);
		}
		else if ($("#email").val()=="") {
			$("#regMsg").text("You must fill an email");
			$( "#regMsg" ).show();
			setTimeout(function(){
				$( "#regMsg" ).fadeOut();
			}, 3000);
		}
		else if ($("#password").val()=="") {
			$("#regMsg").text("You must fill a password");
			$( "#regMsg" ).show();
			setTimeout(function(){
				$( "#regMsg" ).fadeOut();
			}, 3000);
		}
		else if ($("#password").val()!=$("#password_confirmation").val()) {
			$("#regMsg").text("passwords do not match");
			$( "#regMsg" ).show();
			setTimeout(function(){
				$( "#regMsg" ).fadeOut();
			}, 3000);
		}
		else{
			$("#regMsg").removeClass("alert-danger");
			$("#regMsg").addClass("alert-success");
			$("#regMsg").text("Registration Complete");
			$( "#regMsg" ).show();
			setTimeout(function(){
				$( "#registerForm" ).submit();
			}, 3000);
			
		}
	});
})(jQuery);