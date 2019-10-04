$(document).ready(function() {
  //trip frequency radio buttons
  $("#once_option").prop("checked", function() {
    $("#rideDays").hide();
    $("#lblDepartureDate").text("Departure Date");
    $("#dvReturnTime").hide();

    if($("#return_trip_switch").is(":checked")){
      $("#dvReturnTime").show();
      $("#dvReturnDate").show();
    }else{
      $("#dvReturnTime").hide();
      $("#dvReturnDate").hide();
    }


  });


  $("#once_option").on("click", function() {
    $("#rideDays").hide();
    $("#lblDepartureDate").text("Departure Date");
    $("#departure_date").attr("placeholder", "Choose Departure Date...");

    if($("#return_trip_switch").is(":checked")){
      $("#dvReturnTime").show();
    }else{
      $("#dvReturnTime").hide();
    }

    $("#dvReturnSwitch").show();
    $("#return_trip").val("N");
    $("#origin-input").attr("placeholder","Enter your current city...");
    $("#destination-input").attr("placeholder","Enter your destination city...");
  });


  $("#regular_option").on("click", function() {
    $("#rideDays").show();
    $("#lblDepartureDate").text("Start Date");
    $("#departure_date").attr("placeholder", "Choose Start Date...");
    $("#dvReturnTime").show();
    $("#dvReturnSwitch").hide();
    $("#return_trip").val("U");
    $("#origin-input").attr("placeholder","Enter Address...");
    $("#destination-input").attr("placeholder","Enter Destination Address...");
  });

  //return switch
  $('#return_trip_switch').on('change.bootstrapSwitch', function (e, state) {
    if(e.target.checked == true){
      //if switch is yes
      var inputVal = "Y";
      $("#dvReturnDate").show();
      $("#return_trip").val(inputVal);
      $("#dvReturnTime").show();
    }else if(e.target.checked == false){
      //if switch is no
      var inputVal = "N";
      $("#dvReturnDate").hide();
      $("#return_trip").val(inputVal);
      $("#dvReturnTime").hide();
    }
  });


});

// function placeSearch(){
//     let inputFrom = document.getElementById('inputFrom');
//     var autocomplete = new google.maps.places.Autocomplete(inputFrom);

//     let inputDestination = document.getElementById('inputDestination');
//     autocomplete = new google.maps.places.Autocomplete(inputDestination);
// }
