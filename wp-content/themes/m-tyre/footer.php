<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package m-tyre
 */

?>

    <?php get_template_part('inc/mailing'); ?>  <!-- Блок про компанию -->
	<footer id="footer" class="footer">
        <div class="footer__protector">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/foofter-protector.svg" alt="Футер протектор">
        </div>
        <div class="footer__container block-container">
            <div class="footer__top">
                <div class="footer__left">
                    <div class="footer__logo">
                        <?php
                        if ( is_front_page() && is_home() ) :
                            ?>
                            <div class="site-logo"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo-footer.svg" alt="Logo footer"></div>
                        <?php
                        else :
                            ?>
                            <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php the_custom_logo(); ?></a>
                        <?php
                        endif;
                        ?>
                    </div>
                    <div class="footer__socials">
                        <div class="footer__socials-title">
                            <?php echo the_field('nadpis_my_v_soczsetyah','options')?>
                        </div>
                        <div class="footer__socials-list">
                            <div class="footer__socials-item"><a href="<?php echo the_field('ssylka_na_telegram','options')?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/telegram-icon.svg" alt="Telegram"></a></div>
                            <div class="footer__socials-item"><a href="<?php echo the_field('ssylka_na_twitter','options')?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/twitter-icon.svg" alt="twittern"></a></div>
                            <div class="footer__socials-item"><a href="<?php echo the_field('ssylka_na_ok','options')?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/ok-icon.svg" alt="Однокласники"></a></div>
                            <div class="footer__socials-item"><a href="<?php echo the_field('ssylka_na_fb','options')?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/fb-icon.svg" alt="FaceBook"></a></div>
                            <div class="footer__socials-item"><a href="<?php echo the_field('ssylka_na_instagram','options')?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/insta-icon.svg" alt="Instagram"></a></div>
                        </div>
                    </div>
                </div>
                <div class="footer__nav">
                    <nav class="footer__pages-nav">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer-menu',
                                'menu_id'        => 'footer-menu',
                            )
                        );
                        ?>
                        <ul class="footer__pages-cont menu">
                            <li class="pointer-event menu-item">
                                <a href="#">Контакты</a>
                                <ul class="sub-menu">
                                    <li class="menu-item footer-adress"><?php the_field('adress','options')?></li>
                                    <li class="menu-item footer__phone"><a href="tel:<?php the_field('telefon','options')?>"><span>тел.:</span><?php the_field('telefon','options')?></a></li>
                                    <li class="menu-item footer__email"><a href="mailto:<?php the_field('email','options')?>"><span>эл. почта:</span><?php the_field('email','options')?></a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="footer__copyright">
                    Copyright 2009 - <?php echo date('Y'); ?> All rights reserved
                </div>
                <div class="footer__carts">
                    <div class="footer__carts-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/mastercard.svg" alt="Карта Mastercard"></div>
                    <div class="footer__carts-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/maestro.svg" alt="Карта Maestro"></div>
                    <div class="footer__carts-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/visa.svg" alt="Карта Visa"></div>
                </div>
                <div class="footer__design">
                    <a href="https://www.weblancer.net/users/Bazilevskyi/" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/baz.svg" alt="Дизайнер Базилевский Антон"></a>
                </div>
            </div>
        </div>
	</footer>
</div>
<div class="absolute-button">
    <div class="absolute-button__content">
        <div class="absolute-button__chat js-show-chat">
            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.5 16.6396H4.5V20.7206L9.601 16.6396H14.5C15.603 16.6396 16.5 15.7426 16.5 14.6396V6.63965C16.5 5.53665 15.603 4.63965 14.5 4.63965H2.5C1.397 4.63965 0.5 5.53665 0.5 6.63965V14.6396C0.5 15.7426 1.397 16.6396 2.5 16.6396Z" fill="white"/>
                <path d="M18.5 0.639648H6.5C5.397 0.639648 4.5 1.53665 4.5 2.63965H16.5C17.603 2.63965 18.5 3.53665 18.5 4.63965V12.6396C19.603 12.6396 20.5 11.7426 20.5 10.6396V2.63965C20.5 1.53665 19.603 0.639648 18.5 0.639648Z" fill="white"/>
            </svg>
            <span>
                    <?php the_field('nadpis_onlajn_konsultant','options');?>
                </span>
        </div>
        <div class="absolute-button__call js-show-call">
            <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.32667 15.0263C11.2467 18.7996 14.34 21.8796 18.1133 23.813L21.0467 20.8797C21.4067 20.5196 21.94 20.3996 22.4067 20.5596C23.9 21.053 25.5133 21.3196 27.1667 21.3196C27.9 21.3196 28.5 21.9196 28.5 22.653V27.3063C28.5 28.0396 27.9 28.6396 27.1667 28.6396C14.6467 28.6396 4.5 18.493 4.5 5.97298C4.5 5.23965 5.1 4.63965 5.83333 4.63965H10.5C11.2333 4.63965 11.8333 5.23965 11.8333 5.97298C11.8333 7.63965 12.1 9.23965 12.5933 10.733C12.74 11.1996 12.6333 11.7196 12.26 12.093L9.32667 15.0263Z" fill="#FF3A24"/>
            </svg>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" defer></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js" defer></script>
<script src="https://api-maps.yandex.ru/2.1/?apikey=d325ee9d-883e-46b0-a064-7900b7b320c5&lang=ru_RU" type="text/javascript" defer></script>
<script src="<?php echo get_template_directory_uri() ?>/dist/js/common.js" defer></script>
<?php wp_footer(); ?>

</body>
</html>
