<?php

function lidia_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('menus');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('responsive-embeds');
    add_image_size('thumbnail_550x510', 550, 510, true);
    add_image_size('thumbnail_680x600', 680, 600, true);

    // Register navigation menus
    register_nav_menus(array(
        'header' => __('Header Menu', 'technoai'),
        'footer' => __('Footer Menu', 'technoai'),
    ));
}

add_action('after_setup_theme', 'lidia_theme_setup');


function technoai_scripts()
{
    wp_enqueue_style('theme-style', get_stylesheet_uri());

    // Google Fonts
    wp_enqueue_style('google-fonts-open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');
    wp_enqueue_style('google-fonts-oswald', 'https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap');
    wp_enqueue_style('google-fonts-poppins', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap');

    // Vendor CSS Files
    wp_enqueue_style('technoai-aos', get_template_directory_uri() . '/assets/vendor/aos/aos.css');
    wp_enqueue_style('technoai-font-awesome', get_template_directory_uri() . '/assets/stylesheets/font-awesome.min.css');
    wp_enqueue_style('technoai-swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css');
    wp_enqueue_style('technoai-glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css');
    wp_enqueue_style('technoai-bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('technoai-bootstrap-icons', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css');

    // Main CSS File
    wp_enqueue_style('technoai-main-styles', get_template_directory_uri() . '/assets/stylesheets/styles.css');

    // Portfolio CSS File
    wp_enqueue_style('technoai-portfolio-styles', get_template_directory_uri() . '/assets/stylesheets/portfolio.css');

    // JavaScript Files
    wp_enqueue_script('technoai-jquery', get_template_directory_uri() . '/assets/javascripts/jquery.min.js', array(), '3.7.1', true);
    wp_enqueue_script('technoai-bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array('technoai-jquery'), '5.3.0', true);
    wp_enqueue_script('technoai-aos', get_template_directory_uri() . '/assets/vendor/aos/aos.js', array(), '2.3.4', true);
    wp_enqueue_script('technoai-swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array(), '10.0.0', true);
    wp_enqueue_script('technoai-glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array(), '3.2.0', true);
    wp_enqueue_script('technoai-plugins', get_template_directory_uri() . '/assets/javascripts/plugins.js', array('technoai-jquery'), '1.0.0', true);
    wp_enqueue_script('technoai-purecounter', get_template_directory_uri() . '/assets/javascripts/purecounter_vanilla.js', array(), '1.2.0', true);
    wp_enqueue_script('technoai-particles', get_template_directory_uri() . '/assets/javascripts/particles.min.js', array(), '2.0.0', true);
    wp_enqueue_script('technoai-script', get_template_directory_uri() . '/assets/javascripts/script.js', array('technoai-jquery'), '1.0.0', true);

    // Portfolio JavaScript File
    wp_enqueue_script('technoai-portfolio', get_template_directory_uri() . '/assets/javascripts/portfolio.js', array('technoai-jquery'), '1.0.0', true);

    // Main JavaScript File (якщо є)
    if (file_exists(get_template_directory() . '/assets/javascripts/main.js')) {
        wp_enqueue_script('technoai-main', get_template_directory_uri() . '/assets/javascripts/main.js', array('technoai-jquery'), '1.0.0', true);
    }

    // Preconnect for Google Fonts
    add_action('wp_head', function() {
        echo '<link rel="preconnect" href="https://fonts.googleapis.com" />';
        echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />';
    });
}

add_action('wp_enqueue_scripts', 'technoai_scripts');



// Add favicon support
function technoai_favicon() {
    $favicon = get_template_directory_uri() . '/assets/images/favicon.png';
    $apple_touch = get_template_directory_uri() . '/assets/images/apple-touch-icon.png';

    echo '<link rel="icon" type="image/png" href="' . $favicon . '" />';
    echo '<link rel="apple-touch-icon" href="' . $apple_touch . '" />';
}

add_action('wp_head', 'technoai_favicon');

// Підключення кастомних типів записів та таксономій
require get_template_directory() . '/inc/custom-post-types.php';

// Підключення portfolio AJAX функціональності
require get_template_directory() . '/inc/portfolio-ajax.php';