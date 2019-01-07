
function onlyNumber(event){
    event = event || window.event;
    var keyID = (event.which) ? event.which : event.keyCode;
    if ( (keyID >= 48 && keyID <= 57) || (keyID >= 96 && keyID <= 105) || keyID == 8 || keyID == 46 || keyID == 37 || keyID == 39 )
        return;
    else
        return false;
}
function removeChar(event) {
    event = event || window.event;
    var keyID = (event.which) ? event.which : event.keyCode;
    if ( keyID == 8 || keyID == 46 || keyID == 37 || keyID == 39 )
        return;
    else
        event.target.value = event.target.value.replace(/[^0-9]/g, "");
}

var Support = function () {
    $('#phone').on('keyup',function(){
        removeChar(event);
    });

    $('#phone').on('keydown',function(){
        onlyNumber(event);
    })

    var contactStore = function(){
        $("#btn_contact_store").click(function () {
            Ajax.post('/a/support/contact', {
                name: $("#name").val(),
                email : $("#email").val(),
                phone : $("#phone").val(),
                content : $("#content").val()
            }, {
                ok:function(res){
                    console.log(res);
                    console.log('asd');
                },
                no:function(){
                }
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
