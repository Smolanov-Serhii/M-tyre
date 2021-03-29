<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form class="woocommerce-ordering" method="get">
	<select name="orderby" class="orderby" aria-label="<?php esc_attr_e( 'Shop order', 'woocommerce' ); ?>">
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php endforeach; ?>
	</select>
	<input type="hidden" name="paged" value="1" />
	<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
</form>
</div>
<div class="custom-sale swiper-container">
    <div class="custom-sale__wrapper swiper-wrapper">
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
                ?>
                <a href="<?php the_permalink();?>" class="custom-sale__item swiper-slide">
                    <img src="<?php echo $image?>" alt="<?php echo $title?>">
                    <div class="custom-sale__content">
                        <div class="custom-sale__item-title" style="color: <?php echo $titlecolor?>;">
                            <?php echo $title?>
                        </div>
                        <div class="custom-sale__item-subtitle" style="color: <?php echo $subtitlecolor?>;">
                            <?php echo $subtitle?>
                        </div>
                    </div>
                </a>
            <?php }
        }
        wp_reset_query(); ?>
    </div>
    <div class="custom-sale__nav">
        <div class="custom-sale__prev">
            <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.3" width="56" height="56" fill="#001317"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M36.5 28.0001C36.5 28.2819 36.3881 28.5522 36.1888 28.7514C35.9895 28.9507 35.7193 29.0626 35.4375 29.0626L23.1274 29.0626L27.6898 33.6229C27.8893 33.8224 28.0013 34.093 28.0013 34.3751C28.0013 34.6573 27.8893 34.9279 27.6898 35.1274C27.4902 35.3269 27.2196 35.439 26.9375 35.439C26.6554 35.439 26.3848 35.3269 26.1852 35.1274L19.8102 28.7524C19.7113 28.6537 19.6328 28.5364 19.5792 28.4073C19.5257 28.2783 19.4981 28.1399 19.4981 28.0001C19.4981 27.8604 19.5257 27.722 19.5792 27.5929C19.6328 27.4638 19.7113 27.3466 19.8103 27.2479L26.1853 20.8729C26.3848 20.6734 26.6554 20.5613 26.9375 20.5613C27.2196 20.5613 27.4902 20.6734 27.6898 20.8729C27.8893 21.0724 28.0013 21.343 28.0013 21.6251C28.0013 21.9073 27.8893 22.1779 27.6898 22.3774L23.1274 26.9376L35.4375 26.9376C35.7193 26.9376 35.9895 27.0496 36.1888 27.2488C36.3881 27.4481 36.5 27.7183 36.5 28.0001Z" fill="white"/>
            </svg>
        </div>
        <div class="custom-sale__next">
            <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.3" x="56" y="56" width="56" height="56" transform="rotate(180 56 56)" fill="#001317"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5 27.9999C19.5 27.7181 19.6119 27.4478 19.8112 27.2486C20.0105 27.0493 20.2807 26.9374 20.5625 26.9374H32.8726L28.3102 22.3771C28.1107 22.1776 27.9987 21.907 27.9987 21.6249C27.9987 21.3427 28.1107 21.0721 28.3102 20.8726C28.5098 20.6731 28.7804 20.561 29.0625 20.561C29.3446 20.561 29.6152 20.6731 29.8148 20.8726L36.1898 27.2476C36.2887 27.3463 36.3672 27.4636 36.4208 27.5927C36.4743 27.7217 36.5019 27.8601 36.5019 27.9999C36.5019 28.1396 36.4743 28.278 36.4208 28.4071C36.3672 28.5362 36.2887 28.6534 36.1898 28.7521L29.8148 35.1271C29.6152 35.3266 29.3446 35.4387 29.0625 35.4387C28.7804 35.4387 28.5098 35.3266 28.3102 35.1271C28.1107 34.9276 27.9987 34.657 27.9987 34.3749C27.9987 34.0927 28.1107 33.8221 28.3102 33.6226L32.8726 29.0624H20.5625C20.2807 29.0624 20.0105 28.9504 19.8112 28.7512C19.6119 28.5519 19.5 28.2817 19.5 27.9999Z" fill="white"/>
            </svg>
        </div>
    </div>
</div>
