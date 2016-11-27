$(document).ready(function () {
    var secteursName = ['Secteur_Sud_Est', 'Plateau_Nord', 'Plateau_Est', 'Secteur_Nord_Ouest', 'Rive_Droite', 'Secteur_Sud_Ouest', 'Rive_Gauche'],
        i, $elementTemp, $elementOver, elementOverTemp,toSelect,
        arrayName = {
            'Secteur_Sud_Est' : 'Secteur sud est',
            'Plateau_Nord' : 'Plateau nord',
            'Plateau_Est' : 'Plateau est',
            'Secteur_Nord_Ouest' : 'Secteur nord ouest',
            'Rive_Droite' : 'Rive droite',
            'Secteur_Sud_Ouest' : 'Secteur sud ouest',
            'Rive_Gauche' : 'Rive gauche'
        }, arraySelection = {},
        arrayId = {
            'Secteur_Sud_Est' : 5,
            'Plateau_Nord' : 3,
            'Plateau_Est' : 4,
            'Secteur_Nord_Ouest' : 7,
            'Rive_Droite' : 1,
            'Secteur_Sud_Ouest' : 6,
            'Rive_Gauche' : 2
        };

    for (i = 0; i < secteursName.length; i++) {
        $elementTemp = $('#' + secteursName[i]);
        $elementOver = $('#' + secteursName[i] + '_Hover');

        (function (elementTemp, elementOver) {
            elementTemp.mouseenter(function (e) {
                elementOver.show();
                elementTemp.hide();
            });

            elementOver.mouseleave(function (e) {
                e.stopPropagation();
                $.each(secteursName, function (index, secteurName) {
                    elementOverTemp = $('#' + secteurName + '_Hover');
                    if (!elementOverTemp.data('selected')) {
                        elementOverTemp.fadeOut(200);
                    }
                });

                $.each(secteursName, function (index, secteurName) {
                    elementOverTemp = $('#' + secteurName);

                    elementOverTemp2 = $('#' + secteurName + '_Hover');
                    if (!elementOverTemp2.data('selected')) {
                        elementOverTemp.fadeIn(300);
                    }
                });

            });

            elementOver.click(function () {
                toSelect = elementOver.data('selected') ? false:true;
                elementOver.data('selected', toSelect);
                if(toSelect) {
                    arraySelection[elementTemp.attr('id')] = arrayName[elementTemp.attr('id')];
                } else {
                    delete arraySelection[elementTemp.attr('id')];
                    elementTemp.show();
                    elementOver.hide();
                }

            });

        })($elementTemp, $elementOver);
    }

    $('#selectSectors').on('hide.bs.modal', function () {
        var $town = $('input[name=sectors]'),
            $sectors_id= $('input[name=sectors_id]'),
            separator,
            i = 1;
        $town.val('');
        $sectors_id.val('');

        $.each(arraySelection, function (index, value) {
            separator = $town.val() == '' ? '':', ';
            $town.val($town.val()+ separator + value);
            $sectors_id.val($sectors_id.val()+ separator + arrayId[index]);
            i++
        })

    })
});






