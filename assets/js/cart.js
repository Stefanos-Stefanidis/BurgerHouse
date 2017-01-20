$(document).ready(function(){
	var orderArray = [];
	var url = document.URL;
    var lastPart = url.split("/").pop();
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
		var orderPrice = $(".orderPrice").text().replace(/[^\d.]/g,'');
		var description = $("textarea#description").val();
		data = "order="+ orderName;
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
		$( "#offerSendMsg" ).show(1000);
			setTimeout(function(){
				$( "#offerSendMsg" ).hide(1000);
			},2000)
		setTimeout(function () {
			$("#shop-basket").removeClass("animated wobble");			
		}, 1200)
	});



	$('.rate').click(function(){
		var rate = $('input[name=star]:checked').val();
		

		data = "prid="+ lastPart;
		data += "&rate="+rate;
		$.ajax({
			type: "POST",
			url: '/rate',
			data: data
		});
	});



	$('#offer1').click(function(){
		var priceOffer1 = $('#priceOffer1').text();
		$( "#offerSendMsg" ).show(1000);
		setTimeout(function(){
			$( "#offerSendMsg" ).hide(1000);
		},2000)

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
		$( "#offerSendMsg" ).show(1000);
		setTimeout(function(){
			$( "#offerSendMsg" ).hide(1000);
		},2000)

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
		$( "#offerSendMsg" ).show(1000);
		setTimeout(function(){
			$( "#offerSendMsg" ).hide(1000);
		},2000)

		data = "price="+ priceOffer3;
		data += "&name=Offer 3";
		$.ajax({
			type: "POST",
			url: '/cart',
			data: data
		});
	});
	


});