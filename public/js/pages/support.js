///////////////
//contact us(KEEP IN TOUCH)
///////////////
function onlyNumber(event) {
    event = event || window.event;
    var keyID = (event.which) ? event.which : event.keyCode;
    if ((keyID >= 48 && keyID <= 57) || (keyID >= 96 && keyID <= 105) || keyID == 8 || keyID == 46 || keyID == 37 || keyID == 39)
        return;
    else
        return false;
}

function removeChar(event) {
    event = event || window.event;
    var keyID = (event.which) ? event.which : event.keyCode;
    if (keyID == 8 || keyID == 46 || keyID == 37 || keyID == 39)
        return;
    else
        event.target.value = event.target.value.replace(/[^0-9]/g, "");
}

var render = function (res) {
    $.each(res, function (k, v) {
        $('.alert-danger').empty();
        $('.alert-danger').hide();
        if (k == "errors") {
            $.each(v, function (_k, _v) {
                $('.alert-danger').append('<p>' + _k + ' is wrong with this field!</p>');
                $('.alert-danger').show();
            })
        }
        console.log(res);
        if (k == "id") {
            $('.alert-danger').hide();
            alert('Thank you for your inquiries.');
            location.reload();
        }
    })
}

var Contact = function () {
    $('#phone').on('keyup', function () {
        removeChar(event);
    });

    $('#phone').on('keydown', function () {
        onlyNumber(event);
    })

    var contactStore = function () {
        $("#btn_contact_store").click(function () {
            Ajax.post('/a/support/contact', {
                name: $("#name").val(),
                email: $("#email").val(),
                phone: $("#phone").val(),
                content: $("#content").val()
            }, {
                ok: function (res) {
                    render(res);
                },
                no: function (err) {
                    console.log(err);
                },
            })
        })
    }

    return {
        init: function () {
            contactStore();
        }
    }
}();

