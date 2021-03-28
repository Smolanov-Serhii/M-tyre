<?php
/**
 * Template Name: Новости
 *
 */

get_header();
?>
<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
<section class="news block-container">
    <h1 class="news__title page-title-h1 section-title">
        <?php the_title(); ?>
    </h1>
    <div class="news__content">
        <div class="news__list">
            <?php
            /*
             * Template name: Моя галерея
             */
            $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $params = array(
                'posts_per_page' => 9, // количество постов на странице
                'post_type' => 'post', // тип постов
                'paged' => $current_page // текущая страница
            );
            query_posts($params);

            $wp_query->is_archive = true;
            $wp_query->is_home = false;

            while (have_posts()): the_post(); ?>
                <div class="news__item">
                    <a href="<?php the_permalink(); ?>" class="news__item-img">
                        <?php the_post_thumbnail('new-item'); ?>
                    </a>
                    <a href="<?php the_permalink(); ?>" class="news__permalink">
                        <h2 class="news__item-title"><?php the_title(); ?></h2>
                    </a>
                    <div class="news__item-content">
                        <?php the_excerpt(); ?>
                    </div>
                    <div class="news__item-bottom">
                        <div class="news__item-date">
                            <?php the_date(); ?>
                        </div>
                        <div class="news__item-lnk">
                            <a href="<?php the_permalink(); ?>"
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
            endwhile;
            ?>
        </div>
        <?php
        wp_pagenavi();
        ?>
    </div>
</section>
<?php
get_footer();
?>

