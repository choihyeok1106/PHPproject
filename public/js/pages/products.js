var Product = {
    init: function () {
        setTimeout(Product.initCategories);
        setTimeout(Product.initProducts);
        setTimeout(Product.initSearch);
    },
    initCategories: function () {
        var li_ui = '<li><a href="{{$link}}">{{$name}}</a></li>';
        var opt_ui = '<option value="{{$val}}" {{$selected}}>{{$name}}</option>';
        // in mobile category select on change
        $("#category-mobi").change(function () {
            var id = $(this).val();
            var loc = '/products';
            if (id) {
                loc += '/' + id;
            }
            location.replace(loc);
        });
        App.a.get("/a/item/categories", null, {
            ok: function (res) {
                if (!res.hasOwnProperty("error")) {
                    var side = "";
                    var mobi = "";
                    $.each(res, function (k, v) {
                        var id = v['name'].toLowerCase().replace(/ /g, '-');
                        var li = li_ui;
                        li = li.replace('{{$name}}', v['name']);
                        li = li.replace('{{$link}}', '/products/' + id);
                        side += li;

                        var opt = opt_ui;
                        var selected = $("#category-mobi").attr("data-selected");
                        opt = opt.replace('{{$val}}', id);
                        opt = opt.replace('{{$name}}', v['name']);
                        opt = opt.replace('{{$selected}}', selected === id ? 'selected' : '');
                        mobi += opt;
                    });
                    if (side) {
                        $("#category-side").append(side);
                    }
                    if (mobi) {
                        $("#category-mobi").append(mobi);
                        $('#category-mobi').selectpicker();
                    }
                }
            },
            no: function (err) {
                console.log(err);
            }
        });
    },
    initProducts: function () {
        // product box html ui
        var ui = '<div class="col-md-4 col-lg-3 col-sm-6">\n' +
            '    <div class="portlet light portlet-fit portlet-product">\n' +
            '        <div class="portlet-body padding-0">\n' +
            '            <a href="{{$link}}" class="product-image">\n' +
            '                <img src="{{$image}}" data-sku="{{$sku}}">\n' +
            '            </a>\n' +
            '        </div>\n' +
            '        <div class="portlet-title">\n' +
            '            <div class="caption">\n' +
            '                <a href="{{$link}}" class="caption-subject uppercase">{{$title}}</a>\n' +
            '            </div>\n' +
            '            <div class="m-grid">\n' +
            '                <div class="m-grid-row">\n' +
            '                    <div class="m-grid-col m-grid-col-left">\n' +
            '                        <span>{{$price}}</span>\n' +
            '                        <br>\n' +
            '                        <span class="font-grey-cascade">{{$pv}} PV</span>\n' +
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
        // Ajax request data flag
        var loading = false;
        // On scroll bottom request more data
        var onScrollBottom = function () {
            $(window).scroll(function () {
                var scrollTop = $(this).scrollTop();
                var scrollHeight = $(document).height();
                var windowHeight = $(window).height();
                if (scrollTop + windowHeight >= scrollHeight) {
                    getItems(false);
                }
            });
        };
        // add to cart event
        var addCart = function (sku) {
            $(".float-product[data-sku=" + sku + "]").remove();
            var btn = $("#products .add-cart[data-sku=" + sku + "]");
            var ct = $("#head-cart-count").offset().top - $(window).scrollTop();
            var cl = $("#head-cart-count").offset().left;
            var e = $("#products img[data-sku=" + sku + "]");
            var pt = $(e).offset().top - $(window).scrollTop();
            var pl = $(e).offset().left;
            var pw = $(e).width();
            var ph = $(e).height();
            var img = '<img class="float-product"  data-sku="' + sku + '" src="' + $(e).attr('src') + '" style="width: ' + pw + 'px;height: ' + ph + 'px; top: ' + pt + 'px;left: ' + pl + 'px;">';
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
                    Common.cartCount();
                    btn.attr("disabled", false);
                    f.remove();
                }
            }, 1000);

        }
        // render items list html
        var render = function (items) {
            var html = '';
            $.each(items, function (k, v) {
                var item = ui;
                // /{{\$link}}/g RegExp replace all
                item = item.replace(/{{\$link}}/g, '/product/' + v['sku']);
                item = item.replace('{{$image}}', v['image']);
                item = item.replace('{{$title}}', v['title']);
                item = item.replace('{{$price}}', v['price']);
                item = item.replace('{{$pv}}', v['pv']);
                item = item.replace(/{{\$sku}}/g, v['sku']);
                html += item;
            });
            $("#products").append(html);
            $("#products .add-cart").click(function () {
                var sku = $(this).attr('data-sku');
                if (sku) {
                    addCart(sku);
                }
            });
        };
        // ajax request items
        var getItems = function (firstLoad) {
            if (!loading) {
                App.a.get("/a/item/items", null, {
                    ok: function (res) {
                        if (!res.hasOwnProperty("error")) {
                            loading = false;
                            render(res['items']);
                            if (firstLoad) {
                                onScrollBottom();
                            }
                        }
                    },
                    no: function (err) {
                        console.log(err);
                    },
                    before: function () {
                        loading = true;
                        if (!firstLoad) {
                            $("#products").append('<div class="products-loader"><div class="loader"></div></div>');
                        }
                    },
                    end: function () {
                        $("#products #svg").remove();
                        $(".products-loader").remove();
                    }
                });
            }
        };
        // first request
        getItems(true);
    },
    initSearch: function () {
        var q = App.g.get('query');
        var s = App.g.get('sort');
        $("#product-search-input").val(q);
        $("#product-order-by").find('option[value=' + s + ']').attr('selected', 'selected');
        $("#product-order-by").change();

        function search() {
            var q = $("#product-search-input").val();
            var c = $("#category-mobi").attr("data-selected");
            var s = $("#product-order-by").val();
            var loc = '/products'
            if (c) {
                loc += '/' + c;
            }
            var con = [];
            if (s) {
                con[con.length] = 'sort=' + s;
            }
            if (q) {
                con[con.length] = 'query=' + encodeURIComponent(q);
            }
            for (var i = 0; i < con.length; i++) {
                if (i > 0) {
                    loc += '&';
                } else {
                    loc += '?';
                }
                loc += con[i];
            }
            location.href = loc;
        }

        $("#product-search-btn").click(function () {
            search();
        });

        $("#product-order-by").change(function () {
            search();
        });
    }
}

window.onload = function () {
    Product.init();
};