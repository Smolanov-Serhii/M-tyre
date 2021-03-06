<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package m-tyre
 */

get_header();
if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs();
?>
    <section class="page block-container">
        <h1 class="section-title page__title page-title-h1">
            <?php the_title();?>
        </h1>
        <div class="page__content">
            <?php the_content();?>
        </div>
    </section>
<?php
//get_sidebar();
get_footer();
