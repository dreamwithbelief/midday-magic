$(function() {
    $(document).on('click', '.clear', function(e) {
        e.preventDefault();
        $(this).closest('form').find('input[type=text],input[type=email],input[type=password],textarea').val('');
    }).on('click', '.gallery-prev', function(e) {
        e.preventDefault();
        $('.gallery').slickPrev();
    }).on('click', '.gallery-next', function(e) {
        e.preventDefault();
        $('.gallery').slickNext();
    });

    $('.gallery-nav').children().clone().appendTo('.gallery');

    $('.gallery').slick({
            asNavFor: '.gallery-nav'
    });

    $('.gallery-nav').slick({
        dots: true,
        infinite: true,
        centerMode: true,
        focusOnSelect: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        asNavFor: '.gallery',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: true,
                    infinite: true,
                    arrows: true
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
});