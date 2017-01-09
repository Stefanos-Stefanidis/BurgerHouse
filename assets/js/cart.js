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
		var order = $("#order").text();
		var orderPrice = $("#order-price").text().replace(/[^\d.]/g,'');
		var description = $("textarea#description").val();
		var withNoDigits = order.replace(/[0-9]/g, '');
		 orderArray = withNoDigits.split("€").join(","); 
		data = "order="+ orderArray;
        data += "&price="+orderPrice;
        data += "&descr="+description;
        $.ajax({
            type: "POST",
            url: '/send-order',
            data: data

        });
        setTimeout(function(){
        	location.reload();           
        },500)
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
	
});