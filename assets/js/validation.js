
function subscribe() {

	$("#result").text("");
	var email = $("#userMail").val().replace(/\s+/g, '');


	
	if (validateEmail(email)) {
		var subscribe = makeAjaxRequest("/newslettter?usermail=" + email);
		subscribe.done(function (data, textStatus, jqXHR) {
			var message = data.message;

			if (data.error == 1) {
				warnings('danger', message);
			}
			
			warnings('success', message);
		});
	
		subscribe.fail(function (data, textStatus, jqXHR) {
	
		});
		
		return;
	}
	warnings('danger', 'Email is not valid');
}

function validateEmail(email) {
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}