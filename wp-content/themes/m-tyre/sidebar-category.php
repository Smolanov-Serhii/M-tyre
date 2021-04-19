<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package m-tyre
 */

if ( ! is_active_sidebar( 'sidebar-category' ) ) {
    return;
}
?>
<div class="widget-area-fade"></div>
<aside id="secondary" class="widget-area">
    <div class="filter-close-btn">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0H40V40H0V0Z" fill="#001317"/>
            <path d="M12.3008 13.5435L13.5436 12.3006L27.2147 25.9718L25.9719 27.2146L12.3008 13.5435Z" fill="white"/>
            <path d="M13.5439 27.2148L12.3011 25.972L25.9722 12.3009L27.2151 13.5437L13.5439 27.2148Z" fill="white"/>
        </svg>
    </div>
    <?php dynamic_sidebar( 'sidebar-category' ); ?>
</aside><!-- #secondary -->
