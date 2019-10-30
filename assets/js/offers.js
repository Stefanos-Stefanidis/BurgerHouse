$(document).ready(function(){

    $('#product_table').DataTable();

});

var productIdArray = [];
function addToOffer(rowNum) {
    var productTable = $('#product_table').DataTable();
    var rows = productTable.rows( rowNum ).data();
    var productId = rows[0][0];
    var productName = rows[0][1];
    var productPrice = rows[0][2];

    var productPriceFloat =  parseFloat(productPrice);
    var currentTotalPrice = parseFloat($('#totalPrice').text());
    var newTotalPrice = currentTotalPrice + productPriceFloat;
    productIdArray.push(productId)
    $('#productIds').val(productIdArray.toString())
    $('#totalPrice').text(newTotalPrice);
    $('#newOffer').append('<h4>'+ productName + ' ' + productPrice +'<span class="fa fa-minus text-danger cursor-pointer" onClick="removeFromOffer(this, '+productPriceFloat+','+productId+')"></span></h4>')
}

function removeFromOffer(thisObj, productPrice, productId){
    currentTotalPrice 
    $(thisObj).parent().remove();
    var currentTotalPrice = parseFloat($('#totalPrice').text());
    var newTotalPrice = currentTotalPrice - productPrice;

    $('#totalPrice').text(newTotalPrice);

    for( var i = 0; i < productIdArray.length; i++){ 
        if ( productIdArray[i] == productId) {
            productIdArray.splice(i, 1); 
            break;
        }
    }
    $('#productIds').val(productIdArray.toString())
}




