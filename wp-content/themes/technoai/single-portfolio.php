<?php get_header(); ?>

<main id="main" class="main">
  <?php while (have_posts()) : the_post(); ?>

  <!-- Portfolio Header -->
  <section class="portfolio-header bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
              <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Головна</a></li>
              <li class="breadcrumb-item"><a href="<?php echo get_post_type_archive_link('portfolio'); ?>">Портфоліо</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
            </ol>
          </nav>

          <h1 class="display-4 fw-bold mt-3"><?php the_title(); ?></h1>

          <?php
                    $work_categories = get_the_terms(get_the_ID(), 'portfolio_category');
                    if ($work_categories && !is_wp_error($work_categories)) : ?>
          <div class="portfolio-categories mt-3">
            <?php foreach ($work_categories as $category) : ?>
            <a href="<?php echo get_term_link($category); ?>" class="badge bg-primary text-decoration-none me-2">
              <?php echo esc_html($category->name); ?>
            </a>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Content -->
  <section class="portfolio-content py-5">
    <div class="container">
      <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
          <!-- Featured Image -->
          <?php if (has_post_thumbnail()) : ?>
          <div class="portfolio-featured-image mb-4">
            <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
          </div>
          <?php endif; ?>

          <!-- Portfolio Description -->
          <div class="portfolio-description mb-5">
            <h3>Опис проекту</h3>
            <?php the_content(); ?>
          </div>

          <!-- Portfolio Gallery -->
          <?php
                    $gallery_images = get_post_gallery_images();
                    if (!empty($gallery_images)) : ?>
          <div class="portfolio-gallery mb-5">
            <h3>Галерея проекту</h3>
            <div class="row g-3">
              <?php foreach ($gallery_images as $image_url) : ?>
              <div class="col-md-6">
                <img src="<?php echo esc_url($image_url); ?>" alt="Gallery Image" class="img-fluid rounded">
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <?php endif; ?>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
          <div class="portfolio-sidebar">
            <!-- Project Details -->
            <div class="card mb-4">
              <div class="card-header">
                <h5 class="mb-0">Деталі проекту</h5>
              </div>
              <div class="card-body">
                <?php
                                $client = get_post_meta(get_the_ID(), '_portfolio_client', true);
                                $project_url = get_post_meta(get_the_ID(), '_portfolio_project_url', true);
                                $completion_date = get_post_meta(get_the_ID(), '_portfolio_completion_date', true);
                                $project_duration = get_post_meta(get_the_ID(), '_portfolio_duration', true);
                                ?>

                <?php if ($client) : ?>
                <div class="project-detail mb-3">
                  <strong>Клієнт:</strong>
                  <p class="mb-0"><?php echo esc_html($client); ?></p>
                </div>
                <?php endif; ?>

                <?php if ($completion_date) : ?>
                <div class="project-detail mb-3">
                  <strong>Дата завершення:</strong>
                  <p class="mb-0"><?php echo date('F Y', strtotime($completion_date)); ?></p>
                </div>
                <?php endif; ?>

                <?php if ($project_duration) : ?>
                <div class="project-detail mb-3">
                  <strong>Тривалість проекту:</strong>
                  <p class="mb-0"><?php echo esc_html($project_duration); ?></p>
                </div>
                <?php endif; ?>

                <?php if ($project_url) : ?>
                <div class="project-detail mb-3">
                  <strong>URL проекту:</strong>
                  <p class="mb-0">
                    <a href="<?php echo esc_url($project_url); ?>" target="_blank" rel="noopener">
                      <?php echo esc_url($project_url); ?>
                    </a>
                  </p>
                </div>
                <?php endif; ?>
              </div>
            </div>

            <!-- Technologies Used -->
            <?php
                        $technologies = get_the_terms(get_the_ID(), 'portfolio_technology');
                        if ($technologies && !is_wp_error($technologies)) : ?>
            <div class="card mb-4">
              <div class="card-header">
                <h5 class="mb-0">Використані технології</h5>
              </div>
              <div class="card-body">
                <div class="d-flex flex-wrap gap-2">
                  <?php foreach ($technologies as $tech) : ?>
                  <span class="badge bg-primary"><?php echo esc_html($tech->name); ?></span>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <?php endif; ?>

            <!-- Project Actions -->
            <div class="card">
              <div class="card-body text-center">
                <?php if ($project_url) : ?>
                <a href="<?php echo esc_url($project_url); ?>" class="btn btn-primary btn-lg w-100 mb-2" target="_blank"
                  rel="noopener">
                  <i class="fas fa-external-link-alt me-2"></i>Переглянути проект
                </a>
                <?php endif; ?>

                <a href="<?php echo get_post_type_archive_link('portfolio'); ?>" class="btn btn-outline-primary w-100">
                  <i class="fas fa-arrow-left me-2"></i>Назад до портфоліо
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Related Projects -->
  <?php
    $related_projects = get_posts(array(
        'post_type' => 'portfolio',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'post__not_in' => array(get_the_ID()),
        'orderby' => 'rand'
    ));

    if (!empty($related_projects)) : ?>
  <section class="related-projects bg-light py-5">
    <div class="container">
      <h3 class="text-center mb-5">Схожі проекти</h3>
      <div class="row g-4">
        <?php foreach ($related_projects as $related_project) : ?>
        <div class="col-md-4">
          <div class="card h-100">
            <?php if (has_post_thumbnail($related_project->ID)) : ?>
            <img src="<?php echo get_the_post_thumbnail_url($related_project->ID, 'medium'); ?>" class="card-img-top"
              alt="<?php echo get_the_title($related_project->ID); ?>">
            <?php endif; ?>
            <div class="card-body">
              <h5 class="card-title"><?php echo get_the_title($related_project->ID); ?></h5>
              <p class="card-text"><?php echo wp_trim_words(get_the_excerpt($related_project->ID), 15); ?></p>
              <a href="<?php echo get_permalink($related_project->ID); ?>" class="btn btn-primary">Деталі</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>