var AddrType = {
    Shipping: 1,
    Billing: 0
};

var Addr = function () {
};

Addr.prototype.nullable = true;
Addr.prototype.country = '';
Addr.prototype.state = '';
Addr.prototype.city = '';
Addr.prototype.county = '';
Addr.prototype.street1 = '';
Addr.prototype.street2 = '';
Addr.prototype.street3 = '';
Addr.prototype.zipcode = '';
Addr.prototype.phone1 = '';
Addr.prototype.phone2 = '';
Addr.prototype.button = '';
Addr.prototype.attr = function (data) {
    if (typeof data === 'object' && data != null) {
        this.nullable = false;
        let addr = this;
        $.each(data, function (k, v) {
            addr[k] = v;
        });
    } else {
        this.nullable = true;
    }
};
Addr.prototype.view = function () {
    var html = '';
    if (!this.nullable) {
        html += '<p>' + this.name + '</p>';
        html += '<p>' + this.addr1() + '</p>';
        html += '<p>' + this.addr2() + '</p>';
        html += '<p>' + this.phone1 + '</p>';
    }
    return html;
};
Addr.prototype.addr1 = function () {
    return this.street1 + ' ' + this.street2;
};
Addr.prototype.addr2 = function () {
    return this.city + ', ' + this.state + ' ' + this.zipcode
};
Addr.prototype.isShip = function () {
    return this.type === AddrType.Shipping;
}
var Checkout = {
    ship: null,
    bill: null,
    addrs: null,
    init: function () {
        setTimeout(Checkout.initPromotions);
        setTimeout(Checkout.initShippings);
        setTimeout(Checkout.initPayments);

    },
    initPromotions: function () {
        console.log("initPromotions");
    },
    initShippings: function () {
        $("#shipping-btn").click(function () {
            Checkout.AddressPopup(1);
        });
        $("#billing-btn").click(function () {
            Checkout.AddressPopup(2);
        });
        Ajax.get("/a/address/default", null, {
            ok: function (res) {
                var shipping = billing = null;
                if (res != null) {
                    if (res.hasOwnProperty('shipping')) {
                        shipping = res.shipping;
                    }
                    if (res.hasOwnProperty('billing')) {
                        billing = res.billing;
                    }
                }

                Checkout.RenderShip(shipping);
                Checkout.RenderBill(billing);
            },
            no: function (err) {
                console.log(err);
            }
        });
    },
    initPayments: function () {
        console.log("initPayments");
    },
    RenderShip: function (addr) {
        Checkout.ship = new Addr;
        Checkout.ship.attr(addr);
        $("#shipping-addr").html(Checkout.ship.view());
        Checkout.GetShippings();
    },
    RenderBill: function (addr) {
        Checkout.bill = new Addr;
        Checkout.bill.attr(addr);
        $("#billing-addr").html(Checkout.bill.view());
    },
    AddressPopup: function (type) {
        Ajax.get("/a/address", {
            type: type
        }, {
            ok: function (items) {
                var ui = '<div class="col-md-4">\n' +
                    '    <div class="addrs">\n' +
                    '        <div>\n' +
                    '            <h4>{{$name}}</h4>\n' +
                    '            <p>{{$addr1}}</p>\n' +
                    '            <p>{{$addr2}}</p>\n' +
                    '            <p>{{$phone}}</p>\n' +
                    '        </div>\n' +
                    '        <button type="button" data-id="{{$id}}" data-toggle="addr-change" class="btn dark btn-block">{{$button}}</button>\n' +
                    '    </div>\n' +
                    '</div>';
                Checkout.addrs = items;
                $.each(items, function (k, v) {
                    var addr = new Addr();
                    var box = ui;
                    addr.attr(v);
                    box = box.replace('{{$id}}', addr.id);
                    box = box.replace('{{$name}}', addr.name);
                    box = box.replace('{{$addr1}}', addr.addr1());
                    box = box.replace('{{$addr2}}', addr.addr2());
                    box = box.replace('{{$phone}}', addr.phone1);
                    box = box.replace('{{$button}}', addr.button);
                    $("#address-list-box").append(box);
                });

                $("#address-list").modal('show');

                $(".btn[data-toggle=addr-change]").click(function () {
                    var id = $(this).attr('data-id');
                    if (Checkout.addrs != null) {
                        $.each(Checkout.addrs, function (k, v) {
                            console.log(id, v.id)
                            if (id == v.id) {
                                if (type === AddrType.Shipping) {
                                    Checkout.RenderShip(v);
                                } else {
                                    Checkout.RenderBill(v);
                                }
                            }
                        })
                    }
                    $("#address-list").modal('hide');
                });

            },
            no: function (err) {
                console.log(err);
            },
            before: function () {
                Checkout.addrs = null;
                $("#address-list-box").html("");
                Loader.show();
            },
            end: function () {
                Loader.hide();
            }
        });

    },
    GetShippings: function () {
        if (Checkout.ship !== null && !Checkout.nullable) {
            Ajax.post("/a/shipping/methods", {
                country: Checkout.ship.country,
                state: Checkout.ship.state,
                city: Checkout.ship.city,
                zipcode: Checkout.ship.zipcode,
            }, {
                ok: function (res) {
                    console.log(res)
                },
                no: function (err) {
                    console.log(err);
                },
                before: function () {
                    Loader.show();
                },
                end: function () {
                    Loader.hide();
                }
            });
        }
    }
}

$(window).load(function () {
    Checkout.init();
});