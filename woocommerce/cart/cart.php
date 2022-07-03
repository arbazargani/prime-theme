<?php
get_header();
$customer = WC()->cart->get_customer();
foreach (WC()->cart->get_cart() as $cart_item) {
    // gets the cart item quantity
    $quantity = $cart_item['quantity'];
    // gets the cart item subtotal
    $line_subtotal = $cart_item['line_subtotal'];
    $line_subtotal_tax = $cart_item['line_subtotal_tax'];
    // gets the cart item total
    $line_total = $cart_item['line_total'];
    $line_tax = $cart_item['line_tax'];
    // unit price of the product
    $item_price = $line_subtotal / $quantity;
    $item_tax = $line_subtotal_tax / $quantity;
}
?>
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
            <?php if (!WC()->cart->is_empty()): ?>
                <div class="single-book-title">
                    <div style="width: 45%; float: right;">
                        <h4><?php __translate_array('fa', 'shopping_cart', null, " " . $customer->first_name . " " . $customer->last_name); ?></h4>
                    </div>
                    <div style="width: auto; float: left;">
                        <div class="register-btn btn btn-small btn-type-1" style="background: var(--main-color-gold)">
                            <a href="<?php echo wc_get_checkout_url(); ?>"
                               style="margin: auto; color: white !important;">
                                <img style="filter: brightness(100)"
                                     src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/wallet.svg'; ?>">&nbsp;
                                پرداخت
                            </a>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div style="height: 10px; border-bottom: 1px solid #e7e7e7; margin-bottom: 10px;"></div>
                <table>
                    <tr>
                        <td>#</td>
                        <td>تصویر</td>
                        <td>نام محصول</td>
                        <td>تعداد</td>
                        <td>قیمت واحد</td>
                        <td>قابل پرداخت</td>
                        <td>عملیات</td>
                    </tr>
                    <?php
                    $cart_sum = 0;
                    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item):
                        $product = $cart_item['data'];
                        $product_id = $cart_item['product_id'];
                        $quantity = $cart_item['quantity'];
                        $price = WC()->cart->get_product_price($product);
                        $price_without_unit = $product->price;
                        $cart_sum += $quantity * $price_without_unit;
                        $subtotal = WC()->cart->get_product_subtotal($product, $cart_item['quantity']);
                        $link = $product->get_permalink($cart_item);
                        $thumbnail = get_the_post_thumbnail_url($product_id);
                        $remove_url = WC()->cart->get_remove_url($cart_item_key);
                        // Anything related to $product, check $product tutorial
                        //        $attributes = $product->get_attributes();
                        //        $whatever_attribute = $product->get_attribute( 'whatever' );
                        //        $whatever_attribute_tax = $product->get_attribute( 'pa_whatever' );
                        //        $any_attribute = $cart_item['variation']['attribute_whatever'];
                        //        $meta = wc_get_formatted_cart_item_data( $cart_item );
                        ?>
                        <tr>
                            <td><?php echo $product->id; ?></td>
                            <td><img style="max-width: 50px" src="<?php echo $thumbnail; ?>"
                                     alt="<?php echo $product->name; ?>"></td>
                            <td><a href="<?php echo $link; ?>" target="_blank"><?php echo $product->name; ?></a></td>
                            <td><?php echo str_en_to_fa(number_format((float)$quantity)); ?></td>
                            <td><?php echo str_en_to_fa(number_format((float)$price_without_unit)) . ' ' . get_woocommerce_currency_symbol(); ?></td>
                            <td><?php echo str_en_to_fa(number_format((float)$quantity * (float)$price_without_unit)) . ' ' . get_woocommerce_currency_symbol(); ?></td>
                            <td><a href="<?php echo $remove_url; ?>">حذف</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div>
                    <p style="float: left; margin: 10px auto;"><?php echo __translate_array('fa', 'factor final price: ', '<span style="font-weight: bold">', '</span> ') . str_en_to_fa(number_format($cart_sum)) . ' ' . get_woocommerce_currency_symbol(); ?></p>
                </div>
            <?php else: ?>
                <main>
                    <div id="main-wrapper" class="wrapper">
                        <div class="result-wrapper">
                            <p><?php echo __translate_array('fa', 'your cart is empty.'); ?></p>
                        </div>
                    </div>
                </main>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php //get_sidebar() ?>
<?php get_footer() ?>
