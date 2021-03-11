<section class="mailing">
    <div class="mailing__container block-container">
        <div class="mailing__content">
            <h2 class="mailing__title">
                <?php the_field('zagolovok_dlya_bloka_rassylka', 78);?>
            </h2>
            <div class="mailing__subtitle">
                <?php the_field('podzagolovok_dlya_bloka_podpisatsya_na_rassylku', 78);?>
            </div>
        </div>
        <div class="mailing__form">
            <?php if ( is_active_sidebar( 'sidebar_mailing' ) ) : ?>
                <div id="mailing" class="mailing">
                    <?php dynamic_sidebar( 'sidebar_mailing' ); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>