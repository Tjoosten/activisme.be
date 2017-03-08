$(document).ready(function () {
    $('#horizontalTab').easyResponsiveTabs({
        type: 'default',
        width: 'auto',
        fit: true,
    });
});

jQuery(document).ready(function( $ ) {
    $('.counter').counterUp({
        delay: 10,
        time: 1000,
    });
});

$(document).ready(function () {
    size_li = $("#myList li").size();
    x=1;
    $('#myList li:lt('+x+')').show();
    $('#loadMore').click(function () {
        x= (x+1 <= size_li) ? x+1 : size_li;
        $('#myList li:lt('+x+')').show();
    });
    $('#showLess').click(function () {
        x=(x-1<0) ? 1 : x-1;
        $('#myList li').not(':lt('+x+')').hide();
    });
});

$(function() {
    $('.filtr-container').filterizr();
});

$(function() {
    $('.filtr-item a').Chocolat();
});

$(document).ready(function() {
    $("#owl-demo").owlCarousel ({
        items : 8,
        lazyLoad : true,
        autoPlay : true,
        speed: 900,
        pagination : false,
    });
});

addEventListener("load", function() {
    setTimeout(hideURLbar, 0); }, false);

function hideURLbar(){
    window.scrollTo(0,1);
}

$(document).ready(function() {
    var defaults = {
        containerID: 'toTop',
        containerHoverID: 'toTopHover',
        scrollSpeed: 100,
        easingType: 'linear',
    };
    $().UItoTop({ easingType: 'easeOutQuart' });
});

jQuery(document).ready(function($) {
    $(".scroll").click(function(event){
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
});