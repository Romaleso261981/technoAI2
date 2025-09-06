  <?php
  $title = get_sub_field('title') ?: 'Мої роботи';
  $description = get_sub_field('description') ?: 'Ознайомтеся з моїми останніми проектами та досягненнями';
  $category_filter = get_sub_field('category_filter'); // Якщо потрібно показати тільки певну категорію
  $posts_per_page = get_sub_field('posts_per_page') ?: 6;

  // Отримуємо роботи портфоліо
  $portfolio_args = array(
      'post_type' => 'portfolio',
      'posts_per_page' => $posts_per_page,
      'post_status' => 'publish',
      'orderby' => 'date',
      'order' => 'DESC'
  );

  // Якщо вказана категорія для фільтрації
  if (!empty($category_filter)) {
      $portfolio_args['tax_query'] = array(
          array(
              'taxonomy' => 'portfolio_category',
              'field' => 'slug',
              'terms' => $category_filter
          )
      );
  }

  $portfolio_works = get_posts($portfolio_args);

  // Отримуємо всі категорії для фільтрації
  $all_categories = get_terms(array(
      'taxonomy' => 'portfolio_category',
      'hide_empty' => true,
      'orderby' => 'name',
      'order' => 'ASC'
  ));
  ?>

  <section id="portfolio" class="section">
    <div class="tech-pattern"></div>
    <div class="container position-relative">
      <!-- Section Header -->
      <div class="section-header text-center">
        <h2><?php echo $title; ?></h2>
        <p class="lead text-muted">
          <?php echo $description; ?>
        </p>
      </div>

      <!-- Filter Buttons -->
      <?php if (!empty($all_categories)) : ?>
      <div class="filter-buttons text-center mb-5">
        <button class="btn btn-filter active" data-filter="all">Всі роботи</button>
        <?php foreach ($all_categories as $category) : ?>
        <button class="btn btn-filter" data-filter="<?php echo esc_attr($category->slug); ?>">
          <?php echo esc_html($category->name); ?>
        </button>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <!-- Portfolio Grid -->
      <div class="row gy-5 position-relative" id="portfolio-grid">
        <?php if ($portfolio_works) : ?>
        <?php foreach ($portfolio_works as $index => $work) : ?>
        <?php

          // Отримуємо категорії роботи
          $work_categories = get_the_terms($work->ID, 'portfolio_category');
          $category_slugs = array();
          if ($work_categories && !is_wp_error($work_categories)) {
              foreach ($work_categories as $cat) {
                  $category_slugs[] = $cat->slug;
              }
          }
          $filter_attributes = 'data-category="' . esc_attr(implode(' ', $category_slugs)) . '"';

          // Отримуємо мета-дані
          $client = get_post_meta($work->ID, '_portfolio_client', true);
          $project_url = get_post_meta($work->ID, '_portfolio_project_url', true);
          $completion_date = get_post_meta($work->ID, '_portfolio_completion_date', true);
          $project_duration = get_post_meta($work->ID, '_portfolio_duration', true);

          // Отримуємо технології
          $technologies = get_the_terms($work->ID, 'portfolio_technology');
        ?>
        <div class="col-xl-4 col-md-6 portfolio-item" <?php echo $filter_attributes; ?>>
          <div class="portfolio-card">
            <div class="portfolio-image mb-3">
              <?php if (has_post_thumbnail($work->ID)) : ?>
              <?php echo get_the_post_thumbnail($work->ID, 'medium', array('class' => 'img-fluid')); ?>
              <?php else : ?>
              <div class="placeholder-image bg-light d-flex align-items-center justify-content-center"
                style="height: 214px;">
                <img style="width: 100%; height: 100%; object-fit: cover;"
                  src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder/portfolio-placeholder.png"
                  alt="Portfolio Placeholder">
              </div>
              <?php endif; ?>
            </div>

            <h4 class="portfolio-title">
              <a href="<?php echo get_permalink($work->ID); ?>"><?php echo get_the_title($work->ID); ?></a>
            </h4>

            <p class="portfolio-excerpt">
              <?php echo wp_trim_words(get_the_excerpt($work->ID), 20); ?>
            </p>

            <?php if ($technologies && !is_wp_error($technologies)) : ?>
            <div class="portfolio-technologies mb-3">
              <?php foreach (array_slice($technologies, 0, 3) as $tech) : ?>
              <span class="badge bg-primary me-1"><?php echo esc_html($tech->name); ?></span>
              <?php endforeach; ?>
              <?php if (count($technologies) > 3) : ?>
              <span class="badge bg-secondary">+<?php echo count($technologies) - 3; ?></span>
              <?php endif; ?>
            </div>
            <?php endif; ?>

            <div class="portfolio-meta mb-3">
              <?php if ($client) : ?>
              <small class="text-muted d-block">Клієнт: <?php echo esc_html($client); ?></small>
              <?php endif; ?>
              <?php if ($completion_date) : ?>
              <small class="text-muted d-block">Завершено: <?php echo date('M Y', strtotime($completion_date)); ?></small>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
        <?php else : ?>
        <div class="col-12 text-center">
          <p class="text-muted">Роботи портфоліо ще не додані.</p>
        </div>
        <?php endif; ?>
      </div>

      <!-- No Results Message -->
      <div class="no-results text-center" style="display: none;">
        <p class="text-muted">Роботи для обраної категорії не знайдено.</p>
      </div>

      <!-- Load More Button -->
      <?php if (count($portfolio_works) >= $posts_per_page) : ?>
      <div class="text-center mt-5">
        <button class="btn btn-primary" id="load-more-portfolio" data-page="1" data-category="all">
          Завантажити ще
        </button>
      </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- JavaScript код винесено в окремий файл: assets/javascripts/portfolio.js -->
