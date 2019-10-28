$(document).ready(function () {
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


  //dropdown-tab active toggle
  $('.dropdown-tabs').on('shown.bs.tab', 'a', function (e) {
    if (e.currentTarget) {
      $(e.currentTarget).removeClass('active');
    }
  });
  $("ul.dropdown-tabs a").click(function (e) {
    e.preventDefault();
    $(this).tab('show');
  });





  //user ratings 
  resetStar();

  var ratedIndex = -1;

  $('.fa-star').on('click', function(){
      ratedIndex = parseInt($(this).data('index'));
      $("#rating").val(ratedIndex);
  });

  $('.fa-star').mouseover(function(){
      resetStar();

      var currentIndex = parseInt($(this).data('index'));

      setStars(currentIndex);

  });

  $('.fa-star').mouseleave(function(){
      resetStar();

      if(ratedIndex != -1){
          setStars(ratedIndex);
      }

  });

  function resetStar()
  {
      $('.fa-star').css('color', 'black');
  }

  function setStars(max){
      for(var i = 0; i <= max; i++){
          $('.fa-star:eq('+i+')').css('color','yellow');
      }
  }


});