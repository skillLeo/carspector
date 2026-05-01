// CounterUp Active 
const counterUp = window.counterUp.default

const callback = entries => {
  entries.forEach(entry => {
    const el = entry.target
    if (entry.isIntersecting && !el.classList.contains('is-visible')) {
      counterUp(el, {
        duration: 2000,
        delay: 16,
      })
      el.classList.add('is-visible')
    }
  })
}

const IO = new IntersectionObserver(callback, { threshold: 1 })

const counters = document.querySelectorAll('.counter')
counters.forEach(counter => IO.observe(counter))

// Mini Cards Slider Active 
var swiper = new Swiper(".mini-cards-slider", {
  slidesPerView: 1,
  spaceBetween: 20,
  grabCursor: true,
  autoHeight: true,
  loop: true,
  navigation: false,
  autoplay: {
    delay: 1250,
    disableOnInteraction: false,
    pauseOnMouseEnter: true,
  },
  breakpoints: {
    576: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    992: {
      slidesPerView: 4,
      spaceBetween: 24,
    },
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true, // Enables clicking on pagination bullets
  },
});



// Testimonial Slider Active 
var swiper = new Swiper(".testimonial-slider", {
  slidesPerView: 1,
  spaceBetween: 30,
  grabCursor: true,
  autoHeight: true,
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
    pauseOnMouseEnter: true,
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    992: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
  }, 
  pagination: {
    el: '.swiper-pagination',
    clickable: true, // Enables clicking on pagination bullets
  },
});
