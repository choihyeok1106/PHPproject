var Checkout = {
    init: function () {
        setTimeout(Checkout.initItems());
        setTimeout(Checkout.initPromotions());
        setTimeout(Checkout.initShippings());
        setTimeout(Checkout.initPayments());
    },
    initItems:function(){

    },
    initPromotions:function(){

    },
    initShippings: function () {

    },
    initPayments:function () {

    }
}

$(window).load(function () {
    // After init home Then Init Dragger
    Checkout.init()
});