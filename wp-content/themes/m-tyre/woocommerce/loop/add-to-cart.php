<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

echo apply_filters(
	'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
	sprintf(
		'<a href="%s" data-quantity="%s" class="%s" %s>%s
                    <svg class="rec" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" fill="#001317"/>
                        <path d="M29.822 15.431C29.73 15.2981 29.6072 15.1894 29.464 15.1144C29.3209 15.0393 29.1616 15.0001 29 15H15.333L14.179 12.23C14.0277 11.8652 13.7715 11.5536 13.4428 11.3346C13.1142 11.1156 12.7279 10.9992 12.333 11H10V13H12.333L17.077 24.385C17.153 24.5672 17.2812 24.7228 17.4454 24.8322C17.6097 24.9416 17.8026 25 18 25H26C26.417 25 26.79 24.741 26.937 24.352L29.937 16.352C29.9937 16.2006 30.0129 16.0378 29.9928 15.8774C29.9728 15.717 29.9142 15.5638 29.822 15.431V15.431Z" fill="white"/>
                        <path d="M18.5 29C19.3284 29 20 28.3284 20 27.5C20 26.6716 19.3284 26 18.5 26C17.6716 26 17 26.6716 17 27.5C17 28.3284 17.6716 29 18.5 29Z" fill="white"/>
                        <path d="M25.5 29C26.3284 29 27 28.3284 27 27.5C27 26.6716 26.3284 26 25.5 26C24.6716 26 24 26.6716 24 27.5C24 28.3284 24.6716 29 25.5 29Z" fill="white"/>
                    </svg>
                </a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( '')
	),
	$product,
	$args
);

?>

