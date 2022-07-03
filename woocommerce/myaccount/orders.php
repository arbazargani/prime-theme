<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
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

defined('ABSPATH') || exit;

do_action('woocommerce_before_account_orders', $has_orders);
$customer = WC()->cart->get_customer();
?>

<?php if ($has_orders) : ?>
    <style>
        table {
            /*font-family: arial, sans-serif;*/
            border-collapse: collapse;
            width: 100%;
            margin: auto;
            direction: rtl;
            /*border: 1px solid var(--main-color-gold);*/
            border-radius: 5px !important;
        }

        td, th {
            border-bottom: 1px solid #E1CC9E;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(1) {
            background-color: var(--main-color-gold);
            color: #ffffff;
            font-weight: bold;
        }
    </style>
    <main>
        <div id="main-wrapper" class="wrapper" style="direction: rtl; text-align: right">
            <div style="width: 100%; padding: 2%; margin: auto">
                <?php if (count($customer_orders->orders)): ?>
                    <div class="single-book-title">
                        <div style="width: 45%; float: right;">
                            <h4><?php __translate_array('fa', 'oders_archive', null, " " . $customer->first_name . " " . $customer->last_name); ?></h4>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div style="height: 10px; border-bottom: 1px solid #e7e7e7; margin-bottom: 10px;"></div>
                    <?php
                    $cart_sum = 0;
                    foreach ($customer_orders->orders as $customer_order):
                        $order = wc_get_order($customer_order); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                        $item_count = $order->get_item_count() - $order->get_item_count_refunded();
                        $date = str_en_to_fa(wp_date('Y-m-d H:i:s', strtotime($customer_order->get_date_created()), null));
                        $date = str_replace('-', '/', $date);
                        $date = explode(' ', $date);
                        $date = $date[1] . '&nbsp;&nbsp;' . $date [0]
                        ?>
                        <table>
                            <tr>
                                <td>شناسه</td>
                                <td>وضعیت</td>
                                <td>تاریخ ثبت</td>
                                <td>تعداد اقلام</td>
                                <td>قیمت</td>
                                <td>عملیات</td>
                            </tr>
                            <tr>
                                <td><?php echo str_en_to_fa($customer_order->id); ?></td>
                                <td><?php echo __translate_array('fa', $customer_order->get_status()); ?></td>
                                <td><?php echo $date; ?></td>
                                <td><?php echo str_en_to_fa($customer_order->get_item_count()); ?></td>
                                <td><?php echo str_en_to_fa($customer_order->get_total()); ?></td>
                                <td><span id="action-btn-<?php echo $customer_order->id; ?>"
                                          onclick="dropItemsDown(<?Php echo $order->id; ?>)"
                                          style="color: gray; cursor: pointer"
                                          href="<?php echo $customer_order->get_checkout_order_received_url(); ?>">نمایش</span>
                                </td>
                            </tr>
                        </table>
                        <div style="margin-top: 3%; display: none" id="dropItemsDown-<?Php echo $order->id; ?>">
                            <table style="margin: auto; width: 90%" class="order-table-child">
                                <tr>
                                    <td>نام محصول</td>
                                    <td>تعداد</td>
                                </tr>
                                <?php foreach ($customer_order->get_items() as $item): ?>
                                    <tr>
                                        <td><?php echo $item['name']; ?></td>
                                        <td><?php echo str_en_to_fa($item['quantity']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="result-wrapper">
                        <div class="result-icon">
                            <svg width="194" height="194" viewBox="0 0 194 194" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M97.0003 177.834C141.459 177.834 177.834 141.459 177.834 97.0003C177.834 52.542 141.459 16.167 97.0003 16.167C52.542 16.167 16.167 52.542 16.167 97.0003C16.167 141.459 52.542 177.834 97.0003 177.834Z"
                                      stroke="#7DF59F" stroke-width="12.125" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path opacity="0.34" d="M62.6455 96.9989L85.5213 119.875L131.354 74.123"
                                      stroke="#A6B495" stroke-width="12.125" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="result-msg">
                            <h2><?php echo __translate_array('fa', 'you haven\'t any orders yet.'); ?></h2>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>

<?php else : ?>
    <style>
        table {
            /*font-family: arial, sans-serif;*/
            border-collapse: collapse;
            width: 100%;
            margin: auto;
            direction: rtl;
            /*border: 1px solid var(--main-color-gold);*/
            border-radius: 5px !important;
        }

        td, th {
            border-bottom: 1px solid #c9c9c9;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(1) {
            background-color: #c9c9c9;
            color: #ffffff;
            font-weight: bold;
        }
    </style>
    <main>
        <div id="main-wrapper" class="wrapper" style="direction: rtl; text-align: right">
            <div style="width: 100%; padding: 2%; margin: auto">
                <div class="single-book-title">
                    <div style="width: 45%; float: right;">
                        <h4><?php __translate_array('fa', 'oders_archive', null, " " . $customer->first_name . " " . $customer->last_name); ?></h4>
                    </div>
                </div>
                <br>
                <br>
                <div style="height: 10px; border-bottom: 1px solid #e7e7e7; margin-bottom: 10px;"></div>
                <table>
                    <tr>
                        <td>سفارشات شما</td>
                    </tr>
                    <tr>
                        <td><?php echo __translate_array('fa', 'you haven\'t any orders yet.'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
<?php endif; ?>

<?php do_action('woocommerce_after_account_orders', $has_orders); ?>

<script>
    function dropItemsDown(id) {
        document.getElementById('dropItemsDown-' + id).style.display = 'block';
    }

    function ReversedropItemsDown(id) {
        document.getElementById('dropItemsDown-' + id).style.display = 'none';
    }
</script>

<?php do_action('woocommerce_after_account_orders', $has_orders); ?>
<?php get_template_part('footer.php'); ?>
