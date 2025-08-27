<?php
$title = get_sub_field('cta_title') ?: 'Мої роботи';
$description = get_sub_field('cta_description') ?: 'Ознайомтеся з моїми останніми проектами та досягненнями';
$button_text = get_sub_field('cta_button_text') ?: 'Замовити';
?>



<section id="call-to-action" class="call-to-action">
  <div class="container text-center aos-init aos-animate" data-aos="zoom-out">
    <div class="row gy-4">
      <div class="col-lg-12">
        <h3><?php echo $title; ?></h3>
        <p>
          <?php echo $description; ?>
        </p>
        <a class="cta-btn" href="mailto:info@example.com"><?php echo $button_text; ?></a>
      </div>
    </div>
  </div>
</section>