$(function() {
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#uploadImages", { url: "' . PATH_ADMIN . '/admin/biens/addImage" , paramName : "image"});
    myDropzone.on("success", function(data){
        var response =  JSON.parse(data.xhr.response);
        $("#list-img").append("<li><img src=\"" +response.image+ "\"/><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\" id=\"imgId_"+response.id+"\"></span></li>");
        var value = $("#list_image_id").val(),
            finalValue = (value == "") ? response.id: value +","+response.id;
        $("#list_image_id").val(finalValue);
    });
    $("#type_of_bien").click(function(e){
        var element = $(e.target);
        console.log(element);
        $(element).find("input[type=radio]").prop("checked", true);
    });
});