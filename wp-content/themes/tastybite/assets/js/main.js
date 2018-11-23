/**    
 * 
 * ---------------------------------------------------------------------------
 *
 * Template Name:  Tasty Bite
 * Author : Tasty Bite
 * Description: This is consulting and Corporate HTML5 template
 * Version : 1.0 
 *
 * --------------------------------------------------------------------------- 
 *
 */
/*  ==================================
 *           js content
 *    ==================================
 *
 *   1. scroll to top js
 *   2. Sticky js
 *   3. Slick nav
 *   4. Main slider
 *   5. Drinks sort and filter
 *   6. Food slider
 *   7. Project portfolio section
 *   8. Gallery measonary
 *   9. Footer pop up gallery - Magnific popup
 *   10.  Counter up
 *   11. Google map
 *	================================== */
(function ($) {
    "use strict";
    $(function () {
        var $mainwindow = $(window);
        $mainwindow.on('load', function () {
            $(".loader").fadeOut();
        });
		/*====================================
		scroll to top js
		======================================*/
        $mainwindow.on('scroll', function () {
            if ($(this).scrollTop() > 250) {
                $('#toTopBtn').fadeIn(200);
            } else {
                $('#toTopBtn').fadeOut(200);
            }
        });
        $("#toTopBtn").on("click", function () {
            $("html, body").animate({
                scrollTop: 0
            }, "slow");
            return false;
        });
		/*====================================
        Sticky js
    ======================================*/
        var navbar = $('.header');
        var scrolled = false;
        $mainwindow.on('scroll', function () {
            if (200 < $mainwindow.scrollTop() && !scrolled) {
                navbar.addClass('sticky_menu animated fadeInDown').animate({
                    'margin-top': '0px'
                });
                scrolled = true;
            }
            if (200 > $mainwindow.scrollTop() && scrolled) {
                navbar.removeClass('sticky_menu animated fadeInDown').css('margin-top', '0px');
                scrolled = false;
            }
        });
		/*====================================
            slick nav
        ======================================*/
        var logo_path = $('.tastybite-logo').html();
        $('#main-menu').slicknav({
            appendTo: '.mobile-menu',
            removeClasses: true,
            label: '',
            closedSymbol: '<i class="fa fa-angle-right"><i/>',
            openedSymbol: '<i class="fa fa-angle-down"><i/>',
            brand: logo_path 
        });

        
		/*====================================
		main slider
		======================================*/
        $('.testy-slider').each(function () {
            var carousel = $(this),
                loop = carousel.data('loop'),
                items = carousel.data('items'),
                margin = carousel.data('margin'),
                stagePadding = carousel.data('stage-padding'),
                autoplay = carousel.data('autoplay'),
                autoplayTimeout = carousel.data('autoplay-timeout'),
                smartSpeed = carousel.data('smart-speed'),
                dots = carousel.data('dots'),
                nav = carousel.data('nav'),
                navSpeed = carousel.data('nav-speed'),
                rXsmall = carousel.data('r-x-small'),
                rXsmallNav = carousel.data('r-x-small-nav'),
                rXsmallDots = carousel.data('r-x-small-dots'),
                rXmedium = carousel.data('r-x-medium'),
                rXmediumNav = carousel.data('r-x-medium-nav'),
                rXmediumDots = carousel.data('r-x-medium-dots'),
                rSmall = carousel.data('r-small'),
                rSmallNav = carousel.data('r-small-nav'),
                rSmallDots = carousel.data('r-small-dots'),
                rMedium = carousel.data('r-medium'),
                rMediumNav = carousel.data('r-medium-nav'),
                rMediumDots = carousel.data('r-medium-dots'),
                rLarge = carousel.data('r-large'),
                rLargeNav = carousel.data('r-large-nav'),
                rLargeDots = carousel.data('r-large-dots'),
                center = carousel.data('center');
                carousel.owlCarousel({
                loop: (loop ? true : false),
                items: (items ? items : 1),
                lazyLoad: true,
                margin: (margin ? margin : 0),
                autoplay: (autoplay ? true : false),
                autoplayTimeout: (autoplayTimeout ? autoplayTimeout : 1000),
                smartSpeed: (smartSpeed ? smartSpeed : 250),
                dots: (dots ? true : false),
                nav: (nav ? true : false),
                navText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>", "<i class='fa fa-angle-right' aria-hidden='true'></i>"],
                navSpeed: (navSpeed ? true : false),
                center: (center ? true : false),
                responsiveClass: true,
                responsive: {
                    0: {
                        items: (rXsmall ? rXsmall : 1),
                        nav: (rXsmallNav ? true : false),
                        dots: (rXsmallDots ? true : false)
                    },
                    480: {
                        items: (rXmedium ? rXmedium : 1),
                        nav: (rXmediumNav ? true : false),
                        dots: (rXmediumDots ? true : false)
                    },
                    768: {
                        items: (rSmall ? rSmall : 1),
                        nav: (rSmallNav ? true : false),
                        dots: (rSmallDots ? true : false)
                    },
                    992: {
                        items: (rMedium ? rMedium : 1),
                        nav: (rMediumNav ? true : false),
                        dots: (rMediumDots ? true : false)
                    },
                    1199: {
                        items: (rLarge ? rLarge : 1),
                        nav: (rLargeNav ? true : false),
                        dots: (rLargeDots ? true : false)
                    }
                }
            });
        });
        
		
    });
})(jQuery);