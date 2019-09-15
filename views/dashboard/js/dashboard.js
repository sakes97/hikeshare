$(document).ready(function () {
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