<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package m-tyre
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;500;600;700;900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="main-page" class="main-page">

	<header id="header" class="header">
        <div class="header__container block-container-full">
            <div class="header__brending">
                <?php
                    if ( is_front_page() && is_home() ) :
                        ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php
                    else :
                        ?>
                        <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php the_custom_logo(); ?></a>
                    <?php
                    endif;
                ?>
<!--                <div class="header__location">-->
<!--                    <div class="location-desc">-->
<!--                        --><?php //echo the_field('nadpis_vash_gorod', 'options');?>
<!--                    </div>-->
<!--                    <select class="location__list">-->
<!--                        <option>Ташкент</option>-->
<!--                        <option>Ташкент</option>-->
<!--                        <option>Ташкент</option>-->
<!--                        <option>Ташкент</option>-->
<!--                        <option>Ташкент</option>-->
<!--                    </select>-->
<!--                </div>-->
            </div>
            <div class="header__navigate">
                <div class="header__pages padding-part">
                    <div class="header__contacts">
                        <a href="tel:<?php echo the_field('telefon', 'options');?>">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 12.5C15.75 12.5 14.55 12.3 13.43 11.93C13.2542 11.874 13.0664 11.8667 12.8868 11.909C12.7072 11.9513 12.5424 12.0415 12.41 12.17L10.21 14.37C7.37119 12.9262 5.06378 10.6188 3.62 7.78L5.82 5.57C5.95245 5.44434 6.04632 5.28352 6.0906 5.1064C6.13488 4.92928 6.12773 4.7432 6.07 4.57C5.69065 3.41806 5.49821 2.2128 5.5 1C5.5 0.45 5.05 0 4.5 0H1C0.45 0 0 0.45 0 1C0 10.39 7.61 18 17 18C17.55 18 18 17.55 18 17V13.5C18 12.95 17.55 12.5 17 12.5ZM16 9H18C18 6.61305 17.0518 4.32387 15.364 2.63604C13.6761 0.948211 11.3869 0 9 0V2C12.87 2 16 5.13 16 9ZM12 9H14C14 6.24 11.76 4 9 4V6C10.66 6 12 7.34 12 9Z" fill="#FF3A24"/>
                            </svg>
                            <?php echo the_field('telefon', 'options');?>
                        </a>
                        <div class="js_back_call"><?php echo the_field('nadpis_obratnyj_zvonok', 'options');?></div>
                    </div>
                    <nav class="peges-nav">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'page-menu',
                                'menu_id'        => 'page-menu',
                            )
                        );
                        ?>
                    </nav>
                    <nav class="icon-nav">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'page-icon',
                                'menu_id'        => 'page-icon',
                            )
                        );
                        ?>
                    </nav>
                </div>
                <div class="header__market padding-part">
                    <nav class="market-nav">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'market-menu',
                                'menu_id'        => 'market-menu',
                            )
                        );
                        ?>
                    </nav>
                    <div class="header__search">
                        <form action="<?php bloginfo('url'); ?>" method="get">
                            <input type="text" name="s" placeholder="<?php echo the_field('nadpis_poisk', 'options');?>" value="<?php if (!empty($_GET['s'])) {
                                echo $_GET['s'];
                            } ?>"/>
                            <label for="batton-submit">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.71 16.29L14.31 12.9C15.407 11.5025 16.0022 9.77666 16 8C16 6.41775 15.5308 4.87103 14.6518 3.55544C13.7727 2.23985 12.5233 1.21447 11.0615 0.608967C9.59966 0.00346625 7.99113 -0.15496 6.43928 0.153721C4.88743 0.462403 3.46197 1.22433 2.34315 2.34315C1.22433 3.46197 0.462403 4.88743 0.153721 6.43928C-0.15496 7.99113 0.00346625 9.59966 0.608967 11.0615C1.21447 12.5233 2.23985 13.7727 3.55544 14.6518C4.87103 15.5308 6.41775 16 8 16C9.77666 16.0022 11.5025 15.407 12.9 14.31L16.29 17.71C16.383 17.8037 16.4936 17.8781 16.6154 17.9289C16.7373 17.9797 16.868 18.0058 17 18.0058C17.132 18.0058 17.2627 17.9797 17.3846 17.9289C17.5064 17.8781 17.617 17.8037 17.71 17.71C17.8037 17.617 17.8781 17.5064 17.9289 17.3846C17.9797 17.2627 18.0058 17.132 18.0058 17C18.0058 16.868 17.9797 16.7373 17.9289 16.6154C17.8781 16.4936 17.8037 16.383 17.71 16.29ZM2 8C2 6.81332 2.3519 5.65328 3.01119 4.66658C3.67047 3.67989 4.60755 2.91085 5.7039 2.45673C6.80026 2.0026 8.00666 1.88378 9.17055 2.11529C10.3344 2.3468 11.4035 2.91825 12.2426 3.75736C13.0818 4.59648 13.6532 5.66558 13.8847 6.82946C14.1162 7.99335 13.9974 9.19975 13.5433 10.2961C13.0892 11.3925 12.3201 12.3295 11.3334 12.9888C10.3467 13.6481 9.18669 14 8 14C6.4087 14 4.88258 13.3679 3.75736 12.2426C2.63214 11.1174 2 9.5913 2 8Z" fill="#E5E7E8"/>
                                </svg>
                                <input id="batton-submit" type="submit" value="Найти"/>
                            </label>
                        </form>
                    </div>
                    <div class="header__woo">
                        <?php
                        if (class_exists('WooCommerce')) {
                            global $woocommerce; ?>
                            <a href="<?php echo $woocommerce->cart->get_cart_url() ?>" class="fix_cart_btn fz_an">
                        <span class="basket-btn__label">
                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.822 4.431C19.73 4.29808 19.6072 4.18943 19.464 4.11436C19.3209 4.0393 19.1616 4.00006 19 4H5.333L4.179 1.23C4.02769 0.865226 3.77147 0.553593 3.44282 0.334615C3.11418 0.115638 2.72791 -0.00082104 2.333 4.35724e-06H0V2H2.333L7.077 13.385C7.15299 13.5672 7.28118 13.7228 7.44542 13.8322C7.60967 13.9416 7.80263 14 8 14H16C16.417 14 16.79 13.741 16.937 13.352L19.937 5.352C19.9937 5.20063 20.0129 5.03776 19.9928 4.87735C19.9728 4.71695 19.9142 4.56379 19.822 4.431Z" fill="#001317"/>
                                <path d="M8.5 18C9.32843 18 10 17.3284 10 16.5C10 15.6716 9.32843 15 8.5 15C7.67157 15 7 15.6716 7 16.5C7 17.3284 7.67157 18 8.5 18Z" fill="#001317"/>
                                <path d="M15.5 18C16.3284 18 17 17.3284 17 16.5C17 15.6716 16.3284 15 15.5 15C14.6716 15 14 15.6716 14 16.5C14 17.3284 14.6716 18 15.5 18Z" fill="#001317"/>
                            </svg>
                            <span class="fix_cart_count"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
                        </span>
                                <?php
                                $currency_symbol = html_entity_decode(get_woocommerce_currency_symbol());
                                ?>
                                <span class="fix_cart_total"><?php echo sprintf($woocommerce->cart->cart_contents_total);
                                    echo $currency_symbol; ?></span>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
	</header><!-- #masthead -->
