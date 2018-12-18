var Support_Faq = {
    init: function () {
        setTimeout(Support_Faq.initFaqs);
    },
    initFaqs: function () {
        var ui = '<div class="col-md-6">\n' +
            '            <div class="faq-section">\n' +
            '                <h2 class="faq-title uppercase font-blue">{{$name}}</h2>\n' +
            '                <div class="panel-group accordion faq-content" id="accordion{{$id}}">\n' +
            '                    <div class="panel panel-default">\n' +
            '                        <div class="panel-heading">\n' +
            '                            <h4 class="panel-title">\n' +
            '                                <i class="fa fa-circle"></i>\n' +
            '                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion{{$id2}}"\n' +
            '                                   href="#collapse_{{$children->id}}_{{$children->faqs->id}}">{{$children->faqs->question}}</a>\n' +
            '                            </h4>\n' +
            '                        </div>\n' +
            '                        <div id="collapse_{{$children->id2}}_{{$children->faqs->id2}}" class="panel-collapse collapse">\n' +
            '                            <div class="panel-body">\n' +
            '                                <p>{{$children->faqs->answer}}</p>\n' +
            '                            </div>\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '            </div>\n' +
            '        </div>';
        // Ajax request data flag
        var loading = false;

        var render = function (faqs) {
                var html = '';
                $.each(faqs, function (k, v) {
                    var item = ui;
                    item = item.replace('{{$name}}', v['name']);
                    item = item.replace('{{$id}}', v['id']);
                    item = item.replace('{{$id2}}', v['id']);
                    if (v['children'].length != 0) {
                        $.each(v['children'], function (children_k, children_v) {
                            item = item.replace('{{$children->id}}', children_v['id']);
                            item = item.replace('{{$children->faqs->id}}', children_v['faqs'][0]['id']);
                            item = item.replace('{{$children->id2}}', children_v['id']);
                            item = item.replace('{{$children->faqs->id2}}', children_v['faqs'][0]['id']);
                            item = item.replace('{{$children->faqs->question}}', children_v['faqs'][0]['question']);
                            item = item.replace('{{$children->faqs->answer}}', children_v['faqs'][0]['answer']);
                        });
                    }else {
                        item = item.replace('{{$children->id}}', "");
                        item = item.replace('{{$children->faqs->id}}', "");
                        item = item.replace('{{$children->id2}}',"");
                        item = item.replace('{{$children->faqs->id2}}', "");
                        item = item.replace('{{$children->faqs->question}}', "");
                        item = item.replace('{{$children->faqs->answer}}', "");
                    }
                    html += item;
                });
                $("#faqs").append(html);
            };
// ajax request faqs
        var getFaqs = function (firstLoad) {
            if (!loading) {
                Ajax.get("/a/support/faqs", null, {
                    ok: function (res) {
                        if (!res.hasOwnProperty("error")) {
                            loading = false;
                            render(res['faqs']);
                        }
                    },
                    no: function (err) {
                        console.log(err);
                    },
                    before: function () {
                        loading = true;
                        if (!firstLoad) {
                            $("#faqs").append('<div class="faqs-loader"><div class="loader"></div></div>');
                        }
                    },
                    end: function () {
                        $("#faqs #svg").remove();
                        $(".faqs-loader").remove();
                    }
                });
            }
        };
// first request
        getFaqs(true);
    }
}

$(document).ready(function () {
    // Init home
    Support_Faq.init();
});
