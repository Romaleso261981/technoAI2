<?php get_header(); ?>

<main id="main" class="main">
  <?php
    $term = get_queried_object();
    $term_title = $term->name;
    $term_description = $term->description;
    ?>

  <!-- Category Header -->
  <section class="category-header bg-primary text-white py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
              <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Головна</a></li>
              <li class="breadcrumb-item"><a href="<?php echo get_post_type_archive_link('portfolio'); ?>">Портфоліо</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $term_title; ?></li>
            </ol>
          </nav>

          <h1 class="display-4 fw-bold mt-3"><?php echo $term_title; ?></h1>

          <?php if ($term_description) : ?>
          <p class="lead mt-3"><?php echo $term_description; ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Grid -->
  <section class="portfolio-grid py-5">
    <div class="container">
      <!-- Filter Buttons -->
      <?php
            $all_categories = get_terms(array(
                'taxonomy' => 'portfolio_category',
                'hide_empty' => true,
                'orderby' => 'name',
                'order' => 'ASC'
            ));
            ?>

      <?php if (!empty($all_categories)) : ?>
      <div class="filter-buttons text-center mb-5">
        <a href="<?php echo get_post_type_archive_link('portfolio'); ?>"
          class="btn btn-filter <?php echo !is_tax() ? 'active' : ''; ?>">
          Всі роботи
        </a>
        <?php foreach ($all_categories as $category) : ?>
        <a href="<?php echo get_term_link($category); ?>"
          class="btn btn-filter <?php echo is_tax('portfolio_category', $category->term_id) ? 'active' : ''; ?>">
          <?php echo esc_html($category->name); ?>
        </a>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <!-- Portfolio Items -->
      <div class="row gy-5" id="portfolio-grid">
        <?php if (have_posts()) : ?>
        <?php $index = 0; ?>
        <?php while (have_posts()) : the_post(); ?>
        <?php
                    // Визначаємо клас картки для асиметричного ефекту
                    $card_class = 'portfolio-card';
                    if ($index % 3 == 0) {
                        $card_class .= ' card-rotated';
                    } elseif ($index % 3 == 1) {
                        $card_class .= ' card-rotated-2';
                    }

                    // Отримуємо категорії роботи
                    $work_categories = get_the_terms(get_the_ID(), 'portfolio_category');
                    $category_slugs = array();
                    if ($work_categories && !is_wp_error($work_categories)) {
                        foreach ($work_categories as $cat) {
                            $category_slugs[] = $cat->slug;
                        }
                    }
                    $filter_attributes = 'data-category="' . esc_attr(implode(' ', $category_slugs)) . '"';

                    // Отримуємо мета-дані
                    $client = get_post_meta(get_the_ID(), '_portfolio_client', true);
                    $project_url = get_post_meta(get_the_ID(), '_portfolio_project_url', true);
                    $completion_date = get_post_meta(get_the_ID(), '_portfolio_completion_date', true);
                    $project_duration = get_post_meta(get_the_ID(), '_portfolio_duration', true);

                    // Отримуємо технології
                    $technologies = get_the_terms(get_the_ID(), 'portfolio_technology');
                ?>
        <div class="col-xl-4 col-md-6 portfolio-item" <?php echo $filter_attributes; ?>>
          <div class="<?php echo $card_class; ?>">
            <div class="portfolio-image mb-3">
              <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?>
              <?php else : ?>
              <div class="placeholder-image bg-light d-flex align-items-center justify-content-center"
                style="height: 200px;">
                <i class="fas fa-image fa-3x text-muted"></i>
              </div>
              <?php endif; ?>
            </div>

            <h4 class="portfolio-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>

            <p class="portfolio-excerpt">
              <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
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
              <small class="text-muted d-block">Завершено:
                <?php echo date('M Y', strtotime($completion_date)); ?></small>
              <?php endif; ?>
            </div>

            <div class="portfolio-actions">
              <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">Деталі</a>
              <?php if ($project_url) : ?>
              <a href="<?php echo esc_url($project_url); ?>" class="btn btn-outline-primary btn-sm" target="_blank"
                rel="noopener">Переглянути</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php $index++; ?>
        <?php endwhile; ?>
        <?php else : ?>
        <div class="col-12 text-center">
          <p class="text-muted">Роботи в цій категорії ще не додані.</p>
        </div>
        <?php endif; ?>
      </div>

      <!-- Pagination -->
      <?php if (get_next_posts_link() || get_previous_posts_link()) : ?>
      <div class="pagination-wrapper text-center mt-5">
        <?php
                echo paginate_links(array(
                    'prev_text' => '<i class="fas fa-chevron-left"></i> Попередня',
                    'next_text' => 'Наступна <i class="fas fa-chevron-right"></i>',
                    'type' => 'list',
                    'class' => 'pagination justify-content-center'
                ));
                ?>
      </div>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>