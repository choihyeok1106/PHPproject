var Home = {
    grid: null, // dragger grid var
    init: function () {
        this.initGridBody();
        this.widgetSetting();
        this.widgetBanner();
        this.widgetSummary();
        this.widgetNews();
        this.widgetTracker();
        this.widgetCalendar();
        this.widgetTeamAlert();
    },
    // initGridBody: Responsive GridBody Height
    initGridBody: function () {
        function init() {
            $(".grid-body").each(function () {
                var scale = $(this).attr("data-scale");
                var min = $(this).attr("data-min");
                if (isNaN(min)) {
                    min = 0;
                }
                if (!isNaN(scale)) {
                    var h = $(this).width() * scale;
                    if (min > 0 && h < min) {
                        h = min;
                    }
                    $(this).css({
                        height: h
                    });
                }
            });
        }

        init();
        $(window).resize(function () {
            init();
        });
    },
    // widgetSetting: Open widget settings Popup
    widgetSetting: function () {
        var btn = $("#settings-show");
        $(btn).click(function () {
            $('.modal').remove();
            $('.modal-backdrop').remove();
            $('body').removeClass("modal-open");

            App.a.get("/a/home/interface", null, {
                ok: function (res) {
                    if (!res.hasOwnProperty("error")) {
                        $("body").append(res['view']);
                        $("#widget-setting").modal({
                            show: 'true'
                        });
                    } else {
                        console.log(res["error"]);
                    }
                },
                no: function (err) {
                    console.log(err);
                },
                before: function () {
                    $(btn).attr("disabled", true);
                },
                end: function () {
                    $(btn).attr("disabled", false);
                }
            });
        });
    },
    // widgetBanner: Get banners data
    widgetBanner: function () {
        if (!$("#widget-banner").length) {
            return
        }
        App.a.get("/a/home/banners", null, {
            ok: function (res) {
                if (!res.hasOwnProperty("error")) {
                    var html = "";
                    $.each(res, function (k, v) {
                        html += '<li data-title="' + v.title + '" ><a href="' + v.link + '" style="background-image: url(' + v.image + ')"><div class="text"><span>' + v.text + '</span></div></a></li>';
                    });

                    if (html) {
                        html = "<div class='slides'>" + html + "</div>";
                        $("#widget-banner").addClass("active");
                        $("#widget-banner .flexslider").html(html);
                        var mainslider;
                        $('.flexslider').flexslider({
                            animation: "slide",
                            controlNav: false,
                            start: function (slide) {
                                mainslider = slide;
                                var f = $("#widget-banner .slides li").eq(1);
                                changeBanner(f);
                            },
                            after: function (slide) {
                                var current = slide.currentSlide + 1;
                                var c = $("#widget-banner .slides li").eq(current);
                                changeBanner(c);
                            }
                        });

                        function changeBanner(el) {
                            if (el !== undefined) {
                                var title = $(el).attr("data-title");
                                var text = $(el).attr("data-text");
                                if (title) {
                                    $("#widget-banner .widget-caption").text(title)
                                }
                                if (text) {
                                    $("#widget-banner .widget-caption").text(text)
                                }
                            }

                        }

                        $(window).resize(function () {
                            // setTimeout(function () {
                            //     mainslider.resize()
                            // }, 1000);
                            // mainslider.update( mainslider.pagingCount);
                            // mainslider.newSlides.width(mainslider.computedW);
                            // mainslider.setProps(mainslider.computedW, "setTotal");
                            // $('.flexslider').data('flexslider').resize();
                            // $("#widget-banner .slides li").each(function () {
                            //     $(this).css({
                            //         // width: $("#widget-banner").width() - 30
                            //     });
                            // });
                        });
                    }
                }
            }
        });
    },
    // widgetSummary: Get summary data
    widgetSummary: function () {
        if (!$("#widget-summary").length) {
            return
        }
        $("#summary-curr-btn").click(function (e) {
            $(e).removeClass('active').addClass("active");
            $("#summary-last-btn").removeClass("active");
            $("#summary-curr-tb").show();
            $("#summary-last-tb").hide();
        });
        $("#summary-last-btn").click(function (e) {
            $(e).removeClass('active').addClass("active");
            $("#summary-curr-btn").removeClass("active");
            $("#summary-curr-tb").hide();
            $("#summary-last-tb").show();
        });

        App.a.get("/a/home/summaries", null, {
            ok: function (res) {
                function setCounter(el, val, count, float) {
                    count = count == undefined ? true : false
                    $(el).text(Util.numberFormat(val));
                    if (count) {
                        $(el).attr("data-value", Util.numberFormat(val, float));
                        $(el).counterUp({
                            delay: 10,
                            time: 250
                        });
                    }
                }

                function setPer(el, per, count) {
                    if (per > 0) {
                        $(el).addClass("up");
                    } else {
                        $(el).addClass("down");
                        per = -per;
                    }
                    setCounter($(el).find(".per"), per, count, 2)
                }

                var curr = res[0];
                var last = res[1];

                // set Current
                setCounter($("#curr-pv-val"), curr.pv.val);
                setPer($("#curr-pv-per"), curr.pv.per);
                setCounter($("#curr-last4-val"), curr.last4.val);
                if (curr.last4.active) {
                    $("#curr-last4-active").text("Active").addClass("info");
                }
                $("#curr-rank-name").attr("title", curr.rank.name);
                $("#curr-rank-name b").html(curr.rank.short);
                $("#curr-rank-name span").text(curr.rank.short);
                $("#curr-rank-short").text(curr.rank.name);
                setCounter($("#curr-stv-val"), curr.stv.val);
                setPer($("#curr-stv-per"), curr.stv.per);
                setCounter($("#curr-ltv-val"), curr.ltv.val);
                setPer($("#curr-ltv-per"), curr.ltv.per);
                setCounter($("#curr-rtv-val"), curr.rtv.val);
                setPer($("#curr-rtv-per"), curr.rtv.per);
                setCounter($("#curr-last7-val"), curr.last7.val);
                setPer($("#curr-last7-per"), curr.last7.per);
                setCounter($("#curr-psa-left"), curr.psa.left);
                setCounter($("#curr-psa-right"), curr.psa.right);
                // set Last
                setCounter($("#last-pv-val"), last.pv.val, false);
                setPer($("#last-pv-per"), last.pv.per, false);
                setCounter($("#last-last4-val"), last.last4.val, false);
                if (last.last4.active) {
                    $("#last-last4-active").text("Active").addClass("info");
                }
                $("#last-rank-name").attr("title", last.rank.name);
                $("#last-rank-name b").html(last.rank.short);
                $("#last-rank-name span").text(last.rank.short);
                $("#last-rank-short").text(last.rank.name);
                setCounter($("#last-stv-val"), last.stv.val, false);
                setPer($("#last-stv-per"), last.stv.per, false);
                setCounter($("#last-ltv-val"), last.ltv.val, false);
                setPer($("#last-ltv-per"), last.ltv.per, false);
                setCounter($("#last-rtv-val"), last.rtv.val, false);
                setPer($("#last-rtv-per"), last.rtv.per, false);
                setCounter($("#last-last7-val"), last.last7.val, false);
                setPer($("#last-last7-per"), last.last7.per, false);
                setCounter($("#last-psa-left"), last.psa.left, false);
                setCounter($("#last-psa-right"), last.psa.right, false);

                // setTimeout("Dashboard.initGird()",500)
                // // setTimeout("Dashboard.grid.refreshItems()",2000)
            },
            no: function (err) {
                console.log(err);
            }
        });
    },
    // widgetNews: Get News data
    widgetNews: function () {
        if (!$("#widget-news").length) {
            return
        }
        App.a.get("/a/home/news", null, {
            ok: function (res) {
                var html = '';
                $.each(res, function (k, v) {
                    html += '<div class="mt-comment">' +
                        '                                <div class="mt-comment-img">' +
                        '                                    <img src="' + v.image + '"></div>' +
                        '                                <div class="mt-comment-body">' +
                        '                                    <div class="mt-comment-info">' +
                        '                                        <span class="mt-comment-author">' + v.title + '</span>' +
                        '                                        <span class="mt-comment-date">' + v.date + '</span>' +
                        '                                    </div>' +
                        '                                    <div class="mt-comment-text">' + v.text + '</div>' +
                        '                                    <div class="mt-comment-details">' +
                        '                                        <a href="#">View detail</a>' +
                        '                                    </div>' +
                        '                                </div>' +
                        '                            </div>';
                });
                $(".widget-news .mt-comments").html(html);
            },
            no: function (err) {
                console.log(err);
            }
        });
    },
    // widgetTeamAlert: get un read team smart alert count
    widgetTeamAlert: function () {
        if (!$("#widget-alert").length) {
            return
        }
        App.a.get("/a/home/team-alerts", null, {
            ok: function (res) {
                if (!res.hasOwnProperty('error')) {
                    $.each(res, function (key, val) {
                        var elm = $("#widget-alert .mt-action[data-type=" + key + "]");
                        if (elm && val > 0) {
                            $(elm).find(".badge").text(val).css("display", "inline-block");
                        }
                    });
                }
            },
            no: function (err) {
                console.log(err);
            }
        });
    },
    // widgetTracker: get Tracker data and init donut chart
    widgetTracker: function () {
        if (!$("#widget-tracker").length) {
            return
        }

        $("#tracker-circle").circliful({
            animation: 1,
            animationStep: 5,
            percent: 19.9,
            text: '/ 30,000',
            replacePercentageByText: '5,980',
            textSize: 28,
            textStyle: 'font-size: 12px;',
            textColor: '#666',
            fontColor: '#3498DB',
            backgroundColor: '#eee',
            textY: 120,
            description: '#description',
            title: '#title',
            percentageY: 105,
            // progressColor: {20: '#CC9487', 40: '#FA6C00', 60: '#FF6C99'}
        });
    },
    // widgetCalendar: get schedule data and init calendar
    widgetCalendar: function () {
        if (!$("#widget-calendar").length) {
            return
        }
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var h = {
            left: '',
            center: '',
            right: ''
        };


        var events = [{
            title: 'All Day',
            start: new Date(y, m, 1),
            backgroundColor: Core.getBrandColor('yellow')
        }, {
            title: 'Long Event',
            start: new Date(y, m, d - 5),
            end: new Date(y, m, d - 2),
            backgroundColor: Core.getBrandColor('blue')
        }, {
            title: 'Repeating Event',
            start: new Date(y, m, d - 3, 16, 0),
            allDay: false,
            backgroundColor: Core.getBrandColor('red')
        }, {
            title: 'Repeating Event',
            start: new Date(y, m, d + 6, 16, 0),
            allDay: false,
            backgroundColor: Core.getBrandColor('green')
        }, {
            title: 'Meeting',
            start: new Date(y, m, d + 9, 10, 30),
            allDay: false
        }, {
            title: 'Lunch',
            start: new Date(y, m, d, 14, 0),
            end: new Date(y, m, d, 14, 0),
            backgroundColor: Core.getBrandColor('grey'),
            allDay: false
        }, {
            title: 'Birthday',
            start: new Date(y, m, d + 1, 19, 0),
            end: new Date(y, m, d + 1, 22, 30),
            backgroundColor: Core.getBrandColor('purple'),
            allDay: false
        }, {
            title: 'Click for Google',
            start: new Date(y, m, 28),
            end: new Date(y, m, 29),
            backgroundColor: Core.getBrandColor('yellow'),
            url: 'http://google.com/'
        }];

        $('#calendar').fullCalendar('destroy'); // destroy the calendar
        $('#calendar').fullCalendar({ //re-initialize the calendar
            disableDragging: false,
            header: false,
            editable: true,
            events: events,
            dayClick: function () {
                alert('a day has been clicked!');
            }
        });

        var calendar = $('#calendar').fullCalendar('getCalendar');

        var view = $('#calendar').fullCalendar('getView');

        function setTitle() {
            $("#widget-calendar .widget-caption").text(view.title)
        }

        $("#calendar-prev").click(function () {
            calendar.prev();
            setTitle()
        });

        $("#calendar-next").click(function () {
            calendar.next();
            setTitle()
        });

        $("#calendar-today").click(function () {
            calendar.today();
            setTitle()
        });
    },
    // initDragger: init dragger and set widget sorting
    widgetAlert: function () {

    },
    initDragger: function () {
        function changed() {
            var widgets = [];
            $.each(Home.grid.getItems(), function (key, val) {
                var widget = $(val.getElement()).attr('data-widget');
                if (widget) {
                    widgets[widgets.length] = widget;
                }
            });

            App.a.post("/a/home/interface-sorting", {
                widgets: widgets
            }, {
                ok: function (res) {
                    console.log(res);
                },
                no: function (err) {
                    console.log(err);
                }
            });
        }


        $(".grid .grid-item").css({
            position: "absolute"
        });

        this.grid = new Muuri('.grid', {
            // items: generateElements(20),
            layoutDuration: 400,
            layoutEasing: 'ease',
            dragEnabled: true,
            dragSortInterval: 50,
            dragReleaseDuration: 400,
            dragReleseEasing: 'ease',
            fillGaps: true,
            itemDraggingClass: 'muuri-item-dragging',
            dragStartPredicate: {
                handle: '.grid-head'
            }
            // dragEnabled: false,
        }).on('dragEnd', changed);
    }
}

// save user widget settings
function saveSettings() {
    var btn = $("#settings-save");
    var widgets = [];
    $("input[type=checkbox][name=widget]:checked").each(function () {
        widgets[widgets.length] = $(this).val();
    });
    App.a.post("/a/home/interface", {
        widgets: widgets
    }, {
        ok: function (res) {
            if (!res.hasOwnProperty("error")) {
                location.reload();
            } else {
                console.log(res["error"]);
            }
        },
        no: function (err) {
            console.log(err);
        },
        before: function () {
            $(btn).attr("disabled", true);
        },
        end: function () {
            $(btn).attr("disabled", false);
        }
    });
}

$(document).ready(function () {
    // Init home
    Home.init();
});


$(window).load(function () {
    // After init home Then Init Dragger
    Home.initDragger()
});