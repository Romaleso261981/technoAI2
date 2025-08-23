<?php get_header(); ?>

<main class="page">

  <?php if (have_rows('blocks')) : ?>
  <?php while (have_rows('blocks')) : the_row(); ?>
  <?php get_template_part('partials/flexible_blocks/' . get_row_layout()); ?>
  <?php endwhile; ?>
  <?php endif; ?>

</main>

<?php get_footer(); ?>