$(document).ready(function(){

    // Hide Header on on scroll down
    var didScroll;
    var lastScrollTop = 0;
    var delta = 10;
    var navbar = $('.fixed-nav');
    var navbarHeight = navbar.outerHeight();


    $(window).scroll(function(event){
        if ($(window).scrollTop() < 400) {
            navbar.removeClass('nav-down').addClass('nav-up');
        } else {
            navbar.removeClass('nav-up').addClass('nav-down');
        }
    });


    //Mobile Menu Trigger
    var menuButton = $('.hamburger'),
        body = $('body');

    menuButton.click(function(){
        if (body.hasClass('active')) {
            body.removeClass('active')
        } else {
            body.addClass('active')
        }
    });


    //Scroll to footer when clicking contact
    $('.menu-item-object-custom.menu-item-443 a').click(function (e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop: ($("#footer").offset().top - 120)
        }, 1000);
    })


    //Directions Overlay
    var overlay = $('.overlay'),
        close = $('.close'),
        trigger = $('.trigger-directions');

    trigger.click(function(){
        if ($(this).parent('.directions').hasClass('open')) {
            $(this).parent('.directions').children('.directions-overlay').fadeOut(300);
            $(this).parent('.directions').removeClass('open');
            $('body').removeClass('open');
        } else {
            $(this).parent('.directions').children('.directions-overlay').fadeIn(300);
            $(this).parent('.directions').addClass('open');
            $('body').addClass('open');
        }
    });

    overlay.click(function(){
        $(this).parent().parent('.directions').children('.directions-overlay').fadeOut(300);
        $(this).parent().parent('.directions').removeClass('open');
        $('body').removeClass('open');
    });

    close.click(function(){
        $(this).parent().parent('.directions-overlay').fadeOut(300);
        $(this).parent().parent().parent('.directions').removeClass('open');
        $('body').removeClass('open');
    });

});