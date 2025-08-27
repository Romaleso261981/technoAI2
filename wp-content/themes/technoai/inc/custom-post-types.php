<?php
/**
 * Custom Post Types and Taxonomies
 */

// Реєстрація кастомного типу запису "Мої роботи"
function technoai_register_portfolio_post_type() {
    $labels = array(
        'name'                  => 'Мої роботи',
        'singular_name'         => 'Робота',
        'menu_name'             => 'Мої роботи',
        'add_new'               => 'Додати нову',
        'add_new_item'          => 'Додати нову роботу',
        'edit_item'             => 'Редагувати роботу',
        'new_item'              => 'Нова робота',
        'view_item'             => 'Переглянути роботу',
        'search_items'          => 'Шукати роботи',
        'not_found'             => 'Роботи не знайдено',
        'not_found_in_trash'    => 'В кошику роботи не знайдено',
        'parent_item_colon'     => '',
        'all_items'             => 'Всі роботи',
        'archives'              => 'Архів робіт',
        'insert_into_item'      => 'Вставити в роботу',
        'uploaded_to_this_item' => 'Завантажено для цієї роботи',
        'featured_image'        => 'Зображення роботи',
        'set_featured_image'    => 'Встановити зображення роботи',
        'remove_featured_image' => 'Видалити зображення роботи',
        'use_featured_image'    => 'Використовувати як зображення роботи',
        'filter_items_list'     => 'Фільтрувати список робіт',
        'items_list_navigation' => 'Навігація по списку робіт',
        'items_list'            => 'Список робіт',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-portfolio',
        'hierarchical'        => false,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'portfolio'),
        'capability_type'     => 'post',
        'show_in_rest'        => true, // Підтримка Gutenberg
    );

    register_post_type('portfolio', $args);
}
add_action('init', 'technoai_register_portfolio_post_type');

// Реєстрація таксономії "Категорії робіт"
function technoai_register_portfolio_taxonomy() {
    $labels = array(
        'name'              => 'Категорії робіт',
        'singular_name'     => 'Категорія роботи',
        'search_items'      => 'Шукати категорії',
        'all_items'         => 'Всі категорії',
        'parent_item'       => 'Батьківська категорія',
        'parent_item_colon' => 'Батьківська категорія:',
        'edit_item'         => 'Редагувати категорію',
        'update_item'       => 'Оновити категорію',
        'add_new_item'      => 'Додати нову категорію',
        'new_item_name'     => 'Назва нової категорії',
        'menu_name'         => 'Категорії',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'portfolio-category'),
        'show_in_rest'      => true,
    );

    register_taxonomy('portfolio_category', array('portfolio'), $args);
}
add_action('init', 'technoai_register_portfolio_taxonomy');

// Реєстрація таксономії "Технології" (теги)
function technoai_register_portfolio_technologies() {
    $labels = array(
        'name'              => 'Технології',
        'singular_name'     => 'Технологія',
        'search_items'      => 'Шукати технології',
        'all_items'         => 'Всі технології',
        'edit_item'         => 'Редагувати технологію',
        'update_item'       => 'Оновити технологію',
        'add_new_item'      => 'Додати нову технологію',
        'new_item_name'     => 'Назва нової технології',
        'menu_name'         => 'Технології',
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'portfolio-technology'),
        'show_in_rest'      => true,
    );

    register_taxonomy('portfolio_technology', array('portfolio'), $args);
}
add_action('init', 'technoai_register_portfolio_technologies');

// Додавання кастомних полів для портфоліо
function technoai_add_portfolio_meta_boxes() {
    add_meta_box(
        'portfolio_details',
        'Деталі роботи',
        'technoai_portfolio_details_callback',
        'portfolio',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'technoai_add_portfolio_meta_boxes');

// Callback функція для мета-боксу
function technoai_portfolio_details_callback($post) {
    wp_nonce_field('technoai_save_portfolio_meta', 'technoai_portfolio_nonce');

    $client = get_post_meta($post->ID, '_portfolio_client', true);
    $project_url = get_post_meta($post->ID, '_portfolio_project_url', true);
    $completion_date = get_post_meta($post->ID, '_portfolio_completion_date', true);
    $project_duration = get_post_meta($post->ID, '_portfolio_duration', true);

    ?>
<table class="form-table">
  <tr>
    <th><label for="portfolio_client">Клієнт:</label></th>
    <td><input type="text" id="portfolio_client" name="portfolio_client" value="<?php echo esc_attr($client); ?>"
        class="regular-text" /></td>
  </tr>
  <tr>
    <th><label for="portfolio_project_url">URL проекту:</label></th>
    <td><input type="url" id="portfolio_project_url" name="portfolio_project_url"
        value="<?php echo esc_url($project_url); ?>" class="regular-text" /></td>
  </tr>
  <tr>
    <th><label for="portfolio_completion_date">Дата завершення:</label></th>
    <td><input type="date" id="portfolio_completion_date" name="portfolio_completion_date"
        value="<?php echo esc_attr($completion_date); ?>" /></td>
  </tr>
  <tr>
    <th><label for="portfolio_duration">Тривалість проекту:</label></th>
    <td><input type="text" id="portfolio_duration" name="portfolio_duration"
        value="<?php echo esc_attr($project_duration); ?>" placeholder="наприклад: 2 місяці" class="regular-text" />
    </td>
  </tr>
</table>
<?php
}

// Збереження мета-даних
function technoai_save_portfolio_meta($post_id) {
    if (!isset($_POST['technoai_portfolio_nonce']) || !wp_verify_nonce($_POST['technoai_portfolio_nonce'], 'technoai_save_portfolio_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = array('client', 'project_url', 'completion_date', 'duration');

    foreach ($fields as $field) {
        if (isset($_POST['portfolio_' . $field])) {
            $value = sanitize_text_field($_POST['portfolio_' . $field]);
            update_post_meta($post_id, '_portfolio_' . $field, $value);
        }
    }
}
add_action('save_post', 'technoai_save_portfolio_meta');

// Функція для отримання робіт портфоліо
function technoai_get_portfolio_works($category = '', $limit = -1) {
    $args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    );

    if (!empty($category)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'portfolio_category',
                'field' => 'slug',
                'terms' => $category
            )
        );
    }

    return get_posts($args);
}

// Функція для отримання всіх категорій портфоліо
function technoai_get_portfolio_categories() {
    return get_terms(array(
        'taxonomy' => 'portfolio_category',
        'hide_empty' => true,
        'orderby' => 'name',
        'order' => 'ASC'
    ));
}
?>
