<?php get_header(); ?>

<!--Container -->
<div class="container">
    <?php
    if(have_posts()){

        while(have_posts()){
            the_post();
            ?>
            <h2>
                <?php
                // post title
                the_title();
                ?>
            </h2>

            <br />

            <?php
            // post content
            the_content();
        }
      } ?>
    </div>
    <!-- /Container -->



<?php get_footer(); ?>
