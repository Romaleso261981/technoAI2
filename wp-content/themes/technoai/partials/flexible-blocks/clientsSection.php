<?php
$clients = get_sub_field('clients');
?>

<section id="clients" class="clients section">
  <div class="container" data-aos="zoom-out">
    <div class="clients-slider swiper">
      <div class="swiper-wrapper align-items-center">
        <?php foreach ($clients as $client) : ?>
        <div class="swiper-slide">
          <?php echo wp_get_attachment_image($client['image'], 'full', false, array('class' => 'img-fluid')); ?>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>