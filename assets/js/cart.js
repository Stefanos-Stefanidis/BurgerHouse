$(document).ready(function(){

	var counter = 0;
	function add() {
    return counter += 1;
}

	$('.addCart').click(function(){
		$("#shop-basket").addClass("animated wobble");
		document.getElementById("shop-basket").innerHTML = add();
		var productPrice = $('#prprice').text();
		var productName = $('#prname').text();

		data = "price="+ productPrice;
		data += "&name="+productName;
		$.ajax({
			type: "POST",
			url: '/BurgerHouse/web/cart',
			data: data

		});
		
		setTimeout(function () {
			$("#shop-basket").removeClass("animated wobble");			
		}, 1400)
	});
	
});