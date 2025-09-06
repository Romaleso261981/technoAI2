<?php
$counters = get_sub_field('counters');
?>

<section id="stats-counter" class="stats-counter section">
  <div class="container">
    <div class="row g-4 align-items-center justify-content-center">
      <?php foreach ($counters as $counter) : ?>
      <!-- Stat Item -->
      <div class="col-lg-3 col-md-6">
        <div class="stats-box" data-aos="zoom-in" data-aos-delay="100">
          <div class="stats-layer"></div>
          <div class="stats-icon">
            <?php echo wp_get_attachment_image($counter['icon'], 'full', false, array('class' => 'img-counter')); ?>
          </div>
          <div class="stats-content">
            <h3 class="stats-number purecounter" data-purecounter-start="0"
              data-purecounter-end="<?php echo $counter['count']; ?>" data-purecounter-duration="1">
              <?php echo $counter['count']; ?>
            </h3>
            <p class="stats-label">
              <?php if ($counter['label']) : ?>
              <?php echo $counter['label']; ?>
              <?php endif; ?>
            </p>
            <small><?php echo $counter['description']; ?></small>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>