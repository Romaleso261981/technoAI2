<?php
$title = get_sub_field('contact_title');
$description = get_sub_field('contact_description');
$address = get_sub_field('contact_address');
$phones = get_sub_field('contact_phones');
$emails = get_sub_field('contact_emails');
$button_text = get_sub_field('contact_button_text');
$success_message = get_sub_field('contact_success_message');
?>

<section id="contact" class="contact-section section">
  <div class="section-header">
    <h2><?php echo $title; ?></h2>
    <p><?php echo $description; ?></p>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-12" data-aos="fade-right">
        <div class="contact-information-box-3">
          <div class="row">
            <div class="col-lg-12">
              <div class="single-contact-info-box">
                <div class="contact-info">
                  <h6>Адреса:</h6>
                  <p><?php echo $address; ?></p>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="single-contact-info-box">
                <div class="contact-info">
                  <?php if ($phones) : ?>
                  <h6>Телефони:</h6>
                  <?php foreach ($phones as $phone) : ?>
                  <p><?php echo $phone['phone_number']; ?></p>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="single-contact-info-box">
                <div class="contact-info">
                  <?php if ($emails) : ?>
                  <h6>Електронна адреса:</h6>
                  <?php foreach ($emails as $email) : ?>
                  <p><?php echo $email['email_address']; ?></p>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-12" data-aos="fade-left">
        <div class="contact-form-box contact-form contact-form-3">
          <div class="form-container-box">
            <div class="controls">
              <?php echo do_shortcode('[contact-form-7 id="98eca30" title="Contact form 1"]'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>