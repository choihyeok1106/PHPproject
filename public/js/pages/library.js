var Tool_Library = {
    loadable: true,
    items: {},
    meta: {
        count: 0,
        per_page: 0,
        next: ''
    },
    init: function () {
        setTimeout(Tool_Library.initCategory);
        setTimeout(Tool_Library.initSearch);
        setTimeout(Tool_Library.initLibraries);
    },
    initCategory: function () {
        var categories_section_ui = '<li style="line-height:37px;">\n' +
            '                        <a href="#" data-value="{{$category_id}}" data-toggle="collapse" data-target="#collapse{{$id}}" aria-expanded="false"\n' +
            '                           style="padding-left: 5px;"\n' +
            '                           class="pl-5">{{$name}} {{icon}}</a>\n' +
            '                           {{$categories_children}}' +
            '                    </li>';

        var categories_children_ui = '<ul class="margin-bottom-10 margin-top-5 collapse category_child" style="padding-left:0;" id="collapse{{$id}}">\n' +
            '                          {{$children_ui}}' +
            '                      </ul>';

        var icon = "<i class=\"icon-action fa fa-chevron-down pull-right margin-0\" style=\"background-color: #ffffff !important;color:#b9cbd5 !important;\"></i>";

        var children_ui = '<li class="list-dot children-hover" style="line-height:37px;">\n' +
            '              <a href="#" data-value="{{$category_id}}">{{$name}}</a>\n' +
            '           </li>';

        // ajax request library
        Ajax.get("/a/tools/library/categories", null, {
            ok: function (res) {
                var library = '';
                $.each(res, function (k, v) {
                    var categories_children = categories_children_ui;
                    var categories_section = categories_section_ui;
                    var children = children_ui;

                    categories_children = categories_children_ui;
                    categories_children = categories_children.replace('{{$id}}', v['id']);
                    if (v['children'].length != 0) {
                        categories_section = categories_section_ui;
                        categories_section = categories_section.replace('{{icon}}', icon);
                        var html_children = '';
                        $.each(v['children'], function (children_k, children_v) {
                            children = children_ui;
                            children = children.replace('{{$name}}', children_v['name']);
                            children = children.replace('{{$category_id}}', children_v['id']);
                            html_children += children;
                        });
                        categories_children = categories_children.replace('{{$children_ui}}', html_children);
                        categories_children = categories_children.replace('{{$id}}', v['id']);
                    } else {
                        categories_section = categories_section_ui;
                        categories_section = categories_section.replace('{{icon}}', "");
                        categories_section = categories_section.replace('{{$categories_children}}', "");

                        categories_children = categories_children.replace('{{$id}}', v['id']);
                    }
                    categories_section = categories_section.replace('{{$name}}', v['name']);
                    categories_section = categories_section.replace('{{$id}}', v['id']);
                    categories_section = categories_section.replace('{{$category_id}}', v['id']);
                    categories_section = categories_section.replace('{{$categories_children}}', categories_children);
                    library += categories_section;
                });
                $('#library_category').append(library);

                $('[data-toggle="collapse"]').click(function () {
                    if ($(this).attr('aria-expanded') == 'false') {
                        $(this).find('i').addClass('fa-chevron-up');
                        $(this).find('i').removeClass('fa-chevron-down');
                    } else {
                        $(this).find('i').addClass('fa-chevron-down');
                        $(this).find('i').removeClass('fa-chevron-up');
                    }
                });
                $('[data-value]').click(function () {
                    $(".category_child a").removeClass("active");
                    $(this).addClass("active");
                    $('#category-id').val($(this).data('value'));
                    Tool_Library.Refresh('category');
                })
            }
        });
    },
    initSearch: function () {
        //autocomplete ul
        var search = function () {
            var projects = [];
            Ajax.get('/a/tools/library', null, {
                ok: function (res) {
                    $.each(res, function (k, v) {
                        $.each(v, function (_k, _v) {
                            projects.push({
                                value: _v["title"],
                                label: _v['title'],
                                icon: "/img/files/" + _v['type'] + ".svg"
                            });
                        });
                    });

                    j$("#library_search").autocomplete({
                        minLength: 0,
                        source: projects
                    }).autocomplete("instance")._renderItem = function (ul, item) {
                        return j$("<li>")
                            .append("<div> <img src=' " + item.icon + " ' style='width:30px;'>" + item.label + "</div>")
                            .appendTo(ul);
                    };
                }
            });
        };

        $('#library_search').on('keyup', function () {
            Tool_Library.Refresh('search');
            search();
        });
    },
    initLibraries: function () {
        Tool_Library.Refresh();
    },
    ParseMeta: function (meta) {
        Tool_Library.meta = {
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
                            Tool_Library.meta.count = count;
                        }
                    }
                    if (pagination.hasOwnProperty("per_page")) {
                        var per_page = parseInt(pagination.per_page)
                        if (!isNaN(per_page)) {
                            Tool_Library.meta.per_page = per_page;
                        }
                    }
                    if (pagination.hasOwnProperty("links") && typeof pagination.links === 'object' && pagination.links.hasOwnProperty("next")) {
                        Tool_Library.meta.next = pagination.links.next;
                    }
                }
            }
        }
    },
    Render: function (libraries) {
        var libraries_section_ui = '<ul class="list-group list-group-flush">\n' +
            '    <h3 class="margin-bottom-5">{{$category}}</h3>\n' +
            '{{$children_ui}} \n' +
            '</ul>';

        var libraries_children_ui = '<li class="list-group-item padding-0">\n' +
            '        <div class="mt-comment" style="border: 0px">\n' +
            '            <div class="mt-comment-img">\n' +
            '                <img src="/img/files/{{$fileimg}}.svg" class="file-icon">\n' +
            '            </div>\n' +
            '            <div class="mt-comment-body">\n' +
            '                <div class="mt-comment-info">\n' +
            '                                        <span class="mt-comment-author">\n' +
            '                                            <a>{{$title}}</a>\n' +
            '                                        </span>\n' +
            '                    <span class="mt-comment-date">{{$comment_date}}</span>\n' +
            '                </div>\n' +
            '                <div class="mt-comment-text">{{$comment_text}}\n' +
            '                </div>\n' +
            '                <div class="mt-comment-details">\n' +
            '                    <ul class="mt-comment-actions">\n' +
            '                        <li>\n' +
            '                            <a href="#" data-toggle="view" data-view="{{$view}}" title="Preview"> <i class="icon-eye"></i>\n' +
            '                                View</a>\n' +
            '                        </li>\n' +
            '                        <li>\n' +
            '                            <a href="#" data-toggle="copy" title="Copy to clipboard"\n' +
            '                               data-copy="{{$link}}"> <i\n' +
            '                                        class="icon-link"></i> Copy link </a>\n' +
            '                        </li>\n' +
            '                        <li>\n' +
            '                            <a href="mailto:" data-toggle="send"\n' +
            '                               title="Send to email"> <i\n' +
            '                                        class="icon-envelope"></i> Send to Email\n' +
            '                            </a>\n' +
            '                        </li>\n' +
            '                    </ul>\n' +
            '                </div>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </li>';
        var html = '';
        $.each(libraries, function (k, v) {
            var libraries_section = libraries_section_ui;
            var libraries_children = libraries_children_ui;
            libraries_section = libraries_section_ui;
            libraries_section = libraries_section.replace('{{$category}}', k);
            var html_children = '';
            $.each(v, function (_k, _v) {
                libraries_children = libraries_children_ui;
                libraries_children = libraries_children.replace('{{$title}}', _v['title']);
                libraries_children = libraries_children.replace('{{$fileimg}}', _v['type']);
                libraries_children = libraries_children.replace('{{$comment_date}}', _v['created_at'])
                libraries_children = libraries_children.replace('{{$comment_text}}', _v['description'])
                libraries_children = libraries_children.replace('{{$link}}', _v['url'])
                libraries_children = libraries_children.replace('{{$view}}', _v['url'])
                html_children += libraries_children;
            });
            libraries_section = libraries_section.replace('{{$children_ui}}', html_children);
            html += libraries_section;
        });
        $('#library_context').html(html);
        $("[data-toggle='view']").click(function () {
            var link = $(this).data('view');
            window.open(link);
        });

        $("[data-toggle='copy']").tooltip();
        $("[data-toggle='view']").tooltip();
        $("[data-toggle='send']").tooltip();

        $("[data-toggle='copy']").hover(
            function () {
                $(this).attr('data-original-title', 'Copy to clipboard').tooltip('show');
            }, function () {
                $(this).attr('data-original-title', 'Copy to clipboard').tooltip('hide');
            });

        $("[data-toggle='view']").hover(
            function () {
                $(this).attr('data-original-title', 'Preview').tooltip('show');
            }, function () {
                $(this).attr('data-original-title', 'Preview').tooltip('hide');
            });

        $("[data-toggle='send']").hover(
            function () {
                $(this).attr('data-original-title', 'Send to email').tooltip('show');
            }, function () {
                $(this).attr('data-original-title', 'Send to email').tooltip('hide');
            });

        $("[data-toggle='copy']").click(function () {
            var $this = $(this);
            $('#input_clipboard').val($this.data('copy'));
            $(this).attr('data-original-title', 'Copied!').tooltip('show');
            $('#input_clipboard').select();
            document.execCommand('copy');
        });
    }
    ,
    Refresh: function (mode) {
        var first = false;
        Tool_Library.items = {};
        var params = {
            category: 0,
            search: '',
            limit: '24',
        };
        switch (mode) {
            case 'search':
                params.category = 0;
                params.search = $("#library_search").val().trim();
                break;
            case 'category':
                params.category = $("#category-id").val();
                break;
            case 'limit':
                params.category = $("#category-mobi").val();
                params.search = $("#category-id").val().trim();
            default:
                first = true;
                params.category = $("#category-id").val();
                params.search = $("#library_search").val().trim();
        }
        if (Tool_Library.loadable) {
            Ajax.get("/a/tools/library", params, {
                ok: function (items, meta) {
                    Tool_Library.ParseMeta(meta);
                    if (Tool_Library.meta.count > 0) {
                        Tool_Library.Render(items, true);
                    } else {
                        UI.noResult("#library_context");
                    }
                },
                no: function () {
                    UI.noResult("#library_context");
                },
                before: function () {
                    Tool_Library.loadable = false;
                    if (!first) {
                        $("#library_context").append('<div class="library_context-loader text-center margin-top-5"><div class="loader"></div></div>');
                    }
                },
                end: function () {
                    Tool_Library.loadable = true;
                    $("#library_context #svg").remove();
                    $(".library_context-loader").remove();
                }
            });
        }
    },
    HasMore: function () {
        return Tool_Library.meta.next !== '';
    },
    More: function () {
        if (Tool_Library.HasMore() && Tool_Library.loadable) {
            Ajax.get("/a/item", {
                query: Tool_Library.meta.next
            }, {
                ok: function (items, meta) {
                    Tool_Library.ParseMeta(meta);
                    if (Tool_Library.meta.count > 0) {
                        Tool_Library.Render(items, false);
                    }
                },
                before: function () {
                    Tool_Library.loadable = false;
                    $("#products").append('<div class="products-loader"><div class="loader"></div></div>');
                },
                end: function () {
                    Tool_Library.loadable = true;
                    $(".products-loader").remove();
                }
            });
        }
    },
}

window.onload = function () {
    // Init home
    Tool_Library.init();
};
