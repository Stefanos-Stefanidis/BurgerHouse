$(document).ready(function(){

	$('#image').on('change', function() {
  		$("#loadImg").attr("src","/images/products/"+this.value);
	});
	
});