<?php get_header(); ?>

<!--Container -->
<div class="container">
    <?php
    
    if(have_posts()){
        while(have_posts()){
            the_post();
            ?>
            <h2> <?php the_title(); ?></h2>
            <br />
            <?php
            the_content();
        }
      } ?>
    </div><!-- /container -->



<?php get_footer(); ?>
