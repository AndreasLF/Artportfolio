(function($) {
  $(document).ready(function(){

    $('.ajax-pagination-btn').click(function(){
      var totalSlides = parseInt($('.ap-grid').attr('data-ap-total-slides'));
          ajaxPagination(totalSlides);



    });
});



})(jQuery);


/*
* Loads new images via ajax if there are more images
* @param totalSLides integer representing number of slides on page
*/
function ajaxPagination(totalSlides = 0){
    var page = parseInt(jQuery('.ap-grid').attr('data-ap-page-count'));

    var lastImgNo = jQuery(".ap-gallery-block:last").data('ap-slide-no');

    jQuery.ajax({
    url: ajaxpagination.ajaxurl,
    type: 'post',
    data: {
      action: 'ajax_pagination',
      page: page,
      last_img_number: lastImgNo
    },
    beforeSend: function(status) {
        // Show preloader
        jQuery('#gallery-preloader').removeClass('d-none');

        // Hide button
        jQuery('.ajax-pagination-btn').hide();
    },
    success: function( html ) {
        // JSON parse received data
        var data = JSON.parse(html);

        // Set the page count
        jQuery('.ap-grid').attr('data-ap-page-count',page+1);

        // If the received json contains posts
        if(data['has_posts']){
          hasSlides = true;

          // Loops through each post
          data['posts'].forEach(function(element, index){
                // Overlay div for image information
                var $overlay = jQuery('<div/>', {'class': 'ap-gallery-block-overlay unselectable'});
                // <br/> (line break) is defined
                var $br = '<br/>';
                // Space is defined
                var $space = '&nbsp;';

                // The gallery block is created
                var $galleryBlock = jQuery('<div/>',{
                  'class': 'ap-gallery-block',
                  'data-ap-slide-no': totalSlides + index,
                  'data-ap-post-id': element['post-id'],
                });
                // If the element contains text
                if(element['text'] !== '' && element['text'] !== undefined && element['text'] !== null){
                  // The text data attribute is added to the gallery block div
                  $galleryBlock.attr('data-ap-img-text',element['text']);

                  // Palette icon is defined
                  var $i = jQuery('<i/>', {'class': 'fas fa-palette'});
                  // Elements are added to the overlay
                  $overlay.append($i,$space,element['text'],$br);
                }
                if(element['size'] !== '' && element['size'] !== undefined && element['size'] !== null){
                  // The size data attribute is added to the gallery block div
                  $galleryBlock.attr('data-ap-img-size',element['size']);

                  // Ruler icon is defined
                  var $i = jQuery('<i/>', {'class': 'fas fa-ruler'});
                  // Elements are added to the overlay
                  $overlay.append($i,$space,element['size'],$br);
                }
                if(element['date'] !== '' && element['date'] !== undefined && element['date'] !== null){
                  // The date data attribute is added to the gallery block div
                  $galleryBlock.attr('data-ap-img-date',element['date']);

                  // Calendar icon is defined
                  var $i = jQuery('<i/>', {'class': 'fas fa-calendar'});
                  // Elements are added to the overlay
                  $overlay.append($i,$space,element['date'],$br);
                }

                // Image element is created
                var $img = jQuery('<img/>',{'src': element['src']});

                // Image and overlay are added to the gallery block
                $galleryBlock.append($img,$overlay)

                // The gallery block is appended to the gallery grid and also added to masonry
                jQuery('.ap-grid').append( $galleryBlock ).masonry( 'appended', $galleryBlock );
            });

          // Show button
          jQuery('.ajax-pagination-btn').show();

          // Update total slides data attribute
          jQuery('.ap-grid').attr('data-ap-total-slides',totalSlides+data['posts'].length);


        }
        else{
          // Unbind click event
          jQuery('.ajax-pagination-btn').unbind('click');
          // Hide button
          jQuery('.ajax-pagination-btn').hide();
          // Hide preloader
          jQuery('#gallery-preloader').addClass('d-none');


          if(!(jQuery('#end-of-posts').length)){
            //Create message
            var $p = jQuery('<p/>', {id: "end-of-posts"});
            var $i = jQuery('<i/>',{'class': 'far fa-grin-beam'})
            var msg = data['msg'];
            $p.append(msg,'&nbsp;',$i)

            // Append message
            jQuery('#ap-ajax-pagination-info').append($p);

          }

        }

        //Hide preloader
        jQuery('#gallery-preloader').addClass('d-none');

    },
    error: function(){
        jQuery('.ap-grid').append("<hr/><p class=''>Something went wrong &nbsp<i class='far fa-frown'></i></p>");
    }
  });

}
