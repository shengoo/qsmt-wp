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
                <span class="site-title"><?php bloginfo( 'name' ); ?></span>
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
<?php echo get_bloginfo( 'description', 'display' ); ?>
<div>
    <div class="site-inner">
        <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>

        <header id="masthead" class="site-header" role="banner">
            <div class="site-header-main">
                <div class="site-branding">
                    <?php qsmt_the_custom_logo(); ?>

                    <?php if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php endif;

                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo $description; ?></p>
                    <?php endif; ?>
                </div><!-- .site-branding -->

                <?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
                    <button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'twentysixteen' ); ?></button>

                    <div id="site-header-menu" class="site-header-menu">
                        <?php if ( has_nav_menu( 'primary' ) ) : ?>
                            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'primary-menu',
                                ) );
                                ?>
                            </nav><!-- .main-navigation -->
                        <?php endif; ?>

                        <?php if ( has_nav_menu( 'social' ) ) : ?>
                            <nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentysixteen' ); ?>">
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'social',
                                    'menu_class'     => 'social-links-menu',
                                    'depth'          => 1,
                                    'link_before'    => '<span class="screen-reader-text">',
                                    'link_after'     => '</span>',
                                ) );
                                ?>
                            </nav><!-- .social-navigation -->
                        <?php endif; ?>
                    </div><!-- .site-header-menu -->
                <?php endif; ?>
            </div><!-- .site-header-main -->

            <?php if ( get_header_image() ) : ?>
                <?php
                /**
                 * Filter the default twentysixteen custom header sizes attribute.
                 *
                 * @since Twenty Sixteen 1.0
                 *
                 * @param string $custom_header_sizes sizes attribute
                 * for Custom Header. Default '(max-width: 709px) 85vw,
                 * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
                 */
                $custom_header_sizes = apply_filters( 'twentysixteen_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
                ?>
                <div class="header-image">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                    </a>
                </div><!-- .header-image -->
            <?php endif; // End header image check. ?>
        </header><!-- .site-header -->

        <div id="content" class="site-content">
