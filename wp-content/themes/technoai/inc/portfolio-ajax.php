<?php
/**
 * Portfolio AJAX functionality
 */

// AJAX handler для portfolio works
function get_portfolio_works_ajax() {
    // Перевіряємо nonce для безпеки
    if (!wp_verify_nonce($_GET['nonce'], 'portfolio_nonce')) {
        wp_die('Security check failed');
    }

    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';
    $posts_per_page = 6; // Кількість робіт на сторінку

    $args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => $posts_per_page,
        'paged' => $page,
        'post_status' => 'publish'
    );

    // Додаємо фільтр по категорії, якщо вказана
    if (!empty($category) && $category !== 'all') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'portfolio_category',
                'field' => 'slug',
                'terms' => $category
            )
        );
    }

    $portfolio_query = new WP_Query($args);
    $portfolio_works = array();

    if ($portfolio_query->have_posts()) {
        while ($portfolio_query->have_posts()) {
            $portfolio_query->the_post();

            $work = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'excerpt' => get_the_excerpt(),
                'permalink' => get_permalink(),
                'thumbnail' => get_the_post_thumbnail_url(get_the_ID(), 'thumbnail_550x510'),
                'categories' => wp_get_post_terms(get_the_ID(), 'portfolio_category', array('fields' => 'names'))
            );

            $portfolio_works[] = $work;
        }
        wp_reset_postdata();
    }

    // Повертаємо JSON відповідь
    wp_send_json_success(array(
        'works' => $portfolio_works,
        'has_more' => $portfolio_query->max_num_pages > $page,
        'current_page' => $page,
        'max_pages' => $portfolio_query->max_num_pages
    ));
}

// Реєструємо AJAX actions
add_action('wp_ajax_get_portfolio_works', 'get_portfolio_works_ajax');
add_action('wp_ajax_nopriv_get_portfolio_works', 'get_portfolio_works_ajax');

// Локалізація для JavaScript
function portfolio_ajax_localize_script() {
    wp_localize_script('technoai-portfolio', 'portfolio_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('portfolio_nonce')
    ));
}

add_action('wp_enqueue_scripts', 'portfolio_ajax_localize_script');