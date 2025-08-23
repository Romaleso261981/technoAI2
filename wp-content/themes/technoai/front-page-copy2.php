<?php get_header(); ?>


<!--  Hero Section  -->
<?php get_template_part('partials/flexible_blocks/hero'); ?>
<!-- End Hero Section -->

<main class="page">

  <?php if (have_rows('blocks')) : ?>
  <?php while (have_rows('blocks')) : the_row(); ?>
  <?php get_template_part('partials/flexible_blocks/' . get_row_layout()); ?>
  <?php endwhile; ?>
  <?php endif; ?>

</main>

<!-- start main -->
<main id="main">
  <!-- Start Service Section -->
  <?php get_template_part('partials/flexible_blocks/services'); ?>
  <!-- End Service Section -->

  <!-- Portfolio Section -->
  <?php get_template_part('partials/flexible_blocks/portfolio'); ?>
  <!-- End Portfolio Section -->

  <!-- Featured -->
  <?php get_template_part('partials/flexible_blocks/featured'); ?>
  <!-- End Featured -->

  <!-- Start Pricing Section -->
  <?php get_template_part('partials/flexible_blocks/pricing'); ?>
  <!-- End Pricing Section -->

  <!--  Testimonials Section  -->
  <?php get_template_part('partials/flexible_blocks/testimonials'); ?>
  <!-- End Testimonials Section -->

  <!--  Start Counter Section  -->
  <?php get_template_part('partials/flexible_blocks/counter'); ?>
  <!--  End Counter Section  -->

  <!--  Clients Section  -->
  <?php get_template_part('partials/flexible_blocks/clientsSection'); ?>
  <!-- End Clients Section -->

  <!--  Our Team Section  -->
  <?php get_template_part('partials/flexible_blocks/ourTeam'); ?>
  <!-- End Our Team Section -->

  <!--  Frequently Asked Questions Section  -->
  <?php get_template_part('partials/flexible_blocks/faq'); ?>
  <!-- End Frequently Asked Questions Section -->

  <!--  Call To Action Section  -->
  <?php get_template_part('partials/flexible_blocks/cta'); ?>
  <!-- End Call To Action Section -->

  <!--  Recent Blog Posts Section  -->
  <?php get_template_part('partials/flexible_blocks/blogPosts'); ?>
  <!-- End Recent Blog Posts Section -->

  <!-- Start Contact Section -->
  <?php get_template_part('partials/flexible_blocks/contactSection'); ?>
  <!-- End Contact Section -->
</main>
<!-- End main -->

<?php get_footer(); ?>