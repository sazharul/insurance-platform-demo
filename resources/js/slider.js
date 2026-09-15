window.show_gallery_slider = function (count, model_name) {

    var slick_slider = $('.slider_name'+count).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
    });

    // $('.slider_thumbnail_name'+count).slick({
    //     slidesToShow: 4,
    //     slidesToScroll: 3,
    //     prevArrow: false,
    //     nextArrow: false,
    // });
    const slider = document.querySelector('.slider_thumbnail_name'+count);
    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener('mousedown', (e) => {
        isDown = true;
        slider.classList.add('active');
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });
    slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.classList.remove('active');
    });
    slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('active');
    });
    slider.addEventListener('mousemove', (e) => {
        if(!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 3; //scroll-fast
        slider.scrollLeft = scrollLeft - walk;
    });

    $('.slider_thumbnail_name'+count+' img').click(function () {
        let slideIndex = $(this).index();
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        slick_slider.slick('slickGoTo', parseInt(slideIndex));
    });
};
