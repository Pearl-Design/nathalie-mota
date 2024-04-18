document.addEventListener('DOMContentLoaded', function () {
    // CARROUSEL
    initSwiper();

});


function initSwiper() {
    const swiper = new Swiper(".swiper", {
        direction: 'horizontal',
        centeredSlides: true,
        slidesPerView: "auto",
        speed: 1000,
        autoplay: {
            delay: 1500,
            disableOnInteraction: false,
        },
        loop: true,
        loopedSlides: 2,
        loopAdditionalSlides: 1,
        effect: "coverflow",
        coverflowEffect: {
            slideShadows: false,
            rotate: 70,
            stretch: 0,
            depth: 100,
            modifier: 1,
        },
    });
}

