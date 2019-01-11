var Cart = {
    items: null,
    totals: null,
    init: function () {
        setTimeout(Cart.initItems);
        // setTimeout(Cart.initPromotions);
    },
    initItems: function () {
        Ajax.get("/a/cart/items", null, {
            ok: function (items, meta) {
                // totals
                // $("#pv-total").text(res['total']['qv']);
                // $("#sub-total").text('$' + res['total']['items']);
                // $("#tax-total").text('$' + res['total']['tax']);
                // $("#handling-total").text('$' + res['total']['handling']);
                // $("#shipping-total").text('$' + res['total']['shipping']);
                // $("#discount-total").text('$' + res['total']['discount']);
                // $("#order-total").text('$' + res['total']['total']);
                // item-list
                Cart.items = items;
                Cart.totals = meta;
                Cart.Render(items);
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
    },
    Render: function (items) {
        var ui =
            '<tr class="product-row" data-sku="{{$sku}}">\n' +
            '    <td class="item-check">{{$checkbox}}</td>\n' +
            '    <td class="text-center">\n' +
            '        <a href="{{$link}}" class="thumbnail">\n' +
            '            <img src="{{$image}}">\n' +
            '        </a>\n' +
            '    </td>\n' +
            '    <td>\n' +
            '        <div class="row">\n' +
            '            <div class="col-md-6 list-name">\n' +
            '                <a href="{{$link}}"><span class="{{$titleclass}}">{{$title}}</span></a>\n' +
            '                <p class="{{$stockclass}}">{{$stockmsg}}</p>\n' +
            '            </div>\n' +
            '            <div class="col-md-4">\n' +
            '\n' +
            '                <div class="m-grid">\n' +
            '                    <div class="m-grid-row">\n' +
            '                        <div class="m-grid-col list-price">\n' +
            '                            <p class="price">{{$price}}</p>\n' +
            '                        </div>\n' +
            '                        <div class="m-grid-col list-va">\n' +
            '                            <p class="pv">{{$qv}}</p>\n' +
            '                        </div>\n' +
            '\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '            </div>\n' +
            '            <div class="col-md-2 list-qty">\n' +
            '                {{$qty}}\n' +
            '            </div>\n' +
            '            <div class="list-action">\n' +
            '                <button type="button" class="del" data-sku="{{$sku}}">Delete</button>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </td>\n' +
            '</tr>';
        $.each(items, function (k, v) {
            var row = ui;
            row = row.replace(/{{\$sku}}/g, v.sku);
            row = row.replace('{{$image}}', v.image);
            row = row.replace('{{$title}}', v.title);
            row = row.replace('{{$stockmsg}}', v.stock_msg);
            if (v.available) {
                row = row.replace('{{$titleclass}}', '');
                row = row.replace(/{{\$link}}/g, '/shopping/' + v.sku);
                row = row.replace('{{$price}}', v.price_format);
                row = row.replace('{{$qv}}', v.qv + "PV");

                if (v.stock_status) {
                    row = row.replace('{{$stockclass}}', 'stock-error');
                } else {
                    row = row.replace('{{$stockclass}}', 'stock-in');
                }
                if (v.stocks) {
                    var checked = v.selected ? 'checked' : null;
                    row = row.replace('{{$checkbox}}', '<input type="checkbox" name="item-sku" value="' + v.sku + '" ' + checked + '>');
                    row = row.replace('{{$qty}}', ' <select class="qty" data-sku="' + v.sku + '" data-stocks="' + v.stocks + '" data-quantity="' + v.quantity + '"></select>');
                } else {
                    row = row.replace('{{$checkbox}}', '');
                    row = row.replace('{{$qty}}', v.quantity);
                }
            } else {
                row = row.replace('{{$titleclass}}', 'unavailable');
                row = row.replace(/{{\$link}}/g, 'javascript:void(0)');
                row = row.replace('{{$price}}', '');
                row = row.replace('{{$qv}}', '');
                row = row.replace('{{$qty}}', '');
                row = row.replace('{{$checkbox}}', '');
                row = row.replace('{{$stockclass}}', 'stock-error');
            }
            $("#cart-items").append(row);
        });

        $("select.qty").each(function () {
            var sku = $(this).attr('data-sku');
            var stocks = parseInt($(this).attr('data-stocks'));
            var quantity = parseInt($(this).attr('data-quantity'));
            var max = stocks > 99 ? 99 : stocks;
            for (var i = 1; i <= max; i++) {
                $(this).append('<option value="' + i + '">' + i + '</option>');
            }
            if (quantity > stocks) {
                quantity = stocks
            }
            $(this).val(quantity);
            $(this).change(function () {
                Cart.Update($(this), sku, $(this).val());
            });
        });

        $("#cart-items .del").click(function () {
            var sku = $(this).attr('data-sku');
            Cart.Delete($(this), sku);
        });

        Cart.CheckTotal();

        $("input[name=item-sku]").change(function () {
            Cart.CheckTotal();
        });

        $("#check-out").click(function () {
            Cart.Checkout($(this));
        });
    },
    Update: function (elm, sku, qty) {
        Ajax.post("/a/cart/update", {
            sku: sku,
            qty: qty
        }, {
            ok: function (res) {
                Common.cartCount();
                Cart.CheckTotal();
            },
            no: function (err) {
                console.log(err);
            },
            before: function () {
                elm.attr("disabled", true);
            },
            end: function () {
                elm.removeAttr("disabled");
            }
        });
    },
    Delete: function (btn, sku) {
        Ajax.post("/a/cart/delete", {
            sku: sku
        }, {
            ok: function (res) {
                $(".product-row[data-sku=" + sku + "]").remove();
                Common.cartCount();
                Cart.CheckTotal();
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
    },
    CheckTotal: function () {
        // // if ($("input[name=item-sku]:checked").length > 0) {
        // //     $("#check-out").attr('disabled', false);
        // // } else {
        // //     $("#check-out").attr('disabled', true);
        // // }
        // $("#check-out").hide();
        var sku = [];
        $("input[name=item-sku]:checked").each(function () {
            sku[sku.length] = $(this).val();
        });
        Ajax.post('/a/cart/totals', {
            sku: sku
        }, {
            ok: function (totals) {
                console.log(totals);
                $("#alert-danger").hide();
                if (totals.total_count > 0) {
                    $("#pv-total").text(totals.qv_total_format);
                    $("#items-total").text(totals.items_total_format);
                    $("#check-out").removeAttr('disabled')
                } else {
                    $("#pv-total").text('0');
                    $("#items-total").text('');
                    $("#check-out").attr('disabled', true);
                }
            },
            no: function (err) {
                $("#alert-danger").text(err.message).show();
                $("#check-out").attr('disabled', true);
                $("#pv-total").text('0');
                $("#items-total").text('');
            }
        });

    },
    Checkout: function (elm) {
        var sku = [];
        $("input[name=item-sku]:checked").each(function () {
            sku[sku.length] = $(this).val();
        });
        Ajax.post("/a/cart/checkout", {
            sku: sku,
        }, {
            ok: function (res) {
                location.href = '/shopping/checkout';
            },
            no: function (err) {
                console.log(err);
            },
            before: function () {
                elm.attr("disabled", true);
            },
            end: function () {
                elm.removeAttr("disabled");
            }
        });
    },
};

$(window).load(function () {
    // After init home Then Init Dragger
    Cart.init()
});