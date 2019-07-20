$(document).ready(function () {
    validateOrder();
    var orderArray = [];
    var url = document.URL;
    var lastPart = url.split("/").pop();
    var orderName = $(".orderName").text();
    if (orderName !== '') {
        $('#send-order').removeClass('disabled');
        $('#send-order').prop("disabled", false);
    }
    var productId ;
    var productPrice = parseFloat($('#productPrice').text());

    $('.addCart').click(function () {

        productId = $(this).data('prId');
        $('#qtModal').modal('show');

    });

    $('.add-to-basket').click(function (e) { 

        var productQuantity = $('.add-to-basket').data('quantity');
        
        var request = $.ajax({
            url: "/addToCart/"+productId,
            method: "POST",
            data: { 
                productQuantity : productQuantity,
              }
          });
          request.done(function( msg ) {
            $('#qtModal').modal('hide');
            $("#offerSendMsg").show(1000);
            setTimeout(function () {
                $("#offerSendMsg").hide(1000);
            }, 2000)
            setTimeout(function () {
                $("cart-font-size").removeClass("animated wobble");
            }, 1200)
          });

        
    });
    $('.add').click(function () {
        if (parseInt($('#productQuantity').text()) < 99) {

            $('#productQuantity').text(+parseInt($('#productQuantity').text()) + 1);
            $('#productPrice').text(parseInt($('#productQuantity').text()) * productPrice);
            $('.add-to-basket').attr('data-quantity', $('#productQuantity').text());
            $('.add-to-basket').data('quantity', $('#productQuantity').text());
        }
    });
    $('.sub').click(function () {
        if (parseInt($('#productQuantity').text()) > 1) {
            $('#productQuantity').text(+parseInt($('#productQuantity').text()) - 1);
            $('#productPrice').text(parseInt($('#productQuantity').text()) * productPrice);
            $('#add-to-basket').data('productQuantity', $('#productQuantity').text());
            $('.add-to-basket').attr('data-quantity', $('#productQuantity').text());
            $('.add-to-basket').data('quantity', $('#productQuantity').text());
        }
    });


    $('.rate').click(function () {
        var rate = $('input[name=star]:checked').val();


        data = "prid=" + lastPart;
        data += "&rate=" + rate;
        $.ajax({
            type: "POST",
            url: '/rate',
            data: data
        });
    });

    $('#dlt-product a').click(function () {
        Cookies.set('name', counter -= 1);
    });

    $('#offer1').click(function () {
        var priceOffer1 = $('#priceOffer1').text();
        $("#offerSendMsg").show(1000);
        setTimeout(function () {
            $("#offerSendMsg").hide(1000);
        }, 2000)
        Cookies.set('name', counter += 1);
        $("#shop-basket").html("(" + parseInt(Cookies.get('name')) + ")");
        data = "price=" + priceOffer1;
        data += "&name=Offer 1";
        $.ajax({
            type: "POST",
            url: '/cart',
            data: data
        });
    });

    $('#offer2').click(function () {
        var priceOffer2 = $('#priceOffer2').text();
        $("#offerSendMsg").show(1000);
        setTimeout(function () {
            $("#offerSendMsg").hide(1000);
        }, 2000)
        Cookies.set('name', counter += 1);
        $("#shop-basket").html("(" + parseInt(Cookies.get('name')) + ")");
        data = "price=" + priceOffer2;
        data += "&name=Offer 2";
        $.ajax({
            type: "POST",
            url: '/cart',
            data: data
        });
    });

    $('#offer3').click(function () {
        var priceOffer3 = $('#priceOffer3').text();
        $("#offerSendMsg").show(1000);
        setTimeout(function () {
            $("#offerSendMsg").hide(1000);
        }, 2000)
        Cookies.set('name', counter += 1);
        $("#shop-basket").html("(" + parseInt(Cookies.get('name')) + ")");
        data = "price=" + priceOffer3;
        data += "&name=Offer 3";
        $.ajax({
            type: "POST",
            url: '/cart',
            data: data
        });
    });


    function validateOrder() {
        var name = $('#first_name').val();
        var lastname = $('#last_name').val();
        var address = $('#address').val();
        var number = $('#phone_number').val();
        var email = $('#email_address').val();
        if (name && lastname && address && number && email) {
            return true;
        } else {
            return false;
        }
    }
});