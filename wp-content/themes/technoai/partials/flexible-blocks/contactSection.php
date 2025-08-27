<?php
$title = get_sub_field('contact_title');
$description = get_sub_field('contact_description');
$address = get_sub_field('contact_addres');
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
                  <h6>Address:</h6>
                  <p><?php echo $address; ?></p>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="single-contact-info-box">
                <div class="contact-info">
                  <?php if ($phones) : ?>
                  <h6>Phone:</h6>
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
                  <h6>Emails:</h6>
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
            <form class="contact-form form" id="ajax-contact" method="post" action="assets/phpscripts/contact.php">
              <div class="controls">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group form-input-box">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name*"
                        required="required" data-error="Name is required." />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-input-box">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email*"
                        required="required" data-error="Valid email is required." />
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group form-input-box">
                      <input type="text" class="form-control" name="subject" placeholder="Subject"
                        required="required" />
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group form-input-box">
                      <textarea class="form-control" id="message" name="message" rows="7"
                        placeholder="Write Your Message*" required="required"
                        data-error="Please, leave us a message."></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" data-text="Send Message" class="cta-btn">
                      <?php echo $button_text; ?>
                    </button>
                  </div>
                  <div class="messages">
                    <div class="alert alert alert-success alert-dismissable alert-dismissable hidden" id="msgSubmit">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        &times;
                      </button>
                      <?php echo $success_message; ?>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>