var PATH_ADMIN = "";

$(document).ready(function() {
    $('#slider').responsiveSlides({
        speed: 800,            // Integer: Speed of the transition, in milliseconds
        timeout: 5000
    });

    $('#autoWidth').lightSlider({
        item:5,
        loop:false,
        slideMove:2,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        responsive : [
            {
                breakpoint:800,
                settings: {
                    item:2,
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

    $('#recent-sales ul').lightSlider({
        item:5,
        loop:false,
        slideMove:2,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        responsive : [
            {
                breakpoint:800,
                settings: {
                    item:2,
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

    $('input[name=town]').autoComplete({
        minChars: 2,
        source: function(term, suggest){
            term = term.toLowerCase();
            var choices = [{'rouen': 1}, {'sotteville': 2}];
            var matches = [];
            for (i=0; i<choices.length; i++) {
                for (var key in choices[i]) {
                    //console.log("key " + key + " has value " + choices[i][key]);
                    if (~key.toLowerCase().indexOf(term)) matches.push(choices[i]);
                }
            }

            suggest(matches);
        }
    });

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();
    allWells.first().show();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $("#addBien").on('hidden.bs.modal', function () {
        $('#estimation').show();
        $('#msg-estimation').hide();
    })

    $('#estimation').submit(function(event) {
        var data = {};
        event.preventDefault();

        $(this).find('*').filter(':input').each(function(){
            if($(this).attr("name")) {
                data[$(this).attr("name")] = $(this).val();
            }
        });

        $.ajax({
            url :'sendEstimation',
            data : data,
            method: 'POST'
        }).done(function(retu){
            console.log(retu)
        });

        $('#estimation').hide();
        $('#msg-estimation').show();
    });


});