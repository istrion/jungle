$('#myCarousel').lightSlider({
    item:1,
    loop:false,
    slideMove:1,
    easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
    speed:600,
    enableDrag: false,
    responsive : [
        {
            breakpoint:800,
            settings: {
                item:1,
                slideMove:1,
                slideMargin:6
            }
        },
        {
            breakpoint:480,
            settings: {
                item:1,
                slideMove:1
            }
        }
    ]
});

lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true,
    'albumLabel': 'Image %1 sur %2'
})