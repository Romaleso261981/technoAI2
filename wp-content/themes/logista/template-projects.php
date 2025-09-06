<?php
get_header('2');
/* Template Name: Projects */
?>

<!--Projects-->
<section class="sectionbars">
<?php $servicessection = get_field('projects_section');?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="h2-baslik-anasayfa-wtbb wow fade"><?php echo $servicessection ['title'];?></h2>
            <p class="services-kutu2--wtbb wow fade animated" style="visibility: visible;">
            <?php echo $servicessection ['text'];?>
            </p>
            <div class="bosluk3"></div>
        </div>
    </div>
</div>
</section>
<section class="serviceb-alani wow animated fadeInUp animated" data-wow-delay="0.5s">
    <div class="container">  
        <div class="row">
            <?php if( have_rows('projects') ): ?>
            <?php while( have_rows('projects') ): the_row();
            //vars
            $image = get_sub_field('image');
            $effect = get_sub_field('effect');
            $duration = get_sub_field('duration');
            $link = get_sub_field('link');
            $buttontext = get_sub_field('button_text');
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
                            <a class="btn-5" href="<?php echo $link; ?>"><p class="btnn2"><?php echo $buttontext; ?></p></a>
                        </div>
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

<?php get_footer(); ?>