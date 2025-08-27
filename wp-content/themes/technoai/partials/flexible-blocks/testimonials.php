<?php
$title = get_sub_field('testimonials_title') ?: 'What Our Clients Say';
$description = get_sub_field('testimonials_description') ?: 'Real stories from our satisfied customers';
$testimonials = get_sub_field('testimonials');
?>

<section id="testimonials" class="testimonials">
  <div class="container" data-aos="fade-up">
    <div class="section-header text-center">
      <h2><?php echo $title; ?></h2>
      <p><?php echo $description; ?></p>
    </div>
    <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">
        <?php foreach ($testimonials as $testimonial) : ?>
        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="testimonial-item modern">
              <div class="info-box">
                <?php echo wp_get_attachment_image($testimonial['testimonial_image'], 'full'); ?>
                <div>
                  <h3><?php echo $testimonial['name']; ?></h3>
                  <h4><?php echo $testimonial['position']; ?></h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                      class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                </div>
              </div>
              <p class="testimonial-text">
                <i class="bi bi-quote quote-icon-left"></i>
                <?php echo $testimonial['text']; ?>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>