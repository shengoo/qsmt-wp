<?php

get_header();
echo var_dump($wp_query);
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
$cat_id = ( get_query_var( 'cat' ) ) ? absint( get_query_var( 'cat' ) ) : 1;
$categories = get_the_category();
echo var_dump($paged);
$args = array(
    'posts_per_page' => 1,
    'category_name' => 'solution',
    'paged' => $paged,
);
//echo var_dump($args);

$the_query = new WP_Query( $args );
//$the_query = new WP_Query( 'posts_per_page=1' );
//$the_query = new WP_Query( 'posts_per_page=1&paged=' . $paged );

echo var_dump($the_query->max_num_pages);
echo var_dump($wp_query);

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php if ( $the_query->have_posts() ) : ?>

            <!-- Add the pagination functions here. -->

            <!-- Start of the main loop. -->
            <?php while ( $the_query->have_posts() ) : $the_query->the_post();  ?>

                <!-- the rest of your theme's main loop -->
                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                <?php the_content() ?>

            <?php endwhile; wp_reset_query();?>
            <!-- End of the main loop -->


            <?php the_so37580965_wp_custom_pagination( array(
//                'container' => 'nav',
//            'container_class'=>'hhhhhhhhh',
                'type'      => 'list',
                'mid_size'  => 2,
                'prev_text' => '&laquo;',
                'next_text' => '&raquo;',
                'screen_reader_text' =>  ' ',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $the_query->max_num_pages
            ) );
            $big = 999999999; // need an unlikely integer
            echo paginate_links( array(
//                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
//                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $the_query->max_num_pages
            ) );
            ?>

        <?php else : ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->


<?php get_footer(); ?>
