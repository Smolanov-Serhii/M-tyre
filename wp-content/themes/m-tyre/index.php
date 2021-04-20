<?php
/**
 * Template Name: Главная
 *
 */

get_header();
global $woocommerce;
global $product;
?>

    <section class="main-slider">
        <div class="swiper-container">
            <ul class="main-slider__items swiper-wrapper">
                <?php
                $args = array(
                    'post_type' => 'main-slider',
                    'showposts' => "-1", //сколько показать статей
                    'orderby' => "data", //сортировка по дате
                    'caller_get_posts' => 1);
                $my_query = new wp_query($args);
                if ($my_query->have_posts()) {
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                        $post_id = get_the_ID();
                        $desc = get_field('opisanie_dlya_slajda', $post_id);
                        $bigimage = get_field('kartinka_bolshaya_dlya_slajda', $post_id);
                        $smallimage = get_field('kartinka_malenkaya_dlya_slajda', $post_id);
                        $link = get_field('ukazhite_ssylku_dlya_slajda', $post_id);
                        ?>
                        <li class="main-slider__item swiper-slide">
                            <picture>
                                <source media="(max-width: 500px)"
                                        srcset="<?php echo $smallimage;?>">
                                <img src="<?php echo $bigimage;?>" alt="<?php the_title();?>">
                            </picture>
                            <div class="main-slider__content block-container">
                                <div class="main-slider__item-title">
                                    <?php the_title();?>
                                </div>
                                <div class="main-slider__item-desc">
                                    <?php echo $desc;?>
                                </div>
                                <a class="main-slider__item-lnk dark-button" href="<?php echo $link?>" target="_blank">
                                    <?php echo the_field('nadpis_podrobnee', 'options');?>
                                </a>
                            </div>

                        </li>
                    <?php }
                }
                wp_reset_query(); ?>
            </ul>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.499999 7.99988C0.499999 7.71808 0.611941 7.44783 0.811198 7.24858C1.01046 7.04932 1.28071 6.93738 1.5625 6.93738L13.8726 6.93738L9.31025 2.37713C9.11074 2.17762 8.99866 1.90703 8.99866 1.62488C8.99866 1.34273 9.11074 1.07214 9.31025 0.872629C9.50976 0.67312 9.78035 0.561037 10.0625 0.561037C10.3446 0.561037 10.6152 0.67312 10.8148 0.872629L17.1897 7.24763C17.2887 7.34633 17.3672 7.46357 17.4208 7.59266C17.4743 7.72174 17.5019 7.86012 17.5019 7.99988C17.5019 8.13964 17.4743 8.27802 17.4208 8.4071C17.3672 8.53618 17.2887 8.65343 17.1897 8.75213L10.8147 15.1271C10.6152 15.3266 10.3446 15.4387 10.0625 15.4387C9.78035 15.4387 9.50976 15.3266 9.31025 15.1271C9.11074 14.9276 8.99865 14.657 8.99865 14.3749C8.99865 14.0927 9.11074 13.8221 9.31025 13.6226L13.8726 9.06238L1.5625 9.06238C1.28071 9.06238 1.01046 8.95044 0.811198 8.75118C0.61194 8.55192 0.499999 8.28167 0.499999 7.99988Z" fill="white"/>
                </svg>
            </div>
            <div class="swiper-button-prev">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5 8.00012C17.5 8.28192 17.3881 8.55217 17.1888 8.75142C16.9895 8.95068 16.7193 9.06262 16.4375 9.06262L4.12738 9.06262L8.68975 13.6229C8.88926 13.8224 9.00134 14.093 9.00134 14.3751C9.00134 14.6573 8.88926 14.9279 8.68975 15.1274C8.49024 15.3269 8.21965 15.439 7.9375 15.439C7.65535 15.439 7.38476 15.3269 7.18525 15.1274L0.81025 8.75237C0.711304 8.65367 0.6328 8.53643 0.579238 8.40734C0.525674 8.27826 0.498101 8.13988 0.498101 8.00012C0.498101 7.86037 0.525674 7.72198 0.579238 7.5929C0.6328 7.46382 0.711304 7.34657 0.81025 7.24787L7.18525 0.872872C7.38476 0.673364 7.65535 0.561281 7.9375 0.561281C8.21965 0.561281 8.49024 0.673364 8.68975 0.872873C8.88926 1.07238 9.00134 1.34297 9.00134 1.62512C9.00134 1.90727 8.88926 2.17786 8.68975 2.37737L4.12738 6.93762L16.4375 6.93762C16.7193 6.93762 16.9895 7.04956 17.1888 7.24882C17.3881 7.44808 17.5 7.71833 17.5 8.00012Z" fill="white"/>
                </svg>
            </div>
        </div>
        <div class="main-filter">
            <div class="main-filter__container">
                <div class="main-filter__tabs">
                    <div class="main-filter__tabs-header active" data-id="shini">
                        <div class="contaner">
                            <span class="main-filter__tabs-pc">
