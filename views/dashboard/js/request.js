$(document).ready(function(){
    $("#btnRequest").on('click', function(){
        $("#maxNumberTarget").attr({
            "max" : parseInt($("#idSeatsAvailable").text()),
            "min" : 1
         });
         $("#input_rideid").attr("value",$(this).attr('data-id'));
    });
});