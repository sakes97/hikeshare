$(document).ready(function () {
  //datetimepicker (GENERAL)
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
    format: 'YYYY-MM-DD',
    minDate: new Date()
  });

  //datetimepicker - year/month/day - PROFILE
  $('.datepicker_profile').datetimepicker({
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
    format: 'YYYY-MM-DD',
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
    format: 'HH:mm'
  });


  //dropdown-tab active toggle
  $('.dropdown-tabs').on('shown.bs.tab', 'a', function (e) {
    if (e.currentTarget) {
      $(e.currentTarget).removeClass('active');
    }
  });

  //Activate regular switches
  if ($("[data-toggle='switch']").length != 0) {
    $("[data-toggle='switch']").bootstrapSwitch();
  }

  $("ul.dropdown-tabs a").click(function (e) {
    e.preventDefault();
    $(this).tab('show');
  });

  $("#inputGroupFile01").change(function (event) {
    RecurFadeIn();
    readURL(this);
  });

  $("#inputGroupFile01").on('click', function (event) {
    RecurFadeIn();
  });



  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var filename = $("#inputGroupFile01").val();
      filename = filename.substring(filename.lastIndexOf('\\') + 1);
      reader.onload = function (e) {
        debugger;
        $("#image-upload").attr('src', e.target.result);
        $("#image-upload").hide();
        $("#image-upload").fadeIn(500);
        $(".custom-file-label").text(filename);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  function RecurFadeIn() {
    console.log('ran');
  }

});

// function placeSearch(){
//     let inputFrom = document.getElementById('inputFrom');
//     var autocomplete = new google.maps.places.Autocomplete(inputFrom);

//     let inputDestination = document.getElementById('inputDestination');
//     autocomplete = new google.maps.places.Autocomplete(inputDestination);
// }

function pageview(val) {
  window.location.href = '?profile_view=' + val;
}


function scheduleShow() {
  //Ride_Type = Regular
  document.getElementById('rideDays').style.display = 'block';
  document.getElementById('lblDepartureDate').innerText = 'Start Date';
  document.getElementById('dvReturnTime').style.display = 'block';
}
function scheduleHide() {
  //Ride_Type = Once-off
  document.getElementById('rideDays').style.display = 'none';
  document.getElementById('lblDepartureDate').innerText = 'Departure Date';
  document.getElementById('dvReturnTime').style.display = 'none';
}

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    mapTypeControl: false,
    center: { lat: -33.8688, lng: 151.2195 },
    zoom: 13
  });

  new AutocompleteDirectionsHandler(map);
}

/**
 * @constructor
 */
function AutocompleteDirectionsHandler(map) {
  this.map = map;
  this.originPlaceId = null;
  this.destinationPlaceId = null;
  this.travelMode = 'DRIVING';
  this.directionsService = new google.maps.DirectionsService;
  this.directionsRenderer = new google.maps.DirectionsRenderer;
  this.directionsRenderer.setMap(map);

  var originInput = document.getElementById('origin-input');
  var destinationInput = document.getElementById('destination-input');

  var originAutocomplete = new google.maps.places.Autocomplete(originInput);
  // Specify just the place data fields that you need.
  originAutocomplete.setFields(['place_id']);

  var destinationAutocomplete =
    new google.maps.places.Autocomplete(destinationInput);
  // Specify just the place data fields that you need.
  destinationAutocomplete.setFields(['place_id']);

  this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
  this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

  // this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
  // this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(
  //     destinationInput);
}


AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function (
  autocomplete, mode) {
  var me = this;
  autocomplete.bindTo('bounds', this.map);

  autocomplete.addListener('place_changed', function () {
    var place = autocomplete.getPlace();

    if (!place.place_id) {
      window.alert('Please select an option from the dropdown list.');
      return;
    }
    if (mode === 'ORIG') {
      me.originPlaceId = place.place_id;
    } else {
      me.destinationPlaceId = place.place_id;
    }
    me.route();
  });
};

AutocompleteDirectionsHandler.prototype.route = function () {
  if (!this.originPlaceId || !this.destinationPlaceId) {
    return;
  }
  var me = this;

  this.directionsService.route(
    {
      origin: { 'placeId': this.originPlaceId },
      destination: { 'placeId': this.destinationPlaceId },
      travelMode: this.travelMode
    },
    function (response, status) {
      if (status === 'OK') {
        me.directionsRenderer.setDirections(response);
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });
};