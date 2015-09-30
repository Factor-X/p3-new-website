jQuery(document).ready(function($) {
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

    //show menu mobiles
    $('#menu').click(function() {
        $('.navbar').stop().slideToggle( "slow", function() {
        });
    })

    //slider spaces
     $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: false,
        draggable: true,
        asNavFor: '.slider-nav',
        adaptiveHeight: true,
        responsive:[
        {
            breakpoint:768,
            settings:{
                draggable: true
            }
        }
        ]
    });
    $('.slider-nav').slick({
        swipeToSlide:false,
        swipe: false,
        infinite: true,
        centerPadding:"0px",
        arrows : false,
        draggable:true,
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        centerMode: true,
        draggable: false,
        focusOnSelect: true,
        responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            centerPadding:"0px"
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerPadding:"150px"
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerPadding:"120px"
          }
        },
        {
          breakpoint: 650,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            draggable: true,
          }
        }
        ]
    });

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
});
});

$.fn.windowHeight = function(){ 
    var viewportHeight = $(window).height();
    $('#home').height(viewportHeight+"px");
};

$.fn.scrollToElement = function(){
    $('a').bind('click', function(event) {
        var $anchor = $(this);
        
        var url = $anchor.attr('href')
        var a_href = url.replace('/#', '#');
        if(a_href=='#')
            a_href='#home';
        $('body').stop().animate({
            scrollTop: $(a_href).offset().top - 65
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