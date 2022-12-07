jQuery(document).on('ready', function($) {
    "use strict";

    /**=========================
        LOADER
    =========================**/
    $(window).on('load', function() {
        $('.loader').fadeOut('slow',function(){$(this).remove();});
    });

    /**=========================
        HEADER FIXED SCROLL
    =========================**/
    $(window).on('scroll', function () {
        if($(window).scrollTop() > 200){
            $("#header").addClass('header-fixed');
        }else{
            $("#header").removeClass('header-fixed');
        }
    });

    /**=========================
        NAVBAR
    =========================**/
    $(function(){
        if($(window).width() > 768){
            $(".dropdown").hover(
            function(){
                $(this).find('.dropdown-menu').first().stop(true, true).slideDown(400);
                $(this).toggleClass('open');
                $(this).find('.dropdown-menu').parent('.nav-item.dropdown').addClass("dropdown-active");
            },
            function(){
                $(this).find('.dropdown-menu').first().stop(true, true).slideUp(100);
                $(this).toggleClass('open');
                $(this).find('.dropdown-menu').parent('.nav-item.dropdown').removeClass("dropdown-active");
            });
        };
    });

    /**=========================
        PLAY VIDEO
    =========================**/
    $('#clickplay').on('click', function(event) {
        var vi = $("#videoinput").val();
        $("#vidframe").attr('src', vi);
        event.preventDefault();
    });

    /**=========================
        MAGANIFIC POPUP
    =========================**/
    $('a.mfpclick').click(function() {
        var gallery = $(this).attr('href');
            $(gallery).magnificPopup({
                delegate: 'a',
                type:'image',
                gallery: {
                enabled: true
            }
        }).magnificPopup('open');
    });

    /**=========================
        SLICK CAROUSEL
    =========================**/
    // Slider
    $('.carousel').carousel({
        pause: "false"
    });

    // Services
    $('.service-carousel').slick({
        slidesToShow: 3,
        dots: false,
       
        //centerMode: true,
        autoplay: true,
        responsive:[
            {
                breakpoint: 1200,
                settings:{
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                }
            },
            {
                breakpoint: 900,
                settings:{
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                }
            }
        ]
    });

    // Team
    $('.team-carousel').slick({
        slidesToShow: 3,
        dots: false,
        prevArrow: false,
        nextArrow: false,
        //centerMode: true,
        autoplay: true,
        responsive:[
            {
                breakpoint: 1200,
                settings:{
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                }
            },
            {
                breakpoint: 900,
                settings:{
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                }
            }
        ]
    });
    
    // Reviews
    $('.reviews-carousel').slick({
        slidesToShow: 3,
        dots: false,
        prevArrow: false,
        nextArrow: false,
        //centerMode: true,
        autoplay: true,
        responsive:[
            {
                breakpoint: 1200,
                settings:{
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                }
            },
            {
                breakpoint: 900,
                settings:{
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                }
            }
        ]
    });

    // Clients
    $('.clients-carousel').slick({
        slidesToShow: 6,
        dots: false,
        prevArrow: false,
        nextArrow: false,
        //centerMode: true,
        autoplay: true,
        responsive:[
            {
                breakpoint: 1200,
                settings:{
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                }
            }
        ]
    });

    /**=========================
        ISOTOPE
    =========================**/
    // Activate Isotope
    $(window).on('load', function() {
        var $container = $('.portfolio-items').isotope({
            itemSelector: '.filter-item',
            masonry: {
                columnWidth: '.col-lg-4'
            }
        });
    });
    // Bind Filter Button Click
    var filters = $('.filters-group ul li');
    filters.on('click', function() {
        filters.removeClass('btn-active');
        $(this).addClass('btn-active');
        var filterValue = $(this).attr('data-filter');
        // Use filter if matches value
        $('.portfolio-items').isotope({
            filter: filterValue
        });
    });

    /**=========================
        BACK TO TOP
    =========================**/
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 300) {
            $('.backto-top-btn').fadeIn();
        } else {
            $('.backto-top-btn').fadeOut();
        }
    });
    $('.backto-top-btn').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 700);
        return false;
    });

}(jQuery)); // End jQuery