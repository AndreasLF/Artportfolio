(function($) {
  $(document).ready(function(){

    //Variables to store number of current image in slideshow and if story is toggled
    var currentImage = null;
    var storyToggled = true;
    /*
    * Gallery image click
    *  Used on("click") instead of click() to make sure the event works after more gallery blocks are added to the DOM
    */
    $( ".ap-grid" ).on( "click", ".ap-gallery-block", function( event ) {
        currentImage = $(this).data('ap-slide-no');

        // set slideshow image
        $('.ap-slideshow-img').attr("src", $(this).find('img').attr('src'));

        //set caption
        setCaption($('.ap-grid').find("div[data-ap-slide-no='" + currentImage + "']"));

        // Sets the story by making an ajax call to the server
        setStoryAjax();
        //Hide story if shown
        if(storyToggled == true){
          toggleStory();
        };

        // open modal
        $('.ap-slideshow-modal').modal('show');


    });

    // Close button click
    $('.ap-slideshow-btn-close').click(function(){
        // close modal
        $('.ap-slideshow-modal').modal('hide');

        //Hide story if shown
        if(storyToggled == true){
          toggleStory();
        };

    });


    // Next button click
    $('.ap-slideshow-btn-next').click(function(){
        nextSlide();
    });

    // Prev button click
    $('.ap-slideshow-btn-prev').click(function(){
        prevSlide();
    });


    // Slideshow button click: Open slideshow
    $('.ap-slideshow-btn-story').click(function(){
      toggleStory();
    });

    //Document click: Hides story window if open
    $('.ap-slideshow-story').click(function(){
        if(storyToggled){
            toggleStory();
        }
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
        // If the story is already shown
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

    // Change image with arrow buttons
    $(document).keydown(function(e) {
    switch(e.which){
        // Left key click
        case 37:
          prevSlide();
        break;

        // Right key click
        case 39:
            nextSlide();
        break;
        default: return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
});


    /*
    * swipeleft to change the image in the slideshow
    */
    $('div.modal').hammer().on("swipeleft", function(event) {
       nextSlide();
    });
    $('div.modal').hammer().on("swiperight", function(event) {
       prevSlide();
    });

    /*
    * Change to the next slide in the slideshow
    */
    function nextSlide(){
        var totalSlides = $('.ap-grid').data('ap-total-slides');
        console.log(totalSlides);

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
        if(storyToggled == true){
          toggleStory();
        };

        // Sets the story by making an ajax call to the server
        setStoryAjax();
        //Hide story if shown
        if(storyToggled == true){
          toggleStory();
        };
    }

    /*
    * Change to the previous slide in the slideshow
    */
    function prevSlide(){
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
        if(storyToggled == true){
          toggleStory();
        };

        // Sets the story by making an ajax call to the server
        setStoryAjax();
        //Hide story if shown
        if(storyToggled == true){
          toggleStory();
        };
    }

    /*
    *  Shows the image information while hovering over the image
    *  Used on("mouseover/mouseout") instead of hover() to make sure the event works after more gallery blocks are added to the DOM
    */
    $( ".ap-grid" ).on( "mouseover", ".ap-gallery-block", function( event ) {
        $(this).find(".ap-gallery-block-overlay").css("opacity", "1");
    });
    $( ".ap-grid" ).on( "mouseleave", ".ap-gallery-block", function( event ) {
        $(this).find(".ap-gallery-block-overlay").css("opacity", "0");
    });

    /*
    * Gets the image story via an AJAX call and sets the story
    */
    function setStoryAjax(){
      var imgBlockDiv = $('.ap-grid').find("div[data-ap-slide-no='" + currentImage + "']");

      var id = imgBlockDiv.data('ap-post-id');

      // Make ajax call
       $.ajax({
         url : ajaxgallerystory.ajaxurl,
         type : 'post',
         dataType: 'html',
         data : {
           action: 'ajax_gallery_story',
           post_id: id //send the post id
         },
         success : function( response ) {
           // JSON parse received string
           var obj = JSON.parse(response);

           console.log(obj.has_content);
           //If the slideshow image has "a story"/extra content
           if(obj.has_content){
             // Define variables
             var text = imgBlockDiv.data("ap-img-text");
             var size = imgBlockDiv.data("ap-img-size");
             var date = imgBlockDiv.data("ap-img-date");



             var caption = "";

             // Creates the caption depending on the information for the post
             if ((typeof text !== typeof undefined && text !== false)) {
               caption += '&nbsp;  <i class="fas fa-palette"></i> &nbsp;'  + text + '&nbsp;';
             }
             if ((typeof size !== typeof undefined && size !== false)){
               caption += '&nbsp;&nbsp;  <i class="fas fa-ruler"></i> &nbsp;' + size + '&nbsp;';
             }
             if ((typeof date !== typeof undefined && date !== false)){
               caption += '&nbsp;&nbsp;  <i class="far fa-calendar"></i> &nbsp;' + date + '&nbsp;';
             }

             // Concatenate the caption and the story text
             var content = caption + '<hr class="ap-story-divider"/>' + obj.data + '<br/><br/>';

             // Show the info button and set the content
             $('.ap-slideshow-btn-story').show();
             $('.ap-slideshow-story-content').html(content);

             // Sets the image source
             $('.ap-slideshow-img').attr('src', obj.img_src);

           }
           else{
             // Hide the story and only update image
             $('.ap-slideshow-btn-story').hide();
             $('.ap-slideshow-img').attr('src', obj.img_src);
           }
         },
         error : function(err){
           console.log('error');
           $('.ap-slideshow-btn-story').hide();
         }
       });
    }

  });

})( jQuery );
