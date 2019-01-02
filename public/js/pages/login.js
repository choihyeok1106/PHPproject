var loginFlag = true;

function show_danger(msg) {
    $("#id").addClass("has-error");
    $("#pwd").addClass("has-error");
    $(".alert-danger").find("span").text(msg);
    $(".alert-danger").show();
}

function hide_danger() {
    $("#id").removeClass("has-error");
    $("#pwd").removeClass("has-error");
    $(".alert-danger").find("span").text("");
    $(".alert-danger").hide();
}

function login() {
    if (loginFlag) {
        var btn = $("#login");
        Ajax.post("/a/login", {
            id: $("#id").val(),
            pwd: $("#pwd").val(),
            remember: $("#remember:checked").length
        }, {
            ok: function (re) {
                if (re.hasOwnProperty("error")) {
                    show_danger(re["error"])
                } else {
                    var redirectUrl = Get.get('redirect', '/');
                    location.replace(redirectUrl)
                }
            },
            no: function (m) {
                alert(m);
            },
            before: function () {
                loginFlag = false;
                $(btn).attr("disabled", true)
                hide_danger()
            },
            end: function () {
                loginFlag = true;
                $(btn).attr("disabled", false)
            }
        })
    }
}

function send() {
    var btn = $("#submit")
    Ajax.post("/a/forgot-password", {
        email: $("email").val()
    }, {
        ok: function (re) {
            console.log(re);
        },
        no: function (e, i, t) {

        },
        before: function () {
            loginFlag = false;
            $(btn).attr("disabled", true)
        },
        end: function () {
            loginFlag = true;
            $(btn).attr("disabled", false)
        }
    })
}

function initLocale() {
    Ajax.get("/a/locales", null, {
        ok: function (items, meta) {
            console.log(items);
            console.log(meta);
            var elm = $("#locale");
            $.each(items, function (k, v) {
                var select = v.code === meta.locale ? 'selected' : '';
                elm.append('<option value="' + v.code + '" ' + select + '>' + v.name + '</option>');
            });
            elm.show();
            elm.change(function () {
                location.href = '/locale/' + $(this).val();
            });
        }
    });
}

var Login = function () {
    // login action
    $("#login").on("click", function () {
        login()
    });
    $("#pwd").keydown(function (e) {
        if (e.keyCode === 13) {
            login()
        }
    });
    // forgot password action
    $("#submit").on("click", function () {
        send()
    });
    // form display controller
    var handleLogin = function () {
        $('#forget-password').click(function () {
            $('.login-form').hide();
            $('.forget-form').show()
        });
        $('#back-btn').click(function () {
            $('.login-form').show();
            $('.forget-form').hide()
        });
    }


    return {
        //main function to initiate the module
        init: function () {
            handleLogin();
            // init background slide images
            if (typeof backstretch === "object" && backstretch.length > 0) {
                $('.login-bg').backstretch(backstretch, {
                        fade: 1000,
                        duration: 8000
                    }
                );
            }
            $('.forget-form').hide();
            initLocale();
        }
    };

}();

jQuery(document).ready(function () {
    Login.init();
});