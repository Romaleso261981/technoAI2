<?php
get_header('2');
/* Template Name: About */
?>

<!--About Info Alanı-->
<?php $aboutus_3D = get_field('3d_about_us');?>
<section class="hakkimizda-bolumu-anasayfa">
    <div class="hero6 wow <?php echo $aboutus_3D ['effect_animation_1'];?>" data-wow-delay="0.4s">
        <img class="imagerotate6" src="<?php echo $aboutus_3D ['animation_shape_1'];?>" alt="" >
    </div>
<div class="h-yazi-ozel h-yazi-margin-ozel">           
</div>
<div class="tablo">
    <div class="tablo--1-ve-2">
        <img class="galeri__gorsel--3ab shimmer zimage wow <?php echo $aboutus_3D ['image_effect_1'];?>" data-wow-delay="0.5s" src="<?php echo $aboutus_3D ['image_1'];?>" alt="" >
    </div>         
    <!--Galeri Görsel Alanı-->
    <div class="tablo--1-ve-3 wow fadeInUp" data-wow-delay="0.3s">
        <h2 class="h2-baslik-anasayfa-ozel btw wow <?php echo $aboutus_3D ['right_text_about_effect'];?>" data-wow-delay="0.4s"> <?php echo $aboutus_3D ['right_title_about'];?> </h2>
        <div class="bosluk333"></div>
    <p class="paragraf wow <?php echo $aboutus_3D ['right_text_about_effect'];?>" data-wow-delay="0.5s">
    <?php echo $aboutus_3D ['right_text_about'];?>
    <div class="bosluk3"></div>
        <div class="container">
            <div class="row">
            <div class="dephh">
                <div class="container">
                    <div class="row">
                    <?php if( have_rows('contact_information') ): ?>
                        <?php while( have_rows('contact_information') ): the_row();
                        //vars
                        $icon = get_sub_field('icon');
                        $bigtext = get_sub_field('big_text');
                        $smalltext = get_sub_field('small_text');
                        $link = get_sub_field('link');
                        ?>
                        <div class="col-lg-12 lefthealtfooter">
                            <div class="row yk" onclick="location.href='<?php echo $link; ?>';" style="cursor:pointer;">
                                <div class="col-lg-3">
                                    <div class="iconhh"><i class="<?php echo $icon; ?>"></i></div>
                                </div>
                                <div class="col-lg-9">
                                    <h4 class="services-kutu2--wt13 wow fade"><?php echo $smalltext; ?></h4>
                                    <h2 class="h2-baslik-anasayfa-wth2e wow fade"><?php echo $bigtext; ?></h2>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>   
                        <?php endif; ?> 
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<div class="bosluk4"></div>

<!--Videos-->
<?php $videosection = get_field('video_section');?>
<section class="videosc">
    <div class="hero6 wow <?php echo $videosection ['effect_animation_1'];?>" data-wow-delay="0.3s">
        <img class="imagerotateshp1" src="<?php echo $videosection ['animation_shape_1'];?>" alt="" >
    </div>
    <div class="hero8 wow <?php echo $videosection ['effect_animation_2'];?>" data-wow-delay="0.4s">
        <img class="imagerotateshp2" src="<?php echo $videosection ['animation_shape_2'];?>" alt="" >
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="h-yazi-ortalama h-yazi-margin-orta-3">
                    <h2 class="h2-baslik-hizmetler-2 wow <?php echo $videosection ['title_effect'];?>" data-wow-delay="0.4s"> <?php echo $videosection ['title'];?> </h2>
                </div>
                    <p class="h2-baslik-hizmetler-2__paragraf wow <?php echo $videosection ['small_text_effect'];?>" data-wow-delay="0.5s">
                    <?php echo $videosection ['small_text'];?>
                    </p>
            </div>
        </div>
    </div>
    <div class="container">
    <?php $video = get_field('video');?>
        <div class="row">
            <div class="col-lg-12">
                <div class="live-video-img">
                <div class="or">
                    <img src="<?php echo $video ['video_image'];?>" class="imgsg" alt="">
                    <div class="ortd">
                        <a href="<?php echo $video ['video_link'];?>" class="custom-button vbtn-fluid vp-a vp-yt-type"><i class="flaticon-play vdicon"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What Do We Offer? -->
