$(document).ready(function(){
	var orderArray = [];
	if (Cookies.get('name')==undefined) {
		var counter = 0;
		document.getElementById("shop-basket").innerHTML = "("+0+")";

	}else{
		var counter =parseInt(Cookies.get('name'));
		document.getElementById("shop-basket").innerHTML = "("+parseInt(Cookies.get('name'))+")";

	}
	
	$('#send-order').click(function(){
		var orderName = $(".orderName").text();
		orderArray = orderName.split(",");
		var orderPrice = $(".orderPrice").text();
/*		var orderPrice = $("#order-price").text().replace(/[^\d.]/g,'');
		var description = $("textarea#description").val();
		var withNoDigits = order.replace(/[0-9]/g, '');
		 orderArray = withNoDigits.split("€").join(","); 
		*/
		data = "order="+ orderName;
        data += "&price="+orderPrice;
        data += "&descr="+description;
        $.ajax({
            type: "POST",
            url: '/send-order',
            data: data

        });
/*        setTimeout(function(){
        	location.reload();           
        },500)*/
	});

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


	$('#offer1').click(function(){
		var priceOffer1 = $('#priceOffer1').text();

		data = "price="+ priceOffer1;
		data += "&name=Offer 1";
		$.ajax({
			type: "POST",
			url: '/cart',
			data: data
		});
	});

	$('#offer2').click(function(){
		var priceOffer2 = $('#priceOffer2').text();

		data = "price="+ priceOffer2;
		data += "&name=Offer 2";
		$.ajax({
			type: "POST",
			url: '/cart',
			data: data
		});
	});

	$('#offer3').click(function(){
		var priceOffer3 = $('#priceOffer3').text();

		data = "price="+ priceOffer3;
		data += "&name=Offer 3";
		$.ajax({
			type: "POST",
			url: '/cart',
			data: data
		});
	});
	
});