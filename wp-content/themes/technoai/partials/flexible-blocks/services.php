<?php
$services = get_field('services');
$description = get_field('description');
$title = get_field('title');
?>



<section id="services" class="section">
  <div class="tech-pattern"></div>
  <div class="container position-relative">
    <!-- Section Header -->
    <div class="section-header text-center">
      <h2><?php echo $title; ?></h2>
      <p class="lead text-muted">
        <?php echo $description; ?>
      </p>
    </div>

    <!-- Dynamic Service Grid with Asymmetry -->
    <div class="row gy-5 position-relative">
      <?php if ($services) : ?>
      <?php foreach ($services as $service) : ?>
      <div class="col-xl-4 col-md-6 service-item">
        <div class="service-card card-rotated">
          <div class="service-icon mb-3">

          </div>
          <h4 class="service-title">Application Design</h4>
          <p class="service-description">
            We craft stunning, user-friendly applications that make your
            vision come to life.
          </p>
          <a href="#" class="btn btn-get-started">Explore</a>
        </div>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>
      <!-- Service 1 -->

    </div>
  </div>
</section>