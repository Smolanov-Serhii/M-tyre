<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
    <div class="checkout__left-column">
        <div class="checkout__person">

        </div>
        <div class="checkout__dostavka-select">
            <div class="checkout__title">
                <?php the_field('nadpis_sposob_polucheniya','options');?>
            </div>
        </div>
        <div class="checkout__adress">

        </div>
        <div class="checkout__pay-select">
            <div class="checkout__title">
                <?php the_field('nadpis_sposob_oplaty','options');?>
            </div>
        </div>
        <div class="checkout__description">

        </div>
        <div class="checkout__products">
            <div class="checkout__title">
                <?php the_field('nadpis_vash_zakaz','options');?>
            </div>
            <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0" id="custom_shop_table">
                <tbody>
                <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                <?php
                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                        ?>
                        <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                            <td class="product-thumbnail">
                                <?php
                                $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                if ( ! $product_permalink ) {
                                    echo $thumbnail; // PHPCS: XSS ok.
                                } else {
                                    printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                                }
                                ?>
                            </td>

                            <td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                                <?php
                                if ( ! $product_permalink ) {
                                    echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                } else {
                                    echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                }

                                do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                                // Meta data.
                                echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                                // Backorder notification.
                                if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                    echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                                }
                                $width = $_product->get_attribute('shirina');
                                $radius = $_product->get_attribute('radius');
                                $prof = $_product->get_attribute('profil');
                                $coef = $_product->get_attribute('indeks-nagruzki');
                                if ($width){
                                    $width = $width . '/';
                                }
                                if ($radius){
                                    $radius = ' R' . $radius;
                                }
                                if ($coef){
                                    $coef = $coef . 'T';
                                }

                                echo '<div class="options-item">' . $width . $prof . $radius . ' ' . $coef . '</div>';
                                $sku = $cart_item['data']->get_sku();
                                // Вывести артикул на странице корзины магазина
                                $arttitle = get_field('nadpis_kod','options');
                                if ($sku){
                                    echo '<span class="product-article">' . $arttitle . ' ' . $sku . '</span>';
                                }

                                ?>
                            </td>

                            <td class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                                <?php
                                echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>

                <?php do_action( 'woocommerce_cart_contents' ); ?>

                <tr>
                    <td colspan="6" class="actions" id="actions-group">
                        <div class="actions-group-wrapper">
                            <div class="cart-right-part">
                                <div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

                                    <?php do_action( 'woocommerce_before_cart_totals' ); ?>

                                    <!--                                <h2>--><?php //esc_html_e( 'Cart totals', 'woocommerce' ); ?><!--</h2>-->

                                    <table cellspacing="0" class="shop_table shop_table_responsive">

                                        <tr class="order-total">
                                            <th><?php the_field( 'nadpis_itogo_k_oplate', 'options' ); ?></th>
                                            <td data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
                                        </tr>

                                        <?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

                                    </table>

                                    <!--                                <div class="wc-proceed-to-checkout">-->
                                    <!--                                    --><?php //do_action( 'woocommerce_proceed_to_checkout' ); ?>
                                    <!--                                </div>-->

                                    <?php do_action( 'woocommerce_after_cart_totals' ); ?>

                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php do_action( 'woocommerce_after_cart_contents' ); ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="checkout__right-column">
        <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

        <div id="order_review" class="woocommerce-checkout-review-order">
            <?php do_action( 'woocommerce_checkout_order_review' ); ?>
        </div>

        <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
    </div>

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>

	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
