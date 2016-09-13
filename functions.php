<?php
/**
 * Created by PhpStorm.
 * User: sheng
 * Date: 16/8/28
 * Time: 17:42
 */


if (!function_exists('qsmt_setup')) :

    function qsmt_setup()
    {

        /*
         * Enable support for custom logo.
         *
         */
//        add_theme_support( 'custom-logo', array(
//            'height'      => 50,
//            'width'       => 50,
//            'flex-height' => true,
//        ) );


        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1200, 9999);

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'qsmt'),
        ));

        /* Customizer additions. */
        require get_template_directory() . '/inc/customizer.php';


    }
endif; // qsmt_setup
add_action('after_setup_theme', 'qsmt_setup');


/**
 * Enqueues scripts and styles.
 *
 */
function qsmt_scripts()
{
    wp_enqueue_style('bootstrapcss', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.1.0.min.js');
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js');

    // Theme stylesheet.
    wp_enqueue_style('twentysixteen-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'qsmt_scripts');


function qsmt_the_custom_logo()
{

    if (function_exists('the_custom_logo')) {
        the_custom_logo();
    }

}

add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);
function special_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes) || in_array('current-post-ancestor', $classes)) {
        $classes[] = 'active ';
    }
    return $classes;
}

// Filter wp_nav_menu() to add additional links and other output
function addHomeMenuLink($menuItems, $args)
{
    if ('primary' == $args->theme_location) {
        if (is_front_page())
            $class = 'class="current-menu-item active"';
        else
            $class = '';
        $homeMenuItem = '<li ' . $class . '>' .
            $args->before .
            '<a href="' . home_url('/') . '" title="'.__('Home').'">' .
            $args->link_before .
            __('Home') .
            $args->link_after .
            '</a>' .
            $args->after .
            '</li>';
        $menuItems = $homeMenuItem . $menuItems;
    }
    return $menuItems;
}

add_filter('wp_nav_menu_items', 'addHomeMenuLink', 10, 2);



//add_action( 'init', 'create_post_type' );
//function create_post_type() {
//    register_post_type( 'about',
//        array(
//            'labels' => array(
//                'name' => '关于我们',
//                'singular_name' => 'about'
//            ),
//            'public' => true,
//            'has_archive' => true,
//        )
//    );
//}


//Gets post cat slug and looks for single-[cat slug].php and applies it
add_filter('single_template', create_function(
        '$the_template',
        'foreach( (array) get_the_category() as $cat ) {
		if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") )
		return TEMPLATEPATH . "/single-{$cat->slug}.php"; }
	return $the_template;' )
);


function the_so37580965_wp_custom_pagination($args = '', $class = 'pagination') {

    if ($GLOBALS['wp_query']->max_num_pages <= 1) return;

    $args = wp_parse_args( $args, array(
        'mid_size'           => 2,
        'prev_next'          => false,
        'prev_text'          => __('Older posts', 'textdomain'),
        'next_text'          => __('Newer posts', 'textdomain'),
        'screen_reader_text' => __('Posts navigation', 'textdomain'),
    ));

    $links     = paginate_links($args);
    $links = str_replace('<ul class=\'page-numbers\'>', '', $links);
    $links = str_replace('</ul>', '', $links);
    $prev_link = get_previous_posts_link($args['prev_text']);
    $next_link = get_next_posts_link($args['next_text']);
    $template  = apply_filters( 'the_so37580965_navigation_markup_template', '
<nav aria-label="Page navigation" class="text-center">
    <ul class="pagination"><li>%3$s</li>%4$s<li>%5$s</li>    </ul>
</nav>'
    , $args, $class);

    echo sprintf($template, $class, $args['screen_reader_text'], $prev_link, $links, $next_link);

}


