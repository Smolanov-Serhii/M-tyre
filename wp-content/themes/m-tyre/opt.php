<?php
/**
 * Template Name: Оптовикам
 *
 */

get_header();
if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs();
?>
    <section class="page block-container">
        <h1 class="section-title page__title page-title-h1">
            <?php the_title();?>
        </h1>
        <div class="page__subtitle">
            <p><?php echo the_field('podzagolovok_dlya_straniczy_optovikam', 831);?></p>
        </div>
        <div class="page__cases">
            <h3 class="page__cases-title">
                <?php the_field('zagolovok_dlya_kejsov', 831);?>
            </h3>
            <div class="page__cases-items">
            <?php
            if( have_rows('kejsy_optovikam', 831) ):
                while( have_rows('kejsy_optovikam', 831 ) ) : the_row();
                    $subimage = get_sub_field('ikonka_kejsa_optovikov', 831);
                    $subtitle = get_sub_field('zagolovok_kejsa_otpovikov', 831);
                    ?>

                        <div class="page__cases-item">
                            <div class="page__cases-img">
                                <img src="<?php echo $subimage?>" alt="<?php echo $subtitle?>">
                            </div>
                            <div class="page__cases-desc">
                                <p><?php echo $subtitle?></p>
                            </div>
                        </div>


                <?php
                endwhile;
            endif;
            ?>
            </div>
        </div>
        <div class="page__content">
            <?php the_content();?>
        </div>
    </section>
<?php
//get_sidebar();
get_footer();
