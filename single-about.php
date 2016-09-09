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
if ( is_single() ) {
    $IDOutsideLoop = $post->ID;
    $cats = wp_get_post_categories($post->ID);
    if ($cats) {
        $first_cat = $cats[0];
        $args=array(
            'cat' => $first_cat, //cat__not_in wouldn't work
//            'post__not_in' => array($post->ID),
            'showposts'=>5,
            'caller_get_posts'=>1,
            'order'=>'ASC'
        );
        $my_query = new WP_Query($args);
        if( $my_query->have_posts() ) {
            ?>

<div class="container" style="padding: 20px 0;">
    <nav class="nav leftnav col-xs-12 col-sm-2 container" style="padding-bottom: 20px;">
            <?php

            while ($my_query->have_posts()) : $my_query->the_post();
                if($post->ID == $IDOutsideLoop){
?>
                    <li class="col-xs-3 col-sm-12 text-center"><a href="<?php the_permalink() ?>" class="active"><?php the_title(); ?></a></li>
                    <?php
                }else{
                ?>

                    <li class="col-xs-3 col-sm-12 text-center"><a href="<?php the_permalink() ?>" class=""><?php the_title(); ?></a></li>
                <?php
                }
            endwhile;
        } //if ($my_query)
            ?>

    </nav>
        <?php

    } //if ($cats)
    wp_reset_query();  // Restore global post data stomped by the_post().
} //if (is_single())
?>
        <div class="col-xs-12 col-sm-10 container" style="text-indent: 20px;">
            <?php the_content();?>
        </div>
    </div>


<script>
    jQuery(function($) {
        // 你可以在这里继续使用$作为别名...
console.log($('#menu-top li').eq(1))
        $('#menu-top li').eq(1).addClass('active');
        $('#menu-nav li').eq(1).addClass('active');
    });
</script>
<?php get_footer(); ?>