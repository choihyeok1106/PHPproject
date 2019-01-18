var AddrType = {
    Shipping: 1,
    Billing: 0
};

var Addr = function () {
    this.nullable = true;
};

Addr.prototype.nullable = true;
Addr.prototype.country = '';
Addr.prototype.state = '';
Addr.prototype.city = '';
Addr.prototype.county = '';
Addr.prototype.street1 = '';
Addr.prototype.street2 = '';
Addr.prototype.zipcode = '';
Addr.prototype.phone1 = '';
Addr.prototype.phone2 = '';
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
Addr.prototype.getAttrs = function () {
    return {
        'id': this.id,
        'country': this.country,
        'state': this.state,
        'city': this.city,
        'county': this.county,
        'street1': this.street1,
        'street2': this.street2,
        'zipcode': this.zipcode,
        'phone1': this.phone1,
        'phone2': this.phone2,
    };
}

var Checkout = {
    ship: null,
    bill: null,
    addrs: null,
    methods: null,
    init: function () {
        setTimeout(Checkout.initShippingAddr);
        setTimeout(Checkout.initBillingAddr);
        setTimeout(Checkout.initCheckout);
    },
    initCheckout: function () {
        $("#btn-place-order").click(function () {
            var terms = [];
            var shipping_method_id = 0;
            var payment = ship = bill = null;
            var i = $("input[name=shipping-method]:checked").val();
            var shipping_method = Checkout.methods[i];
            if (shipping_method !== undefined && shipping_method !== null) {
                shipping_method_id = shipping_method.id;
            }
            var payment_id = $("#payments .panel-collapse.in").attr('data-id');
            var payment_action = $("#payments .panel-collapse.in").attr('data-action');
            if (window[payment_action] !== undefined) {
                var payment_method = window[payment_action];
                if (typeof payment_method === 'object' && typeof payment_method.payment === 'function') {
                    payment = payment_method.payment();
                    payment.id = payment_id;
                }
            }
            if (Checkout.ship !== null) {
                ship = Checkout.ship.getAttrs();
            }
            if (Checkout.bill !== null) {
                bill = Checkout.bill.getAttrs();
            }
            $("input[name=terms]:checked").each(function () {
                terms[terms.length] = $(this).val();
            });
            Ajax.post("/a/shopping/place", {
                shipping: ship,
                billing: bill,
                shipping_method: shipping_method_id,
                payment: payment,
                invoice: $("input[name=ship-invoice]:checked").val(),
                notice: $("#ship-notice").val(),
                terms: terms,
            }, {
                ok: function (res) {
                    console.log(res);
                },
                no: function (err) {
                    console.log(err);
                },
                before: function () {
                    $("#btn-place-order").attr("disabled", true);
                },
                end: function () {
                    $("#btn-place-order").removeAttr("disabled");
                }
            });
        });
    },
    initShippingAddr: function () {
        $("#shipping-btn").click(function () {
            Checkout.AddressPopup(1);
        });
        Ajax.get("/a/address/default", {
            type: 1
        }, {
            ok: function (shipping) {
                Checkout.RenderShip(shipping);
            },
            no: function (err) {
                console.log(err);
            }
        });
    },
    initBillingAddr: function () {
        $("#billing-btn").click(function () {
            Checkout.AddressPopup(2);
        });
        Ajax.get("/a/address/default", {
            type: 2
        }, {
            ok: function (billing) {
                Checkout.RenderBill(billing);
            },
            no: function (err) {
                console.log(err);
            }
        });
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
                    '        <button type="button" data-id="{{$id}}" data-toggle="addr-change" class="btn dark btn-block">Deliver to this address</button>\n' +
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
            Ajax.get("/a/shopping/shippings", {
                country: Checkout.ship.country,
                state: Checkout.ship.state,
                city: Checkout.ship.city,
                county: Checkout.ship.county,
                zipcode: Checkout.ship.zipcode,
            }, {
                ok: function (methods) {
                    Checkout.methods = methods;
                    Checkout.RenderMethods();
                },
                no: function (err) {
                    console.log(err);
                },
                before: function () {
                    Checkout.methods = null;
                    $("#shipping-methods").html("");
                    $("#btn-place-order").attr("disabled", true);
                    Loader.show();
                },
                end: function () {
                    Loader.hide();
                }
            });
        }
    },
    RenderMethods: function () {
        if (Checkout.methods !== null) {
            var ui = '<label><input type="radio" name="shipping-method" value="{{$k}}"> {{$name}}</label>';
            var html = '';
            $.each(Checkout.methods, function (k, v) {
                var label = ui;
                label = label.replace('{{$k}}', k);
                label = label.replace('{{$name}}', v.name);
                html += label;
            });
            $("#shipping-methods").html(html);
            $("input[name=shipping-method]").change(function () {
                var i = $("input[name=shipping-method]:checked").val();
                Checkout.CheckMethod(i);
            });
            $("input[name=shipping-method]").eq(0).attr('checked', true);
            Checkout.CheckMethod(0);
            $("#btn-place-order").removeAttr("disabled");
        }
    },
    CheckMethod: function (i) {
        if (Checkout.methods !== null) {
            var method = Checkout.methods[i];
            if (method !== undefined) {
                $("#total-qv").text(method.qv);
                $("#total-items").text(method.items);
                $("#total-tax").text(method.tax);
                $("#total-handling").text(method.handling);
                $("#total-shipping").text(method.shipping);
                $("#total-discount").text(method.discount);
                $("#total-grand").text(method.total);
            }
        }
    }
};

$(window).load(function () {
    Checkout.init();
});