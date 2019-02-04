$(document).ready(function(){
    /* Smooth scrolling */
    var options = {
        offset: 56,
        duration: 1500
    };
    UIkit.scroll($(".transformed a"), options);
    UIkit.scroll($("#offcanvas .links a"), options);
});