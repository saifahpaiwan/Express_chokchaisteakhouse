$(".single-item-1").slick({
    slidesToShow: 6,
    slidesToScroll: 2, 
    arrows : false,
    dots: true,
    autoplay: false,
    autoplaySpeed: 2000,
    responsive: [{
        breakpoint: 1600,
            settings: {
                slidesToShow: 5, 
            }
        }, {
        breakpoint: 1199.98,
            settings: {
                slidesToShow: 4, 
            }
        }, {
        breakpoint: 780,
            settings: {
                slidesToShow: 4, 
            }
        }, {
        breakpoint: 500,
            settings: {
                slidesToShow: 3, 
            } 
    }]
});  
$(function () {
    const slider = $(".single-item-1");
    slider; 
    slider.on("wheel", function (e) {
        e.preventDefault();

        if (e.originalEvent.deltaY < 0) {
        $(this).slick("slickNext");
        } else {
        $(this).slick("slickPrev");
        }
    });
});

$(".single-item-2").slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows : false,
    dots: true,
    autoplay: false,
    autoplaySpeed: 3000,
    responsive: [{
        breakpoint: 1600,
            settings: {
                slidesToShow: 4, 
            }
        }, {
        breakpoint: 991,
            settings: {
                slidesToShow: 2, 
            } 
    }]
});  
$(function () {
    const slider = $(".single-item-2");
    slider; 
    slider.on("wheel", function (e) {
        e.preventDefault();

        if (e.originalEvent.deltaY < 0) {
        $(this).slick("slickNext");
        } else {
        $(this).slick("slickPrev");
        }
    });
});