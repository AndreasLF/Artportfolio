
(function($) {

  $(document).ready(function(){
    $('.ap-gallery-block').click(function(){

      // set slideshow image
      $('.ap-slideshow-img').attr("src", $(this).find('img').attr('src'));

      // open modal
      $('.ap-slideshow-modal').modal('show');

    });

    $('.ap-slideshow-btn-close').click(function(){
      // close modal
      $('.ap-slideshow-modal').modal('hide');
    });

  });

})( jQuery );
// (function($) {
//
//     console.log('ready');
//
//     $('.ap-gallery-block').click(function(){
//
//         $('.ap-slideshow-img').attr("src", $(this).attr('src'));
//         $('.ap-slideshow-modal').modal('show');
//     });
//
// })(jQuery);
