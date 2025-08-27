<?php
$title = get_sub_field('our_team_title') ?: 'Our Team';
$description = get_sub_field('our_team_description') ?: 'Meet the experts who bring our vision to life';
$team_members = get_sub_field('our_team_members');
?>
<section id="team" class="team section-gradient">
  <div class="container" data-aos="fade-up">
    <div class="section-header text-center">
      <h2><?php echo $title; ?></h2>
      <p class="text-white">
        <?php echo $description; ?>
      </p>
    </div>

    <div class="row gy-5 justify-content-center">
      <?php foreach ($team_members as $member) : ?>
      <div class="col-xl-3 col-md-6 team-member" data-aos="fade-up" data-aos-delay="100">
        <div class="member-card position-relative shadow">
          <div class="member-image">
            <?php echo wp_get_attachment_image($member['member_image'], 'full', false, array('class' => 'member-image')); ?>
            <div class="overlay-gradient"></div>
          </div>
          <div class="member-info p-4 text-center">
            <h4><?php echo $member['member_name']; ?></h4>
            <span><?php echo $member['member_position']; ?></span>
            <div class="social-links mt-3">
              <?php if ($member['member_social_links']) : ?>
              <?php foreach ($member['member_social_links'] as $link) : ?>
              <a href="<?php echo $link['link']; ?>" class="social-icon"><i
                  class="bi bi-<?php echo $link['icon']; ?>"></i></a>
              <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>