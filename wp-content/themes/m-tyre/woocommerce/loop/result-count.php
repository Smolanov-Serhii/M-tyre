<?php
/**
 * Result Count
 *
 * Shows text: Showing x - x of x results.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/result-count.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="category-header-custom">
    <div class="mobile-filter">
        <svg width="27" height="22" viewBox="0 0 27 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.09497 0.134033C9.64726 0.134033 10.095 0.581748 10.095 1.13403L10.095 5.25746C10.095 5.80975 9.64726 6.25746 9.09497 6.25746C8.54269 6.25746 8.09497 5.80975 8.09497 5.25746L8.09497 1.13403C8.09497 0.581748 8.54269 0.134033 9.09497 0.134033Z" fill="black"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.7656 7.78906C22.3179 7.78906 22.7656 8.23678 22.7656 8.78906L22.7656 12.9125C22.7656 13.4648 22.3179 13.9125 21.7656 13.9125C21.2133 13.9125 20.7656 13.4648 20.7656 12.9125L20.7656 8.78906C20.7656 8.23678 21.2133 7.78906 21.7656 7.78906Z" fill="black"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.60767 15.1802C5.15995 15.1802 5.60767 15.6279 5.60767 16.1802L5.60767 20.3036C5.60767 20.8559 5.15995 21.3036 4.60767 21.3036C4.05538 21.3036 3.60767 20.8559 3.60767 20.3036L3.60767 16.1802C3.60767 15.6279 4.05538 15.1802 4.60767 15.1802Z" fill="black"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.442383 3.10986C0.442383 2.55758 0.890098 2.10986 1.44238 2.10986H25.3872C25.9395 2.10986 26.3872 2.55758 26.3872 3.10986C26.3872 3.66215 25.9395 4.10986 25.3872 4.10986H1.44238C0.890098 4.10986 0.442383 3.66215 0.442383 3.10986Z" fill="black"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.442383 10.6863C0.442383 10.134 0.890098 9.68628 1.44238 9.68628H25.3872C25.9395 9.68628 26.3872 10.134 26.3872 10.6863C26.3872 11.2386 25.9395 11.6863 25.3872 11.6863H1.44238C0.890098 11.6863 0.442383 11.2386 0.442383 10.6863Z" fill="black"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.442383 18.2627C0.442383 17.7104 0.890098 17.2627 1.44238 17.2627H25.3872C25.9395 17.2627 26.3872 17.7104 26.3872 18.2627C26.3872 18.815 25.9395 19.2627 25.3872 19.2627H1.44238C0.890098 19.2627 0.442383 18.815 0.442383 18.2627Z" fill="black"/>
        </svg>
        <p><?php echo the_field('nadpis_filtr_tovarov', 'options');?></p>
    </div>
<p class="woocommerce-result-count">
	<?php
	// phpcs:disable WordPress.Security
	if ( 1 === intval( $total ) ) {
		_e( 'Showing the single result', 'woocommerce' );
	} elseif ( $total <= $per_page || -1 === $per_page ) {
		/* translators: %d: total results */
		printf( _n( 'Showing all %d result', 'Showing all %d results', $total, 'woocommerce' ), $total );
	} else {
		$first = ( $per_page * $current ) - $per_page + 1;
		$last  = min( $total, $per_page * $current );
		/* translators: 1: first result 2: last result 3: total results */
		printf( _nx( 'Showing %1$d&ndash;%2$d of %3$d result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, 'with first and last result', 'woocommerce' ), $first, $last, $total );
	}
	// phpcs:enable WordPress.Security
	?>
</p>
