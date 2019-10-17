$(document).ready(function(){
    $("#btnRequest").on('click', function(){
        $("#maxNumberTarget").attr({
            "max" : parseInt($("#idSeatsAvailable").text()),
            "min" : 1
         });
         $("#input_rideid").attr("value",$(this).attr('data-id'));
    });


    $("#btnViewProfile").on('click', function(){
        var userid = $(this).attr("data-id");
        var url = 'http://localhost:8080/myphp/hikeshare/dashboard/xhrLoadUser';

        $.ajax({
            url: url,
            type: 'POST',
            data: 'id='+userid,
            dataType: 'json'
        }).done(function(data){
            $("#txtFNAME").text(data.firstname);
            $("#txtLNAME").text(data.lastname);
            console.log(data);
        }).fail(function(){
            alert("fail");
        });

    
    
    
    
    });
    



});