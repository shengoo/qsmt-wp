<?php
/**
 * Created by PhpStorm.
 * User: UC206612
 * Date: 2016/9/1
 * Time: 15:26
 */
get_header();

while ( have_posts() ) : the_post();
    $format = get_post_format() ? : 'standard';
    echo $format;;
    echo var_dump(get_the_category());
endwhile;
?>

    <h2><?php the_title(); ?></h2>
<div><?php the_content();?></div>

<?php get_footer(); ?>