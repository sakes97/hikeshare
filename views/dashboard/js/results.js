$(document).ready(function(){
    $("#btnRequest").on('click', function(){
        $("#maxNumberTarget").attr({
            "max" : parseInt($("#idSeatsAvailable").text()),
            "min" : 1
         });
         $("#input_rideid").attr("value",$(this).attr('data-id'));
    });



    // $("#btnViewProfile").on('click', function(){
    //     var userid = $(this).attr("data-id");
    //     var url = 'http://localhost:8080/myphp/hikeshare/dashboard/xhrLoadUser';

    //     $.ajax({
    //         url: url,
    //         type: 'POST',
    //         data: 'id='+userid,
    //         dataType: 'json'
    //     }).done(function(data){
    //         $("#txtName").text(data.firstname + " " + data.lastname);
    //         $("#txtBio").text(data.bio);
    //         console.log(data);
    //     }).fail(function(){
    //         alert("fail");
    //     });

    
    
    
    
    // });
    

    $(document).on('click','#btnViewProfile', function(){
        var userid = $(this).attr("data-id");
        // alert(userid);
        var url = 'http://localhost:8080/myphp/hikeshare/dashboard/xhrLoadUser';

        $.ajax({
            url: url,
            type: 'POST',
            data: 'id='+userid,
            dataType: 'json'
        }).done(function(data){
            $("#txtName").text(data.firstname + " " + data.lastname);
            $("#txtBio").text(data.bio);
            $("#profileID").text(data.userid);
            $("#txtRating").text(data.rating);
        }).fail(function(){
            alert("Unable to retrieve user details. Please try again.");
        });

    
    });



});