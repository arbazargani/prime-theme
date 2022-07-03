<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>







	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

            <main>
                <div id="main-wrapper" class="wrapper">
                    <div class="result-wrapper">
                        <div class="result-icon">
                            <svg width="194" height="194" viewBox="0 0 194 194" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M96.9994 177.834C141.458 177.834 177.833 141.459 177.833 97.0003C177.833 52.542 141.458 16.167 96.9994 16.167C52.541 16.167 16.166 52.542 16.166 97.0003C16.166 141.459 52.541 177.834 96.9994 177.834Z" stroke="#F85858" stroke-width="12.125" stroke-linecap="round" stroke-linejoin="round"/>
                                <g opacity="0.4">
                                <path d="M74.125 119.876L119.877 74.124" stroke="#292D32" stroke-width="12.125" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M119.877 119.876L74.125 74.124" stroke="#292D32" stroke-width="12.125" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                            </svg>
                        </div>
                        <div class="result-msg">
                            <p>متأسفانه سفارش شما قابل پردازش نیست زیرا بانک مبدأ تراکنش شما را رد کرده است. لطفا دوباره اقدام به خرید کنید</p>
                        </div>
                    </div>
                </div>
            </main>

		<?php else : ?>

			<main>
                <div id="main-wrapper" class="wrapper">
                    <div class="result-wrapper">
                        <div class="result-icon">
                            <svg width="194" height="194" viewBox="0 0 194 194" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M97.0003 177.834C141.459 177.834 177.834 141.459 177.834 97.0003C177.834 52.542 141.459 16.167 97.0003 16.167C52.542 16.167 16.167 52.542 16.167 97.0003C16.167 141.459 52.542 177.834 97.0003 177.834Z" stroke="#7DF59F" stroke-width="12.125" stroke-linecap="round" stroke-linejoin="round"/>
                                <path opacity="0.34" d="M62.6455 96.9989L85.5213 119.875L131.354 74.123" stroke="#A6B495" stroke-width="12.125" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="result-msg">
                            <h2>
                                سفارش شما با موفقیت ثبت شد
                            </h2>
                            <p>
                                کد سفارش شما: <?php echo $order->get_id();?>
                            </p>
                            <p>
                                با تشکر از سفارش شما
                            </p>
                        </div>
                    </div>
                </div>
            </main>

		<?php endif; ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

	<?php endif; ?>