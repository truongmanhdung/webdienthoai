$(document).ready(function () {
    $('.click_nam').click(function (e) { 
        e.preventDefault();
        $('.click_nam').addClass('active_nhan');
        $('.click_nu').removeClass('active_nhan');
        $('.nam').addClass('d-flex');
        $('.nu').addClass('d-none');
        $('.nam').removeClass('d-none');
        $('.nu').removeClass('d-flex');

    });
    $('.click_nu').click(function (e) { 
        e.preventDefault();
        $('.click_nam').removeClass('active_nhan');
        $('.click_nu').addClass('active_nhan');
        $('.nam').addClass('d-none');
        $('.nu').addClass('d-flex');
        $('.nu').removeClass('d-none');
        $('.nam').removeClass('d-flex');
    });
    const swiper = new Swiper('.swiper-container', {
        // Optional parameters
        direction: 'horizontal',
        allowSlidePrev: true,
        loop: true,
      
        // If we need pagination
        pagination: {
          el: '.swiper-pagination',
        },
      
        // Navigation arrows
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      
        // And if we need scrollbar
        scrollbar: {
          el: '.swiper-scrollbar',
        },
        slidesPerView: 1,
        spaceBetween: 10,
        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 320px
            320: {
            slidesPerView: 2,
            spaceBetween: 20
            },
            // when window width is >= 480px
            480: {
            slidesPerView: 3,
            spaceBetween: 30
            },
            // when window width is >= 640px
            640: {
            slidesPerView: 4,
            spaceBetween: 20
            }
        }
      });
});
