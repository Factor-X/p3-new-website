
$(document).ready(function() {

$.when(
    $.getScript( "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" ),
    $.getScript( "http://cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js" ),
    $.Deferred(function( deferred ){
        $( deferred.resolve );
    })
).done(function(){
    $.fn.windowHeight();
    $.fn.scrollToElement();
    
    //resize home bg
    $(window).resize(function() {
        $.fn.windowHeight();
    });

    //slider spaces
     $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: false,
        draggable: false,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        swipeToSlide:false,
        swipe: false,
        infinite: true,
        centerPadding:"150px",
        arrows : false,
        draggable:false,
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        centerMode: true,
        draggable: false,
        focusOnSelect: true
    });

    $.fn.drawCanvas();

    // accordion faq
    $(".faq-accordion .subMenu").hide();
    $(".faq-accordion li.toggleSubMenu span").each( function () {
        var TexteSpan = $(this).text();
        $(this).replaceWith('<a href="#">' + TexteSpan + '<\/a>') ;
    });
    $(".faq-accordion li.toggleSubMenu > a").click( function () {
        if ($(this).next(".subMenu:visible").length != 0) {
            $(this).next(".subMenu").slideUp("normal", function () { $(this).parent().removeClass("open") });
        }
        else {
            $(".faq-accordion .subMenu").slideUp("normal", function () { $(this).parent().removeClass("open") });
            $(this).next(".subMenu").slideDown("normal", function () { $(this).parent().addClass("open") });
        }
        return false;
    });

    $('.slider-nav').on('click', function(){
        $.fn.drawCanvas();
    })
    
});


    
});

$.fn.windowHeight = function(){ 
    var viewportHeight = $(window).height();
    $('#home').height(viewportHeight+"px");
};

$.fn.scrollToElement = function(){
    $('a').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 65
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
};

//change navbar to scroll
$(window).scroll(function() {
    var viewportHeight = $(window).height();
    if ($(window).scrollTop() > viewportHeight - ((viewportHeight/100)*30)) {
        $(".main-navbar").addClass("full-navbar");
    } else {
        $(".main-navbar").removeClass("full-navbar");
    }
});


$.fn.drawCanvas = function(){
//remove all canvas
// $(".slider-for .slick-slide #canvas-gallery").nextAll('canvas').remove();

// $(".slider-for .slick-current .grid-container").after(
//     $(document.createElement("div"))
//         .attr("class", "grid-container")
//         .attr("id", "canvas-gallery")
//         .css("position", "relative")
// );


//     for(i=0; i<=4;i++){
//         $(".slider-for .slick-current #canvas-gallery").append(
//         $(document.createElement("canvas"))
//             .attr("class","canvas-element")
//             .width(200)
//             .height(200)
//             .text('this element is not supported by your browser')
//         );
//         var ctx = $(".canvas-element").get(i).getContext('2d');

//         var img = document.createElement('IMG');
//         img.onload = function () {
//             ctx.save();
//             ctx.beginPath();
//             ctx.moveTo(150, 0);
//             ctx.lineTo(300, 75);
//             ctx.lineTo(150, 150);
//             ctx.lineTo(0, 75);
//             ctx.closePath();
//             ctx.clip();
//             ctx.drawImage(img, 0, 0);
//             ctx.restore();
//         }
//         img.src = "http://lorempixel.com/300/150/";
//     }
};