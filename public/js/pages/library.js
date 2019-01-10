var Tool_Library = {
    init: function () {
        setTimeout(Tool_Library.initLibrary);
        setTimeout(Tool_Library.initCategory);
        setTimeout(Tool_Library.initSearch);
    },
    initLibrary: function () {

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

        var loading = false;
        var render = function (library) {
            var libraries = '';
            $.each(library, function (k, v) {
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
                libraries += libraries_section;
            });
            $('#library_context').append(libraries);
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
        };
// ajax request library
        var getLibraries = function (firstLoad) {
            if (!loading) {
                Ajax.get("/a/tools/library", null, {
                    ok: function (res) {
                        loading = false;
                        render(res);
                    },
                    no: function (err) {
                        console.log(err);
                    },
                    before: function () {
                        loading = true;
                        if (!firstLoad) {
                            $("#libraries").append('<div class="libraries-loader"><div class="loader"></div></div>');
                        }
                    },
                    end: function () {
                        $("#libraries #svg").remove();
                        $(".libraries-loader").remove();
                    }
                });
            }
        };
// first request
        getLibraries(true);
    },
    initCategory: function () {
        var categories_section_ui = '<li style="line-height:37px;">\n' +
            '                        <a data-toggle="collapse" href="#" data-target="#collapse{{$id}}" aria-expanded="false"\n' +
            '                           style="padding-left: 5px;"\n' +
            '                           class="pl-5">{{$name}}<i class="icon-action fa fa-chevron-down pull-right margin-0" style="background-color: #ffffff !important;color:#b9cbd5 !important;"></i></a>\n' +
            '                           {{$categories_children}}' +
            '                    </li>';

        var categories_children_ui = '<ul class="margin-bottom-10 margin-top-5 collapse" style="padding-left:0;" id="collapse{{$id}}">\n' +
            '                          {{$children_ui}}' +
            '                      </ul>';

        var children_ui = '<li class="list-dot children-hover" style="line-height:37px;">\n' +
            '              <a class="" href="#" >{{$name}}</a>\n' +
            '           </li>';

        var loading = false;

        var render = function (categories) {
            var library = "";
            $.each(categories, function (k, v) {
                var categories_children = categories_children_ui;
                var categories_section = categories_section_ui;
                var children = children_ui;

                if (v['children'].length != 0) {
                    var html_children = '';
                    $.each(v['children'], function (children_k, children_v) {
                        children = children_ui;
                        children = children.replace('{{$name}}', children_v['name']);
                        html_children += children;
                    });
                    categories_children = categories_children.replace('{{$id}}', v['id']);
                    categories_children = categories_children.replace('{{$children_ui}}', html_children);

                } else {
                    categories_section = categories_section.replace('{{$categories_children}}', "");
                }
                categories_section = categories_section_ui;
                categories_section = categories_section.replace('{{$name}}', v['name']);
                categories_section = categories_section.replace('{{$id}}', v['id']);
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
        };
        // ajax request library
        var getCategories = function (firstLoad) {
            if (!loading) {
                Ajax.get("/a/tools/library/categories", null, {
                    ok: function (res) {
                        loading = false;
                        render(res);
                    },
                    no: function (err) {
                        console.log(err);
                    },
                    before: function () {
                        loading = true;
                        if (!firstLoad) {
                            $("#libraries").append('<div class="categories-loader"><div class="loader"></div></div>');
                        }
                    },
                    end: function () {
                        $("#categories #svg").remove();
                        $(".categories-loader").remove();
                    }
                });
            }
        };
// first request
        getCategories(true);
    },
    initSearch: function () {
        var libraries_section_ui = '<ul class="list-group list-group-flush">\n' +
            '    <h3 class="margin-bottom-5 library-title">{{$category}}</h3>\n' +
            '{{$children_ui}} \n' +
            '</ul>';

        var libraries_children_ui = '<li class="list-group-item">\n' +
            '        <div class="mt-comment" style="border: 0px">\n' +
            '            <div class="mt-comment-img">\n' +
            '                <img src="/img/files/{{$fileimg}}.svg" class="file-icon">\n' +
            '            </div>\n' +
            '            <div class="mt-comment-body">\n' +
            '                <div class="mt-comment-info">\n' +
            '                                        <span class="mt-comment-author">\n' +
            '                                            <a href="#">{{$title}}</a>\n' +
            '                                        </span>\n' +
            '                    <span class="mt-comment-date">{{$comment_date}}</span>\n' +
            '                </div>\n' +
            '                <div class="mt-comment-text">{{$comment_text}}\n' +
            '                </div>\n' +
            '                <div class="mt-comment-details">\n' +
            '                    <ul class="mt-comment-actions">\n' +
            '                        <li>\n' +
            '                            <a href="#" data-toggle="view" title="Preview"> <i class="icon-eye"></i>\n' +
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

        var loading = false;

        var render = function (Search) {

            $('#librarySearch').on('keyup', function () {
                var search_result = '';
                $.each(Search, function (k, v) {
                    var libraries_section = libraries_section_ui;
                    var libraries_children = libraries_children_ui;
                    libraries_section = libraries_section_ui;
                    libraries_section = libraries_section.replace('{{$category}}', k);
                    var html_children = '';
                    $.each(v, function (_k, _v) {
                        var search = $('#librarySearch').val();
                        var result = v[_k]['title'].search(new RegExp(search, "i"));
                        ;
                        if (result > -1) {
                            libraries_children = libraries_children_ui;
                            libraries_children = libraries_children.replace('{{$title}}', _v['title']);
                            libraries_children = libraries_children.replace('{{$fileimg}}', _v['type']);
                            libraries_children = libraries_children.replace('{{$comment_date}}', _v['created_at'])
                            libraries_children = libraries_children.replace('{{$comment_text}}', _v['description'])
                            libraries_children = libraries_children.replace('{{$link}}', _v['url'])
                            html_children += libraries_children;
                        }
                    })
                    libraries_section = libraries_section.replace('{{$children_ui}}', html_children);
                    search_result += libraries_section;
                });
                $('#library_context').children().remove();
                $('.library-title').siblings()
                $('#library_context').append(search_result);
            });


            //autocomplete ul
            var projects = [];
            $.each(Search, function (k, v) {
                $.each(v, function (_k, _v) {
                    projects.push({value: _v["title"], label: _v['title'], icon: "/img/files/" + _v['type'] + ".svg"});
                    /*Object.assign(result,{value:_v['title']});
                    Object.assign(result,{label:_v['title']});
                    Object.assign(result,{icon:"/img/files/"+_v['type']});*/
                });
            });

            j$("#librarySearch").autocomplete({
                minLength: 0,
                source: projects
            }).autocomplete("instance")._renderItem = function (ul, item) {
                return j$("<li>")
                    .append("<div> <img src=' " + item.icon + " ' style='width:30px;'>" + item.label + "</div>")
                    .appendTo(ul);
            };
        }
        var getSearch = function (firstLoad) {
            if (!loading) {
                Ajax.get("/a/tools/library", null, {
                    ok: function (res) {
                        loading = false;
                        render(res);
                    },
                    no: function (err) {
                        console.log(err);
                    },
                    before: function () {
                        loading = true;
                        if (!firstLoad) {
                            $("#search").append('<div class="search-loader"><div class="loader"></div></div>');
                        }
                    },
                    end: function () {
                        $("#search #svg").remove();
                        $(".search-loader").remove();
                    }
                });
            }
        };
        // first request
        getSearch(true);
    }
}

$(document).ready(function () {
    // Init home
    Tool_Library.init();
});
