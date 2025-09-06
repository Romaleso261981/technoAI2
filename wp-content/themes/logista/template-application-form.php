<?php
get_header('2');
/* Template Name: Application Form */
?>

<!--Application Form-->
<?php $aboutus_3D2 = get_field('3d_about_us2');?>
<section class="form4">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <p class="paragraf wow <?php echo $aboutus_3D2 ['right_text_about_effect'];?>" data-wow-delay="0.5s">
        <?php echo $aboutus_3D2 ['right_text_about'];?>
        </div>
    </div>
</div>
</section>
<div class="bosluk4"></div>

<?php get_footer();?>