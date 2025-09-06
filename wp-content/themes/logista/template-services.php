<?php
get_header('2');
/* Template Name: Services */
?>

<main>
    <!--About Info Alanı-->
    <section class="hizmetlerr-bolumu">
    <div class="h-yazi-ozel h-yazi-margin-ozel">           
    </div>
    <div class="container">
    <div class="row">
        <div class="col">
                <div class="sidebar-service wow fadeInLeft" data-wow-delay="0.8s">          
                    <?php dynamic_sidebar('services-detail-widgets'); ?>
                </div> 
            <div class="bosluk3"></div>
            </div>
            <?php $servicescontent = get_field('services_content');?>

            <div class="col-lg-8">
            <div class="bosluk44"></div>
            <div class="galeri wow <?php echo $servicescontent ['image_effect'];?>" data-wow-delay="0.7s">
                <img src="<?php echo $servicescontent ['image'];?>" alt="IT Support Services" class="galeri__gorsel galeri__gorsel--3">
            </div>
            <div class="bosluk3"></div>
            <h2 class="h2-baslik-anasayfa-ozel wow fade"><?php echo $servicescontent ['title'];?></h2>
            <div class="bosluk333"></div>
            <p class="paragraf wow fade">
            <?php echo $servicescontent ['content'];?>
            </p>
                <div class="bosluk333"></div>
            <img class="divider" width="120" height="15" title="divider" alt="divider" src="<?php echo $servicescontent ['line_image'];?>">
            <div class="bosluk333"></div>
            <p class="paragraf wow fade">
            <?php echo $servicescontent ['content_2'];?>
            </p>
            <div class="bosluksv"></div>
            <div class="container">
                <div class="row">
            <?php if( have_rows('quality') ): ?>
                <?php while( have_rows('quality') ): the_row();
                //vars
                $icon = get_sub_field('icon');
                $title = get_sub_field('title');
                $text = get_sub_field('description');
                $effect = get_sub_field('effect');
                $duration = get_sub_field('duration');
                ?>
                <div class="col-lg-6">
                    <div class="dep2 infoe" data-tilt>
                        <div class="or">
                            <div class="icon"><i class="<?php echo $icon; ?>"></i></div>
                            <div class="bosluk333"></div>
                            <h3 class="businesss"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h3>
                            <?php echo $text; ?>
                            <div class="bosluk333"></div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>   
                    </div>
                <?php endif; ?> 
                </div>
        </div>
    </div>
</div>
    </section>
</main>

<?php get_footer();?>