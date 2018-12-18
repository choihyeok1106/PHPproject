var Support_Faq = {
    init: function () {
        setTimeout(Support_Faq.initFaqs);
    },
    initFaqs: function () {
        var chilren_ui =
            '                    <div class="panel panel-default">\n' +
            '                        <div class="panel-heading">\n' +
            '                            <h4 class="panel-title">\n' +
            '                                <i class="fa fa-circle"></i>\n' +
            '                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion{{$id}}"\n' +
            '                                   href="#collapse_{{$children->id}}_{{$children->faqs->id}}">{{$children->faqs->question}}</a>\n' +
            '                            </h4>\n' +
            '                        </div>\n' +
            '                        <div id="collapse_{{$children->id2}}_{{$children->faqs->id2}}" class="panel-collapse collapse">\n' +
            '                            <div class="panel-body">\n' +
            '                                <p>{{$children->faqs->answer}}</p>\n' +
            '                            </div>\n' +
            '                        </div>\n' +
            '                    </div>\n';


        var faq_ui = '<div class="col-md-6">\n' +
            '            <div class="faq-section">\n' +
            '                <h2 class="faq-title uppercase font-blue">{{$name}}</h2>\n' +
            '                <div class="panel-group accordion faq-content" id="accordion{{$id}}">{{$children_ui}}</div>\n' +
            '            </div>\n' +
            '        </div>';
        // Ajax request data flag
        var loading = false;

        var render = function (faqs) {
            var html = '';
            var html_children = '';
            $.each(faqs, function (k, v) {
                var faqs = faq_ui;
                var faqs_children = chilren_ui;
                console.log(v['children']);
                if (v['children'].length != 0) {
                    $.each(v['children'], function (children_k, children_v) {
                        console.log(faqs_children);
                        faqs_children = faqs_children.replace('{{$id}}', v['id']);
                        faqs_children = faqs_children.replace('{{$children->id}}', children_v['id']);
                        faqs_children = faqs_children.replace('{{$children->faqs->id}}', children_v['faqs'][0]['id']);
                        faqs_children = faqs_children.replace('{{$children->id2}}', children_v['id']);
                        faqs_children = faqs_children.replace('{{$children->faqs->id2}}', children_v['faqs'][0]['id']);
                        faqs_children = faqs_children.replace('{{$children->faqs->question}}', children_v['faqs'][0]['question']);
                        faqs_children = faqs_children.replace('{{$children->faqs->answer}}', children_v['faqs'][0]['answer']);
                    });
                } else {
                    faqs = faqs.replace('{{$children_ui}}', "");
                }
                faqs = faqs.replace('{{$name}}', v['name']);
                faqs = faqs.replace('{{$children_ui}}', html_children);
                html += faqs;
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
