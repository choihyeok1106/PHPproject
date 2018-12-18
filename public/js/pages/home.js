var Home = {
    init: function () {
        this.initGridBody();
        setTimeout(Home.newAlert);
        setTimeout(Home.widgetSetting);
        setTimeout(Home.widgetBanner);
        setTimeout(Home.widgetSummary);
        setTimeout(Home.widgetNews);
        setTimeout(Home.widgetTeamAlert);
        setTimeout(Home.widgetTracker);
        setTimeout(Home.widgetCalendar);
        setTimeout(Home.widgetActivity);
        setTimeout(Home.widgetCommunity);
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
    // get last my alert
    newAlert: function () {
        Ajax.get("/a/home/new-alert", null, {
            ok: function (res, meta) {
                if (!res.hasOwnProperty("error")) {
                    $("#new-alert").show().find("p").text(res['alert']);
                } else {
                    $("#new-alert").hide().find("p").text("");
                }
                setTimeout(function () {
                    Home.newAlert();
                }, 30000);
            },
            no: function (err) {
                console.log(err);
            },
        });
    },
    // widgetSetting: Open widget settings Popup
    widgetSetting: function () {
        var ui = '<div class="col-md-6">\n' +
            '    <label class="mt-checkbox mt-checkbox-outline"> {{$name}}\n' +
            '        <input type="checkbox" value="{{$id}}" {{$checked}} name="widget">\n' +
            '        <span></span>\n' +
            '    </label>\n' +
            '</div>';
        $("#settings-show").click(function () {
            var btn = $(this);
            Ajax.get("/a/home/interface", null, {
                ok: function (res) {
                    if (!res.hasOwnProperty("error")) {
                        var html = '';
                        $.each(res, function (k, v) {
                            var item = ui;
                            item = item.replace('{{$name}}', v['name']);
                            item = item.replace('{{$id}}', v['id']);
                            item = item.replace('{{$checked}}', v['checked'] ? 'checked' : '');
                            html += item;

                        });
                        $("#modal-widget .modal-body .row").html(html);
                        $("#modal-widget").modal({
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
                    btn.attr("disabled", true);
                },
                end: function () {
                    btn.attr("disabled", false);
                }
            });
        });

        $("#widget-save").click(function () {
            var btn = $(this);
            var widgets = {};
            $("input[type=checkbox][name=widget]").each(function () {
                widgets[$(this).val()] = $(this).is(":checked") ? 1 : 0;
            });
            Ajax.post("/a/home/interface", {
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
                    btn.attr("disabled", true);
                },
                end: function () {
                    btn.attr("disabled", false);
                }
            });
        });
    },
    // widgetBanner: Get banners data
    widgetBanner: function () {
        if (!$("#widget-banner").length) {
            return
        }
        var ui = '<li data-title="{title}">\n' +
            '    <a href="{link}" style="background-image: url({image})">\n' +
            '        <div class="text"><span>{content}</span></div>\n' +
            '    </a>\n' +
            '</li>';

        Ajax.get("/a/home/banners", null, {
            ok: function (res) {
                if (!res.hasOwnProperty("error")) {
                    var html = "";
                    $.each(res, function (k, v) {
                        var item = ui;
                        item = item.replace('{title}', v['title']);
                        item = item.replace('{link}', v['link']);
                        item = item.replace('{image}', v['image']);
                        item = item.replace('{content}', v['text']);

                        html += item;
                    });

                    if (html) {
                        $("#widget-banner .flexslider .slides").html(html);
                        $('.flexslider').flexslider({
                            animation: "slide",
                            controlNav: false,
                            start: function (slide) {
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
                                    $("#widget-banner .grid-caption").text(title)
                                }
                                if (text) {
                                    $("#widget-banner .grid-caption").text(text)
                                }
                            }
                        }
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

        Ajax.get("/a/home/summaries", null, {
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
        var ui = '<div class="mt-comment">\n' +
            '    <div class="mt-comment-img">\n' +
            '        <img src="{{$image}}">\n' +
            '    </div>\n' +
            '    <div class="mt-comment-body">\n' +
            '        <div class="mt-comment-info">\n' +
            '            <span class="mt-comment-author">{{$title}}</span>\n' +
            '            <span class="mt-comment-date">{{$date}}</span>\n' +
            '        </div>\n' +
            '        <div class="mt-comment-text">{{$content}}</div>\n' +
            '        <div class="mt-comment-details"><a href="/news/{{$id}}">View detail</a></div>\n' +
            '    </div>\n' +
            '</div>';

        Ajax.get("/a/home/news", null, {
            ok: function (items) {
                var html = '';
                $.each(items, function (k, v) {
                    var item = ui;
                    item = item.replace('{{$image}}', v.cover);
                    item = item.replace('{{$title}}', v.title);
                    item = item.replace('{{$date}}', v.created_at);
                    item = item.replace('{{$content}}', v.description);
                    item = item.replace('{{$id}}', v.id);
                    html += item;
                });
                if (html) {
                    $("#widget-news .mt-comments").html(html);
                }else{
                    UI.noResult($("#widget-news .mt-comments"),Lang.get("records not found"));
                }
            },
            no: function (err) {
                UI.noResult($("#widget-news .mt-comments"),Lang.get("records not found"));
            },
            end: function () {
                $("#widget-news .svg-loader").remove();
            }
        });
    },
    // widgetTeamAlert: get un read team smart alert count
    widgetTeamAlert: function () {
        if (!$("#widget-alert").length) {
            return
        }
        Ajax.get("/a/home/team-alerts", null, {
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
            percent: 0, // donut pie
            text: '/ 0', // max
            replacePercentageByText: '0', // current
            textSize: 28,
            textStyle: 'font-size: 12px;',
            textColor: '#666',
            textStyle: 'track-ltv-cond',
            fontColor: '#3498DB',
            backgroundColor: '#eee',
            textY: 120,
            description: '#description',
            title: '#title',
            percentageY: 105
            // progressColor: {20: '#CC9487', 40: '#FA6C00', 60: '#FF6C99'}
        }, function () {
            getData();
        });

        var curr = 0;
        var ltv = 0;
        var stv = 0;
        var ranks = [];
        var pie = 0;
        var flag = false;

        function circlePie() {
            if (flag) {
                var elm = $("#tracker-circle .circle");
                var dasharray = parseInt($(elm).attr("stroke-dasharray"));
                if (!isNaN(dasharray)) {
                    if (pie > dasharray) {
                        dasharray += 5;
                        if (dasharray > pie) {
                            dasharray = pie
                        }
                    } else {
                        dasharray -= 5;
                        if (dasharray < pie) {
                            dasharray = pie
                        }
                    }
                    $("#tracker-circle .circle").attr("stroke-dasharray", dasharray + ", 20000");

                    if (dasharray === pie) {
                        flag = false;
                    } else {
                        setTimeout(function () {
                            circlePie();
                        }, 20);
                    }
                }
            }
        }

        function changeTracker(i) {
            curr += i;
            if (curr < -1) {
                curr = -1;
            }
            if (curr > ranks.length - 1) {
                curr = ranks.length - 1;
            }
            var traget = curr + 1;
            if (!ranks[traget]) {
                traget = curr;
            }

            $("#tracker-circle text[style=track-ltv-cond]").eq(0).text('/ ' + Util.numberFormat(ranks[traget]['cond_ltv']));
            $("#tracker-circle .timer .number").text(Util.numberFormat(ltv));
            $("#track-stv-curr").text(Util.numberFormat(stv));
            $("#track-stv-cond").text(Util.numberFormat(ranks[traget]['cond_stv']));
            $("#track-name").text(ranks[traget]['name']);
            $("#track-ltv").text(Util.numberFormat(ranks[traget]['cond_ltv']));
            $("#track-stv").text(Util.numberFormat(ranks[traget]['cond_stv']));
            // ltv circle
            var per = 0;
            if (ltv > ranks[traget]['cond_ltv']) {
                per = 360;
            } else {
                if (ltv > 0) {
                    per = parseInt(ltv / ranks[traget]['cond_ltv'] * 360)
                }
            }
            if (per > 0) {
                if (per !== pie) {
                    pie = per;
                    if (!flag) {
                        flag = true;
                        circlePie();
                    }
                }
            }
            // stv bar
            per = 100;
            if (stv > ranks[traget]['cond_stv']) {
                per = 100;
            } else {
                if (stv > 0) {
                    per = stv / ranks[traget]['cond_stv'] * 100;
                }
            }
            if (per > 0) {
                $("#track-stv-bar").css("width", per + "%");
            }
        }

        $("#track-prev").click(function () {
            if (!flag) {
                changeTracker(-1);
            }
        });

        $("#track-next").click(function () {
            if (!flag) {
                changeTracker(1);
            }
        });

        function getData() {
            Ajax.get("/a/home/tracker", null, {
                ok: function (res) {
                    if (!res.hasOwnProperty('error')) {
                        curr = res['curr'];
                        ltv = res['ltv'];
                        stv = res['stv'];
                        ranks = res['ranks'];
                        changeTracker(0)
                    }
                },
                no: function (err) {
                    console.log(err);
                }
            });
        }

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
            // events: events,
            dayClick: function () {
                alert('a day has been clicked!');
            },
            eventAfterAllRender: function (calendar) {

            }
        });

        var calendar = $('#calendar').fullCalendar('getCalendar');

        var view = $('#calendar').fullCalendar('getView');

        function setTitle() {
            $("#widget-calendar .grid-caption").text(view.title)
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

        Ajax.get("/a/home/schedules", null, {
            ok: function (res) {
                if (!res.hasOwnProperty('error')) {
                    // calendar.updateEvent(res);
                    $('#calendar').fullCalendar('addEventSource', res);
                    // $('#calendar').fullCalendar('updateEvent', res);
                }
            },
            no: function (err) {
                console.log(err);
            }
        });

    },
    // widgetActivity: get activity data
    widgetActivity: function () {
        if (!$("#widget-activity").length) {
            return
        }
        var ui_timeline = '<li>\n' +
            '    <a href="#0" data-date="{{$date}}" class="border-after-red bg-after-red {{$selected}}">\n' +
            '        {{$goal}}\n' +
            '    </a>\n' +
            '</li>';
        var ui_content = '<li class="{{$selected}}" data-date="{{$date}}">\n' +
            '    <div class="mt-title">\n' +
            '        <h2 class="mt-content-title">{{$title}}</h2>\n' +
            '    </div>\n' +
            '    <div class="mt-author">\n' +
            '        <div class="mt-author-name">\n' +
            '            <a href="javascript:;" class="font-blue-madison">{{$i}} /7 Completed</a>\n' +
            '        </div>\n' +
            '        <div class="mt-author-datetime font-grey-mint">{{$end}}</div>\n' +
            '    </div>\n' +
            '    <div class="clearfix"></div>\n' +
            '    <div class="mt-content border-grey-steel">\n' +
            '        <p>{{$content}}</p>\n' +
            '        <a href="{{$link}}" class="btn btn-circle btn-outline btn-sm blue">\n' +
            '            View all Courses\n' +
            '        </a>\n' +
            '    </div>\n' +
            '</li>';
        Ajax.get("/a/home/activities", null, {
            ok: function (res) {
                if (!res.hasOwnProperty('error')) {
                    var timelines = '';
                    var contents = '';
                    $.each(res, function (k, v) {
                        var timeline = ui_timeline;
                        timeline = timeline.replace('{{$date}}', v['date']);
                        timeline = timeline.replace('{{$goal}}', v['goal']);
                        timeline = timeline.replace('{{$selected}}', k === 0 ? 'selected' : '');
                        timelines += timeline;
                        var content = ui_content;
                        content = content.replace('{{$date}}', v['date']);
                        content = content.replace('{{$title}}', v['title']);
                        content = content.replace('{{$i}}', k + 1);
                        content = content.replace('{{$end}}', v['end']);
                        content = content.replace('{{$content}}', v['detail']);
                        content = content.replace('{{$link}}', '#');
                        content = content.replace('{{$selected}}', k === 0 ? 'selected' : '');
                        contents += content;
                    });

                    $("#widget-activity .timeline ol").html(timelines);
                    $("#widget-activity .events-content ol").html(contents);
                    // $("#widget-activity .scroller").html(res['view']);
                    if ($("#widget-activity .events li").length) {
                        timeline.init();
                    }
                }
            },
            no: function (err) {
                console.log(err);
            },
            end: function () {
                $("#widget-activity .svg-loader").remove();
                $("#widget-activity .cd-horizontal-timeline").show();
            }
        });
    },
    // widgetCommunity: get pure community data
    widgetCommunity: function () {
        if (!$("#widget-community").length) {
            return
        }
        var ui = '<div class="item">\n' +
            '    <div class="item-head">\n' +
            '        <div class="item-details">\n' +
            '            <img class="item-pic rounded" src="{{$image}}">\n' +
            '            <span class="item-name primary-link">{{$name}}</span>\n' +
            '            <span class="item-label">{{$time}}</span>\n' +
            '        </div>\n' +
            '        <span class="item-status">\n' +
            '           <span class="text-info">\n' +
            '               <i class="icon-emoticon-smile"></i> {{$likes}}\n' +
            '           </span>\n' +
            '            &nbsp;\n' +
            '           <span class="text-info">\n' +
            '               <i class="icon-bubbles"></i> {{$comments}}\n' +
            '           </span>\n' +
            '            &nbsp;\n' +
            '        </span>\n' +
            '    </div>\n' +
            '    <div class="item-body">\n' +
            '        {{$content}}\n' +
            '        <div class="link"><a href="{{$link}}">View detail</a></div>\n' +
            '    </div>\n' +
            '</div>';
        Ajax.get("/a/home/communities", null, {
            ok: function (res) {
                if (!res.hasOwnProperty('error')) {
                    var html = '';
                    $.each(res, function (k, v) {
                        var item = ui;
                        item = item.replace('{{$image}}', v['photo']);
                        item = item.replace('{{$link}}', '/community/' + v['id']);
                        item = item.replace('{{$name}}', v['name']);
                        item = item.replace('{{$time}}', v['created_at']);
                        item = item.replace('{{$likes}}', v['likes']);
                        item = item.replace('{{$comments}}', v['comments']);
                        item = item.replace('{{$content}}', v['content']);
                        html += item;
                    });
                    $("#widget-community .general-item-list").append(html);
                }
            },
            no: function (err) {
                console.log(err);
            },
            end: function () {
                $("#widget-community .svg-loader").remove();
            }
        });
    },
    // initDragger: init dragger and set widget sorting
    initDragger: function () {
        var grid = new Muuri('.grid', {
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

        function changed() {
            var widgets = [];
            $.each(grid.getItems(), function (key, val) {
                var widget = $(val.getElement()).attr('data-widget');
                if (widget) {
                    widgets[widgets.length] = widget;
                }
            });
            Ajax.post("/a/home/interface-sorting", {
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
    }
};

var timeline = {
    init: function () {
        var timelines = $('.cd-horizontal-timeline');
        var eventsMinDistance;

        (timelines.length > 0) && initTimeline(timelines);

        function initTimeline(timelines) {
            timelines.each(function () {
                eventsMinDistance = $(this).data('spacing');
                var timeline = $(this),
                    timelineComponents = {};
                //cache timeline components
                timelineComponents['timelineWrapper'] = timeline.find('.events-wrapper');
                timelineComponents['eventsWrapper'] = timelineComponents['timelineWrapper'].children('.events');
                timelineComponents['fillingLine'] = timelineComponents['eventsWrapper'].children('.filling-line');
                timelineComponents['timelineEvents'] = timelineComponents['eventsWrapper'].find('a');
                timelineComponents['timelineDates'] = parseDate(timelineComponents['timelineEvents']);
                timelineComponents['eventsMinLapse'] = minLapse(timelineComponents['timelineDates']);
                timelineComponents['timelineNavigation'] = timeline.find('.cd-timeline-navigation');
                timelineComponents['eventsContent'] = timeline.children('.events-content');

                //assign a left postion to the single events along the timeline
                setDatePosition(timelineComponents, eventsMinDistance);
                //assign a width to the timeline
                var timelineTotWidth = setTimelineWidth(timelineComponents, eventsMinDistance);
                //the timeline has been initialize - show it
                timeline.addClass('loaded');

                //detect click on the next arrow
                timelineComponents['timelineNavigation'].on('click', '.next', function (event) {
                    event.preventDefault();
                    updateSlide(timelineComponents, timelineTotWidth, 'next');
                });
                //detect click on the prev arrow
                timelineComponents['timelineNavigation'].on('click', '.prev', function (event) {
                    event.preventDefault();
                    updateSlide(timelineComponents, timelineTotWidth, 'prev');
                });
                //detect click on the a single event - show new event content
                timelineComponents['eventsWrapper'].on('click', 'a', function (event) {
                    event.preventDefault();
                    timelineComponents['timelineEvents'].removeClass('selected');
                    $(this).addClass('selected');
                    updateOlderEvents($(this));
                    updateFilling($(this), timelineComponents['fillingLine'], timelineTotWidth);
                    updateVisibleContent($(this), timelineComponents['eventsContent']);
                });

                //on swipe, show next/prev event content
                timelineComponents['eventsContent'].on('swipeleft', function () {
                    var mq = checkMQ();
                    (mq == 'mobile') && showNewContent(timelineComponents, timelineTotWidth, 'next');
                });
                timelineComponents['eventsContent'].on('swiperight', function () {
                    var mq = checkMQ();
                    (mq == 'mobile') && showNewContent(timelineComponents, timelineTotWidth, 'prev');
                });

                //keyboard navigation
                $(document).keyup(function (event) {
                    if (event.which == '37' && elementInViewport(timeline.get(0))) {
                        showNewContent(timelineComponents, timelineTotWidth, 'prev');
                    } else if (event.which == '39' && elementInViewport(timeline.get(0))) {
                        showNewContent(timelineComponents, timelineTotWidth, 'next');
                    }
                });
            });
        }

        function updateSlide(timelineComponents, timelineTotWidth, string) {
            //retrieve translateX value of timelineComponents['eventsWrapper']
            var translateValue = getTranslateValue(timelineComponents['eventsWrapper']),
                wrapperWidth = Number(timelineComponents['timelineWrapper'].css('width').replace('px', ''));
            //translate the timeline to the left('next')/right('prev')
            (string == 'next')
                ? translateTimeline(timelineComponents, translateValue - wrapperWidth + eventsMinDistance, wrapperWidth - timelineTotWidth)
                : translateTimeline(timelineComponents, translateValue + wrapperWidth - eventsMinDistance);
        }

        function showNewContent(timelineComponents, timelineTotWidth, string) {
            //go from one event to the next/previous one
            var visibleContent = timelineComponents['eventsContent'].find('.selected'),
                newContent = (string == 'next') ? visibleContent.next() : visibleContent.prev();

            if (newContent.length > 0) { //if there's a next/prev event - show it
                var selectedDate = timelineComponents['eventsWrapper'].find('.selected'),
                    newEvent = (string == 'next') ? selectedDate.parent('li').next('li').children('a') : selectedDate.parent('li').prev('li').children('a');

                updateFilling(newEvent, timelineComponents['fillingLine'], timelineTotWidth);
                updateVisibleContent(newEvent, timelineComponents['eventsContent']);
                newEvent.addClass('selected');
                selectedDate.removeClass('selected');
                updateOlderEvents(newEvent);
                updateTimelinePosition(string, newEvent, timelineComponents);
            }
        }

        function updateTimelinePosition(string, event, timelineComponents) {
            //translate timeline to the left/right according to the position of the selected event
            var eventStyle = window.getComputedStyle(event.get(0), null),
                eventLeft = Number(eventStyle.getPropertyValue("left").replace('px', '')),
                timelineWidth = Number(timelineComponents['timelineWrapper'].css('width').replace('px', '')),
                timelineTotWidth = Number(timelineComponents['eventsWrapper'].css('width').replace('px', ''));
            var timelineTranslate = getTranslateValue(timelineComponents['eventsWrapper']);

            if ((string == 'next' && eventLeft > timelineWidth - timelineTranslate) || (string == 'prev' && eventLeft < -timelineTranslate)) {
                translateTimeline(timelineComponents, -eventLeft + timelineWidth / 2, timelineWidth - timelineTotWidth);
            }
        }

        function translateTimeline(timelineComponents, value, totWidth) {
            var eventsWrapper = timelineComponents['eventsWrapper'].get(0);
            value = (value > 0) ? 0 : value; //only negative translate value
            value = (!(typeof totWidth === 'undefined') && value < totWidth) ? totWidth : value; //do not translate more than timeline width
            setTransformValue(eventsWrapper, 'translateX', value + 'px');
            //update navigation arrows visibility
            (value == 0) ? timelineComponents['timelineNavigation'].find('.prev').addClass('inactive') : timelineComponents['timelineNavigation'].find('.prev').removeClass('inactive');
            (value == totWidth) ? timelineComponents['timelineNavigation'].find('.next').addClass('inactive') : timelineComponents['timelineNavigation'].find('.next').removeClass('inactive');
        }

        function updateFilling(selectedEvent, filling, totWidth) {
            //change .filling-line length according to the selected event
            var eventStyle = window.getComputedStyle(selectedEvent.get(0), null),
                eventLeft = eventStyle.getPropertyValue("left"),
                eventWidth = eventStyle.getPropertyValue("width");
            eventLeft = Number(eventLeft.replace('px', '')) + Number(eventWidth.replace('px', '')) / 2;
            var scaleValue = eventLeft / totWidth;
            setTransformValue(filling.get(0), 'scaleX', scaleValue);
        }

        function setDatePosition(timelineComponents, min) {
            for (i = 0; i < timelineComponents['timelineDates'].length; i++) {
                var distance = daydiff(timelineComponents['timelineDates'][0], timelineComponents['timelineDates'][i]),
                    distanceNorm = Math.round(distance / timelineComponents['eventsMinLapse']) + 2;
                var dis = distanceNorm * min;
                if (i > 0) {
                    dis = dis - min + (min / (timelineComponents['timelineDates'].length - 1)) * (1 + 1 / timelineComponents['timelineDates'].length) * (i + 1);
                } else {
                    dis = dis - min;
                }
                timelineComponents['timelineEvents'].eq(i).css('left', dis + 'px');
            }
        }

        function setTimelineWidth(timelineComponents, width) {
            var timeSpan = daydiff(timelineComponents['timelineDates'][0], timelineComponents['timelineDates'][timelineComponents['timelineDates'].length - 1]),
                timeSpanNorm = timeSpan / timelineComponents['eventsMinLapse'],
                timeSpanNorm = Math.round(timeSpanNorm) + 4,
                totalWidth = timeSpanNorm * width;
            timelineComponents['eventsWrapper'].css('width', totalWidth + 'px');
            updateFilling(timelineComponents['eventsWrapper'].find('a.selected'), timelineComponents['fillingLine'], totalWidth);
            updateTimelinePosition('next', timelineComponents['eventsWrapper'].find('a.selected'), timelineComponents);

            return totalWidth;
        }

        function updateVisibleContent(event, eventsContent) {
            var eventDate = event.data('date'),
                visibleContent = eventsContent.find('.selected'),
                selectedContent = eventsContent.find('[data-date="' + eventDate + '"]'),
                selectedContentHeight = selectedContent.height();

            if (selectedContent.index() > visibleContent.index()) {
                var classEnetering = 'selected enter-right',
                    classLeaving = 'leave-left';
            } else {
                var classEnetering = 'selected enter-left',
                    classLeaving = 'leave-right';
            }

            selectedContent.attr('class', classEnetering);
            visibleContent.attr('class', classLeaving).one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function () {
                visibleContent.removeClass('leave-right leave-left');
                selectedContent.removeClass('enter-left enter-right');
            });
            eventsContent.css('height', selectedContentHeight + 'px');
        }

        function updateOlderEvents(event) {
            event.parent('li').prevAll('li').children('a').addClass('older-event').end().end().nextAll('li').children('a').removeClass('older-event');
        }

        function getTranslateValue(timeline) {
            var timelineStyle = window.getComputedStyle(timeline.get(0), null),
                timelineTranslate = timelineStyle.getPropertyValue("-webkit-transform") ||
                    timelineStyle.getPropertyValue("-moz-transform") ||
                    timelineStyle.getPropertyValue("-ms-transform") ||
                    timelineStyle.getPropertyValue("-o-transform") ||
                    timelineStyle.getPropertyValue("transform");

            if (timelineTranslate.indexOf('(') >= 0) {
                var timelineTranslate = timelineTranslate.split('(')[1];
                timelineTranslate = timelineTranslate.split(')')[0];
                timelineTranslate = timelineTranslate.split(',');
                var translateValue = timelineTranslate[4];
            } else {
                var translateValue = 0;
            }

            return Number(translateValue);
        }

        function setTransformValue(element, property, value) {
            element.style["-webkit-transform"] = property + "(" + value + ")";
            element.style["-moz-transform"] = property + "(" + value + ")";
            element.style["-ms-transform"] = property + "(" + value + ")";
            element.style["-o-transform"] = property + "(" + value + ")";
            element.style["transform"] = property + "(" + value + ")";
        }

        //based on http://stackoverflow.com/questions/542938/how-do-i-get-the-number-of-days-between-two-dates-in-javascript
        function parseDate(events) {
            var dateArrays = [];
            events.each(function () {
                var singleDate = $(this),
                    dateComp = singleDate.data('date').split('T');
                if (dateComp.length > 1) { //both DD/MM/YEAR and time are provided
                    var dayComp = dateComp[0].split('/'),
                        timeComp = dateComp[1].split(':');
                } else if (dateComp[0].indexOf(':') >= 0) { //only time is provide
                    var dayComp = ["2000", "0", "0"],
                        timeComp = dateComp[0].split(':');
                } else { //only DD/MM/YEAR
                    var dayComp = dateComp[0].split('/'),
                        timeComp = ["0", "0"];
                }
                var newDate = new Date(dayComp[2], dayComp[1] - 1, dayComp[0], timeComp[0], timeComp[1]);
                dateArrays.push(newDate);
            });
            return dateArrays;
        }

        function daydiff(first, second) {
            return Math.round((second - first));
        }

        function minLapse(dates) {
            //determine the minimum distance among events
            var dateDistances = [];
            for (i = 1; i < dates.length; i++) {
                var distance = daydiff(dates[i - 1], dates[i]);
                dateDistances.push(distance);
            }
            return Math.min.apply(null, dateDistances);
        }

        /*
            How to tell if a DOM element is visible in the current viewport?
            http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
        */
        function elementInViewport(el) {
            var top = el.offsetTop;
            var left = el.offsetLeft;
            var width = el.offsetWidth;
            var height = el.offsetHeight;

            while (el.offsetParent) {
                el = el.offsetParent;
                top += el.offsetTop;
                left += el.offsetLeft;
            }

            return (
                top < (window.pageYOffset + window.innerHeight) &&
                left < (window.pageXOffset + window.innerWidth) &&
                (top + height) > window.pageYOffset &&
                (left + width) > window.pageXOffset
            );
        }

        function checkMQ() {
            //check if mobile or desktop device
            return window.getComputedStyle(document.querySelector('.cd-horizontal-timeline'), '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, "");
        }
    }
};

$(document).ready(function () {
    // Init home
    Home.init();
});


$(window).load(function () {
    // After init home Then Init Dragger
    Home.initDragger()
});