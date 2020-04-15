(function ($) {
    $(function () {



        $('.main-instructor-slider').slick({
            infinite: true,
            autoplay: true,
            arrows: false,
            autoplaySpeed: 4000,
            speed: 1000,
            fade: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 520,
                    settings: {
                        autoplay: true,
                        autoplaySpeed: 4000,
                        fade: false
                    }
                }
            ]
        });
        
        $('.button-collapse').sideNav();
        $('.parallax').parallax();

        $('.main-tracking-slider').slick({
            infinite: true,
            autoplay: true,
            arrows: false,
            autoplaySpeed: 4500,
            speed: 1000,
            fade: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 520,
                    settings: {
                        autoplay: true,
                        autoplaySpeed: 4000,
                        fade: false
                    }
                }
            ]
        });


    }); // end of document ready
})(jQuery); // end of jQuery name space