<!--                            --><?php //the_field('nadpis_shiny','options')?>
                                <?php the_field('nadpis_podobrat_shiny','options')?>
                        </span>
                            <span class="main-filter__tabs-mob">
                            <?php the_field('nadpis_podobrat_shiny','options')?>
                        </span>
                            <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect class="vert" x="10.5" width="2" height="23" fill="#FF3A24"/>
                                <rect class="hor" y="12.5" width="2" height="23" transform="rotate(-90 0 12.5)" fill="#FF3A24"/>
                            </svg>
                        </div>
                        <div class="main-filter__tab-mob"></div>
                    </div>
                    <div class="main-filter__tabs-header" data-id="diski">
                        <div class="contaner">
                            <span class="main-filter__tabs-pc">
                            <?php the_field('nadpis_diski','options')?>
                        </span>
                            <span class="main-filter__tabs-mob">
                            <?php the_field('nadpis_podobrat_diski','options')?>
                        </span>
                            <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect class="vert" x="10.5" width="2" height="23" fill="#FF3A24"/>
                                <rect class="hor" y="12.5" width="2" height="23" transform="rotate(-90 0 12.5)" fill="#FF3A24"/>
                            </svg>
                        </div>
                        <div class="main-filter__tab-mob"></div>
                    </div>
                </div>
                <div class="main-filter__radio">
                    <label class="first-select">
                        <input type="radio" name="form-shini-radio" value="form-shini-radio-param" id-data="form-shini-radio-param" checked>
                        <span>По параметрам</span>
                    </label>
                    <label>
                        <input type="radio" name="form-shini-radio" value="form-shini-radio-avto" id-data="form-shini-radio-avto">
                        <span>По автомобилю</span>
                    </label>
                </div>
                <div class="main-filter__tab-content">
                    <form role="search" method="get" class="form-shini-param form-shini-radio-param" name="form-shini-param" action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="main-filter__tab-item po-atributam">
                            <input style="display: none;" type="search"
                                   id="woocommerce-product-search-field-<?php echo isset($index) ? absint($index) : 0; ?>"
                                   class="search-field"
                                   placeholder="<?php echo esc_attr__('Search products&hellip;', 'woocommerce'); ?>" value=""
                                   name="s"/>
                            <div class="row s-fast-search__row justify-content-center">
                                <div class="col-md-12">
                                    <?php
                                    $shirina = wp_dropdown_categories("taxonomy=pa_shirina&echo=0&show_option_none=Ширина&name=shirina");
                                    ?>
                                    <label>Ширина</label>
                                    <div> <?php echo $shirina; ?></div>
                                </div>
                                <div class="col-md-12">
                                    <?php
                                    $profil = wp_dropdown_categories("taxonomy=pa_profil&echo=0&show_option_none=Профиль&name=profil");
                                    ?>
                                    <label>Профиль</label>
                                    <div><?php echo $profil; ?></div>
                                </div>
                                <div class="col-md-12">
                                    <?php
                                    $radius = wp_dropdown_categories("taxonomy=pa_radius&echo=0&show_option_none=Радиус&name=radius");
                                    ?>
                                    <label>Радиус</label>
                                    <div><?php echo $radius; ?></div>
                                </div>
                                <div class="col-md-12">
                                    <?php
                                    $indeksnagruzki = wp_dropdown_categories("taxonomy=pa_indeks-nagruzki&echo=0&show_option_none=Индекс нагрузки&name=indeks-nagruzki");
                                    ?>
                                    <label>Индекс нагрузки</label>
                                    <div><?php echo $indeksnagruzki; ?></div>
                                </div>
                                <!--                    <div class="col-md-12">-->
                                <!--                        --><?php //$dropdowncats = wp_dropdown_categories(
                                //                            'hide_empty=0&depth=1&orderby=name&order=ASC&selected='.$_GET['product_cat'].'&hierarchical=1&echo=0&taxonomy=product_cat&show_option_none=Все категории'
                                //                        ); ?>
                                <!--                        <label>Категории</label>-->
                                <!--                        <div>--><?php //echo $dropdowncats; ?><!--</div>-->
                                <!--                    </div>-->
                            </div>
                        </div>
                        <div class="main-filter__tab-item po-avto">
                            <input style="display: none;" type="search"
                                   id="woocommerce-product-search-field-<?php echo isset($index) ? absint($index) : 1; ?>"
                                   class="search-field"
                                   placeholder="<?php echo esc_attr__('Search products&hellip;', 'woocommerce'); ?>" value=""
                                   name="s"/>
                            <div class="row s-fast-search__row justify-content-center">
                                <div class="col-md-12">
                                    <?php
                                    $proizvoditel = wp_dropdown_categories("taxonomy=pa_proizvoditel&echo=0&show_option_none=Производитель&name=proizvoditel");
                                    ?>
                                    <label>Производитель</label>
                                    <div> <?php echo $proizvoditel; ?></div>
                                </div>
                                <div class="col-md-12">
                                    <?php
                                    $sezonnost = wp_dropdown_categories("taxonomy=pa_sezonnost&echo=0&show_option_none=Сезонность&name=sezonnost");
                                    ?>
                                    <label>Сезонность</label>
                                    <div><?php echo $sezonnost; ?></div>
                                </div>
                                <div class="col-md-12">
                                    <?php
                                    $indeksskorosti = wp_dropdown_categories("taxonomy=pa_indeks-skorosti&echo=0&show_option_none=Индекс скорости&name=indeks-skorosti");
                                    ?>
                                    <label>Индекс скорости</label>
                                    <div><?php echo $indeksskorosti; ?></div>
                                </div>
                                <div class="col-md-12">
                                    <?php
                                    $shipy = wp_dropdown_categories("taxonomy=pa_shipy&echo=0&show_option_none=Шипованность&name=shipy");
                                    ?>
                                    <label>Шипы</label>
                                    <div><?php echo $shipy; ?></div>
                                </div>
                                <!--                    <div class="col-md-12">-->
                                <!--                        --><?php //$dropdowncats = wp_dropdown_categories(
                                //                            'hide_empty=0&depth=1&orderby=name&order=ASC&selected='.$_GET['product_cat'].'&hierarchical=1&echo=0&taxonomy=product_cat&show_option_none=Все категории'
                                //                        ); ?>
                                <!--                        <label>Категории</label>-->
                                <!--                        <div>--><?php //echo $dropdowncats; ?><!--</div>-->
                                <!--                    </div>-->
                            </div>
                            <input type="hidden" name="post_type" value="product"/>
                        </div>
                        <button type="submit" class="filtr_search_button"
                                value="<?php echo esc_attr_x('Search', 'submit button', 'woocommerce'); ?>">Подобрать
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="partners block-container">
        <div class="partners__container swiper-container">
            <div class="partners__wrapper swiper-wrapper ">
                <?php
                if( have_rows('blokslogotipami', 78) ):
                    while( have_rows('blokslogotipami', 78) ) : the_row();
                        $subimage = get_sub_field('izobrazhenie_dlya_logotipa', 78);
                        ?>
                        <div class="partners__item swiper-slide">
                            <img src="<?php echo $subimage;?>">
                        </div>
                    <?php
                    endwhile;
                endif;
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <section class="promotions block-container">
        <a href="<?php the_field('ssylka_na_knopku_vse_akczii', 78);?>" class="promotions__lnk-mob">
            <span><?php the_field('nadpis_vse_akczii', 'options');?></span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6 12C6 11.8011 6.07902 11.6103 6.21967 11.4696C6.36032 11.329 6.55109 11.25 6.75 11.25L15.4395 11.25L12.219 8.03097C12.0782 7.89014 11.9991 7.69914 11.9991 7.49997C11.9991 7.30081 12.0782 7.1098 12.219 6.96897C12.3598 6.82814 12.5508 6.74902 12.75 6.74902C12.9492 6.74902 13.1402 6.82814 13.281 6.96897L17.781 11.469C17.8508 11.5386 17.9063 11.6214 17.9441 11.7125C17.9819 11.8036 18.0013 11.9013 18.0013 12C18.0013 12.0986 17.9819 12.1963 17.9441 12.2874C17.9063 12.3785 17.8508 12.4613 17.781 12.531L13.281 17.031C13.1402 17.1718 12.9492 17.2509 12.75 17.2509C12.5508 17.2509 12.3598 17.1718 12.219 17.031C12.0782 16.8901 11.9991 16.6991 11.9991 16.5C11.9991 16.3008 12.0782 16.1098 12.219 15.969L15.4395 12.75L6.75 12.75C6.55109 12.75 6.36032 12.671 6.21967 12.5303C6.07902 12.3896 6 12.1989 6 12Z" fill="#FF3A24"/>
            </svg>
        </a>
        <h2 class="promotions__title section-title">
            <?php the_field('zagolovok_bloka_akczii', 78);?>
            <a href="<?php the_field('ssylka_na_knopku_vse_akczii', 78);?>" class="promotions__lnk">
                <span><?php the_field('nadpis_vse_akczii', 'options');?></span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6 12C6 11.8011 6.07902 11.6103 6.21967 11.4696C6.36032 11.329 6.55109 11.25 6.75 11.25L15.4395 11.25L12.219 8.03097C12.0782 7.89014 11.9991 7.69914 11.9991 7.49997C11.9991 7.30081 12.0782 7.1098 12.219 6.96897C12.3598 6.82814 12.5508 6.74902 12.75 6.74902C12.9492 6.74902 13.1402 6.82814 13.281 6.96897L17.781 11.469C17.8508 11.5386 17.9063 11.6214 17.9441 11.7125C17.9819 11.8036 18.0013 11.9013 18.0013 12C18.0013 12.0986 17.9819 12.1963 17.9441 12.2874C17.9063 12.3785 17.8508 12.4613 17.781 12.531L13.281 17.031C13.1402 17.1718 12.9492 17.2509 12.75 17.2509C12.5508 17.2509 12.3598 17.1718 12.219 17.031C12.0782 16.8901 11.9991 16.6991 11.9991 16.5C11.9991 16.3008 12.0782 16.1098 12.219 15.969L15.4395 12.75L6.75 12.75C6.55109 12.75 6.36032 12.671 6.21967 12.5303C6.07902 12.3896 6 12.1989 6 12Z" fill="#FF3A24"/>
                </svg>
            </a>
        </h2>
        <div class="promotions__container swiper-container">
            <div class="promotions__wrapper swiper-wrapper">
                <?php
                $args = array(
                    'post_type' => 'akcii',
                    'showposts' => "5", //сколько показать статей
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
                        ?>
                        <a href="<?php the_permalink();?>" class="promotions__item swiper-slide">
                            <img src="<?php echo $image?>" alt="<?php echo $title?>">
                                 <div class="promotions__content">
                                     <div class="promotions__item-title" style="color: <?php echo $titlecolor?>;">
                                         <?php echo $title?>
                                     </div>
                                     <div class="promotions__item-subtitle" style="color: <?php echo $subtitlecolor?>;">
                                         <?php echo $subtitle?>
                                     </div>
                                 </div>
                        </a>
                    <?php }
                }
                wp_reset_query(); ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <section class="pluses">
        <div class="pluses__container block-container">
            <h2 class="pluses__title section-title">
                <?php the_field('zagolovok_dlya_bloka_nashi_preimushhestva', 78);?>
            </h2>
            <div class="pluses__list">
                <?php
                if( have_rows('perechen_preimushhestv', 78) ):
                    while( have_rows('perechen_preimushhestv', 78) ) : the_row();
                        $plusimage = get_sub_field('kartinka_dlya_preimushhestva', 78);
                        $plusdesc = get_sub_field('opisanie_preimushhestva', 78);
                        ?>
                        <div class="pluses__item">
                            <div class="pluses__img">
                                <img src="<?php echo $plusimage;?>" alt="<?php echo $plusdesc;?>">
                            </div>
                            <div class="pluses__content">
                                <?php echo $plusdesc;?>
                            </div>
                        </div>

                    <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </section>
    <section class="bestsellers">
        <div class="bestsellers__container block-container">
            <h2 class="bestsellers__title section-title">
                <?php the_field('zagolovok_dlya_hity_prodazh', 78);?>
                <a href="<?php echo get_home_url(); ?>/shop" class="promotions__lnk">
                    <span><?php the_field('nadpis_vse_tovary', 'options');?></span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 12C6 11.8011 6.07902 11.6103 6.21967 11.4696C6.36032 11.329 6.55109 11.25 6.75 11.25L15.4395 11.25L12.219 8.03097C12.0782 7.89014 11.9991 7.69914 11.9991 7.49997C11.9991 7.30081 12.0782 7.1098 12.219 6.96897C12.3598 6.82814 12.5508 6.74902 12.75 6.74902C12.9492 6.74902 13.1402 6.82814 13.281 6.96897L17.781 11.469C17.8508 11.5386 17.9063 11.6214 17.9441 11.7125C17.9819 11.8036 18.0013 11.9013 18.0013 12C18.0013 12.0986 17.9819 12.1963 17.9441 12.2874C17.9063 12.3785 17.8508 12.4613 17.781 12.531L13.281 17.031C13.1402 17.1718 12.9492 17.2509 12.75 17.2509C12.5508 17.2509 12.3598 17.1718 12.219 17.031C12.0782 16.8901 11.9991 16.6991 11.9991 16.5C11.9991 16.3008 12.0782 16.1098 12.219 15.969L15.4395 12.75L6.75 12.75C6.55109 12.75 6.36032 12.671 6.21967 12.5303C6.07902 12.3896 6 12.1989 6 12Z" fill="#FF3A24"/>
                    </svg>
                </a>
            </h2>
            <div class="bestsellers__list">
                <?php echo do_shortcode('[products limit="5" visibility="featured" ]');?>
            </div>
        </div>
    </section>
    <section class="new">
        <div class="new__container block-container">
            <h2 class="new__title section-title">
                <?php the_field('zagolovok_dlya_novye_postupleniya', 78);?>
                <a href="<?php echo get_home_url(); ?>/shop" class="promotions__lnk">
                    <span><?php the_field('nadpis_vse_tovary', 'options');?></span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 12C6 11.8011 6.07902 11.6103 6.21967 11.4696C6.36032 11.329 6.55109 11.25 6.75 11.25L15.4395 11.25L12.219 8.03097C12.0782 7.89014 11.9991 7.69914 11.9991 7.49997C11.9991 7.30081 12.0782 7.1098 12.219 6.96897C12.3598 6.82814 12.5508 6.74902 12.75 6.74902C12.9492 6.74902 13.1402 6.82814 13.281 6.96897L17.781 11.469C17.8508 11.5386 17.9063 11.6214 17.9441 11.7125C17.9819 11.8036 18.0013 11.9013 18.0013 12C18.0013 12.0986 17.9819 12.1963 17.9441 12.2874C17.9063 12.3785 17.8508 12.4613 17.781 12.531L13.281 17.031C13.1402 17.1718 12.9492 17.2509 12.75 17.2509C12.5508 17.2509 12.3598 17.1718 12.219 17.031C12.0782 16.8901 11.9991 16.6991 11.9991 16.5C11.9991 16.3008 12.0782 16.1098 12.219 15.969L15.4395 12.75L6.75 12.75C6.55109 12.75 6.36032 12.671 6.21967 12.5303C6.07902 12.3896 6 12.1989 6 12Z" fill="#FF3A24"/>
                    </svg>
                </a>
            </h2>
            <div class="new__list">

                <?php echo do_shortcode('[recent_products per_page="5" columns="4"]');?>
            </div>
        </div>
    </section>

    <?php get_template_part('inc/about'); ?>  <!-- Блок про компанию -->
<?php
get_footer();
?>

