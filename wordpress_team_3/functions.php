<?php

/**
 *khai báo chức năng 
 *thư mục này được tải lại khi reset trang 
 *
 *
 * khai báo hằng giá trị
 * Theme_URL = lấy đường dẫn thư mục theme
 * CORE = lấy đường dẫn của thư mục /core
 */
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . "/core");

// nhung file /core/init.php

require_once(CORE . "/init.php");


// thiết lập chiều rộng nội dung

if (!isset($content_width)) {
    $content_width = 620;
}

// khai báo chức năng của themes

if (!function_exists('wordpress_team_3')) {
    function wordpress_team_3()
    {
        // thiết lập textdomain

        $language_folders = THEME_URL . "/languages";
        load_theme_textdomain("wordpress_team_3", $language_folders);


        // tự dộng thêm link RSS lên <head>

        add_theme_support('automatic-feed-links');

        add_theme_support('post-thumbnails');

        add_theme_support('post-formats', array(
            'image',
            'video',
            'gallery',
            'quote',
            'link'
        ));

        // Them Format

        add_theme_support('title-tag');


        // custom background

        $default_background = array(
            'default-color' => '#e8e8e8'
        );
        add_theme_support('custom-background', $default_background);

        // Them menu

        register_nav_menu('primary-menu', __('Primary Menu', 'wordpress_team_3'));

        // tạo sidebar

        $sidebar = array(
            'name' => __('Main Sidebar', 'wordpress_team_3'),
            'id' => 'main-sidebar',
            'description' => __('Default sidebar'),
            'class' => 'main-sidebar',
            'before_title' => '<h3> class="widgettitle">',
            'after_title' => '</h3>',

        );

        register_sidebar($sidebar);
    }

    // cái hook
    add_action('init', 'wordpress_team_3');
}

// TEMPLANE FUNCTIONS

if (!function_exists('wp_team_3_header')) {
    function wp_team_3_header()
    { ?>
        <div class="site-name">
            <?php
            if (is_home()) {
                printf(
                    '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
                    get_bloginfo('url'),
                    get_bloginfo('description'),
                    get_bloginfo('sitename')
                );
            } else {
                printf(
                    '<p><a href="%1$s" title="%2$s">%3$s</a></p>',
                    get_bloginfo('url'),
                    get_bloginfo('description'),
                    get_bloginfo('sitename')
                );
            }
            ?>
        </div>
        <div class="site-description"><?php bloginfo('description'); ?></div>
    <?php
    }
}

// thiết lập menu 

if (!function_exists('wp_team_3_menu')) {
    function wp_team_3_menu($menu)
    {
        $menu = array(
            'theme_location' => $menu,
            'container' => 'nav',
            'container_class' => $menu

        );
        wp_nav_menu($menu);
    }
}


// tạo phân trang
if (!function_exists('wp_team_3_pagination')) {

    function wp_team_3_pagination()
    {
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return '';
        } ?>
        <nav class="pagination" role="navigation">
            <?php if (get_next_posts_link()) : ?>

                <div class="prev"><?php next_posts_link(__('Older Posts', 'wordpress_team_3')); ?></div>
            <?php endif; ?>
            <?php if (get_previous_posts_link()) : ?>
                <div class="next"><?php get_previous_posts_link(__('Newest Posts', 'wordpress_team_3')); ?></div>
            <?php endif; ?>
        </nav>
        <?php }
}

//  hàm hiển thị thumnail

if (!function_exists('wp_team_3_thumbnail')) {
    function wp_team_3_thumbnail($size)
    {
        if (!is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image')) : ?>
            <figure class="post-thumbnail"><?php the_post_thumbnail($size); ?></figure>
        <?php endif; ?>
<?php }
}


if(!function_exists('have_posts()')){
    global $wp_query;
    return $wp_query->have_posts();
}

// the query

if(!function_exists('wp_query')){

    $the_query = new WP_Query( $args );
     
    // The Loop
    if ( $the_query->have_posts() ) {
        echo '<ul>';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            echo '<li>' . get_the_title() . '</li>';
        }
        echo '</ul>';
    } else {
        // no posts found
    }
    /* Restore original Post Data */
    wp_reset_postdata();
}
