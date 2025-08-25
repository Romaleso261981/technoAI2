<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$blogposts = get_sub_field('blogposts');
?>

<br>
<?php print_r($blogposts); ?>
<br>

<section id="recent-posts" class="recent-posts sections-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-header text-center">
      <h2><?php echo $title; ?></h2>
      <p><?php echo $description; ?></p>
    </div>
    <?php if ($blogposts) : ?>
    <div class="row gy-4">
      <div class="col-lg-4 col-md-6">
        <?php foreach ($blogposts as $index => $service_id) : ?>
        <article class="post-card">
          <div class="post-img">
            <?php echo get_the_post_thumbnail($service_id, 'full', array('class' => 'services__picture')); ?>
          </div>
          <p class="post-category">Marketing</p>
          <h3 class="post-title">
            <a href="blog-details.html">Digital Marketing and its Importantance?</a>
          </h3>
          <div class="post-meta">
            <p class="post-author">Main Dow</p>
            <p class="post-date">
              <time datetime="2025-01-01">Dec 22, 2025</time>
            </p>
          </div>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>
    <!-- End recent posts row -->
  </div>
</section>