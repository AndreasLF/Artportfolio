


<?php get_header(); ?>



<?php
/*
* This function creates a photo gallery from an array of photo sources
*
* @param array $imageSources array of imgage source links
* @return html photo gallery
*/

function ap_create_gallery($imageSources = null){
  //if $imageSources exists
   if($imageSources){ ?>
     <!-- Creation of html-code -->
         <div class="gallery-row">
           <div class="gallery-column">
             <?php
              //loops through every fourth photo starting with number 0
               for($i=0; $i<count($imageSources); $i+=4){
                 ?>
                 <img src="<?php echo $imageSources[$i]; ?>" />1
                 <?php
               }?>
           </div>
           <div class="gallery-column">
             <?php
             //loops through every fourth photo starting with number 1
               for($i=1; $i<count($imageSources); $i+=4){
                 ?>
                 <img  src="<?php echo $imageSources[$i]; ?>" />2
                 <?php
               }
               ?>
           </div>
           <div class="gallery-column">
             <?php
             //loops through every fourth photo starting with number 2
               for($i=2; $i<count($imageSources); $i+=4){
                 ?>
                 <img  src="<?php echo $imageSources[$i]; ?>" />3
                 <?php
               }
               ?>
           </div>
           <div class="gallery-column">
             <?php
             //loops through every fourth photo starting with number 3
               for($i=3; $i<count($imageSources); $i+=4){
                 ?>
                 <img src="<?php echo $imageSources[$i]; ?>" />4
                 <?php
               }
               ?>
           </div>
         </div>
       <?php
   }
   else{
     return;
   }


} ?>

<!--Container -->
<div class="container">
  <h2><?php wp_title(''); ?></h2>
    <?php
    if(have_posts()){

        $imgSrcs = array();
                while(have_posts()){
                    the_post();
                    $imgSrc = get_post_meta( get_the_ID(), 'image' )[0];
                    array_push($imgSrcs,$imgSrc);
?>


<?php
                }

                ap_create_gallery($imgSrcs);

            } ?>

</div>
<!-- /container -->


<?php get_footer(); ?>
