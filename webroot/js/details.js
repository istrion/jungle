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
});

$(document).ready(function () {
    $('#sendEmailAgent').click(function(e){
        e.preventDefault();

        $('#sendError').hide();

        var empty = $(this).parent().find("input[type=text], textarea").filter(function() {
            return this.value === "";
        });

        if(empty.length > 0) {
            $("#sendError").show();
            return;
        }

        var data = $('#sendMessage').serializeArray(),
        datas = {};

        $.each(data, function(index, value){
            datas[value.name] = value.value;
        });

        $.ajax({
            url :'/sendAgentEmail',
            data : data,
            method: 'POST'
        }).done(function(retu){
            console.log(retu)
        });

        console.log(datas);
    });
});