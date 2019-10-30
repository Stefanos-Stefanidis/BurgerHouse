$(document).ready(function () {
    validateOrder();
    var productId = $('.addCart').data('prId');

    var productPrice = parseFloat($('#productPrice').text());

    $('.addCart').click(function () {
        $('#qtModal').modal('show');
    });

    $('.add-to-basket').click(function (e) { 
        var numOfProductsInBasktet = parseInt($('#NumOfPrInCart').text()) + 1;
        var productQuantity = $('.add-to-basket').data('quantity');
        var productComment = $('#prComment').val();
        
        var request = $.ajax({
            url: "/addToCart/"+productId,
            method: "POST",
            data: { 
                productQuantity : productQuantity,
                productComment : productComment,
              }
          });
          request.done(function( msg ) {
            $('#NumOfPrInCart').text(numOfProductsInBasktet)  
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

        data = "prid=" + productId;
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

function addOfferToBasket(uuid) {
    console.log(uuid);

    var request = $.ajax({
        url: "/singleOffer",
        method: "POST",
        data: { 
            uuid: uuid
          }
      });
      request.done(function( data ) {
        console.log(data.response)
      });
}