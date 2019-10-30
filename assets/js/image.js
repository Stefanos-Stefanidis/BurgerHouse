$(document).ready(function(){

	$('#image').on('change', function() {
  		$("#loadImg").attr("src","/images/uploads/"+this.value);
	});

	$('#image').chosen();
	$('#categorySelect').chosen();

	var currentImage = $("#currentImage").text().replace(/\s/g,'');
	var currentCategory = $("#currentCategory").text().replace(/\s/g,'');
	
	$('#image').val(currentImage);
	$('#image').trigger("chosen:updated");

	$('#categorySelect').val(currentCategory);
	$('#categorySelect').trigger("chosen:updated");
	
});