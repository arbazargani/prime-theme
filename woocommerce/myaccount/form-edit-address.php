<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

$page_title = ( 'billing' === $load_address ) ? esc_html__( 'Billing address', 'woocommerce' ) : esc_html__( 'Shipping address', 'woocommerce' );

do_action( 'woocommerce_before_edit_account_address_form' ); ?>

<?php if ( ! $load_address ) : ?>
	<?php wc_get_template( 'myaccount/my-address.php' ); ?>
<?php else : ?>
	<?php get_header(); ?>
	<?php
		
		/**
		 * 
		 * REFRENCE: https://www.codegrepper.com/code-examples/whatever/get+billing+address+in+woocommerce
		 */
		$customer = new WC_Customer(get_current_user_id());
		$username     = $customer->get_username(); // Get username
		$user_email   = $customer->get_email(); // Get account email
		$first_name   = $customer->get_first_name();
		$last_name    = $customer->get_last_name();
		$display_name = $customer->get_display_name();
	?>
<?php endif; ?>

<main>
    <div id="main-wrapper" class="wrapper">
        <div class="profile-wrapper">
            <div class="profile-right-wrapper">
                <div class="profile-right-img">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/user-avatar.svg'; ?>" alt="عکس پروفایل" />
                    <h3>
                        <?php echo wp_get_current_user()->first_name . " " . wp_get_current_user()->last_name; ?>
                    </h3>
                </div>
                <div class="profile-nav">
                    <ul>
                        <div class="profile-nav-top">
                            <li>
                                <a href="<?php echo home_url(); ?>/my-account/edit-address/صورت-حساب">
                                    اطلاعات کاربر
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo home_url(); ?>/my-account/orders">
                                    سفارشات
                                </a>
                            </li>
                        </div>
                        <div class="profile-nav-bot">
                            <li>
                                <a href="<?php echo wp_logout_url(home_url()); ?>">
                                    خروج
                                </a>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
            <form method="post">
            <?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>
            <div class="profile-left-wrapper">
                    <div class="form-row-double">
                        <div class="form-row">
                            <label for="billing_first_name">
                                نام
                            </label>
                            <input type="text" name="billing_first_name" id="billing_first_name" value="<?php echo $customer->get_billing_first_name(); ?>">
                        </div>
                        <div class="form-row">
                            <label for="billing_first_name">
                                نام خانوادگی
                            </label>
                            <input type="text" name="billing_last_name" id="billing_last_name" value="<?php echo $customer->get_billing_last_name(); ?>">
                        </div>
                    </div>
                    <div class="form-row-double">
                        <div class="form-row">
                            <label for="billing_phone">
                                شماره تلفن همراه
                            </label>
                            <input type="tel" name="billing_phone" id="billing_phone" autocomplete="tel" value="<?php echo wp_get_current_user()->user_phone; ?>">
                        </div>
                        <div class="form-row">
                            <label for="billing-email">
                                ایمیل
                            </label>
                            <input type="text" name="billing_email" id="billing_email" autocomplete="email username" value="<?php echo wp_get_current_user()->user_email; ?>">
                        </div>
                    </div>
                    <div class="form-row-double">
                        <div class="form-row">
                            <label>
                                استان:
                            </label>
                            <input type="hidden" name="billing_country" value="IR">
                            <select name="billing_state" id="billing_state" onChange="irancitylist(this.value);">
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
                            <select name="billing_city" id="billing_city" >
                                <option value="0">لطفا استان را انتخاب نمایید</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="name">
                            کد پستی
                        </label>
                        <input type="text" name="billing_postcode" id="billing_postcode" value="<?php echo $customer->get_billing_postcode(); ?>" autocomplete="postal-code">
                    </div>
                    <div class="form-row">
                        <label>
                            آدرس:
                        </label>
                        <textarea rows="5" cols="1" name="billing_address_1" id="billing_address_1" autocomplete="address-line1"><?php echo $customer->get_billing_address_1(); ?></textarea>
                    </div>
                    <div class="form-btn-row">
                        <div class="profile-form-btn">
                            <button type="submit" class="button" style="
                                background-color: var(--main-color-gold);
                                padding: 15px 30px;
                                margin-top: 50px;
                                font-size: 12px;
                                font-weight: bold;
                                color: var(--color-white);
                                display: flex;
                                flex-flow: row;
                                justify-content: center;
                                align-items: center;
                                border: none;
                                border-radius: 25px;
                                box-shadow: 0px 2px 25px 0px rgb(0 0 0 / 10%);
                                cursor: pointer;
                                " name="save_address" value="<?php esc_attr_e( 'Save address', 'woocommerce' ); ?>">ویرایش اطلاعات</button>
                        </div>
                        <div class="profile-form-btn-alt">
                            <button style="
                                padding: 15px 30px;
                                margin-top: 50px;
                                font-size: 12px;
                                font-weight: bold;
                                color: var(--color-black);
                                display: flex;
                                flex-flow: row wrap;
                                justify-content: center;
                                align-items: center;
                                border: none;
                                background: none;
                                border-radius: 25px;" type="reset">انصراف</button>
                        </div>
                    </div>
                </div>
                <?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>
				<?php wp_nonce_field( 'woocommerce-edit_address', 'woocommerce-edit-address-nonce' ); ?>
                <?php wp_referer_field( true ); ?>
				<input type="hidden" name="action" value="edit_address" />
            </form>
            <?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
        </div>
    </div>
</main>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>