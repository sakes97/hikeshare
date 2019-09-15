$(document).ready(function () {
    //datetimepicker - day/month/year
    $('.datepicker').datetimepicker({
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
        },
        format: 'DD/MM/YYYY',
        minDate: new Date()
    });

    //datetimepicker - year
    $('.datepicker_year').datetimepicker({
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
        },
        format: 'YYYY',
    });

    //datetimepicker - time
    $('.timepicker').datetimepicker({
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
        },
        format: 'LT'
    });


    $("#inputGroupFile01").change(function(event){
        RecurFadeIn();
        readURL(this);
    });

    $("#inputGroupFile01").on('click', function(event){
        RecurFadeIn();
    });

    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            var filename = $("#inputGroupFile01").val();
            filename = filename.substring(filename.lastIndexOf('\\')+1);
            reader.onload = function(e) {
                debugger;
                $("#image-upload").attr('src', e.target.result);
                $("#image-upload").hide();
                $("#image-upload").fadeIn(500);
                $(".custom-file-label").text(filename);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function RecurFadeIn(){
        console.log('ran');
    }

});

function placeSearch(){
    let inputFrom = document.getElementById('inputFrom');
    var autocomplete = new google.maps.places.Autocomplete(inputFrom);

    let inputDestination = document.getElementById('inputDestination');
    autocomplete = new google.maps.places.Autocomplete(inputDestination);
}

function pageview(val){
    window.location.href = '?profile_view='+val;
}