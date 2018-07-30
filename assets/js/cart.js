$(document).ready(function () {
    validateOrder();
    var orderArray = [];
    var url = document.URL;
    var lastPart = url.split("/").pop();
    var orderName = $(".orderName").text();
    if (orderName !== '') {
        $('#send-order').removeClass('disabled');
    }

/*     $('#send-order').click(function () {
        if (validateOrder()) {
            orderName = $(".orderName").text();
            orderArray = orderName.split(",");
            var orderPrice = $(".orderPrice").text().replace(/[^\d.]/g, '');
            var description = $("textarea#description").val();
            var name = $("#first_name").val();
            var lastname = $("#last_name").val();
            var email = $("#email_address").val();
            var phone = $("#phone_number").val();
            var address = $("#address").val();

            data = "order=" + orderName;
            data += "&price=" + orderPrice;
            data += "&descr=" + description;
            data += "&firstName=" + name;
            data += "&lastName=" + lastname;
            data += "&email=" + email;
            data += "&phone=" + phone;
            data += "&address=" + address;
            $.ajax({
                type: "POST",
                url: '/send-order',
                data: data

            });
            setTimeout(function () {
                location.reload();
            }, 500)
        } else {
            alert('nop');
        }

    }); */

    $('.addCart').click(function () {
        $(".cart-font-size").addClass("animated wobble");
        var NumOfPrInCart = $("#NumOfPrInCart").text();        
        NumOfPrInCart++;
        $("#NumOfPrInCart").text(NumOfPrInCart);
        var productPrice = $('#prprice').text();
        var productName = $('#prname').text();

        data = "price=" + productPrice;
        data += "&name=" + productName;
        $.ajax({
            type: "POST",
            url: '/cart',
            data: data

        });
        $("#offerSendMsg").show(1000);
        setTimeout(function () {
            $("#offerSendMsg").hide(1000);
        }, 2000)
        setTimeout(function () {
            $("cart-font-size").removeClass("animated wobble");
        }, 1200)
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