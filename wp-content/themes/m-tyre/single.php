<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package m-tyre
 */

get_header();
if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs();
?>

	<section id="single-post" class="single-post block-container">
        <div class="single-post__content">
            <div class="single-post__image">
                <?php the_post_thumbnail('full');?>
            </div>
            <h1 class="single-post__title">
                <?php the_title() ?>
            </h1>
            <div class="single-post__date">
                <?php echo get_the_date();?>
            </div>
            <?php the_content();?>
        </div>

	</section>
    <section class="single-releated block-container">
        <h2 class="single-releated__title section-title">
            <?php the_field('nadpis_poslednie_publikaczii', 'options'); ?>
            <a href="<?php echo get_home_url(); ?>/news"><?php the_field('nadpis_vse_publikaczii', 'options'); ?>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6 12C6 11.8011 6.07902 11.6103 6.21967 11.4696C6.36032 11.329 6.55109 11.25 6.75 11.25L15.4395 11.25L12.219 8.03097C12.0782 7.89014 11.9991 7.69914 11.9991 7.49997C11.9991 7.30081 12.0782 7.1098 12.219 6.96897C12.3598 6.82814 12.5508 6.74902 12.75 6.74902C12.9492 6.74902 13.1402 6.82814 13.281 6.96897L17.781 11.469C17.8508 11.5386 17.9063 11.6214 17.9441 11.7125C17.9819 11.8036 18.0013 11.9013 18.0013 12C18.0013 12.0986 17.9819 12.1963 17.9441 12.2874C17.9063 12.3785 17.8508 12.4613 17.781 12.531L13.281 17.031C13.1402 17.1718 12.9492 17.2509 12.75 17.2509C12.5508 17.2509 12.3598 17.1718 12.219 17.031C12.0782 16.8901 11.9991 16.6991 11.9991 16.5C11.9991 16.3008 12.0782 16.1098 12.219 15.969L15.4395 12.75L6.75 12.75C6.55109 12.75 6.36032 12.671 6.21967 12.5303C6.07902 12.3896 6 12.1989 6 12Z" fill="#FF3A24"/>
                </svg>
            </a>
        </h2>
        <div class="single-releated__list swiper-container">
            <div class="single-releated__wrapper swiper-wrapper">
                <?php
                $args = array(
                    'numberposts' => 10,
                    'post_status' => 'publish',
                );

                $relposts = wp_get_recent_posts( $args );

                foreach( $relposts as $relpost ){
                    ?>
                    <div class="news__item swiper-slide">
                        <a href="<?php echo get_permalink($relpost['ID']) ?>" class="news__item-img">
                            <?php echo get_the_post_thumbnail($relpost["ID"],'new-item');?>
                        </a>
                        <a href="<?php echo get_permalink($relpost['ID']) ?>" class="news__permalink">
                            <h2 class="news__item-title"><?php echo $relpost['post_title'] ?></h2>
                        </a>
                        <div class="news__item-content">
                            <?php echo $relpost['post_excerpt'] ?>
                        </div>
                        <div class="news__item-bottom">
                            <div class="news__item-date">
                                <?php echo $relpost['post_date'] ?>
                            </div>
                            <div class="news__item-lnk">
                                <a href="<?php echo get_permalink($relpost['ID']) ?>"
                                   target="_blank"><?php the_field('nadpis_podrobnee', 'options'); ?></a>
                                <svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M-9.18105e-07 5.99997C-8.83326e-07 5.80106 0.0790169 5.61029 0.219669 5.46964C0.360322 5.32899 0.551087 5.24997 0.749999 5.24997L9.4395 5.24997L6.219 2.03097C6.07817 1.89014 5.99905 1.69914 5.99905 1.49997C5.99905 1.30081 6.07817 1.1098 6.219 0.968972C6.35983 0.828142 6.55084 0.749025 6.75 0.749025C6.94916 0.749025 7.14017 0.828142 7.281 0.968972L11.781 5.46897C11.8508 5.53864 11.9063 5.6214 11.9441 5.71252C11.9819 5.80364 12.0013 5.90132 12.0013 5.99997C12.0013 6.09862 11.9819 6.1963 11.9441 6.28742C11.9063 6.37854 11.8508 6.4613 11.781 6.53097L7.281 11.031C7.14017 11.1718 6.94916 11.2509 6.75 11.2509C6.55084 11.2509 6.35983 11.1718 6.219 11.031C6.07817 10.8901 5.99905 10.6991 5.99905 10.5C5.99905 10.3008 6.07817 10.1098 6.219 9.96897L9.4395 6.74997L0.749999 6.74997C0.551087 6.74997 0.360321 6.67095 0.219669 6.5303C0.0790168 6.38965 -9.52884e-07 6.19888 -9.18105e-07 5.99997Z"
                                          fill="#FF3A24"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class='swiper-pagination'></div>
        </div>
    </section>

<?php

get_footer();
