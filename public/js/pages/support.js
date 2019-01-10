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

        if (v == "ok") {
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
                no: function () {
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

///////////////
//google(map)
///////////////
function initMap() {
    $("[data-country]").click(function () {
        $(this).children('button').addClass('active');
        $(this).siblings().children('button').removeClass('active');
        $('#tab-nav').find('.btn').removeClass('active');
        $('#tab-nav').find('.first').addClass('active');
        $('.c-body').empty();

        var country = {
            us: {lat: 40.497964, lng: -111.888835},
            kr: {lat: 37.50146601, lng: 127.04043259},
            jp: {lat: 35.650288, lng: 139.712637},
            ta: {lat: 25.041615, lng: 121.572415},
            ha: {lat: 21.336924, lng: -157.899958}
        }

        var contact = {
            us: {
                title: "LIVE PURE™<br> USA INC",
                address: "13961 S. Minuteman Drive<br> Suite 200 Draper<br> UT 84020",
                tel: "-",
                fax: "-"
            },
            kr: {
                title: "LIVE PURE™<br> KOREA INC",
                address: "서울시 강남구 테헤란로 218<br> 나래빌딩 10층",
                tel: "080-205-2193",
                fax: "080-205-2198"
            },
            jp: {
                title: "LIVE PURE™<br> JAPAN INC",
                address: "Ebisu Prime Square<br> 10th floor 1-1-39<br> Hiroo, Shibuya-ku, Tokyo, Japan",
                tel: "63.3.4455.7605",
                fax: "63.3.3409.6117"
            },
            ta: {
                title: "LIVE PURE™<br> TAIWAN INC",
                address: "8F.-3, No.510, Sec. 5<br> Zhongxiao E. Rd., Xinyi Dist.<br>d Taipei City 110, Taiwan (R.O.C.)",
                tel: "(02)2727-2800",
                fax: "(02)2727-2920"
            },
            ha: {
                title: "LIVE PURE™<br> HAWAII INC",
                address: "Priority One Courier 619-B Mapunapuna Street Honolulu, HI 96819",
                tel: "1.808.840.101",
                fax: "-"
            },
        }

        var area = $(this).data('country');
        var position = [];
        var title = "";
        var address = "";
        var tel = "";
        var fax = "";
        var c_section = "<div class=\"c-section\">\n" +
            "    <h3 id=\"map_title\">{{$title}}</h3>\n" +
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
            "    <ul class=\"c-content-iconlist-1\">\n" +
            "        <li>\n" +
            "            <a href=\"https://www.facebook.com/livepureglobal/\">\n" +
            "                <i class=\"fa fa-twitter\"></i>\n" +
            "            </a>\n" +
            "        </li>\n" +
            "        <li>\n" +
            "            <a href=\"https://twitter.com/LivePUREGlobal\">\n" +
            "                <i class=\"fa fa-facebook\"></i>\n" +
            "            </a>\n" +
            "        </li>\n" +
            "        <li>\n" +
            "            <a href=\"https://www.youtube.com/user/GenesisPURECorp\">\n" +
            "                <i class=\"fa fa-youtube-play\"></i>\n" +
            "            </a>\n" +
            "        </li>\n" +
            "        <li>\n" +
            "            <a href=\"https://www.instagram.com/LivePUREGlobal/\">\n" +
            "                <i class=\"fa fa-linkedin\"></i>\n" +
            "            </a>\n" +
            "        </li>\n" +
            "    </ul>\n" +
            "</div>";

        $.each(country, function (k, v) {
            if (area == k) {
                position = v;
            }
        })
        $.each(contact, function (k, v) {
            if (area == k) {
                title = v['title'];
                address = v['address'];
                tel = v['tel'];
                fax = v['fax'];
            }
        })

        c_section = c_section.replace('{{$title}}', title);
        c_section = c_section.replace('{{$address}}', address);
        c_section = c_section.replace('{{$tel}}', tel);
        c_section = c_section.replace('{{$fax}}', fax);
        $('.c-body').append(c_section);

        // Create a map object and specify the DOM element
        // for display.
        var map = new google.maps.Map(document.getElementById('map'), {
            center: position,
            zoom: 15,
        });
        var infowindow = new google.maps.InfoWindow({
            content: "<b>" + title + "</b> <br>" + address + ""
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
            map: map,
            position: position,
        });
        infowindow.open(map, marker);
    });
    $('[data-area]').click(function () {

            $(this).addClass('active');
            $(this).parent().siblings().children('button').removeClass('active');
            $('.c-body').empty();

            var country = {
                US_UT: {lat: 40.497964, lng: -111.888835},
                US_TA: {lat: 33.160154, lng: -96.83226},
                KR_SE: {lat: 37.50146601, lng: 127.04043259},
                KR_GA: {lat: 35.15286948, lng: 126.88292116},
                KR_DA: {lat: 35.87107451, lng: 128.62829578},
                KR_BU: {lat: 35.16810904, lng: 129.13130312},
                JP: {lat: 35.650288, lng: 139.712637},
                TA: {lat: 25.041615, lng: 121.572415},
                HA: {lat: 21.336924, lng: -157.899958}
            }

            var contact = {
                US_UT: {
                    title: "LIVE PURE™<br> USA_UTAG INC",
                    address: "13961 S. Minuteman Drive <br> Suite 200 Draper <br> UT 84020",
                    tel: "-",
                    fax: "-"
                },
                US_TA: {
                    title: "LIVE PURE™<br> USA_TEXAS INC",
                    address: "7164 Technology Drive<br> Suite 100 Frisco<br> TX 75033",
                    tel: "1.801.871.2500",
                    fax: "062.369.2199"
                },
                KR_SE: {
                    title: "LIVE PURE™ <br> KOREA_SEOUL INC",
                    address: "서울시 강남구 테헤란로 218 나래빌딩 10층",
                    tel: "080-205-2193",
                    fax: "080-205-2198"
                },
                KR_GA: {
                    title: "LIVE PURE™<br> KOREA_GWANGJU INC",
                    address: "광주광역시 서구 상무대로 1106<br> 3층(농성동. 네오빌딩)",
                    tel: "062-714-2191",
                    fax: "062-369-2199"
                },
                KR_DA: {
                    title: "LIVE PURE™<br> KOREA_DAEGU INC",
                    address: "대구 동구 신천동 339-2 3층",
                    tel: "053-215-2191",
                    fax: "-"
                },
                KR_BU: {
                    title: "LIVE PURE™<br> KOREA_BUSAN INC",
                    address: "부산광역시 해운대구 센텀남대로 50<br> 11층(우동, 센텀임페리얼타워)",
                    tel: "051-714-2192",
                    fax: "051-731-0961"
                },
                JP: {
                    title: "LIVE PURE™ß<br> JAPAN INC",
                    address: "Ebisu Prime Square<br> 10th floor 1-1-39<br> Hiroo, Shibuya-ku, Tokyo, Japan",
                    tel: "63.3.4455.7605",
                    fax: "63.3.3409.6117"
                },
                TA: {
                    title: "LIVE PURE™, TAIWAN INC",
                    address: "8F.-3, No.510, Sec. 5<br> Zhongxiao E. Rd.<br> Xinyi Dist.<br> Taipei City 110, Taiwan (R.O.C.)",
                    tel: "(02)2727-2800",
                    fax: "(02)2727-2920"
                },
                HA: {
                    title: "LIVE PURE™, HAWAII INC",
                    address: "Priority One Courier 619-B<br> Mapunapuna Street Honolulu<br>s HI 96819",
                    tel: "1.808.840.101",
                    fax: "-"
                },
            }

            var area = $(this).data('area');
            var position = [];
            var title = "";
            var address = "";
            var tel = "";
            var fax = "";
            var c_section = "<div class=\"c-section\">\n" +
                "    <h3 id=\"map_title\">{{$title}}</h3>\n" +
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
                "    <ul class=\"c-content-iconlist-1\">\n" +
                "        <li>\n" +
                "            <a href=\"https://www.facebook.com/livepureglobal/\">\n" +
                "                <i class=\"fa fa-twitter\"></i>\n" +
                "            </a>\n" +
                "        </li>\n" +
                "        <li>\n" +
                "            <a href=\"https://twitter.com/LivePUREGlobal\">\n" +
                "                <i class=\"fa fa-facebook\"></i>\n" +
                "            </a>\n" +
                "        </li>\n" +
                "        <li>\n" +
                "            <a href=\"https://www.youtube.com/user/GenesisPURECorp\">\n" +
                "                <i class=\"fa fa-youtube-play\"></i>\n" +
                "            </a>\n" +
                "        </li>\n" +
                "        <li>\n" +
                "            <a href=\"https://www.instagram.com/LivePUREGlobal/\">\n" +
                "                <i class=\"fa fa-linkedin\"></i>\n" +
                "            </a>\n" +
                "        </li>\n" +
                "    </ul>\n" +
                "</div>"

            $.each(country, function (k, v) {
                if (area == k) {
                    position = v;
                }
            })
            $.each(contact, function (k, v) {
                if (area == k) {
                    title = v['title'];
                    address = v['address'];
                    tel = v['tel'];
                    fax = v['fax'];
                }
            })

            c_section = c_section.replace('{{$title}}', title);
            c_section = c_section.replace('{{$address}}', address);
            c_section = c_section.replace('{{$tel}}', tel);
            c_section = c_section.replace('{{$fax}}', fax);
            $('.c-body').append(c_section);

            // Create a map object and specify the DOM element
            // for display.
            var map = new google.maps.Map(document.getElementById('map'), {
                center: position,
                zoom: 15,
            });
            var infowindow = new google.maps.InfoWindow({
                content: "<b>" + title + "</b> <br>" + address + ""
            });

            // Create a marker and set its position.
            var marker = new google.maps.Marker({
                map: map,
                position: position,
            });
            infowindow.open(map, marker);
        }
    )
    $('[data-country="us"]').click();
}


$(document).ready(function () {
    Contact.init();
});
