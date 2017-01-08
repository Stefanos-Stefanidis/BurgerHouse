$(document).ready(function(){
	if (Cookies.get('name')==undefined) {
		var counter = 0;
		document.getElementById("shop-basket").innerHTML = "("+0+")";

	}else{
		var counter =parseInt(Cookies.get('name'));
		document.getElementById("shop-basket").innerHTML = "("+parseInt(Cookies.get('name'))+")";

	}
	
	$('.addCart').click(function(){
		$("#shop-basket").addClass("animated wobble");
		Cookies.set('name', counter += 1);
		
		document.getElementById("shop-basket").innerHTML = "("+parseInt(Cookies.get('name'))+")";
	
		var productPrice = $('#prprice').text();
		var productName = $('#prname').text();

		data = "price="+ productPrice;
		data += "&name="+productName;
		$.ajax({
			type: "POST",
			url: '/cart',
			data: data

		});

		setTimeout(function () {
			$("#shop-basket").removeClass("animated wobble");			
		}, 1200)
	});
	
});