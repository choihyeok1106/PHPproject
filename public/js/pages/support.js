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
    $.each(res,function(k,v){
        $('.alert-danger').empty();
        $('.alert-danger').hide();
        if(k == "errors"){
            $.each(v,function(_k,_v){
                $('.alert-danger').append('<p>'+_k+'is wrong with this field!</p>');
                $('.alert-danger').show();
            })
        }

        if(v == "ok"){
            alert('Thank you for your inquiries.');
            location.reload();
        }
    })
}

///////////////
//contact us(KEEP IN TOUCH)
///////////////

var Support = function () {
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


$(document).ready(function () {
    Support.init();
});
