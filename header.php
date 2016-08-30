<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<nav class="navbar navbar-inverse navbar-fixed-top2">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand" style="color: #00ff00;">
                <?php
                $qsmt_logo = get_theme_mod('qsmt_logo');
                if( isset($qsmt_logo) && $qsmt_logo != ""):


                echo '<span><img class="logo" src="'. $qsmt_logo .'"> </span>';

                endif;
                
                ?>
                <?php
                $show_title = get_theme_mod('show_title');
                if( isset($show_title) && $show_title != ""):


                    echo '<span class="site-title">'. bloginfo( 'name' ).'</span>';

                endif;

                ?>
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'nav navbar-nav navbar-right',
                    ) );
                    ?>
            <?php endif; ?>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div>
    <div class="site-inner">




        <div id="content" class="site-content">
