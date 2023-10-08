(function ($) {
    "use strict";

    //recenzie
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 25,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],

        responsive: {
            0:{
                items:1
            },
            768:{
                items: 2
            }
        }
    });
})(jQuery);

/* tlacidlo na vratenie spat hore */
const toTop = document.querySelector(".to-top");

window.addEventListener("scroll", () => {
    if (window.pageYOffset > 100) {
        toTop.classList.add("active");
    } else {
        toTop.classList.remove("active");
    
    }
})

