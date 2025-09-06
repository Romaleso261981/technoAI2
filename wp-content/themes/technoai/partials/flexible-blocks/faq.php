<?php
$faq_title = get_sub_field('Faq_title');
$faq_description = get_sub_field('Faq_description');
$faq_content = get_sub_field('faq_content');
?>

<section id="faq" class="faq sections-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2><?php echo $faq_title; ?></h2>
      <p><?php echo $faq_description; ?></p>
    </div>

    <div class="faq-content">
      <div class="accordion" id="faqAccordion">
        <!-- FAQ Items -->
        <?php foreach ($faq_content as $index => $faq) : ?>
        <div class="accordion-item">
          <h3 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#faq<?php echo $index + 1; ?>">
              <span class="icon"><i class="bi bi-question-circle-fill"></i></span>
              <?php echo $faq['faq_question']; ?>
            </button>
          </h3>
          <div id="faq<?php echo $index + 1; ?>" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              <?php echo $faq['faq_answer']; ?>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>