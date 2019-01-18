var gpg = {
    CreditCard: function () {
        this.process = 'gpg';
    },
    init: function () {
        gpg.CreditCard.prototype.name = '';
        gpg.CreditCard.prototype.number = '';
        gpg.CreditCard.prototype.expiration = '';
        gpg.CreditCard.prototype.cvv = '';
        // $("#gpg-card-number").inputmask({
        //     "mask": "9",
        //     "repeat": 19,
        //     "greedy": false
        // });

        $("#gpg-card-number").inputmask("mask", {
            "mask": "9999-9999-9999-9999",
        }); //specifying fn & options

        $("#gpg-expiration").inputmask("m/y", {
            autoUnmask: true,
            "placeholder": "mm/yyyy"
        }); //direct mask
        $("#gpg-cvv").inputmask({
            "mask": "9",
            "repeat": 4,
            "greedy": false,
            // "placeholder": "CVV"
        }); // ~ mask "9" or mask "99" or ... mask "9999999999"
    },
    payment: function () {
        var card = new gpg.CreditCard();
        card.name = $("#gpg-name-card").val();
        card.number = $("#gpg-card-number").val();
        card.expiration = $("#gpg-expiration").val();
        card.cvv = $("#gpg-cvv").val();
        return card;
    }
};

$(window).load(function () {
    gpg.init();
});

