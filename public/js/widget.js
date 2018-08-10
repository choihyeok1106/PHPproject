var Widget = {
    init: function () {
        this.initHeight();
        $(window).on("resize", function () {
            Widget.initHeight()
        });
    },
    initHeight: function () {
        $(".widget-box").each(function () {
            log($(this).outerWidth() * 0.6);
            $(this).find(".portlet-body").css({
                // height: $(this).outerWidth() * 0.6 + "px",
            })
        });
    },
    initSlideHeight: function () {

    }
}