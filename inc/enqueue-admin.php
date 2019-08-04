<?php
    function load_custom_wp_admin_style($hook) {
            // Load only on ?page=mypluginname
            // if($hook != 'toplevel_page_mypluginname') {
            //         return;
            // }
            wp_enqueue_style( 'custom_wp_admin_css',get_template_directory_uri().'/inc/admin-style.css'  );
    }
?>
