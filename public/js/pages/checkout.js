var Checkout = {
    id: 0,
    init: function () {
        Checkout.id = parseInt($(".page-title").first().attr('data-id'));
        if (Checkout.id && !isNaN(Checkout.id)) {
            setTimeout(Checkout.initPromotions);
            setTimeout(Checkout.initShippings);
            setTimeout(Checkout.initPayments);
        }

    },
    initItems: function () {
        Ajax.get("/a/checkout/items/" + Checkout.id, null, {
            ok: function (res) {
                console.log(res)
            },
            no: function (err) {
                console.log(err);
            },
            before: function () {

            },
            end: function () {

            }
        });
    },
    initPromotions: function () {
        console.log("initPromotions");
    },
    initShippings: function () {
        Ajax.get("/a/checkout/shippings", null, {
            ok: function (res) {
                console.log(res)
            },
            no: function (err) {
                console.log(err);
            }
        });
    },
    initPayments: function () {
        console.log("initPayments");
    }
}

$(window).load(function () {
    Checkout.init();
});