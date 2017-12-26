$(document).ready(function(){

	$('#image').on('change', function() {
  		$("#loadImg").attr("src","/images/uploads/"+this.value);
	});
	
});