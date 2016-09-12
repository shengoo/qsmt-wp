<?php
if (is_single()) {
$IDOutsideLoop = $post->ID;
$cats = wp_get_post_categories($post->ID);
if ($cats) {
$first_cat = $cats[0];
$args = array(
    'cat' => $first_cat, //cat__not_in wouldn't work
//            'post__not_in' => array($post->ID),
    'showposts' => 5,
    'caller_get_posts' => 1,
    'order' => 'ASC'
);
$my_query = new WP_Query($args);
if ($my_query->have_posts()) {
?>

<div class="container" style="padding: 20px 0;">
    <nav class="nav leftnav col-xs-12 col-sm-2 container" style="padding-bottom: 20px;">
        <?php

        while ($my_query->have_posts()) : $my_query->the_post();
            if ($post->ID == $IDOutsideLoop) {
                ?>
                <li class="col-xs-3 col-sm-12 text-center"><a href="<?php the_permalink() ?>"
                                                              class="active"><?php the_title(); ?></a></li>
                <?php
            } else {
                ?>

                <li class="col-xs-3 col-sm-12 text-center"><a href="<?php the_permalink() ?>"
                                                              class=""><?php the_title(); ?></a></li>
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
        <?php the_content(); ?>
    </div>
</div>
