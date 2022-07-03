<?php
/**
 * Show error messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/error.php.
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
	exit;
}

if ( ! $notices ) {
	return;
}

?>
<div class="woocommerce-info"
	style="
    padding: 1%;
    text-align: right;
    background: #dcdde1;
    font-weight: bolder;
    direction: rtl;
    margin: 1%;
    width: auto;
    border-radius: 7px;
    border-right: 8px solid #e84118;
	box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
	"
	>
	<ul class="woocommerce-error" role="alert">
		<?php foreach ( $notices as $notice ) : ?>
			<li<?php echo wc_get_notice_data_attr( $notice ); ?>>
				<?php echo wc_kses_notice( $notice['notice'] ); ?>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
