<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' );
    global $product;?>
	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0" id="custom_shop_table">
		<thead>
			<tr>
				<th class="product-name" colspan="3">
                    <?php the_field('nadpis_naimenovanie_tovara', 'options');?>
                </th>
				<th class="product-price"><?php the_field('napdpis_czena_ediniczy', 'options');?></th>
				<th class="product-quantity"><?php the_field('nadpis_kolichestvo', 'options');?></th>
				<th class="product-subtotal"><?php the_field('nadpis_obshhaya_czena', 'options');?></th>
			</tr>
		</thead>
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

						<td class="product-remove">
							<?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="16" height="16" fill="#E5E7E8"/>
                                                    <rect x="3.91992" y="4.58276" width="0.939109" height="10.3302" transform="rotate(-45 3.91992 4.58276)" fill="#A6A9AA"/>
                                                    <rect x="4.58398" y="11.8879" width="0.939109" height="10.3302" transform="rotate(-135 4.58398 11.8879)" fill="#A6A9AA"/>
                                                    </svg>
                                                </a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'woocommerce' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() )
									),
									$cart_item_key
								);
							?>
						</td>

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

						<td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
						<?php
						if ( $_product->is_sold_individually() ) {
							$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
						} else {
							$product_quantity = woocommerce_quantity_input(
								array(
									'input_name'   => "cart[{$cart_item_key}][qty]",
									'input_value'  => $cart_item['quantity'],
									'max_value'    => $_product->get_max_purchase_quantity(),
									'min_value'    => '0',
									'product_name' => $_product->get_name(),
								),
								$_product,
								false
							);
						}

						echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
						?>
						</td>

						<td class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
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
                        <div class="cart-left-part">
                            <?php if ( wc_coupons_enabled() ) { ?>
                                <div class="coupon">
                                    <span><?php the_field('nadpis_skidochnyj_kupon','options')?></span>
                                    <div class="coupon__row">
                                        <label for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label>
                                        <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
                                        <?php do_action( 'woocommerce_cart_coupon' ); ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

                            <?php do_action( 'woocommerce_cart_actions' ); ?>

                            <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                        </div>
                        <div class="cart-right-part">
                            <div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

                                <?php do_action( 'woocommerce_before_cart_totals' ); ?>

<!--                                <h2>--><?php //esc_html_e( 'Cart totals', 'woocommerce' ); ?><!--</h2>-->

                                <table cellspacing="0" class="shop_table shop_table_responsive">

                                    <tr class="cart-subtotal">
                                        <th><?php the_field( 'nadpis_obshhaya_summa', 'options' ); ?></th>
                                        <td data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
                                    </tr>

                                    <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                                        <tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                                            <th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
                                            <td data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
                                        </tr>
                                    <?php endforeach; ?>



                                    <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
                                        <tr class="fee">
                                            <th><?php echo esc_html( $fee->name ); ?></th>
                                            <td data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
                                        </tr>
                                    <?php endforeach; ?>

                                    <?php
                                    if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
                                        $taxable_address = WC()->customer->get_taxable_address();
                                        $estimated_text  = '';

                                        if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
                                            /* translators: %s location. */
                                            $estimated_text = sprintf( ' <small>' . esc_html__( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] );
                                        }

                                        if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
                                            foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                                                ?>
                                                <tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                                                    <th><?php echo esc_html( $tax->label ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></th>
                                                    <td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr class="tax-total">
                                                <th><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></th>
                                                <td data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>

                                    <?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

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
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>
<div class="custom-proceed-to-checkout">
    <a href="<?php echo get_home_url(); ?>/checkout" class="custom-checkout-button"><?php the_field('nadpis_oformit_zakaz','options')?></a>
</div>

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

<?php do_action( 'woocommerce_after_cart' ); ?>

