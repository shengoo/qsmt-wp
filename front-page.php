<?php
/**
 * Created by PhpStorm.
 * User: UC206612
 * Date: 2016/8/30
 * Time: 13:21
 */

get_header();


;?>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php

        $c = 0;
        $class = 'item';
        query_posts('category_name=slide');
        while (have_posts()): the_post();
            $c++;
            if ( $c == 1 ) $class = 'item active';
            else $class = 'item';
            $feat_image = wp_get_attachment_url( get_post_thumbnail_id() );
            ?>
            <div class="<?php echo $class; ?>" style="width: 100%;height: 0; padding-bottom: 30%; background-image: url('<?php echo $feat_image; ?>');background-size: 100% 100%;">
            </div>
        <?php the_excerpt();
        endwhile;
        wp_reset_query();
        ?>

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<?php
query_posts('category_name=uncategorized');
while (have_posts()): the_post(); ?>
    <h3><a href="<?php the_permalink(); ?>" title="Read full post"><?php the_title(); ?></a></h3>
    <?php the_excerpt();
endwhile;

get_footer(); ?>