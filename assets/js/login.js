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

	$("#loginForm").submit(function( event ) {
		event.preventDefault();
		$.ajax({
			type     : "POST",
			cache    : false,
			url      : $(this).attr('action'),
			data     : $(this).serialize(),
			success  : function(data) {
				if (data=="failed") {
					alert('nop');

				}else if(data  == "name exist" || data == "mail exist"){
					$('#regMsg').show();
					$('#regMsg').show();
					$('#regMsg').addClass("alert-danger");
					$('#regMsg').text(data);
					console.log('hey');
					setTimeout(
						function() {
							$('#regMsg').fadeOut();
							$('#regMsg').fadeOut();
							$('#regMsg').removeClass("alert-danger");
						}, 2000);
				}
			}
		});
	});
	$("#backHistory").click(function(){
		parent.history.back();
		return false;
	});
	$("#register").click(function(){

		if ($("#first_name" ).val()=="") {		
			$("#regMsg").text("You must fill a username");
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
			$("#registerForm").submit(function( event ) {
				event.preventDefault();
				$.ajax({
					type     : "POST",
					cache    : false,
					url      : $(this).attr('action'),
					data     : $(this).serialize(),
					success  : function(data) {
						if (data=="success") {
							$('#regMsg').addClass("alert-success");
							$('#regMsg').text(data);
							$('#regMsg').show();
							$('#regMsg').show();
							setTimeout(
								function() {
									$('#regMsg').fadeOut();
									$('#regMsg').fadeOut();
									$('#regMsg').removeClass("alert-success");
								}, 2000);

						}else if(data  == "name exist" || data == "mail exist"){
							$('#regMsg').show();
							$('#regMsg').show();
							$('#regMsg').addClass("alert-danger");
							$('#regMsg').text(data);
							console.log('hey');
							setTimeout(
								function() {
									$('#regMsg').fadeOut();
									$('#regMsg').fadeOut();
									$('#regMsg').removeClass("alert-danger");
								}, 2000);
						}
					}
				});
			});
			
		}
	});
})(jQuery);