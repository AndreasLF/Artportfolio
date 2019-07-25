
(function($) {

  $(document).ready(function(){

    var currentImage = null;
    var storyToggled = false;



    // Gallery image click
    $('.ap-gallery-block').click(function(){
        currentImage = $(this).data('ap-slide-no');

        // set slideshow image
        $('.ap-slideshow-img').attr("src", $(this).find('img').attr('src'));

        //set caption
        setCaption($('.ap-grid').find("div[data-ap-slide-no='" + currentImage + "']"));

        // set story
        setStoryContent($('.ap-grid').find("div[data-ap-slide-no='" + currentImage + "']"));
        // Hide story slideshow story div
        $('.ap-slideshow-story').hide();


        // open modal
        $('.ap-slideshow-modal').modal('show');


    });

    // Close button click
    $('.ap-slideshow-btn-close').click(function(){
        // close modal
        $('.ap-slideshow-modal').modal('hide');

        //Hide story if shown
        if(storyToggled == true){ toggleStory();};

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

        //Hide story if shown
        if(storyToggled == true){ toggleStory();};

        // set story
        setStoryContent($('.ap-grid').find("div[data-ap-slide-no='" + currentImage + "']"));

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

        //Hide story if shown
        if(storyToggled == true){ toggleStory();};

        // set story
        setStoryContent($('.ap-grid').find("div[data-ap-slide-no='" + currentImage + "']"));

    });

    $('.ap-slideshow-btn-story').click(function(){
      toggleStory();
    });

    $('.ap-slideshow-story').click(function(){
      toggleStory();
    });


    /*
    * This function updates the caption in the image slideshow
    *
    * @param imgBlockDiv is the div element containing the current image in the gallery
    */
    function setCaption(imgBlockDiv){
      var text = imgBlockDiv.data("ap-img-text");
      var size = imgBlockDiv.data("ap-img-size");
      var date = imgBlockDiv.data("ap-img-date");

      var caption = "";

      if ((typeof text !== typeof undefined && text !== false)) {
        caption += '&nbsp;  <i class="fas fa-palette"></i> &nbsp;'  + text + '&nbsp;';
      }
      if ((typeof size !== typeof undefined && size !== false)){
        caption += '&nbsp;&nbsp;  <i class="fas fa-ruler"></i> &nbsp;' + size + '&nbsp;';
      }
      if ((typeof date !== typeof undefined && date !== false)){
        caption += '&nbsp;&nbsp;  <i class="far fa-calendar"></i> &nbsp;' + date + '&nbsp;';
      }


      if (caption) {
          $('.ap-slideshow-caption').show();
          $('.ap-slideshow-caption').html(caption);
      }
      else{
        $('.ap-slideshow-caption').hide();
      }
    }


    /*
    * This function updates the story in the image slideshow. If the story is already shown it will be removed
    *
    * @param imgBlockDiv is the div element containing the current image in the gallery
    */
    function toggleStory(){
        if(storyToggled){
          $('.ap-slideshow-btn-story').show();
          $('.ap-slideshow-caption').show();
          $('.ap-slideshow-story').hide();

          storyToggled = false;
        }
        else{
          $('.ap-slideshow-caption').hide();
          $('.ap-slideshow-btn-story').hide();
          $('.ap-slideshow-story').show();

          storyToggled = true;
        }
    }


    function setStoryContent(imgBlockDiv){
                var text = imgBlockDiv.data("ap-img-text");
                var size = imgBlockDiv.data("ap-img-size");
                var date = imgBlockDiv.data("ap-img-date");
                var story = imgBlockDiv.data("ap-img-story");
                var storyImg = imgBlockDiv.data("ap-img-story-src");

                if(story){
                  $('.ap-slideshow-btn-story').show();

                  var caption = "";

                  if ((typeof text !== typeof undefined && text !== false)) {
                    caption += '&nbsp;  <i class="fas fa-palette"></i> &nbsp;'  + text + '&nbsp;';
                  }
                  if ((typeof size !== typeof undefined && size !== false)){
                    caption += '&nbsp;&nbsp;  <i class="fas fa-ruler"></i> &nbsp;' + size + '&nbsp;';
                  }
                  if ((typeof date !== typeof undefined && date !== false)){
                    caption += '&nbsp;&nbsp;  <i class="far fa-calendar"></i> &nbsp;' + date + '&nbsp;';
                  }

                  var content = caption + '<hr class="ap-story-divider"/>' + story + '<br/><br/>';

                  if(storyImg){
                    content += '<img class="ap-story-img" src="'+ storyImg +'"/>' + '<br/><br/>';
                  }


                  $('.ap-slideshow-story-content').html(content);

                }
                else{
                  $('.ap-slideshow-btn-story').hide();
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