var Company = function () {
    var btn_country_ui = '<a href="#map" data-name="{{$name1}}">\n' +
        '    <button type="button" class="btn dark btn-outline">{{$name2}}\n' +
        '    </button>\n' +
        '</a>';

    var area = function () {
        Ajax.get('/a/support/company', null, {
            ok: function (res) {
                var country = [];
                var btn_country = btn_country_ui;
                var html_country = "";
                $.each(res, function (k, v) {
                    $.each(v, function (_k, _v) {
                        btn_country = btn_country_ui;
                        btn_country = btn_country.replace('{{$name1}}', _v['name']);
                        btn_country = btn_country.replace('{{$name2}}', _v['name']);
                        html_country += btn_country;
                    })
                });
                $('#btn_country').append(html_country);
            }
        });
        return {
            init: function () {
                area();
            }
        }
    }();

    var test = function () {
        Ajax.get('/a/support/company', null, {
            ok: function (res) {
                $("[data-name]").click(function () {
                    $(this).children('button').addClass('active');
                    $(this).siblings().children('button').removeClass('active');
                    $('#tab-nav').find('.btn').removeClass('active');
                    $('#tab-nav').find('.first').addClass('active');
                    $('.c-body').empty();

                    var area = $(this).data('name');
                    var c_section = "<div class=\"c-section\">\n" +
                        "    <h3 id=\"map_title\">{{$name}}</h3>\n" +
                        "</div>\n" +
                        "<div class=\"c-section\">\n" +
                        "    <p>{{$address}}</p>\n" +
                        "</div>\n" +
                        "<div class=\"c-section\">\n" +
                        "    <div class=\"c-content-label uppercase bg-blue\">Address</div>\n" +
                        "    <p>{{$address}}</p>\n" +
                        "</div>\n" +
                        "<div class=\"c-section\">\n" +
                        "    <div class=\"c-content-label uppercase bg-blue\">Contacts</div>\n" +
                        "    <p>\n" +
                        "        <strong>T</strong>\n" +
                        "        <span class=\"map-tel\">{{$tel}}</span>\n" +
                        "        <br/>\n" +
                        "        <strong>F</strong>\n" +
                        "        <span class=\"map-fax\">{{$fax}}</span>\n" +
                        "    </p>\n" +
                        "</div>\n" +
                        "<div class=\"c-section\">\n" +
                        "    <div class=\"c-content-label uppercase bg-blue\">Social</div>\n" +
                        "    <br/>\n" +
                        "    <ul class=\"c-content-iconlist-1\" style=\"padding:0;\">\n" +
                        "        <li>\n" +
                        "            <a href=\"{{$twitter}}\">\n" +
                        "                <i class=\"fa fa-twitter\"></i>\n" +
                        "            </a>\n" +
                        "        </li>\n" +
                        "        <li>\n" +
                        "            <a href=\"{{$facebook}}\">\n" +
                        "                <i class=\"fa fa-facebook\"></i>\n" +
                        "            </a>\n" +
                        "        </li>\n" +
                        "        <li>\n" +
                        "            <a href=\"{{$youtube}}\">\n" +
                        "                <i class=\"fa fa-youtube-play\"></i>\n" +
                        "            </a>\n" +
                        "        </li>\n" +
                        "        <li>\n" +
                        "            <a href=\"{{$instagram}}\">\n" +
                        "                <i class=\"fa fa-instagram\"></i>\n" +
                        "            </a>\n" +
                        "        </li>\n" +
                        "        <li>\n" +
                        "            <a href=\"{{$pinterest}}\">\n" +
                        "                <i class=\"fa fa-pinterest\"></i>\n" +
                        "            </a>\n" +
                        "        </li>\n" +
                        "    </ul>\n" +
                        "</div>";

                    var name = "";
                    var address1 = "";
                    var address2 = "";
                    var tel = "";
                    var fax = "";
                    var long_explanation = "";
                    var instagram = "";
                    var facebook = "";
                    var pinterest = "";
                    var youtube = "";
                    var twitter = "";
                    var explanation = "";
                    var position = [];

                    $.each(res, function (k, v) {
                        $.each(v, function (_k, _v) {
                            if (area == _v['name']) {
                                console.log(_v);
                                position = {lat: _v['latitude'], lng: _v['longitude']};
                                name = _v['name'];
                                address1 = _v['address1'];
                                address2 = _v['address2'];
                                tel = _v['tel'];
                                instagram = _v['instagram'];
                                facebook = _v['facebook'];
                                pinterest = _v['pinterest'];
                                youtube = _v['youtube'];
                                twitter = _v['twitter'];
                                explanation = v['explanation'];
                                long_explanation = _v['long_explanation'];
                            }
                        })
                    })

                    c_section = c_section.replace('{{$name}}', name);
                    c_section = c_section.replace('{{$address}}', address1 + "<br>" + address2);
                    c_section = c_section.replace('{{$tel}}', tel);
                    c_section = c_section.replace('{{$fax}}', fax);
                    c_section = c_section.replace('{{$facebook}}', facebook);
                    c_section = c_section.replace('{{$instagram}}', instagram);
                    c_section = c_section.replace('{{$twitter}}', twitter);
                    c_section = c_section.replace('{{$youtube}}', youtube);
                    c_section = c_section.replace('{{$pinterest}}', pinterest);
                    $('.c-body').append(c_section);

                    // Create a map object and specify the DOM element
                    // for display.
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: position,
                        zoom: 15,
                    });
                    var infowindow = new google.maps.InfoWindow({
                        content: long_explanation
                    });

                    // Create a marker and set its position.
                    var marker = new google.maps.Marker({
                        map: map,
                        position: position,
                    });
                    infowindow.open(map, marker);
                });

                $('[data-name]').eq(0).click();
            }
        })
    }
    return {
        init: function () {
            test();
        }
    }

    company:func
}();

///////////////
//google(map)
///////////////
function initMap() {

}


$(document).ready(function () {
    Contact.init();
    Company.init();
});
