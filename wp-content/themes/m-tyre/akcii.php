<?php
/**
 * Template Name: Акции
 *
 */

get_header();
?>
<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
<section class="akcii block-container">
    <h1 class="akcii__title section-title page-title-h1">
        <?php the_title();?>
    </h1>
    <div class="akcii__list">
        <?php
        $args = array(
            'post_type' => 'akcii',
            'showposts' => "-1", //сколько показать статей
            'orderby' => "menu_order", //сортировка по дате
            'caller_get_posts' => 1);
        $my_query = new wp_query($args);
        if ($my_query->have_posts()) {
            while ($my_query->have_posts()) {
                $my_query->the_post();
                $post_id = get_the_ID();
                $image = get_field('kartinka_dlya_akczii', $post_id);
                $title = get_field('zagolovok_dlya_opisaniya_akczii', $post_id);
                $titlecolor = get_field('czvet_dlya_zagolovka_opisaniya', $post_id);
                $subtitle = get_field('podzagolovokdlya_akczii', $post_id);
                $subtitlecolor = get_field('czvet_podzagolovka_akczii', $post_id);
                $date = get_field('data_okonchaniya_akczii', $post_id);
                ?>
                <a href="<?php the_permalink()?>" class="akcii__item">
                    <div class="akcii__img-lnk">
                        <img src="<?php echo $image?>" alt="<?php echo $title?>">
                        <div class="akcii__content">
                            <div class="akcii__item-title" style="color: <?php echo $titlecolor?>;">
                                <?php echo $title?>
                            </div>
                            <div class="akcii__item-subtitle" style="color: <?php echo $subtitlecolor?>;">
                                <?php echo $subtitle?>
                            </div>
                        </div>
                    </div>
                    <span class="akcii__date"><?php echo the_field('nadpis_srok_dejstviya_akczii','options')?><span><?php echo the_field('nadpis_do','options');?>&nbsp<?php echo $date;?></span></span>
                </a>
            <?php }
        }
        wp_reset_query(); ?>
    </div>
</section>
<?php
get_footer();
?>

