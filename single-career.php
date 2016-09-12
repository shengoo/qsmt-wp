<?php
/**
 * Created by PhpStorm.
 * User: UC206612
 * Date: 2016/9/12
 * Time: 17:42
 */
get_header();

require get_template_directory() . '/inc/single-leftnav.php';
?>

    <script>
        jQuery(function ($) {
            // 你可以在这里继续使用$作为别名...
            $('#menu-nav li').eq(5).addClass('active');
        });
    </script>
<?php get_footer(); ?>