<section class="why-us">
<?php $ridinglevelsec = get_field('riding_level_section');?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="h-yazi-ortalama h-yazi-margin-orta-3">
                    <h2 class="h2-baslik-hizmetler-2 wow <?php echo $ridinglevelsec ['title_effect'];?>" data-wow-delay="0.4s"> <?php echo $ridinglevelsec ['title'];?> </h2>
                </div>
                    <p class="h2-baslik-hizmetler-2__paragraf wow <?php echo $ridinglevelsec ['small_text_effect'];?>" data-wow-delay="0.5s">
                    <?php echo $ridinglevelsec ['small_text'];?>
                    </p>
            </div>
        </div>
    </div>
    <div class="bosluk333"></div>
    <div class="container">
        <div class="row">
        <?php if( have_rows('riding_level') ): ?>
        <?php while( have_rows('riding_level') ): the_row();
        //vars
        $image = get_sub_field('image');
        $icon = get_sub_field('icon');
        $title = get_sub_field('title');
        $text = get_sub_field('text');
        $effect = get_sub_field('effect');
        $duration = get_sub_field('duration');
        $link = get_sub_field('link');
        $date = get_sub_field('date');
        $buttontext = get_sub_field('button_text');
        $css = get_sub_field('css');
        ?>
        <div class="col-lg-3 ds wow <?php echo $effect; ?>" data-wow-delay="<?php echo $duration; ?>s">
        <div class="dep">
            <div class="or56">
                <div class="iconwr or56"><p class="dzv"><i class="<?php echo $icon; ?>"></i></p></div>
                        <div class="bosluk333"></div>
                        <h3 class="prongl"><?php echo $title; ?></h3>
                        <h4 class="infostextgl"><?php echo $date; ?></h4>
                        <a class="btn-3" href="<?php echo $link; ?>"><p class="btnn2"><?php echo $buttontext; ?></p></a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        </div>
    </div>
</section>

<!--Yorumlar-->
<?php $commentssection = get_field('comments_section');?>
<section class="yorumlar-alani-sayfa">
<div class="hero66 wow <?php echo $commentssection ['effect_animation_1'];?>" data-wow-delay="<?php echo $commentssection ['duration_animation_1'];?>s">
    <img class="commentpeop1" src="<?php echo $commentssection ['animation_image_1'];?>" alt="" >
</div>
<div class="hero88 wow <?php echo $commentssection ['effect_animation_2'];?>" data-wow-delay="<?php echo $commentssection ['duration_animation_2'];?>s">
    <img class="commentpeop2" src="<?php echo $commentssection ['animation_image_2'];?>" alt="" >
</div>
<div class="hero88 wow <?php echo $commentssection ['effect_animation_3'];?>" data-wow-delay="<?php echo $commentssection ['duration_animation_3'];?>s">
    <img class="commentpeop3" src="<?php echo $commentssection ['animation_image_3'];?>" alt="" >
</div>
<div class="hero88 wow <?php echo $commentssection ['effect_animation_4'];?>" data-wow-delay="<?php echo $commentssection ['duration_animation_4'];?>s">
    <img class="commentpeop4" src="<?php echo $commentssection ['animation_image_4'];?>" alt="" >
</div>
    <div class="container">
        <div class="row">
        <div class="col-12 wow animated fadeIn animated" data-wow-delay="0.5s">
            <div class="h-yazi-ortalama h-yazi-margin-orta-3">
                <div class="icon wow <?php echo $commentssection ['icon_effect'];?>" data-wow-delay="0.5s"><i class="<?php echo $commentssection ['icon'];?>"></i></div>
                <h2 class="h2-baslik-hizmetler-yorum wow <?php echo $commentssection ['title_effect'];?>" data-wow-delay="0.5s"> <?php echo $commentssection ['title'];?> </h2> 
            </div>
                <p class="h2-baslik-hizmetler-yorum__yorum wow <?php echo $commentssection ['small_text_effect'];?>" data-wow-delay="0.5s">
                <?php echo $commentssection ['small_text'];?>
                </p>
                <div class="bosluk3a"></div>
            </div>
            <div class="col-12">
                <div class="carousel-classes">
                <div class="swiper-wrapper">
                <?php if( have_rows('comments') ): ?>
                <?php while( have_rows('comments') ): the_row();

                //vars
                $comment = get_sub_field('comment');
                $image = get_sub_field('image');
                $fullname = get_sub_field('full_name');

                ?>
                <div class="swiper-slide wow animated fadeInLeft animated" data-wow-delay="0.5s">
                    <div class="class-box">
                    <div class="testimonial-card">
                        <div class="testimon-text">
                        <?php echo $comment; ?>
                            <i class="fas fa-quote-right quote"></i>
                        </div>
                        <h2 class="h2-baslik-hizmetler-2cc"><?php echo $fullname; ?></h2>
                        </div>
                        </div>
                <!-- end swiper-slide -->
                </div>
                <?php endwhile; ?>   
                <?php endif; ?> 
                </div>
                <div class="swiper-pagination"></div>
                </div>      
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>