(function($) {
  $(document).ready(function(){

    $('.ajax-pagination-btn').click(function(){
      var page = parseInt($('.ap-grid').attr('data-ap-page-count'));
      console.log(page+1);

      var lastImgNo = $(".ap-gallery-block:last").data('ap-slide-no');

      $.ajax({
      url: ajaxpagination.ajaxurl,
      type: 'post',
      data: {
        action: 'ajax_pagination',
        query_vars: ajaxpagination.query_vars,
        page: page,
        last_img_number: lastImgNo
      },
      beforeSend: function(status) {
        console.log(status);
        $('#gallery-preloader').removeClass('d-none');
        $('.ajax-pagination-btn').hide();
      },
      success: function( html ) {
        $('.ap-grid').attr('data-ap-page-count',page+1);

        var $content = $(html);
        $('.ap-grid').append( $content ).masonry( 'appended', $content );
        // $('.ap-grid').append(html);

        $('.ajax-pagination-btn').show();

        if($('#pagination-end').length){
          $('.ajax-pagination-btn').unbind('click');
            $('.ajax-pagination-btn').hide();
            $('#ap-ajax-pagination-info').append('<p>That\'s it &nbsp; <i class="far fa-grin-beam"></i></p>')
        }

        $('#gallery-preloader').addClass('d-none');
        $('.ap-grid').attr('data-ap-total-slides',$(".ap-grid").find('.ap-gallery-block:last').data('ap-slide-no')+1);

        $('.gallery-preloader').hide();
      },
      error: function(err){
        console.log(err);
        $('.ap-grid').append("<hr/><p class=''>Something went wrong &nbsp<i class='far fa-frown'></i></p>");
      }
    });


    });


  });


})(jQuery);
