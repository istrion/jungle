$(function() {
    if($('input[name="type_of_bien"]:checked').val() != 2){
        $('#etage-block').hide();
    }


    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#uploadImages", { url: PATH_ADMIN +'/admin/biens/addImage' , paramName : "image"});
    myDropzone.on("success", function(data){
        var response =  JSON.parse(data.xhr.response);
        $("#list-img").append("<li><img src=\"" +response.image+ "\"/><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\" data-id=\""+response.id+"\"></span></li>");
        var value = $("#list_image_id").val(),
            finalValue = (value == "") ? response.id: value +","+response.id;
        $("#list_image_id").val(finalValue);
    });

    $("#type_of_bien").click(function(e){
        var element = $(e.target);
        $(element).find("input[type=radio]").prop("checked", true);

        if($(element).find("input[type=radio]").val() == 2) {
            $('#etage-block').show();
        } else {
            $('#etage-block').hide();
        }
    });

    $(".glyphicon-trash").click(function () {
        var valid = confirm('Voulez vous vraiment supprimer cette photo ?');
        $photo = $(this).closest('li');
        if(valid) {
            $.ajax({
                url :PATH_ADMIN +'/admin/biens/removeImage',
                method : 'POST',
                data : {'imageId' : $(this).data('id')}
            }).success(function(response){
                if(response){
                    $photo.remove();
                }
            });
        }
    });

    $("select[name='dpe_id']").change(function(){
        if($.inArray($(this).val(),["11","12","13"]) != -1) {
            $('#dpevalue').closest('div').hide();
            $('#dpevalue').val('');
        } else {
            $('#dpevalue').closest('div').show();
        }
    });

    $('#type_of_bien .btn').click(function() {
        if($(this).find('input').val() == 4) {
            $('#room, #kitchen, #shower, #parking, #dpe_id, #dpevalue').closest('div.form-group').hide();
        } else{
            $('#room, #kitchen, #shower, #parking, #dpe_id, #dpevalue').closest('div.form-group').show();
        }
    });

    if($('#type_of_bien .btn.btn-default.active input').val() == 4){
        $('#room, #kitchen, #shower, #parking, #dpe_id, #dpevalue').closest('div.form-group').hide();
    } else{
        $('#room, #kitchen, #shower, #parking, #dpe_id, #dpevalue').closest('div.form-group').show();
    }

    //Drag and drop
    $( "#list-img" ).sortable({
        cursor: "move",
        helper: "clone",
        tolerance: 'pointer',
        containment: "parent",
        stop: function( event, ui ) {

            var dataList = $("#list-img li span").map(function() {
                return $(this).data("id");
            }).get();

            $.ajax({
                url :PATH_ADMIN +'/admin/biens/orderImage',
                method : 'POST',
                data : {
                    'imageIdList' : dataList
                }
            }).success(function(response){
                console.log('ok');
            });
        }
    });
    $( "#list-img" ).disableSelection();

});