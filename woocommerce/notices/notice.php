<?php
/**
 * Show messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/notice.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! $notices ) {
	return;
}

?>
<?php foreach ( $notices as $notice ) : ?>
	<div class="woocommerce-info"<?php echo wc_get_notice_data_attr( $notice ); ?>
	style="
	padding: 1%;
    text-align: right;
    background: #dbc086;
    color: white;
    font-weight: bolder;
    direction: rtl;
    margin: 1%;
    width: auto;
    border-radius: 5px;
    border-right: 15px solid #fbc531;
    text-shadow: 0 0 14px #00000038;
	"
	>
		<?php echo wc_kses_notice( $notice['notice'] ); ?>
	</div>
<?php endforeach; ?>
