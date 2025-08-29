<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$blogposts = get_sub_field('posts');
?>

<section id="recent-posts" class="recent-posts sections-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-header text-center">
      <h2><?php echo $title; ?></h2>
      <p><?php echo $description; ?></p>
    </div>
    <?php if ($blogposts) : ?>
    <div class="row gy-4">
      <?php foreach ($blogposts as $blogpost) : ?>
      <div class="col-lg-4 col-md-6">
        <article class="post-card">
          <div class="post-img">
            <?php echo wp_get_attachment_image($blogpost['image'], 'full', false, array('class' => 'services__picture')); ?>
          </div>
          <p class="post-category">
            <?php echo $blogpost['post-category']; ?>
          </p>
          <h3 class="post-title">
            <a href="#"><?php echo $blogpost['post-title']; ?></a>
          </h3>
          <div class="post-meta">
            <p class="post-author">
              <?php echo $blogpost['post-author']; ?>
            </p>
            <p class="post-date">
              <time datetime="<?php echo $blogpost['post-date']; ?>"><?php echo $blogpost['post-date']; ?></time>
            </p>
          </div>
        </article>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <!-- End recent posts row -->
  </div>
</section>