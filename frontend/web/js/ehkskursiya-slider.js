(function ($) {
    $(function () {



        $('.ehkskursiya-slider').slick({
            infinite: true,
            autoplay: true,
            autoplaySpeed: 4000,
            speed: 1000,
            arrows: false,
            fade: true,
            dots: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 600,
                    settings: {
                        autoplay: true,
                        dots: false,
                        autoplaySpeed: 4000,
                        fade: false
                    }
                }
            ]
        });

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

        $('.button-collapse').sideNav();
        $('.parallax').parallax();

    }); // end of document ready

    $(window).load(function(){
        $('.masonry-grid').masonry({
            // options...
            itemSelector: '.col',
        });
    });


})(jQuery); // end of jQuery name space

