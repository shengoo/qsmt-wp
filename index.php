<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php if ( have_posts() ) : ?>

            <!-- Add the pagination functions here. -->

            <!-- Start of the main loop. -->
            <?php while ( have_posts() ) : the_post();  ?>

                <!-- the rest of your theme's main loop -->
                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                <?php the_content() ?>

            <?php endwhile; ?>
            <!-- End of the main loop -->

            <!-- Add the pagination functions here. -->

            <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
            <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>

            <?php the_so37580965_wp_custom_pagination( array(
//                'container' => 'nav',
//            'container_class'=>'hhhhhhhhh',
                'type'      => 'list',
                'mid_size'  => 2,
                'prev_text' => '&laquo;',
                'next_text' => '&raquo;',
                'screen_reader_text' =>  ' '
            ) ); ?>

        <?php else : ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->


<?php get_footer(); ?>
