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
        App.a.post("/a/login", {
            id: $("#id").val(),
            pwd: $("#pwd").val(),
            remember: $("#remember:checked").length
        }, {
            ok: function (re) {
                if (re.hasOwnProperty("error")) {
                    show_danger(re["error"])
                } else {
                    var redirectUrl = App.g.get('redirect');
                    // location.replace(redirectUrl)
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
    App.a.post("/a/forgot-password", {
        email: $("email").val()
    }, {
        ok: function (re) {
            if (re.hasOwnProperty("error")) {

            }
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
            $('.forget-form').hide()
        }
    };

}();

jQuery(document).ready(function () {
    Login.init()
});