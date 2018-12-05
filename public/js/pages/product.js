var Product = {
    sku: null,
    curr: null,
    init: function () {
        this.sku = $("#item-sku").text();
        if (this.sku) {
            setTimeout(Product.initUI());
            setTimeout(Product.initProduct());
            setTimeout(Product.initResource);
            setTimeout(Product.initPrice);
            setTimeout(Product.initOptions);
            setTimeout(Product.initQtyCount());
            setTimeout(Product.initRelates);
            setTimeout(Product.initActions);
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
                if (qty > 9999) {
                    qty = 9999;
                }
                $(target).val(qty);
            }
        });
    },
    initProduct: function () {
        App.a.get("/a/item/" + Product.sku, null, {
            ok: function (res) {
                if (!res.hasOwnProperty("error")) {
                    console.log(res)
                }
            },
            no: function (err) {
                console.log(err);
            }
        });
    },
    initPrice: function () {
        App.a.get("/a/item/" + Product.sku + '/price', null, {
            ok: function (res) {
                if (!res.hasOwnProperty("error")) {
                    console.log("initPrice", res)
                }
            },
            no: function (err) {
                console.log(err);
            }
        });
    },
    initResource: function () {
        App.a.get("/a/item/" + Product.sku + '/resource', null, {
            ok: function (res) {
                var ui = '<li><img src="{{$url}}" data-url="{{$url}}"></li>';
                if (!res.hasOwnProperty("error")) {

                    var html = '';
                    $.each(res, function (k, v) {
                        if (k === 0) {
                            $("#thumb").attr("src", v['url']);
                        }
                        html += ui.replace(/{{\$url}}/g, v['url']);
                    });
                    if (res.length > 1) {
                        $("#thums").html(html);
                        $("#thums li").click(function () {
                            $("#thums li").removeClass("active");
                            $(this).addClass("active");
                            $("#thumb").attr("src", $(this).find("img").attr("data-url"));
                        }).eq(0).addClass("active");
                    }
                }
            },
            no: function (err) {
                console.log(err);
            }
        });
    },
    initOptions: function () {
        var selectOption = function () {
            $("#options a").click(function () {
                $("#options a").removeClass("active");
                $(this).addClass("active");
                Product.curr = $(this).attr("data-sku");
            });
        };

        App.a.get("/a/item/" + Product.sku + '/options', null, {
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
                            Product.curr = v['sku'];
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
    initRelates: function () {
        var count = 0;
        var slider = null;
        /// tiny helper function to add breakpoints
        var getGridSize = function () {
            var w = $(".flexslider").outerWidth();
            if (w < 560) {
                return 2;
            }
            if (w >= 560 && w < 720) {
                return 3
            }
            if (w >= 720 && w < 1000) {
                return 4;
            }
            return 6;
        };
        var initMax = function () {
            var max = parseInt(count / getGridSize());
            if (count % getGridSize() > 0) {
                max += 1;
            }
            $("#current-slide").text(1);
            $("#max-slide").text(max);
        };
        var initSilde = function () {
            count = $(".slides>li").length;

            $(function () {
                SyntaxHighlighter.all();
            });

            slider = $('.flexslider').flexslider({
                animation: "slide",
                animationLoop: false,
                slideshow: false,
                // controlNav: false,
                directionNav: false,
                touch: false,
                rtl: true,
                mousewheel: false,
                itemWidth: 210,
                itemMargin: 15,
                minItems: getGridSize(), // use function to pull in initial value
                maxItems: getGridSize(), // use function to pull in initial value
                init: function () {
                    initMax();
                },
                end: function () {
                    slideNumbering();
                },
                after: function (slide) {
                    slideNumbering();
                    // $("#current-slide").text(slide.currentSlide + 1);
                }
            });

            console.log(slider);

            // slider.flexslider(0);

            $('.toggle-next').on('click', function () {
                slider.flexslider('next');
            })

            $('.toggle-prev').on('click', function () {
                slider.flexslider('prev');
            })
        }

        var slideNumbering = function () {
            var index = $('li:has(.flex-active)').index('.flex-control-nav li') + 1;
            var total = $('.flex-control-nav li').length;
            $("#current-slide").text(index);
            $("#max-slide").text(total);
        };

        // check grid size on resize event
        $(window).resize(function () {
            if (slider) {
                // slider.removeData("flexslider");
                // initSilde();
            }
            // slideNumbering();
            // initMax();
            // slider.flexslider({
            //     minItems: getGridSize(),
            //     maxItems: getGridSize(),
            // });
            // slider.flexslider(0);
        });

        App.a.get("/a/item/" + Product.sku + '/relates', null, {
            ok: function (res) {
                var ui = '<li>\n' +
                    '    <div class="card social-card share share-other card-product" data-social="item">\n' +
                    '        <div class="card-content">\n' +
                    '            <a href="/product/{{$sku}}" class="thumb" data-toggle="res-box">\n' +
                    '                <img src="{{$image}}">\n' +
                    '            </a>\n' +
                    '        </div>\n' +
                    '        <a href="/product/{{$sku}}"  title="{{$title}}" class="card-header clearfix last">\n' +
                    '            <h5>{{$title}}</h5>\n' +
                    '        </a>\n' +
                    '        <div class="card-price">\n' +
                    '            ${{$price}}\n' +
                    '        </div>\n' +
                    '    </div>\n' +
                    '</li>';
                if (!res.hasOwnProperty("error")) {
                    var html = '';
                    $.each(res, function (k, v) {
                        var li = ui;
                        li = li.replace(/{{\$sku}}/g, v['sku']);
                        li = li.replace('{{$image}}', v['image']);
                        li = li.replace(/{{\$title}}/g, v['title']);
                        li = li.replace('{{$price}}', v['price']);
                        html += li;
                    });
                    if (html) {
                        $("#related").show();
                        $("#related-list").html(html);
                        Util.toggleResponse();
                        initSilde();
                    }
                }
            },
            no: function (err) {
                console.log(err);
            }
        });
    },
    initActions: function () {
        var btn = $("#add-cart");
        btn.click(function () {
            if (Product.curr) {
                App.a.post("/a/cart/add", {
                    sku: Product.curr,
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
    }
};

window.onload = function () {
    Product.init();
};