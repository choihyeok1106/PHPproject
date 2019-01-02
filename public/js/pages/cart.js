var Cart = {
    init: function () {
        setTimeout(Cart.initItems());
        setTimeout(Cart.initPromotions());
    },
    initItems: function () {
        var update = function (elm, sku, qty) {
            Ajax.post("/a/cart/update", {
                sku: sku,
                qty: qty
            }, {
                ok: function (res) {
                    if (!res.hasOwnProperty("error")) {
                        console.log(res);
                    }
                },
                no: function (err) {
                    console.log(err);
                },
                before: function () {
                    elm.attr("disabled", 'true');
                },
                end: function () {
                    elm.removeAttr("disabled");
                }
            });
        };
        Ajax.get("/a/cart/items", null, {
            ok: function (res) {
                console.log(res);
                var delItem = function (btn, sku) {
                    Ajax.post("/a/cart/delete", {
                        sku: sku
                    }, {
                        ok: function (res) {
                            if (!res.hasOwnProperty("error")) {
                                $(".product-row[data-sku=" + sku + "]").remove();
                            }
                        },
                        no: function (err) {
                            console.log(err);
                        },
                        before: function () {
                            btn.attr("disabled", 'true');
                        },
                        end: function () {
                            btn.removeAttr("disabled");
                        }
                    });
                };
                if (!res.hasOwnProperty('error') && res.hasOwnProperty('items') && res.hasOwnProperty('total')) {
                    // totals
                    $("#pv-total").text(res['total']['qv']);
                    $("#sub-total").text('$' + res['total']['items']);
                    // $("#tax-total").text('$' + res['total']['tax']);
                    // $("#handling-total").text('$' + res['total']['handling']);
                    // $("#shipping-total").text('$' + res['total']['shipping']);
                    // $("#discount-total").text('$' + res['total']['discount']);
                    // $("#order-total").text('$' + res['total']['total']);
                    // item-list
                    var html = '';
                    var ui = '<tr class="product-row" data-sku="{{$sku}}">\n' +
                        '    <td class="text-center">\n' +
                        '        <a href="/product/{{$sku}}" class="thumbnail">\n' +
                        '            <img src="{{$image}}">\n' +
                        '        </a>\n' +
                        '    </td>\n' +
                        '    <td>\n' +
                        '        <div class="row">\n' +
                        '            <div class="col-md-6 list-name">\n' +
                        '                <a href="/product/{{$sku}}">{{$title}}</a>\n' +
                        '            </div>\n' +
                        '            <div class="col-md-2 list-price">\n' +
                        '                <p class="price text-danger">{{$price}}</p>\n' +
                        '            </div>\n' +
                        '            <div class="col-md-2 list-val">\n' +
                        '                <p class="pv">{{$pv}} PV</p>\n' +
                        '            </div>\n' +
                        '            <div class="col-md-2 list-qty">\n' +
                        '                <select class="qty" data-sku="{{$sku}}" data-count="{{$qty}}"></select>\n' +
                        '            </div>\n' +
                        '            <div class="col-md-6 list-action">\n' +
                        '                <button type="button" class="del" data-sku="{{$sku}}">Delete</button>\n' +
                        '            </div>\n' +
                        '        </div>\n' +
                        '    </td>\n' +
                        '</tr>';
                    $.each(res['items'], function (k, v) {
                        var row = ui;
                        row = row.replace(/{{\$sku}}/g, v['sku']);
                        row = row.replace('{{$image}}', v['thumbnail']);
                        row = row.replace('{{$title}}', v['title']);
                        row = row.replace('{{$price}}', Util.numberFormat(v['price'], 2));
                        row = row.replace('{{$pv}}', Util.numberFormat(v['qv']));
                        row = row.replace('{{$qty}}', Util.numberFormat(v['quantity']));
                        html += row;
                    });
                    if (html) {
                        $("#cart-items").html(html);
                        html = '';
                        for (var i = 1; i <= 99; i++) {
                            html += '<option>' + i + '</option>';
                        }
                        $("select.qty").each(function () {
                            $(this).html(html);
                            var sku = $(this).attr('data-sku');
                            var val = parseInt($(this).attr('data-count'));
                            if (!isNaN(val)) {
                                $(this).val(val);
                            }
                            $(this).change(function () {
                                if (sku) {
                                    update($(this), sku, $(this).val());
                                }
                            });
                        });
                        $("#cart-items .del").click(function () {
                            var sku = $(this).attr('data-sku');
                            if (sku) {
                                delItem($(this), sku);
                            }
                        });
                    }
                }
            },
            no: function (err) {
                console.log(err);
            }
        });
    },
    initPromotions: function () {
        Ajax.get("/a/shopping/promotions", null, {
            ok: function (res) {
                if (!res.hasOwnProperty("error")) {
                    console.log(res);
                    var html = '';
                    $.each(res, function (k, v) {
                        html += '<option value="' + v['id'] + '">' + v['name'] + '</option>';
                    });
                    if (html) {
                        var changeDesc = function () {
                            $(".promotions .well").text(res[$(".promotions select").val()]['description']);
                        };
                        $(".promotions select").html(html);
                        $(".promotions select").selectpicker();
                        changeDesc();
                        $(".promotions select").change(function () {
                            changeDesc();
                        });
                        $(".promotions").show();
                    }
                }
            },
            no: function (err) {
                console.log(err);
            }
        });
    }
};

$(window).load(function () {
    // After init home Then Init Dragger
    Cart.init()
});