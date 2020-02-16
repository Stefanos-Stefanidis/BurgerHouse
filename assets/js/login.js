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
		console.log('hey')
		return;
		event.preventDefault();
		$.ajax({
			type     : "POST",
			cache    : false,
			url      : $(this).attr('action'),
			data     : $(this).serialize(),
			success  : function(data) {
				if (data ==="success") {
                    location.reload();

				}else if(data  === "failed" ){
					$('#failLogin').show();

					setTimeout(
						function() {
							$('#failLogin').fadeOut();
						}, 2000);
				}
			}
		});
	});

	$("#register").click(function(){

		if ($("#first_name" ).val() === "") {

			$( "#regMsg" ).show().text("You must fill a username");
			setTimeout(function(){
				$( "#regMsg" ).fadeOut();
			}, 3000);
		}
		else if ($("#email").val()==="") {
			$( "#regMsg" ).show().text("You must fill an email");
			setTimeout(function(){
				$( "#regMsg" ).fadeOut();
			}, 3000);
		}
		else if ($("#password").val()==="") {
			$( "#regMsg" ).show().text("You must fill a password");
			setTimeout(function(){
				$( "#regMsg" ).fadeOut();
			}, 3000);
		}
		else if ($("#password").val()!== $("#password_confirmation").val()) {
			$( "#regMsg" ).show().text("passwords do not match");
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
						if (data==="success") {
							$('#regMsg').show().text(data).addClass("alert-success");
							setTimeout(
								function() {
									$('#regMsg').fadeOut().removeClass("alert-success");
								}, 2000);

						}else if(data  === "name exist" || data === "mail exist"){
							$('#regMsg').show().text(data).addClass("alert-danger");

							setTimeout(
								function() {
									$('#regMsg').fadeOut().removeClass("alert-danger");
								}, 2000);
						}
					}
				});
			});
			
		}
	});
})(jQuery);