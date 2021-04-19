<?php
/**
 * Template Name: Гарантия
 *
 */

get_header();
?>

<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
    <section class="varanty block-container">
        <h1 class="varanty__title section-title page-title-h1">
            <?php the_title();?>
        </h1>
        <div class="varanty__content">
            <?php echo the_field('opisanie_pered_perechnem',357)?>
            <h3 class="varanty__list-title">
                <?php echo the_field('zagolovok_dlya_perechnya_povrezhdenij',357)?>
            </h3>
            <div class="varanty__list">
                <?php
                if( have_rows('perechen_povrezhdenij',357) ):
                    while( have_rows('perechen_povrezhdenij',357) ) : the_row();
                        $itemimage = get_sub_field('kartinka_povrezhdeniya',357);
                        $itemcontent = get_sub_field('opisanie_povrezhdeniya',357);
                        ?>
                        <div class="varanty__item">
                            <div class="varanty__item-content">
                                <p><?php echo $itemcontent;?></p>
                            </div>
                            <div class="varanty__item-img">
                                <?php if($itemimage){
                                    echo '<img src="' . $itemimage . '" alt="' . $itemcontent . '">';
                                } ?>

                            </div>
                        </div>
                    <?php
                    endwhile;
                else :
                endif;?>
            </div>
            <div class="varanty__after">
                <?php echo the_field('opisanie_posle_povrezhdenij',357)?>
            </div>
        </div>
    </section>

<?php
get_footer();