jQuery(document).ready(function($) {

    var viewportHeight = 768;
    loadPage();

    function loadPage() {
        countViewportHeight();
        windowSize();
        if(viewportHeight <= 992)
            buildNavForMobile();
        buildScrollToElement();
        buildChangeAspectNavBar();
        buildAccordion();
        loadSlickAndBuildSlider();
        loadBootstrapJsAndBuildModal();
    }

    function windowSize() {
        $("#home").height(viewportHeight + 'px');
        $(window).resize(function() {
            countViewportHeight();
            $("#home").height(viewportHeight + 'px');
        });
    }

    function buildNavForMobile() {
        $('#menu').click(function() {
            $('.navbar').stop().slideToggle("slow");
        });
    }

    function countViewportHeight() {
        viewportHeight = $(window).height();
    }

    function buildScrollToElement() {
        $('a[href*="#"]').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
                if(!this.hash || this.hash == "")
                    $('html, body').animate({
                      scrollTop: 0
                    }, 1000);
                else {
                        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                        if (target.length) {
                            $('html, body').animate({
                                scrollTop: target.offset().top - 60
                            }, 1000);
                            return false;
                        }
                }
            }
        });
    }

    function buildChangeAspectNavBar() {
        $(window).scroll(function() {
            if ($(window).scrollTop() > viewportHeight - ((viewportHeight/100)*30)) {
                $(".main-navbar").addClass("full-navbar");
            } else {
                $(".main-navbar").removeClass("full-navbar");
            }
        });
    }

    function buildAccordion() {
        $(".faq-accordion .subMenu").hide();
        $(".faq-accordion li.toggleSubMenu span").each( function () {
            var TextSpan = $(this).text();
            $(this).replaceWith('<a href="#">' + TextSpan + '<\/a>') ;
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
    }

    function loadSlickAndBuildSlider() {
        $.when(
            $.getScript("wp-content/themes/p3-theme/js/slick.min.js"),
            $.Deferred(function( deferred ){
                $( deferred.resolve );
            })
        ).done(function(){
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
        });
    }

    function loadBootstrapJsAndBuildModal() {
        $('.reserve button').click(function() {
            $.when(
                $.getScript("wp-content/themes/p3-theme/js/bootstrap.min.js"),
                $.Deferred(function( deferred ){
                    $(deferred.resolve);
                })
            ).done(function() {
                $("#modal-reserve").modal();
            });
        });
    }
});