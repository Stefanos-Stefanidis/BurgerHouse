(function  ($) {

	$(document).ready(function(){

/*		$("#loginBtn").click(function(){
				login(); 
				console.log('hey there');
		});*/
		

	});


	function login() {

		var username = $("#username").val();
		var password = $("#password").val();

		
		data = "username="+ username;
		data += "&password="+password;

		$.ajax({
			type: "POST",
			url: 'login',
			data: data

		});
	}

})(jQuery);