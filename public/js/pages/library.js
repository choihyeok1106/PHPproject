var Tool_Library = {
    init: function () {
        setTimeout(Support_Faq.initLibrary);
    },
    initLibrary: function () {
        var render = function (faqs) {
            $("[data-toggle='tooltip']").tooltip();
        };
// ajax request library
        var getLibraries = function (firstLoad) {
            if (!loading) {
                Ajax.get("/a/tools/librarys", null, {
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

}

$(document).ready(function () {
    // Init home
    Tool_Library.init();
});
