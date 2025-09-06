<?php
get_header('2');
/* Template Name: All Services */
?>

<!--Services-->
<section class="sectionbars2">
<?php $lampsection = get_field('lamp_section');?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="h2-baslik-anasayfa-wtbb wow fade"><?php echo $lampsection ['title'];?></h2>
            <p class="services-kutu2--wtbb wow fade animated" style="visibility: visible;">
            <?php echo $lampsection ['text'];?>
            </p>
            <div class="bosluk3"></div>
        </div>
    </div>
</div>
</section>
<section class="serviceb-alani wow animated fadeInUp animated" data-wow-delay="0.5s">
    <div class="container">  
        <div class="row">
            <?php if( have_rows('sservices') ): ?>
            <?php while( have_rows('sservices') ): the_row();
            //vars
            $image = get_sub_field('image');
            $effect = get_sub_field('effect');
            $duration = get_sub_field('duration');
            $link = get_sub_field('link');
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            ?>
            <div class="col-xl-3 dd wow <?php echo $effect; ?>" data-wow-delay="<?php echo $duration; ?>s">
                <div class="box-style2 box-primary-color2">
                    <img class="efozel2" src="<?php echo $image; ?>" alt="">
                    <div class="bosluk333"></div>
                    <div class="descontent">
                        <p class="services-kutu2--wts3 wow fade animated" style="visibility: visible;">
                        <?php echo $text; ?>
                        </p>
                        <div class="bosluk333"></div>
                        <div class="orserv">
                            <a class="btn-5" href="<?php echo $link; ?>"><p class="btnn2"><?php echo $title; ?></p></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>   
            <?php endif; ?> 
        </div>
    </div>
</section>

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

<!-- Offer Request -->
<section>
<?php $offerrequest = get_field('offer_request');?>
<div class="container">
    <div class="row">
    <div class="deptops">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="or">
                     <h2 class="h2-baslik-forms wow fade"><?php echo $offerrequest['form_title']; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
    <div class="dep2 ff">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $offerrequest['offer_form']; ?>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
</section>

<?php get_footer();?>