// Testimonial Slider Active
var swiper = new Swiper(".slider-active", {
    slidesPerView: 1,
    spaceBetween: 50,
    loop: true,
    breakpoints: {
        992: {
            slidesPerView: 2,
            spaceBetween: 70,
        }
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

// AboutCards Slider Active
var swiper = new Swiper(".about-cards-slider", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
    },
    breakpoints: {
        576: {
            slidesPerView: 2,
            spaceBetween: 30,
        },
        992: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
        1200: {
            slidesPerView: 4,
            spaceBetween: 30,
        }
    },
    pagination: {
       el: ".about-cards-pagination",
       clickable: true,
    },
});