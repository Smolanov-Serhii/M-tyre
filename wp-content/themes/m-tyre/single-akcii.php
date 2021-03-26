<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package m-tyre
 */

get_header();
$post_id = get_the_ID();
?>
<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
    <div class="single-akciya__image block-container">
        <div class="single-akciya__image-wrapper">
            <?php the_post_thumbnail('full');?>
        </div>
    </div>
    <section class="single-akciya block-container">
        <h1 class="section-title page-title-h1">
            <?php the_title();?>
        </h1>
        <span class="akcii__date single-akciya__date"><?php echo the_field('nadpis_srok_dejstviya_akczii','options')?><span><?php echo the_field('nadpis_do','options');?>&nbsp<?php echo the_field('data_okonchaniya_akczii');?></span></span>
        <div class="single-akciya__content">
            <?php the_content();?>
        </div>
    </section>
<?php
get_footer();
