<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$services = get_sub_field('services');
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
      <?php foreach ($services as $index => $service) : ?>
      <?php
        // Визначаємо клас картки на основі індексу для створення асиметричного ефекту
        $card_class = 'service-card';
        if ($index % 3 == 0) {
          $card_class .= ' card-rotated';
        } elseif ($index % 3 == 1) {
          $card_class .= ' card-rotated-2';
        }
        // Для індексу 2 (третій елемент) залишаємо тільки базовий клас service-card
      ?>
      <div class="col-xl-4 col-md-6 service-item">
        <div class="<?php echo $card_class; ?>">
          <div class="service-icon mb-3">
            <?php echo wp_get_attachment_image($service['service_icon'], 'full'); ?>
          </div>
          <h4 class="service-title">
            <?php echo $service['service_title']; ?>
          </h4>
          <p class="service-description">
            <?php echo $service['service_description']; ?>
          </p>
          <a href="#" class="btn btn-get-started">Explore</a>
        </div>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>

    </div>
  </div>
</section>