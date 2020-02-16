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
        
        var request = makeAjaxRequest("/addToCart?productId=" + productId+"&productQuantity=" + productQuantity + "&productComment=" + productComment );

        request.done(function (data, textStatus, jqXHR) {
            $('#NumOfPrInCart').text(numOfProductsInBasktet)  
            $('#qtModal').modal('hide');
            var message = data.message;
            warnings('success', message);
        });
        request.fail(function (data, textStatus, jqXHR) {

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

        var rateRequest = makeAjaxRequest("/rate?prid=" + productId+"&rate=" + rate );

        rateRequest.done(function (data, textStatus, jqXHR) {
            var message = data.message;
            warnings('success', message);
        });
        rateRequest.fail(function (data, textStatus, jqXHR) {

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

    var addOffer = makeAjaxRequest("/singleOffer?uuid=" + uuid);
    addOffer.done(function (data, textStatus, jqXHR) {
        var message = data.message;
        warnings('success', message);
    });

    addOffer.fail(function (data, textStatus, jqXHR) {
        warnings('danger', 'Failed')
    });

}