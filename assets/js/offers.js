$(document).ready(function(){
    var url = document.URL;
    var lastPart = url.split("/").pop();
    var prPrice=[];
    console.log(lastPart);
    $('.return').click(function(){
        var href = $(this).attr('href');
        var id = href.split("/").pop();
        data = "removeid="+ id;
        $.ajax({
            type: "POST",
            url: '/remove',
            data: data
        });
        setTimeout(function () {
           location.reload();           
        }, 500)
        return false;
    });
    $('#send-offer').click(function(){
        var offer = $("#offer-box").text();
        var withNoDigits = offer.replace(/[0-9]/g, '');
        console.log(prPrice);
        var noDots = withNoDigits.split('.').join("");
        var offerArray = noDots.split(",€"); 
        var total =  $("#total-price").text();
        data = "products="+ offerArray;
        data += "&price="+prPrice;
        data += "&offer="+lastPart;
        $.ajax({
            type: "POST",
            url: '/post-offer',
            data: data

        });
         setTimeout(function () {
            location.reload();           
        }, 1000)
        
    });

    $('.pr-panel').click(function(){
        var prname = $(this).text() ;
        var price = prname.replace(/[^\d.]/g,'');
        
        prPrice = prPrice + prname.replace(/[^\d.]/g,'')+ ",";
        var total =  $("#total-price").text();
        $("#offer-box").append('<h4> '+prname+'</h4>');
        $(this).addClass("bg-success");
        $("#total-price").html(parseFloat(price)+parseFloat(total)+'&euro;');
        console.log(prname);
        console.log(price);
        $("#create-offer-box").addClass("animated shake");
        setTimeout(function () {
            $("#create-offer-box").removeClass("animated shake");           
        }, 1200)

        setTimeout(function () {
            $(".pr-panel").removeClass("bg-success");
        }, 1500)
    });
});