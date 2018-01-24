<script>
$(function() {
    $('#calendar').fullCalendar({
        header: {
            left: '',
            center: 'title,prev,next',
            right: ''
        },
        aspectRatio: 3
    });
    $(".fc-sun").css('backgroundColor', '#dd6e6e');
    $(".fc-sat").css('backgroundColor', '#c4e1ff');
    $(".fc-prev-button").click(function() {
        $(".fc-sun").css('backgroundColor', '#dd6e6e');
        $(".fc-sat").css('backgroundColor', '#c4e1ff');
    });
    $(".fc-next-button").click(function() {
        $(".fc-sun").css('backgroundColor', '#dd6e6e');
        $(".fc-sat").css('backgroundColor', '#c4e1ff');
    });
});
</script>