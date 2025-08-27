<?php
$title = get_sub_field('pricing_title') ?: 'Мої роботи';
$description = get_sub_field('pricing_description') ?: 'Ознайомтеся з моїми останніми проектами та досягненнями';
$pricingCards = get_sub_field('pricing_cards');
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
        <?php if ($pricingCards) : ?>
        <?php foreach ($pricingCards as $card) : ?>
        <div class="col-lg-4 col-md-12" data-aos="fade-up" data-aos-delay="100">
          <div class="pricing-card modern-card">
            <div class="card-header">
              <h3><?php echo $card['pricing_card_title'] ?: 'Basic'; ?></h3>
              <div class="price">
                <h4><sup><?php echo $card['pricing_union'] ?: '$'; ?></sup><?php echo $card['price'] ?: '25'; ?></h4>
                <p>/month</p>
              </div>
            </div>
            <ul class="features">
              <?php if ($card['price_features']) : ?>
              <?php foreach ($card['price_features'] as $feature) : ?>
              <li>
                <i class="bi bi-check-circle-fill"></i> <?php echo $feature['feature']; ?>
              </li>
              <?php endforeach; ?>
              <?php endif; ?>
            </ul>
            <a href="#" class="btn-get-started">Замовити</a>
          </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>