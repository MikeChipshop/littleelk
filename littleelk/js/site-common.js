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
});
