<?php
/**
 * Created by PhpStorm.
 * User: UC206612
 * Date: 2016/9/1
 * Time: 15:26
 */
get_header();

//while ( have_posts() ) : the_post();
//    $format = get_post_format() ? : 'standard';
//    echo $format;;
//    echo var_dump(get_the_category());
//endwhile;
?>


<?php
$qsmt_about_image = get_theme_mod('qsmt_about_image');
if (isset($qsmt_about_image) && $qsmt_about_image != ""):

    echo '<div>
        <img src="' . $qsmt_about_image . '" style="width: 100%;height: 20vw;">
  </div>';

endif;



require get_template_directory() . '/inc/single-leftnav.php';
?>

    <script>
        jQuery(function ($) {
            // 你可以在这里继续使用$作为别名...
            $('#menu-nav li').eq(1).addClass('active');
        });
    </script>
<?php get_footer(); ?>