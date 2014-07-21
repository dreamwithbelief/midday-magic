$(document).ready(function() {
    var cur_page = $('#nav' ).find('li[class=current_page_item]');
    $('#nav').find('li').on('mouseenter mouseleave', function() {
        $('#nav').find('li[class=current_page_item]').toggleClass('current_page_item');
        $(this).toggleClass('current_page_item');
    });
    $('#nav').on('mouseleave', function() {
        $('#nav').find('li[class=current_page_item]').toggleClass('current_page_item');
        cur_page.toggleClass('current_page_item');
    });
});