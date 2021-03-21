<?php
/**
 * Template Name: Оплата
 *
 */

get_header();
?>

<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
<section class="pay block-container">
    <h1 class="pay__title section-title">
        <?php the_title();?>
    </h1>
    <div class="pay__content">
        <?php
        while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content', 'pay' );

        endwhile; // End of the loop.
        ?>
        <div class="pay__list">
            <?php
            if( have_rows('zapisi_dostavka_i_oplata') ):
                while( have_rows('zapisi_dostavka_i_oplata') ) : the_row();
                    $itemimage = get_sub_field('kartinka_zapisi_oplatydostavki');
                    $itemtitle = get_sub_field('zagolovok_dlya_zapisi_dostavkaoplata');
                    $itemcontent = get_sub_field('opisanie_dlya_bloka_dostavkaoplata');
                    ?>
                        <div class="pay__item">
                            <div class="pay__item-header">
                                <img src="<?php echo $itemimage;?>" alt="<?php echo $itemtitle;?>">
                                <h2 class="pay__item-title">
                                    <?php echo $itemtitle;?>
                                </h2>
                            </div>
                            <div class="pay__item-content">
                                <?php echo $itemcontent;?>
                            </div>
                        </div>
                    <?php
                endwhile;
            else :
            endif;?>
        </div>
    </div>
</section>

<?php
get_footer();