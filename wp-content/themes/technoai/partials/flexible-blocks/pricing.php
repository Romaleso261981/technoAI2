<?php
$title = get_sub_field('pricing_title') ?: 'Мої роботи';
$description = get_sub_field('pricing_description') ?: 'Ознайомтеся з моїми останніми проектами та досягненнями';
$pricingСards = get_sub_field('pricing_cards');
?>

<section id="pricing" class="pricing section">
  <div class="container-fluid">
    <div class="container">
      <div class="section-header text-center" data-aos="fade-up">
        <h2><?php echo $title; ?></h2>
        <p>
          <?php echo $description; ?>
        </p>
      </div>
      <div class="row gy-4 justify-content-center">
        <!-- Pricing Cards -->
        <?php foreach ($pricingСards as $card) : ?>
        <div class="col-lg-4 col-md-12" data-aos="fade-up" data-aos-delay="100">
          <div class="pricing-card modern-card">
            <div class="card-header">
              <h3>Basic</h3>
              <div class="price">
                <h4><sup>$</sup>25</h4>
                <p>/month</p>
              </div>
            </div>
            <ul class="features">
              <?php foreach ($card['pricing_features'] as $feature) : ?>
              <li>
                <i class="bi bi-check-circle-fill"></i> <?php echo $feature; ?>
              </li>
              <?php endforeach; ?>
            </ul>
            <a href="#" class="btn-get-started">Замовити</a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>