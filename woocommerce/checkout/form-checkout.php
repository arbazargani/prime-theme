<?php
if (!defined('ABSPATH')) {
    exit;
}

do_action('woocommerce_before_checkout_form', $checkout);

if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
    echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
    return;
}
get_header();
?>
<main>
    <div id="main-wrapper" class="wrapper">
        <div class="data-entry-wrapper">
            <?php
            //                $wc = New WC_Checkout();
            ?>
            <div class="data-entry-right">
                <div class="input-wrappers">
                    <?php if (!is_user_logged_in()): ?>
                        <div class="custom-alert-box-success">
                            <p>حساب کاربری دارید؟ <a href="<?php echo helper_login_url(); ?>">وارد شوید</a>.</p>
                        </div>
                    <?php endif; ?>
                    <form name="checkout" id="checkout" method="post" class="checkout woocommerce-checkout"
                          action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
                        <div class="form-row-double">
                            <div class="form-row">
                                <label for="name">
                                    نام
                                </label>
                                <input required type="text" class="input-text " name="billing_first_name"
                                       id="billing_first_name" placeholder="" value="" autocomplete="given-name">
                            </div>
                            <div class="form-row">
                                <label for="f-name">
                                    نام خانوادگی
                                </label>
                                <input required type="text" class="input-text " name="billing_last_name"
                                       id="billing_last_name" placeholder="" value="" autocomplete="family-name">
                            </div>
                        </div>
                        <div class="form-row-double">
                            <div class="form-row">
                                <label>
                                    شماره تلفن همراه:
                                </label>
                                <input type="tel" class="input-text " name="billing_phone" id="billing_phone"
                                       placeholder="" value="" autocomplete="tel">
                            </div>
                            <div class="form-row">
                                <label>
                                    ایمیل:
                                </label>
                                <input type="email" class="input-text " name="billing_email" id="billing_email"
                                       placeholder="" autocomplete="email username">
                            </div>
                        </div>
                        <div class="form-row-double">
                            <input type="hidden" name="billing_country" id="billing_country" value="IR"
                                   autocomplete="country" class="country_to_state" readonly="readonly">
                            <div class="form-row">
                                <input type="hidden" name="billing_country" id="billing_country" value="IR"
                                       autocomplete="country" class="country_to_state" readonly="readonly">
                                <label>
                                    استان
                                </label>

                                <!-- <select name="billing_state" id="billing_state" class="state_select " autocomplete="address-level1" data-placeholder="یک گزینه انتخاب نمائید…" data-input-classes="" data-label="استان">
						<option value="">یک گزینه انتخاب نمائید…</option><option value="KHZ">خوزستان</option><option value="THR">تهران</option><option value="ILM">ایلام</option><option value="BHR">بوشهر</option><option value="ADL" selected="selected">اردبیل</option><option value="ESF">اصفهان</option><option value="YZD">یزد</option><option value="KRH">کرمانشاه</option><option value="KRN">کرمان</option><option value="HDN">همدان</option><option value="GZN">قزوین</option><option value="ZJN">زنجان</option><option value="LRS">لرستان</option><option value="ABZ">البرز</option><option value="EAZ">آذربایجان شرقی</option><option value="WAZ">آذربایجان غربی</option><option value="CHB">چهارمحال و بختیاری</option><option value="SKH">خراسان جنوبی</option><option value="RKH">خراسان رضوی</option><option value="NKH">خراسان شمالی</option><option value="SMN">سمنان</option><option value="FRS">فارس</option><option value="QHM">قم</option><option value="KRD">کردستان</option><option value="KBD">کهگیلویه و بویراحمد</option><option value="GLS">گلستان</option><option value="GIL">گیلان</option><option value="MZN">مازندران</option><option value="MKZ">مرکزی</option><option value="HRZ">هرمزگان</option><option value="SBN">سیستان و بلوچستان</option></select> -->


                                <!-- Ali's Custom -->
                                <select required name="billing_state" id="billing_state"
                                        onChange="irancitylist(this.value);">
                                    <option value="0">لطفا استان را انتخاب نمایید</option>
                                    <option value="THR">تهران</option>
                                    <option value="GIL">گیلان</option>
                                    <option value="EAZ">آذربایجان شرقی</option>
                                    <option value="KHZ">خوزستان</option>
                                    <option value="FRS">فارس</option>
                                    <option value="ESF">اصفهان</option>
                                    <option value="RKH">خراسان رضوی</option>
                                    <option value="GZN">قزوین</option>
                                    <option value="SMN">سمنان</option>
                                    <option value="QHM">قم</option>
                                    <option value="MKZ">مرکزی</option>
                                    <option value="ZJN">زنجان</option>
                                    <option value="MZN">مازندران</option>
                                    <option value="GLS">گلستان</option>
                                    <option value="ADL">اردبیل</option>
                                    <option value="WAZ">آذربایجان غربی</option>
                                    <option value="HDN">همدان</option>
                                    <option value="KRD">کردستان</option>
                                    <option value="KRH">کرمانشاه</option>
                                    <option value="LRS">لرستان</option>
                                    <option value="BHR">بوشهر</option>
                                    <option value="KRN">کرمان</option>
                                    <option value="HRZ">هرمزگان</option>
                                    <option value="CHB">چهارمحال و بختیاری</option>
                                    <option value="YZD">یزد</option>
                                    <option value="SBN">سیستان و بلوچستان</option>
                                    <option value="ILM">ایلام</option>
                                    <option value="KBD">کهگلویه و بویراحمد</option>
                                    <option value="NKH">خراسان شمالی</option>
                                    <option value="SKH">خراسان جنوبی</option>
                                    <option value="ABZ">البرز</option>
                                </select>


                            </div>
                            <div class="form-row">
                                <label>
                                    شهر:
                                </label>


                                <!-- <input type="text" class="input-text " name="billing_city" id="billing_city" placeholder="" value="asas" autocomplete="address-level2"> -->

                                <!-- Ali's Custom -->
                                <select required name="billing_city" id="billing_city">
                                    <option value="0">لطفا استان را انتخاب نمایید</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row-double">
                            <div class="form-row">
                                <label>
                                    کد پستی:
                                </label>
                                <input type="text" class="input-text " name="billing_postcode" id="billing_postcode"
                                       placeholder="" value="" autocomplete="postal-code">
                                <br>
                                <br>
                                <div class="form-row-checkbox">
                                    <input required type="checkbox" name="" required>
                                    <label>
                                        قوانین و مقررات شما را قبول دارم.
                                    </label>
                                </div>
                            </div>
                            <div class="form-row">
                                <label>
                                    آدرس:
                                </label>
                                <input type="text" class="input-text " name="billing_address_1" id="billing_address_1"
                                       placeholder="نام خیابان و پلاک خانه" value="" autocomplete="address-line1">
                                <?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>
                            </div>
                            <div class="form-row">
                                <div style="display: block; width: 100%; margin-top: 1%">
                                    <label for=""> <input id="payment_method_WC_NextPay" type="radio"
                                                          class="input-radio" name="payment_method" value="WC_NextPay"
                                                          checked="checked" data-order_button_text=""> پرداخت امن
                                        نکست‌پی</label>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php do_action('woocommerce_after_checkout_form', $checkout); ?>
                </div>
            </div>
            <div class="data-entry-left">
                <div class="invoice-wrapper">
                    <div class="invoice">
                        <?php
                        $cart_sum = 0;
                        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item):
                            $product = $cart_item['data'];
                            $product_id = $cart_item['product_id'];
                            $quantity = $cart_item['quantity'];
                            $price = WC()->cart->get_product_price($product);
                            $price_without_unit = $product->price;
                            $cart_sum += $price_without_unit * $quantity;
                            $subtotal = WC()->cart->get_product_subtotal($product, $cart_item['quantity']);
                            $link = $product->get_permalink($cart_item);
                            $thumbnail = get_the_post_thumbnail_url($product_id);
                            $remove_url = WC()->cart->get_remove_url($cart_item_key);
                            ?>
                            <div class="invoice-item">
                                <p>
                                    <a href="<?php echo $link; ?>" target="_blank"><?php echo $product->name; ?></a>
                                    <span> &#10006; <?php echo str_en_to_fa(number_format((float)$quantity)); ?></span></p>
                                <div class="doted"></div>
                                <p>
                                    <?php echo str_en_to_fa(number_format((float)$price_without_unit)) . ' ' . get_woocommerce_currency_symbol(); ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                            <div class="invoice-item">
                                <p>
                                    <?php echo __translate_array('fa', 'post delivery price'); ?>
                                </p>
                                <div class="doted"></div>
                                <p>
                                    <?php echo str_en_to_fa(number_format(10000)) . ' ' . get_woocommerce_currency_symbol(); ?>
                                </p>
                            </div>
                        <hr>
                        <div class="invoice-item">
                            <p>
                                <?php echo __translate_array('fa', 'factor final price: ', '<span style="font-weight: bold">', '</span> ') ?>
                            </p>
                            <div class="doted"></div>
                            <p>
                                <?php echo str_en_to_fa(number_format($cart_sum+10000)) . ' ' . get_woocommerce_currency_symbol(); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="invoice-btn-wrapper">
                    <!--                    <div class="pay-btn" style="background: var(--main-color-gold)">-->
                    <!--                        <p style="cursor: pointer" onclick="document.forms[0].submit()">ورود به صفحه پرداخت</p>-->
                    <!--                    </div>-->
                    <button form="checkout" type="submit"
                            style="font-size: 24px; background: var(--main-color-gold); width: 100%; color: white; border: none"
                            class="pay-btn alt" name="woocommerce_checkout_place_order" id="place_order"
                            value="ثبت سفارش" data-value="ثبت سفارش">ثبت سفارش
                    </button>

                    <a href="?empty-cart">
                        <div class="cancel-btn">لغو سفارش خرید</div>
                    </a>

                </div>
            </div>
        </div>
    </div>
</main>
<script>
    document.getElementsByClassName('woocommerce-form-coupon-toggle')[0].style.display = 'none';
</script>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
