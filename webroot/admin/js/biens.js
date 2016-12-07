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
});