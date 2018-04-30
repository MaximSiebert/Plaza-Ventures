$(document).ready(function(){
    // Philosophy Slider
    var swiper = new Swiper('.swiper-container', {
        spaceBetween: 10,
        speed: 1000,
        simulateTouch: false,
        autoplay: {
          delay: 7000,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            renderBullet: function (index, className) {
                return '<span class="' + className + '"></span>';
            },
        },
        keyboard: {
          enabled: true,
          onlyInViewport: true,
        },
    });

    var offsetSize = $(".fixed-nav").innerHeight();
    var offsetSmall = $(".header-mobile").innerHeight();

    if ($('window').width() > 749) {
        $("html, body").animate({ scrollTop: $(window.location.hash).offset().top-offsetSize }, 1);
    } else {
        $("html, body").animate({ scrollTop: $(window.location.hash).offset().top - offsetSmall }, 1);
    }

});