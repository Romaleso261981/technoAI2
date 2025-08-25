<?php
$firsttitle = get_sub_field('firsttitle');
$secondtitle = get_sub_field('secondtitle');
$description = get_sub_field('description');
$buttontextstarted = get_sub_field('buttontextstarted');
$buttontextquoted = get_sub_field('buttontextquoted');
?>

<section id="hero" class="hero sticked-header-offset">
  <div id="particles-js"></div>
  <div id="repulse-circle-div"></div>

  <!-- Floating animated elements -->
  <div class="floating-blob blob-1"></div>
  <div class="floating-blob blob-2"></div>
  <div class="glowing-orb orb-1"></div>
  <div class="glowing-orb orb-2"></div>

  <!-- New Animated Objects -->
  <div class="rotating-cube cube-1"></div>
  <div class="rotating-cube cube-2"></div>
  <div class="pulsing-ring ring-1"></div>
  <div class="pulsing-ring ring-2"></div>
  <div class="glowing-dot dot-1"></div>
  <div class="glowing-dot dot-2"></div>

  <div class="container position-relative">
    <div class="row gy-5 aos-init aos-animate">
      <div class="col-lg-8 offset-lg-0 dark-bg order-lg-1 d-flex flex-column justify-content-start text-left caption">
        <h2 data-aos="fade-up">
          <?php echo $firsttitle; ?>
          <br /><span><?php echo $secondtitle; ?></span>
        </h2>
        <p data-aos="fade-up" data-aos-delay="400" style="max-width: 500px">
          <?php echo $description; ?>
        </p>
        <div class="d-flex justify-content-start">
          <a href="#contact" class="btn-get-started mr-20" data-aos="fade-up"
            data-aos-delay="800"><?php echo $buttontextstarted; ?></a>
          <a href="#services" class="btn-get-started" data-aos="fade-up"
            data-aos-delay="1000"><?php echo $buttontextstarted; ?></a>
        </div>
      </div>
    </div>
  </div>
</section>