$(document).ready(function () {
    var overlay = $('.overlay'),
        close = $('.close'),
        trigger = $('.trigger-bio');

    trigger.click(function(){
        if ($(this).closest('.team-member').hasClass('open')) {
            $(this).closest('.team-member').children('.biography-overlay').fadeOut(300);
            $(this).closest('.team-member').removeClass('open');
            $('body').removeClass('open');
        } else {
            $(this).closest('.team-member').children().children('.biography-overlay').fadeIn(300);
            $(this).closest('.team-member').addClass('open');
            $('body').addClass('open');
        }
    });
    
    overlay.click(function(){
        $(this).closest('.team-member').children().children('.biography-overlay').fadeOut(300);
        $(this).closest('.team-member').removeClass('open');
        $('body').removeClass('open');
    });

    close.click(function(){
        $(this).closest('.biography-overlay').fadeOut(300);
        $(this).closest().parent('.team-member').removeClass('open');
        $('body').removeClass('open');
    });
});