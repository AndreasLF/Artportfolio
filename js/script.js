
(function($) {

  $(document).ready(function(){

    var currentImage = null;

    // Gallery image click
    $('.ap-gallery-block').click(function(){
        currentImage = $(this).data('ap-slide-no');

        // set slideshow image
        $('.ap-slideshow-img').attr("src", $(this).find('img').attr('src'));

        //set caption
        setCaption($('.ap-grid').find("div[data-ap-slide-no='" + currentImage + "']"));

        // open modal
        $('.ap-slideshow-modal').modal('show');

    });

    // Close button click
    $('.ap-slideshow-btn-close').click(function(){
        // close modal
        $('.ap-slideshow-modal').modal('hide');
    });


    // Next button click
    $('.ap-slideshow-btn-next').click(function(){
        var totalSlides = $('.ap-grid').data('ap-total-slides');

        if(currentImage == totalSlides - 1){
          currentImage = 0;
        }else{
          currentImage = currentImage + 1;
        }

        //Change image source
        $('.ap-slideshow-img').attr('src', $('.ap-grid').find("div[data-ap-slide-no='" + currentImage + "']").find('img').attr('src'));

        //set caption
        setCaption($('.ap-grid').find("div[data-ap-slide-no='" + currentImage + "']"));

    });

    // Prev button click
    $('.ap-slideshow-btn-prev').click(function(){
        var totalSlides = $('.ap-grid').data('ap-total-slides');

        if(currentImage == 0){
          currentImage = totalSlides - 1;
        }else{
          currentImage = currentImage - 1;
        }
        //Change image source
        $('.ap-slideshow-img').attr('src', $('.ap-grid').find("div[data-ap-slide-no='" + currentImage + "']").find('img').attr('src'));

        //set caption
        setCaption($('.ap-grid').find("div[data-ap-slide-no='" + currentImage + "']"));

    });




    function setCaption(imgBlockDiv){
      var text = imgBlockDiv.data("ap-img-text");
      var size = imgBlockDiv.data("ap-img-size");
      var caption = null;


      if ((typeof text !== typeof undefined && text !== false)&&(typeof size !== typeof undefined && size !== false)) {
        caption = '&nbsp;&nbsp;  <i class="fas fa-palette"></i> &nbsp;'  + text + '&nbsp;&nbsp;  <i class="fas fa-ruler"></i> &nbsp;' + size + '&nbsp;&nbsp;';
      }
      else if ((typeof text !== typeof undefined && text !== false)){
        caption = '<i class="fas fa-palette"></i> &nbsp;' + text;
      }
      else if((typeof size !== typeof undefined && size !== false)){
        caption = '<i class="fas fa-ruler"></i> &nbsp; ' + size;
      }
      else{
        caption = null;
      }


      if (caption) {
          $('.ap-slideshow-caption').show();
          $('.ap-slideshow-caption').html(caption);
      }
      else{
        $('.ap-slideshow-caption').hide();
      }
    }



    // Change image with arrow buttons
    $(document).keydown(function(e) {
    switch(e.which) {
        case 37: // left

            var totalSlides = $('.ap-grid').data('ap-total-slides');

            if(currentImage == 0){
              currentImage = totalSlides - 1;
            }else{
              currentImage = currentImage - 1;
            }
            //Change image source
            $('.ap-slideshow-img').attr('src', $('.ap-grid').find("div[data-ap-slide-no='" + currentImage + "']").find('img').attr('src'));

            //set caption
            setCaption($('.ap-grid').find("div[data-ap-slide-no='" + currentImage + "']"));

        break;

        case 39: // right
            var totalSlides = $('.ap-grid').data('ap-total-slides');

            if(currentImage == totalSlides - 1){
              currentImage = 0;
            }else{
              currentImage = currentImage + 1;
            }

            //Change image source
            $('.ap-slideshow-img').attr('src', $('.ap-grid').find("div[data-ap-slide-no='" + currentImage + "']").find('img').attr('src'));

            //set caption
            setCaption($('.ap-grid').find("div[data-ap-slide-no='" + currentImage + "']"));
        break;
        default: return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
});


  });

})( jQuery );
