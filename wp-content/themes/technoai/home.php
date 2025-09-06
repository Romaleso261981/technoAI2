<?php
$mainPostsTitle = get_sub_field('title');
$mainPostsdescription = get_sub_field('description');
?>

<?php get_header("blog"); ?>

<main id="main">
  <section id="recent-posts" class="recent-posts sections-bg">
    <div class="container" data-aos="fade-up">
      <div class="section-header text-center">
        <h2><?php echo $mainPostsTitle; ?></h2>
        <p><?php echo $mainPostsdescription; ?></p>
      </div>
      <?php if ( have_posts() ) : ?>
      <div class="row gy-4">
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="col-lg-4 col-md-6">
          <article class="post-card">
            <div class="post-img">
              <a href="#">
                <?php if ( has_post_thumbnail() ) {
                the_post_thumbnail('medium_large');
              } ?>
              </a>
            </div>
            <h3 class="post-title">
              <a href="#"><?php the_title(); ?></a>
            </h3>
          </article>
        </div>
        <?php endwhile; ?>
      </div>
      <?php endif; ?>
      <!-- End recent posts row -->
    </div>
  </section>
</main>

<?php get_footer(); ?>