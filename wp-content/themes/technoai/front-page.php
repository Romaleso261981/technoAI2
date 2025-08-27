<?php get_header(); ?>


<!-- start main -->

<main id="main">

  <?php if (have_rows('postsblogposts')) : ?>
  <?php while (have_rows('postsblogposts')) : the_row(); ?>
  <?php get_template_part('partials/flexible-blocks/' . get_row_layout()); ?>
  <?php endwhile; ?>
  <?php endif; ?>

</main>

<!-- End main -->

<?php get_footer(); ?>