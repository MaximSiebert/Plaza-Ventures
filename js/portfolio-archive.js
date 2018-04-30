$(document).ready(function(){
    // Portfolio Archive Slider
    var swiper = new Swiper('.swiper-container', {
        spaceBetween: 5,
        speed: 1000,
        autoplay: {
          delay: 5000,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            renderBullet: function (index, className) {
                return '<span class="' + className + '"></span>';
            },
        },
        navigation: {
          nextEl: '.swiper-next',
          prevEl: '.swiper-prev',
        },
        keyboard: {
          enabled: true,
          onlyInViewport: true,
        },
    });
});