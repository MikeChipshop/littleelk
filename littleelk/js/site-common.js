jQuery(document).ready(function( $ ) {

    // Announcement Bubble
    $('.lesp_popup-toggle').on('click', function(e) {
        $('body').toggleClass('lesp_popup-open');
        e.preventDefault();
    });

    // Mobile Menu
    $('.les_mobile-menu-toggle').on('click', function(e) {
        $('body').toggleClass('menu-active');
        e.preventDefault();
    });

    // Home slider
    $(".lesp_home-hero-container").lightSlider({
        item: 1,
        slideMargin: 0,
        mode: "fade",
        auto: true,
        loop: true,
        pause: 8000,
        pager:  true
    }); 
});
