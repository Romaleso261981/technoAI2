<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$services = get_sub_field('services');

// Отримуємо всі категорії сервісів для фільтрації
$service_categories = array();
if ($services) {
    foreach ($services as $service) {
        if (!empty($service['service_category'])) {
            $service_categories[] = $service['service_category'];
        }
    }
    $service_categories = array_unique($service_categories);
}
?>

<section id="services" class="section">
  <div class="tech-pattern"></div>
  <div class="container position-relative">
    <!-- Section Header -->
    <div class="section-header text-center">
      <h2><?php echo $title; ?></h2>
      <p class="lead text-muted">
        <?php echo $description; ?>
      </p>
    </div>

    <!-- Filter Buttons -->
    <?php if (!empty($service_categories)) : ?>
    <div class="filter-buttons text-center mb-5">
      <button class="btn btn-filter active" data-filter="all">All Services</button>
      <?php foreach ($service_categories as $category) : ?>
      <button class="btn btn-filter" data-filter="<?php echo esc_attr($category); ?>">
        <?php echo esc_html($category); ?>
      </button>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- Dynamic Service Grid with Asymmetry -->
    <div class="row gy-5 position-relative" id="services-grid">
      <?php if ($services) : ?>
      <?php foreach ($services as $index => $service) : ?>
      <?php
        // Визначаємо клас картки на основі індексу для створення асиметричного ефекту
        $card_class = 'service-card';
        if ($index % 3 == 0) {
          $card_class .= ' card-rotated';
        } elseif ($index % 3 == 1) {
          $card_class .= ' card-rotated-2';
        }

        // Додаємо категорію для фільтрації
        $service_category = !empty($service['service_category']) ? $service['service_category'] : 'general';
        $filter_attributes = 'data-category="' . esc_attr($service_category) . '"';
      ?>
      <div class="col-xl-4 col-md-6 service-item" <?php echo $filter_attributes; ?>>
        <div class="<?php echo $card_class; ?>">
          <div class="service-icon mb-3">
            <?php echo wp_get_attachment_image($service['service_icon'], 'full'); ?>
          </div>
          <h4 class="service-title">
            <?php echo $service['service_title']; ?>
          </h4>
          <p class="service-description">
            <?php echo $service['service_description']; ?>
          </p>
          <a href="#" class="btn btn-get-started">Explore</a>
        </div>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>

    <!-- No Results Message -->
    <div class="no-results text-center" style="display: none;">
      <p class="text-muted">No services found for the selected category.</p>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const filterButtons = document.querySelectorAll('.btn-filter');
  const serviceItems = document.querySelectorAll('.service-item');
  const noResults = document.querySelector('.no-results');

  filterButtons.forEach(button => {
    button.addEventListener('click', function() {
      const filter = this.getAttribute('data-filter');

      // Оновлюємо активну кнопку
      filterButtons.forEach(btn => btn.classList.remove('active'));
      this.classList.add('active');

      // Фільтруємо сервіси
      let visibleCount = 0;
      serviceItems.forEach(item => {
        const category = item.getAttribute('data-category');

        if (filter === 'all' || category === filter) {
          item.style.display = 'block';
          visibleCount++;
        } else {
          item.style.display = 'none';
        }
      });

      // Показуємо/ховаємо повідомлення про відсутність результатів
      if (visibleCount === 0) {
        noResults.style.display = 'block';
      } else {
        noResults.style.display = 'none';
      }
    });
  });
});
</script>