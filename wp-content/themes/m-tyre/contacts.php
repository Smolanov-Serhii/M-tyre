<?php
/**
 * Template Name: Контакты
 *
 */

get_header();
?>
<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
<section class="contacts block-container">
    <h1 class="contacts__title page-title-h1 section-title">
        <?php the_title();?>
    </h1>
    <div class="contacts__content">
        <div class="contacts__items">
            <div class="contacts__item contacts__location">
                <img src="<?php the_field('ikonkka_lokaczii','options');?>">
                <p><?php the_field('adress','options');?></p>
            </div>
            <a href="tel:<?php the_field('telefon','options');?>" class="contacts__item contacts__phone">
                <img src="<?php the_field('ikonkka_telefona','options');?>">
                <p><?php the_field('telefon','options');?></p>
            </a>
            <a href="mailto:<?php the_field('email','options');?>" class="contacts__item contacts__phone">
                <img src="<?php the_field('ikonkka_pochty','options');?>">
                <p><?php the_field('email','options');?></p>
            </a>
        </div>
        <div class="contacts__form">
            <?php echo do_shortcode('[contact-form-7 id="285" title="Написать нам"]')?>
        </div>
    </div>
</section>
<div class="contacts-map" id="map">

</div>
<?php
get_footer();
?>

