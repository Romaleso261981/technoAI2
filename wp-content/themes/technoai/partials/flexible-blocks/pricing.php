<?php
$title = get_sub_field('pricing_title') ?: 'Тарифні плани';
$description = get_sub_field('pricing_description') ?: 'Виберіть план, який підходить вашим потребам';
$pricingCards = get_sub_field('pricing_cards');

// Перевіряємо, чи є дані
if (!$pricingCards || empty($pricingCards)) {
    return;
}
?>

<section id="pricing" class="pricing section">
  <div class="container-fluid">
    <div class="container">
      <div class="section-header text-center" data-aos="fade-up">
        <h2><?php echo esc_html($title); ?></h2>
        <p>
          <?php echo esc_html($description); ?>
        </p>
      </div>
      <div class="row gy-4 justify-content-center">

        <!-- Pricing Cards -->
        <?php foreach ($pricingCards as $card) : ?>
        <div class="col-lg-4 col-md-12" data-aos="fade-up" data-aos-delay="100">
          <div class="pricing-card modern-card">
            <div class="card-header">
              <h3><?php echo esc_html($card['pricing_card_title'] ?? 'Basic'); ?></h3>
              <div class="price">
                <h4>
                  <sup><?php echo esc_html($card['pricing_union'] ?? '$'); ?></sup><?php echo esc_html($card['price'] ?? '25'); ?>
                </h4>
                <p>/month</p>
              </div>
            </div>
            <ul class="features">
              <?php if (!empty($card['price_features']) && is_array($card['price_features'])) : ?>
              <?php foreach ($card['price_features'] as $feature) : ?>
              <li>
                <i class="bi bi-check-circle-fill"></i>
                <span class="feature-text">
                  <?php echo esc_html(is_array($feature) ? ($feature['feature'] ?? '') : $feature); ?>
                </span>
              </li>
              <?php endforeach; ?>
              <?php endif; ?>
            </ul>
            <a href="#" class="btn-get-started">Замовити</a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>