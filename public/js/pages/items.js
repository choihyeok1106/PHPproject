var Items = {
    id: -1,
    loadable: true,
    items: {},
    meta: {
        count: 0,
        per_page: 0,
        next: ''
    },
    init: function () {
        setTimeout(Items.initCategories);
        setTimeout(Items.initSearch);
        setTimeout(Items.initItems);
        setTimeout(Items.initScrollBottom);
    },
    initCategories: function () {
        var li_ui = '<li data-id="{{$id}}"><a href="javascript:void(0)">{{$name}}</a></li>';
        var opt_ui = '<option value="{{$val}}" {{$selected}}>{{$name}}</option>';
        Ajax.get("/a/item/categories", null, {
            ok: function (items) {
                var side = "";
                var mobi = "";
                $.each(items, function (k, v) {
                    var li = li_ui;
                    li = li.replace('{{$name}}', v.name);
                    li = li.replace('{{$id}}', v.id);
                    side += li;

                    var opt = opt_ui;
                    opt = opt.replace('{{$val}}', v.id);
                    opt = opt.replace('{{$name}}', v.name);
                    mobi += opt;
                });
                if (side) {
                    $("#category-side").append(side);
                }
                if (mobi) {
                    $("#category-mobi").append(mobi);
                    $('#category-mobi').selectpicker();
                }

                // in mobile category select on change
                $("#category-mobi").change(function () {
                    var id = $(this).val();
                    $("#category-side li").removeClass("active");
                    $("#category-side li[data-id=" + id + "]").addClass("active");
                    Items.Refresh('category');
                });
                $("#category-side li").click(function () {
                    $("#category-mobi").val($(this).attr('data-id')).change();
                });
            }
        });
    },
    initSearch: function () {
        $("#product-search-btn").click(function () {
            Items.Refresh('search');
        });
        $("#product-order-by").change(function () {
            Items.Refresh('sorting');
        });
    },
    initItems: function () {
        Items.Refresh();
    },
    initScrollBottom: function () {
        $(window).scroll(function () {
            var scrollTop = $(this).scrollTop();
            var scrollHeight = $(document).height();
            var windowHeight = $(window).height();
            if (scrollTop + windowHeight >= scrollHeight - 25) {
                Items.More();
            }
        });
    },
    ParseMeta: function (meta) {
        Items.meta = {
            count: 0,
            per_page: 0,
            next: ''
        };
        if (typeof meta === 'object') {
            if (meta.hasOwnProperty("pagination")) {
                var pagination = meta.pagination;
                if (typeof pagination === 'object') {
                    if (pagination.hasOwnProperty("count")) {
                        var count = parseInt(pagination.count)
                        if (!isNaN(count)) {
                            Items.meta.count = count;
                        }
                    }
                    if (pagination.hasOwnProperty("per_page")) {
                        var per_page = parseInt(pagination.per_page)
                        if (!isNaN(per_page)) {
                            Items.meta.per_page = per_page;
                        }
                    }
                    if (pagination.hasOwnProperty("links") && typeof pagination.links === 'object' && pagination.links.hasOwnProperty("next")) {
                        Items.meta.next = pagination.links.next;
                    }
                }
            }
        }
    },
    /**
     * @return {boolean}
     */
    HasMore: function () {
        return Items.meta.next !== '';
    },
    AddCart: function (sku) {
        if (Items.items.hasOwnProperty(sku)) {
            setTimeout(Items.FloatCart(sku));
            var item = Items.items[sku];
            Ajax.post("/a/cart/add", {
                sku: sku,
                price: item.price,
                qv: item.qv,
                cv: item.cv,
                title: item.title,
                image: item.image,
                quantity: 1
            }, {
                ok: function (items) {
                    Common.cartCount();
                    // if (items.hasOwnProperty('count') && items.count) {
                    //     $("#head-cart-count").text(items.count).show();
                    // } else {
                    //     $("#head-cart-count").text(0).hide();
                    // }
                }
            });
        }
    },
    FloatCart: function (sku) {
        $(".float-product[data-sku=" + sku + "]").remove();
        var btn = $("#products .add-cart[data-sku=" + sku + "]");
        var ct = $("#head-cart-count").offset().top - $(window).scrollTop();
        var cl = $("#head-cart-count").offset().left;
        var e = $("#products img[data-sku=" + sku + "]");
        var pt = $(e).offset().top - $(window).scrollTop();
        var pl = $(e).offset().left;
        var pw = $(e).width();
        var ph = $(e).height();
        var img = '<img class="float-product"  data-sku="' + sku + '" src="' + $(e).attr('src') + '" style="background-image:url(' + $(e).attr('data-image') + ');width: ' + pw + 'px;height: ' + ph + 'px; top: ' + pt + 'px;left: ' + pl + 'px;">';
        $("body").append(img);
        var f = $(".float-product[data-sku=" + sku + "]");
        $(f).show();
        // image add to cart css animation start
        btn.attr("disabled", true);
        setTimeout(function () {
            $(f).css({
                top: ct,
                left: cl,
                width: 24,
                height: 24,
                opacity: 0
            });
        }, 10);
        // after 1 seconds
        setTimeout(function () {
            if (f.css("opacity") <= 0) {
                btn.attr("disabled", false);
                f.remove();
            }
        }, 1000);
    },
    Render: function (items, clear) {
        var ui =
            '<div class="col-md-4 col-lg-3 col-sm-6">\n' +
            '    <div class="portlet light portlet-fit portlet-product">\n' +
            '        <div class="portlet-body padding-0">\n' +
            '            <a href="/shopping/{{$sku}}" class="product-image">\n' +
            '                <img src="/img/transparent.png" style="background-image: url({{$image}})" data-image="{{$image}}" data-sku="{{$sku}}">\n' +
            '            </a>\n' +
            '        </div>\n' +
            '        <div class="portlet-title">\n' +
            '            <div class="caption">\n' +
            '                <a href="/shopping/{{$sku}}" class="caption-subject uppercase">{{$title}}</a>\n' +
            '            </div>\n' +
            '            <div class="m-grid">\n' +
            '                <div class="m-grid-row">\n' +
            '                    <div class="m-grid-col m-grid-col-left">\n' +
            '                        <span class="price">{{$price}}</span>\n' +
            '                        <br>\n' +
            '                        <span class="pv font-grey-cascade">{{$qv}} PV</span>\n' +
            '                    </div>\n' +
            '                    <div class="m-grid-col m-grid-col-right">\n' +
            '                        <button class="btn btn-success add-cart" data-sku="{{$sku}}" type="button">\n' +
            '                            <i class="fa fa-shopping-cart"></i> &nbsp; Add to Cart\n' +
            '                        </button>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </div>\n' +
            '</div>';

        var html = '';
        $.each(items, function (k, v) {
            Items.items[v.sku] = v;
            var item = ui;
            // /{{\$link}}/g RegExp replace all
            item = item.replace(/{{\$image}}/g, v['image']);
            item = item.replace('{{$title}}', v['title']);
            item = item.replace('{{$price}}', v['price_format']);
            item = item.replace('{{$qv}}', v['qv']);
            item = item.replace(/{{\$sku}}/g, v['sku']);
            html += item;
        });
        if (clear) {
            $("#products").html(html);
        } else {
            $("#products").append(html);
        }
        $("#products .add-cart").click(function () {
            var sku = $(this).attr('data-sku');
            if (sku) {
                Items.AddCart(sku);
            }
        });
    },
    Refresh: function (mode) {
        var first = false;
        Items.items = {};
        var params = {
            category: 0,
            search: '',
            sorting: 'id',
        };
        switch (mode) {
            case 'search':
                params.search = $("#product-search-input").val().trim();
                break;
            case 'category':
                params.category = $("#category-mobi").val();
                break;
            case 'sorting':
                params.category = $("#category-mobi").val();
                params.search = $("#product-search-input").val().trim();
                params.sorting = $("#product-order-by").val();
            default:
                first = true;
                params.category = $("#category-mobi").val();
                params.search = $("#product-search-input").val().trim();
                params.sorting = $("#product-order-by").val();
        }
        if (Items.loadable) {
            Ajax.get("/a/item", params, {
                ok: function (items, meta) {
                    Items.ParseMeta(meta);
                    if (Items.meta.count > 0) {
                        Items.Render(items, true);
                    } else {
                        UI.noResult("#products");
                    }
                },
                no: function () {
                    UI.noResult("#products");
                },
                before: function () {
                    Items.loadable = false;
                    if (!first) {
                        $("#products").append('<div class="products-loader"><div class="loader"></div></div>');
                    }
                },
                end: function () {
                    Items.loadable = true;
                    $("#products #svg").remove();
                    $(".products-loader").remove();
                }
            });
        }
    },
    More: function () {
        if (Items.HasMore() && Items.loadable) {
            Ajax.get("/a/item", {
                query: Items.meta.next
            }, {
                ok: function (items, meta) {
                    Items.ParseMeta(meta);
                    if (Items.meta.count > 0) {
                        Items.Render(items, false);
                    }
                },
                before: function () {
                    Items.loadable = false;
                    $("#products").append('<div class="products-loader"><div class="loader"></div></div>');
                },
                end: function () {
                    Items.loadable = true;
                    $(".products-loader").remove();
                }
            });
        }
    },
};

window.onload = function () {
    Items.init();
};