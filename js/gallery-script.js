(function($) {
  $(document).ready(function(){

    /*
    *  Masonry setup
    */
    $('.ap-grid').imagesLoaded(function(){
      $('.ap-grid').masonry({
        itemSelector : '.ap-gallery-block',
        gutter: 5
      });
    });


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

        // Sets the story
        setStory();
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


    $('.ap-slideshow-btn-full').click(function(){


window.open(
  $('.ap-grid').find("div[data-ap-slide-no='" + currentImage + "']").data('ap-img-src'),
  '_blank' // <- This is what makes it open in a new window.
);

    });


    // Slideshow button click: Open slideshow
    // $('.ap-slideshow-btn-story').click(function(){
    //   toggleStory();
    // });

    // Document click: Hides story window if open
    // $('.modal').click(function(){
    //     // if(storyToggled){
    //     //     toggleStory();
    //     // }
    // });

    //Toggle story
    $('.modal').click(function(e){
        if(!$('.ap-slideshow-btn-story').is(e.target) && $('.ap-slideshow-btn-story').has(e.target).length === 0){
          if(storyToggled){
              toggleStory();
          }
        }
        else{
          toggleStory();
        }
    });




    /*
    * This function updates the caption in the image slideshow
    *
    * @param imgBlockDiv is the div element containing the current image in the gallery
    */
    function setCaption(imgBlockDiv){
      var $caption = getCaption(imgBlockDiv);

      if ($($caption).is(':empty') ) {
        $('.ap-slideshow-caption').hide();
      }
      else{
        $('.ap-slideshow-caption').show();
        $('.ap-slideshow-caption').empty();
        $('.ap-slideshow-caption').append($caption);
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
        var totalSlides = $('.ap-grid').attr('data-ap-total-slides');

        if(currentImage == totalSlides - 1){
          currentImage = 0;
          updateSlideshowImage(currentImage);

        }
        else{
          currentImage = currentImage + 1;
          updateSlideshowImage(currentImage);

        }

    }

    /*
    * Change to the previous slide in the slideshow
    */
    function prevSlide(){
        var totalSlides = $('.ap-grid').attr('data-ap-total-slides');

        if(currentImage == 0){
          currentImage = totalSlides - 1;
        }else{
          currentImage = currentImage - 1;
        }

        updateSlideshowImage(currentImage);

    }

    /*
    * Updates the slideshow images
    * @param imageNumber number of image in slideshow to show
    */
    function updateSlideshowImage(imageNumber = 0, newPageExists = false){

      if(newPageExists){

      }
      else{
        //Change image source
        $('.ap-slideshow-img').attr('src', $('.ap-grid').find("div[data-ap-slide-no='" + imageNumber + "']").find('img').attr('src'));

        //set caption
        setCaption($('.ap-grid').find("div[data-ap-slide-no='" + imageNumber + "']"));


        //Hide story if shown
        if(storyToggled == true){
          toggleStory();
        };

        // Sets the story
        setStory();
        //Hide story if shown
        if(storyToggled == true){
          toggleStory();
        };
      }

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
    * Sets the image story
    */
    function setStory(){
      var imgBlockDiv = $('.ap-grid').find("div[data-ap-slide-no='" + currentImage + "']");

      var id = imgBlockDiv.data('ap-post-id');

      if(imgBlockDiv.data('ap-img-excerpt') !== '' && imgBlockDiv.data('ap-img-excerpt') !== null && imgBlockDiv.data('ap-img-excerpt') !== undefined){

        var $caption = getCaption(imgBlockDiv);
        var $content = $('<div>',{'class': 'ap-story-content-container'});
        $content.append(imgBlockDiv.data('ap-img-excerpt'));

        var $postUrl = $('<a>',{'class': 'ap-story-post-url', 'href': imgBlockDiv.data('ap-img-posturl'), 'target': '_blank'});
        $postUrl.append('<i class="fas fa-external-link-alt"></i> Læs mere');

        var $hr = $('<hr>', {'class': 'ap-story-divider'});


        // Show the info button and set the content
        $('.ap-slideshow-btn-story').show();
        $('.ap-slideshow-story-content').empty();
        $('.ap-slideshow-story-content').append($caption,$hr,$content,$postUrl);

      }
      else{
        // Hide the story and only update image
        $('.ap-slideshow-btn-story').hide();
      }


    }


    /*
    * Creates and returns a div containing the image information: Title, size, date
    *
    * @param imgBlockDiv div containing the data tags
    * @return div containing caption information
    */
    function getCaption(imgBlockDiv){
      // Define variables
      var text = imgBlockDiv.data("ap-img-text");
      var size = imgBlockDiv.data("ap-img-size");
      var date = imgBlockDiv.data("ap-img-date");

      var $caption = $('<div>',{'class': 'ap-caption-container'});

      var $space = '&nbsp;';
      // Creates the caption depending on the information for the post
      if ((typeof text !== typeof undefined && text !== false)) {
        var $i = $('<i>', {'class': 'fas fa-palette'});

        $caption.append($space,$i,$space,text);
        // $caption += '&nbsp;  <i class="fas fa-palette"></i> &nbsp;'  + text + '&nbsp;';
      }
      if ((typeof size !== typeof undefined && size !== false)){
        var $i = $('<i>', {'class': 'fas fa-ruler'});

        $caption.append($space,$space,$i,$space,size);
      }
      if ((typeof date !== typeof undefined && date !== false)){
        var $i = $('<i>', {'class': 'fas fa-calendar'});

        $caption.append($space,$space,$i,$space,date);
      }

      return $caption;
    }

  });

})( jQuery );
