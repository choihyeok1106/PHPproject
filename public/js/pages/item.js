var Item = {
    sku: null,
    stocks: 0,
    item: null,
    init: function () {
        this.sku = $(".page-title").attr("data-sku");
        if (this.sku) {
            setTimeout(Item.initUI);
            setTimeout(Item.initItem);
            setTimeout(Item.initStocks);
            setTimeout(Item.initActions);
        }
    },
    initUI: function () {
        function initHeight() {
            var elm = $(".img-wrapper");
            var w = elm.outerWidth();
            var s = 450;
            if (w < s) {
                s = w;
            }
            $(".img-wrapper").css({
                height: s,
                'max-height': s,
                'line-height': (s - 20) + 'px'
            });
        }

        initHeight();
        $(window).resize(function () {
            initHeight();
        });
    },
    initQtyCount: function () {
        if (Item.stocks > 0) {
            $("[data-toggle=mathf-count]").click(function () {
                var target = $(this).attr("data-target");
                if (target) {
                    var qty = parseInt($(target).val());
                    if (isNaN(qty)) {
                        qty = 1;
                    }
                    var action = parseInt($(this).attr("data-action"));
                    if (isNaN(action)) {
                        action = 0;
                    }
                    qty += action;
                    if (qty < 1) {
                        qty = 1;
                    }
                    if (qty > Item.stocks) {
                        qty = Item.stocks;
                    }
                    $(target).val(qty);
                }
            });
        } else {
            alert('No stocks');
        }
    },
    initItem: function () {
        Ajax.get("/a/item/" + Item.sku, null, {
            ok: function (item) {
                console.log(item)
                Item.item = item;
                Item.Make();
            },
            no: function (err) {
                console.log(err);
            }
        });
    },
    initStocks: function () {
        Ajax.get("/a/item/" + Item.sku + '/stocks', null, {
            ok: function (res) {
                Item.stocks = res.hasOwnProperty("stocks") ? parseInt(res.stocks) : 0;
                if (isNaN(Item.stocks)) {
                    Item.stocks = 0;
                }
                Item.initQtyCount();
            },
            no: function (err) {
                Item.initQtyCount();
            }
        });
    },
    initActions: function () {
        var btn = $("#add-cart");
        btn.click(function () {
            if (Item.curr) {
                Ajax.post("/a/cart/add", {
                    sku: Item.curr,
                    qty: $("#qty").val()
                }, {
                    ok: function (res) {
                        if (!res.hasOwnProperty("error")) {
                            $("#modal-cart").modal({
                                show: 'true'
                            });
                            $("#qty").val(1)
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
            }
        });
    },
    Make: function () {
        if (Item.item) {
            setTimeout(Item.Info);
            setTimeout(Item.Image);
            setTimeout(Item.Options);
        }
    },
    Info: function () {
        $("#item-title").text(Item.item.title);
        $("#item-price").text(Item.item.price_format);
        if (Item.item.retail_price > Item.item.price) {
            $("#item-retail").text(Item.item.retail_format);
        }
        $("#item-qv").text(Item.item.qv + " PV");
        $("#item-explanation").html(Item.item.explanation);
        $("#item-long_explanation").html(Item.item.long_explanation);
        $("#item-recommended_use").html(Item.item.recommended_use);
        $("#item-shipping_return").html(Item.item.shipping_return);
        $("#item-supplement_facts").html(Item.item.supplement_facts);
    },
    Image: function () {
        var html = '';
        var ui = '<li><img src="{{$url}}" data-url="{{$url}}"></li>';
        $.each(Item.item.images, function (k, v) {

            if (k === 0) {
                $("#item-image").attr("src", v);
            }
            html += ui.replace(/{{\$url}}/g, v);
        });
        if (html) {
            $("#thums").html(html);
            $("#thums li").click(function () {
                $("#thums li").removeClass("active");
                $(this).addClass("active");
                $("#thumb").attr("src", $(this).find("img").attr("data-url"));
            }).eq(0).addClass("active");
        }
    },
    Options: function () {
        $.each(Item.item.groups, function (k, v) {
            var append = '<label>' + v.name + '</label><div id="item-group-' + v.id + '" class="opt-list"></div>';
            $("#item-groups").append(append);
            $.each(v.items, function (i, item) {
                setTimeout(Item.OptionItem(item, v.id));
            });
        });
        return;

        var selectOption = function () {
            $("#options a").click(function () {
                $("#options a").removeClass("active");
                $(this).addClass("active");
                Item.curr = $(this).attr("data-sku");
            });
        };

        Ajax.get("/a/item/" + Item.sku + '/options', null, {
            ok: function (res) {
                var ui = '<a href="javascript:void (0);" title="{{$title}}" data-sku="{{$sku}}">\n' +
                    '    <div class="opt-img">\n' +
                    '        <img src="{{$image}}">\n' +
                    '    </div>\n' +
                    '    <div class="price">{{$price}}</div>\n' +
                    '</a>';
                if (!res.hasOwnProperty("error")) {
                    var html = '';
                    $.each(res, function (k, v) {
                        if (k === 0) {
                            Item.curr = v['sku'];
                        }
                        var li = ui;
                        li = li.replace('{{$title}}', v['title']);
                        li = li.replace('{{$sku}}', v['sku']);
                        li = li.replace('{{$image}}', v['image']);
                        li = li.replace('{{$price}}', '$' + Util.numberFormat(v['price']));
                        html += li;
                    });
                    if (html) {
                        $("#options").html(html).find("a").eq(0).addClass("active");
                        selectOption();
                    }
                }
            },
            no: function (err) {
                console.log(err);
            }
        });
    },
    OptionItem: function (item, group_id) {
        var ui = '<a href="/shopping/{{$sku}}" title="{{$title}}" data-sku="{{$sku}}">\n' +
            '    <div class="opt-img">\n' +
            '        <img src="{{$image}}">\n' +
            '    </div>\n' +
            '    <div class="price">{{$price}}</div>\n' +
            '</a>';
        Ajax.get("/a/item/" + item.sku, null, {
            ok: function (v) {
                console.log(v);
                ui = ui.replace('{{$title}}', v.title);
                ui = ui.replace(/{{\$sku}}/g, v.sku);
                ui = ui.replace('{{$image}}', item.image);
                ui = ui.replace('{{$price}}', v.price_format);
                $("#item-group-" + group_id).html(ui);
            }
        });
    },
};

window.onload = function () {
    Item.init();
};