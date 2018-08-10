var Dashboard = {
    grid: null,
    init: function () {
        setTimeout('Dashboard.initBanner()', Math.random() * 1000);
        setTimeout('Dashboard.initSummary()', Math.random() * 1000);
        setTimeout('Dashboard.initNews()', Math.random() * 1000);
        this.initDonutChart();
        this.initCalendar();
    },
    format: function (num, float) {
        var separator = ',';
        var parts;
        // 判断是否为数字
        if (!isNaN(parseFloat(num)) && isFinite(num)) {
            // 把类似 .5, 5. 之类的数据转化成0.5, 5, 为数据精度处理做准, 至于为什么
            // 不在判断中直接写 if (!isNaN(num = parseFloat(num)) && isFinite(num))
            // 是因为parseFloat有一个奇怪的精度问题, 比如 parseFloat(12312312.1234567119)
            // 的值变成了 12312312.123456713
            num = Number(num);
            // 处理小数点位数
            num = (typeof float !== 'undefined' ? num.toFixed(float) : num).toString();
            // 分离数字的小数部分和整数部分
            parts = num.split('.');
            // 整数部分加[separator]分隔, 借用一个著名的正则表达式
            parts[0] = parts[0].toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1' + (separator || ','));

            return parts.join('.');
        }
        return NaN;
    },

    // Banner
    initBanner: function () {
        Pure.get("/html/demo/dashboard.php", {type: "banner"}, {
            loading: false,
            success: function (res) {
                html = "";
                $.each(res, function (k, v) {
                    html += '<li data-title="' + v.title + '" ><a href="' + v.url + '" style="background-image: url(' + v.image + ')"><div class="text"><span>' + v.text + '</span></div></a></li>';
                });
                $(".widget-banner .slides").append(html);
                $(".widget-banner").addClass("active");
                setTimeout('$(".widget-banner .app-svg").remove()', 1000);
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: false,
                    start: function (slide) {
                        var f = $(".widget-banner .slides li").eq(1);
                        Dashboard.changeBanner(f);
                    },
                    after: function (slide) {
                        var current = slide.currentSlide + 1;
                        var c = $(".widget-banner .slides li").eq(current);
                        Dashboard.changeBanner(c);
                    },
                });

            },
            error: function (err) {
                log(err);
            }
        });
    },
    changeBanner: function (el) {
        if (el != undefined) {
            var title = $(el).attr("data-title");
            var text = $(el).attr("data-text");
            if (title) {
                $("#banner-title").text(title)
            }
            if (text) {
                $("#banner-text").text(text)
            }
        }

    },
    // init Summary
    initSummary: function () {
        $("#summary-curr-btn").on("click", function () {
            $(this).addClass("active");
            $("#summary-last-btn").removeClass("active");
            $("#summary-curr-tb").show();
            $("#summary-last-tb").hide();
        });
        $("#summary-last-btn").on("click", function () {
            $(this).addClass("active");
            $("#summary-curr-btn").removeClass("active");
            $("#summary-curr-tb").hide();
            $("#summary-last-tb").show();
        });

        Pure.get("/html/demo/dashboard.php", {type: "summary"}, {
            loading: false,
            success: function (res) {
                function setCounter(el, val, count, float) {
                    count = count == undefined ? true : false
                    $(el).text(Dashboard.format(val));
                    if (count) {
                        $(el).attr("data-value", Dashboard.format(val, float));
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
                $("#curr-rank-name b").html(curr.rank.name);
                $("#curr-rank-name span").text(curr.rank.short);
                $("#curr-rank-short").text(curr.rank.short);
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
                $("#last-rank-name b").html(last.rank.name);
                $("#last-rank-name span").text(last.rank.short);
                $("#last-rank-short").text(last.rank.short);
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
            error: function (err) {
                log(err);
            }
        });
    },
    // news
    initNews: function () {
        Pure.get("/html/demo/dashboard.php", {type: "news"}, {
            loading: false,
            success: function (res) {
                html = '';
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
                $(".widget-news .mt-comments").append(html);
                $(".widget-news .app-svg").hide();
                $(".widget-news .mt-comments").show();
            },
            error: function (err) {
                log(err);
            }
        });
    },
    // Tracker
    initDonutChart: function () {
        $("#test-circle").circliful({
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
    initCalendar: function () {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var h = {};

        if ($('#calendar').width() <= 768) {
            $('#calendar').addClass("mobile");
            h = {
                left: 'title, prev, next',
                center: '',
                right: 'today,month,agendaWeek,agendaDay'
            };
        } else {
            $('#calendar').removeClass("mobile");
            if (App.isRTL()) {
                h = {
                    right: 'title',
                    center: '',
                    left: 'prev,next,today,month,agendaWeek,agendaDay'
                };
            } else {
                h = {
                    left: 'title',
                    center: '',
                    right: 'prev,next,today,month,agendaWeek,agendaDay'
                };
            }
        }


        $('#calendar').fullCalendar('destroy'); // destroy the calendar
        $('#calendar').fullCalendar({ //re-initialize the calendar
            disableDragging: false,
            header: h,
            editable: true,
            events: [{
                title: 'All Day',
                start: new Date(y, m, 1),
                backgroundColor: App.getBrandColor('yellow')
            }, {
                title: 'Long Event',
                start: new Date(y, m, d - 5),
                end: new Date(y, m, d - 2),
                backgroundColor: App.getBrandColor('blue')
            }, {
                title: 'Repeating Event',
                start: new Date(y, m, d - 3, 16, 0),
                allDay: false,
                backgroundColor: App.getBrandColor('red')
            }, {
                title: 'Repeating Event',
                start: new Date(y, m, d + 6, 16, 0),
                allDay: false,
                backgroundColor: App.getBrandColor('green')
            }, {
                title: 'Meeting',
                start: new Date(y, m, d + 9, 10, 30),
                allDay: false
            }, {
                title: 'Lunch',
                start: new Date(y, m, d, 14, 0),
                end: new Date(y, m, d, 14, 0),
                backgroundColor: App.getBrandColor('grey'),
                allDay: false
            }, {
                title: 'Birthday',
                start: new Date(y, m, d + 1, 19, 0),
                end: new Date(y, m, d + 1, 22, 30),
                backgroundColor: App.getBrandColor('purple'),
                allDay: false
            }, {
                title: 'Click for Google',
                start: new Date(y, m, 28),
                end: new Date(y, m, 29),
                backgroundColor: App.getBrandColor('yellow'),
                url: 'http://google.com/'
            }]
        });
    },
    initGird: function () {
        function move() {
            log("Save Widgets")
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
            // dragEnabled: false,
        }).on('move', move);
    },
    resetGrid: function () {
        if (this.grid != null) {
            if ($(window).width() > 1200) {
                this.grid.draggable(true);
            } else {
                this.grid.draggable(false);
            }
        }
    }
}


$(document).ready(function () {
    Dashboard.init(); // init metronic core componets
});


$(window).load(function () {
    Dashboard.initGird()
});