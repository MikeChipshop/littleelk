jQuery(document).ready(function( $ ) {
    $('.lesp_popup-toggle').on('click', function(e) {
        $('body').toggleClass('lesp_popup-open');
        e.preventDefault();
    });
});
