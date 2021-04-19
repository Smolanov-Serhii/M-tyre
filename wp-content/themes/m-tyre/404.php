<?php

/**
 * Template Name: 404
 *
 */

get_header();
?>

    <main id="primary" class="site-main">
        <article class="block-container">
            <section class="error-404 not-found">
                <h1 class="error-404__title"><?php echo the_field('zagolovok_straniczy_404', 818)?> <span>:(</span></h1>
                <div class="error-404__content">
                    <img class="error-404__img" src="<?php echo the_field('katrinka_dlya_straniczy_404', 818)?>" alt="<?php echo the_field('zagolovok_straniczy_404', 818)?>">
                </div>
                <div class="error-404__desc">
                    <?php echo the_field('opisanie_straniczi_404', 818)?>
                </div>
                <div class="error-404__back">
                    <a href="<?php echo the_field('ssylka_na_knopku_vernutsya_na_glavnuyu', 818)?>" class="error-404__lnk filtr_search_button"><?php echo the_field('nadpis_na_knopku_vernutsya_404', 818)?></a>
                </div>
            <section>
        </article>
    </main>

<?php
get_footer();
