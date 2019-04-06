$(document).ready(function() {
    $("#el-menu li a span").each(function() {
        var titulo = $('title').html();
        var active = $(this).html();
        if (titulo == active) {
            $(this).parent().css('background', '#81D4FA');
        }
    });

});