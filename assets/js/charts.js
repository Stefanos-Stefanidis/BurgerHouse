$(document).ready(function () {

    topRates();
    topProducts();
    
});

function topRates() {

    var getRates = makeAjaxRequest("/charts-rate-data");
    getRates.done(function (data, textStatus, jqXHR) {

        var names = data.names;
        var rates = data.rates;

        makeC3Bar('#topRatedProducts', names, rates);

    });
    getRates.fail(function (data, textStatus, jqXHR) {
        warnings('danger', 'Failed')
    });

}

function topProducts() {

    var getProducts = makeAjaxRequest("/charts-top-products-data");
    getProducts.done(function (data, textStatus, jqXHR) {

        var names = data.names;
        var quantity = data.quantity;

        makeC3Bar('#barProductsPurchased', names, quantity);

    });
    getProducts.fail(function (data, textStatus, jqXHR) {
        warnings('danger', 'Failed')
    });

}


function makeC3Bar(bindtoSelector, columnOne, columnTwo) {

    var chart = c3.generate({
        bindto: bindtoSelector,
        bar: {
            width: 15,
            space: 15
        },
        data: {
            x: 'Names',
            columns: [
                columnOne,
                columnTwo
            ],

            type: 'bar',
            labels: true
        },
        axis: {
            x: {
                type: 'category'
            }
        },

    });
}