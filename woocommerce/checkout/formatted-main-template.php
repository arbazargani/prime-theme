<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>میراث قلم</title>
    <script type="text/javascript" src="http://localhost/ketabshop/wp-content/themes/prime/template-parts/assets/js/main.js"></script>
    <link rel="stylesheet" href="http://localhost/ketabshop/wp-content/themes/prime/template-parts/assets/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/ketabshop/wp-content/themes/prime/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<header class="section">
    <div id="header-wrapper" class="wrapper desktop-header">
        <div class="header-left">
            <a href="http://localhost/ketabshop/cart/">
                <div class="shopping-bag">
                    <div class="shopping-bag-icon">
                        <img src="http://localhost/ketabshop/wp-content/themes/prime/template-parts/assets/img/shopping-bag.svg" alt="آیکون سبد خرید">
                    </div>
                    <div class="shopping-badge">
                        <i>۲</i>
                    </div>
                </div>
            </a>
            <div class="register-btn btn btn-small btn-type-1">
                <a href="#">
                    <img src="http://localhost/ketabshop/wp-content/themes/prime/template-parts/assets/img/Register-icon.svg" alt="آیکون ثبت نام">ثبت نام
                </a>
            </div>
            <div class="login-btn btn btn-small btn-type-2">
                <a href="#">
                    <img src="http://localhost/ketabshop/wp-content/themes/prime/template-parts/assets/img/login-icon.svg" alt="آیکون ثبت نام">ورود
                </a>
            </div>
        </div>
        <div class="header-right">
            <div class="header-logo">
                <img src="http://localhost/ketabshop/wp-content/themes/prime/template-parts/assets/img/Logo-Header.svg" alt="لوگو انتشارات اهل قلم" />
            </div>
            <div class="navbar">
                <ul>
                    <li>
                        <a href="#">صفحه اصلی</a>
                    </li>
                    <li>
                        <a href="#">کتاب ها</a>
                    </li>
                    <li>
                        <a href="#">پدید آورندگان</a>
                    </li>
                    <li>
                        <a href="#">درباره ما</a>
                    </li>
                    <li>
                        <a href="#">تماس با ما</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-header wrapper">
        <div class="header-left">
            <div class="burger-button-wrapper">
                <div class="burger-btn transition-300">
                    <i></i>
                    <i></i>
                    <i></i>
                </div>
            </div>
            <a href="#">
                <div class="shopping-bag">
                    <div class="shopping-bag-icon">
                        <img src="http://localhost/ketabshop/wp-content/themes/prime/template-parts/assets/img/shopping-bag.svg">
                    </div>
                    <div class="shopping-badge">
                        <i>۲</i>
                    </div>
                </div>
            </a>
        </div>
        <div class="header-right">
            <a href="#">
                <div class="header-logo">
                    <img src="assets/img/Logo-header.svg" alt="لوگو انتشارات اهل قلم" />
                </div>
            </a>
        </div>
    </div>
    <div id="mobile-nav" class="mobile-nav-wrapper transition-300">
        <div class="mobile-nav-wrap">
            <div class="mobile-nav-logo">
                <img src="http://localhost/ketabshop/wp-content/themes/prime/template-parts/assets/img/Mobile-Side-Nav-Logo.svg" alt="انتشارات میراث اهل قلم">
            </div>
            <div class="mobile-nav-btn-wrap">
                <div class="register-btn btn btn-small btn-type-1">
                    <a href="#">
                        <img src="http://localhost/ketabshop/wp-content/themes/prime/template-parts/assets/img/Register-icon.svg">ثبت نام
                    </a>
                </div>
                <div class="login-btn btn btn-small btn-type-2">
                    <a href="#">
                        <img src="http://localhost/ketabshop/wp-content/themes/prime/template-parts/assets/img/login-icon.svg">ورود
                    </a>
                </div>
            </div>
            <div class="mobile-nav">
                <ul>
                    <li>
                        <a href="#">
                            صفحه اصلی
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            کتاب ها
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            پدید آورندگان
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            درباره ما
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            تماس با ما
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<div id="content">
    <div id="text">
        <!-- page content -->
        <!--<h1>-->
        <!--</h1>-->
        <div class="woocommerce">
            <div class="woocommerce-notices-wrapper"></div>
            <div class="woocommerce-form-coupon-toggle">

                <div class="woocommerce-info">
                    کد تخفیف دارید؟ <a href="#" class="showcoupon">برای نوشتن کد اینجا کلیک کنید</a>
                </div>
            </div>

            <form class="checkout_coupon woocommerce-form-coupon" method="post" style="display:none">

                <p>اگر کد تخفیف دارید، لطفا در زیر بنویسید.</p>

                <p class="form-row form-row-first">
                    <input type="text" name="coupon_code" class="input-text" placeholder="کد تخفیف" id="coupon_code" value="" />
                </p>

                <p class="form-row form-row-last">
                    <button type="submit" class="button" name="apply_coupon" value="اعمال کدتخفیف">اعمال کدتخفیف</button>
                </p>

                <div class="clear"></div>
            </form>
            <div class="woocommerce-notices-wrapper"></div>
            <form name="checkout" method="post" class="checkout woocommerce-checkout" action="http://localhost/ketabshop/checkout/" enctype="multipart/form-data">



                <div class="col2-set" id="customer_details">
                    <div class="col-1">
                        <div class="woocommerce-billing-fields">

                            <h3>جزئیات صورتحساب</h3>



                            <div class="woocommerce-billing-fields__field-wrapper">
<!--                                <p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10">-->
<!--                                    <label for="billing_first_name" class="">نام&nbsp;<abbr class="required" title="ضروری">*</abbr>-->
<!--                                    </label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder=""  value="" autocomplete="given-name" /></span>-->
<!--                                </p>-->
<!--                                <p class="form-row form-row-last validate-required" id="billing_last_name_field" data-priority="20">-->
<!--                                    <label for="billing_last_name" class="">نام خانوادگی&nbsp;<abbr class="required" title="ضروری">*</abbr>-->
<!--                                    </label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder=""  value="" autocomplete="family-name" /></span>-->
<!--                                </p>-->
<!--                                <p class="form-row form-row-wide" id="billing_company_field" data-priority="30">-->
<!--                                    <label for="billing_company" class="">نام شرکت&nbsp;<span class="optional">(اختیاری)</span>-->
<!--                                    </label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_company" id="billing_company" placeholder=""  value="" autocomplete="organization" /></span>-->
<!--                                </p>-->
                                <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field" data-priority="40">
                                    <label for="billing_country" class="">کشور / منطقه&nbsp;<abbr class="required" title="ضروری">*</abbr>
                                    </label><span class="woocommerce-input-wrapper"><strong>ایران</strong><input type="hidden" name="billing_country" id="billing_country" value="IR" autocomplete="country" class="country_to_state" readonly="readonly" /></span>
                                </p>
                                <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
                                    <label for="billing_address_1" class="">آدرس خیابان&nbsp;<abbr class="required" title="ضروری">*</abbr>
                                    </label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="نام خیابان و پلاک خانه"  value="" autocomplete="address-line1" /></span>
                                </p>
                                <p class="form-row form-row-wide address-field" id="billing_address_2_field" data-priority="60">
                                    <label for="billing_address_2" class="screen-reader-text">آپارتمان، مجتمع، واحد و...&nbsp;<span class="optional">(اختیاری)</span>
                                    </label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_address_2" id="billing_address_2" placeholder="آپارتمان، مجتمع، واحد و... (اختیاری)"  value="" autocomplete="address-line2" /></span>
                                </p>
                                <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70">
                                    <label for="billing_city" class="">شهر&nbsp;<abbr class="required" title="ضروری">*</abbr>
                                    </label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_city" id="billing_city" placeholder=""  value="" autocomplete="address-level2" /></span>
                                </p>
                                <p class="form-row form-row-wide address-field validate-required validate-state" id="billing_state_field" data-priority="80">
                                    <label for="billing_state" class="">استان&nbsp;<abbr class="required" title="ضروری">*</abbr>
                                    </label><span class="woocommerce-input-wrapper"><select name="billing_state" id="billing_state" class="state_select " autocomplete="address-level1" data-placeholder="یک گزینه انتخاب نمائید&hellip;"  data-input-classes="" data-label="استان">
						<option value="">یک گزینه انتخاب نمائید&hellip;</option><option value="KHZ" >خوزستان</option><option value="THR"  selected='selected'>تهران</option><option value="ILM" >ایلام</option><option value="BHR" >بوشهر</option><option value="ADL" >اردبیل</option><option value="ESF" >اصفهان</option><option value="YZD" >یزد</option><option value="KRH" >کرمانشاه</option><option value="KRN" >کرمان</option><option value="HDN" >همدان</option><option value="GZN" >قزوین</option><option value="ZJN" >زنجان</option><option value="LRS" >لرستان</option><option value="ABZ" >البرز</option><option value="EAZ" >آذربایجان شرقی</option><option value="WAZ" >آذربایجان غربی</option><option value="CHB" >چهارمحال و بختیاری</option><option value="SKH" >خراسان جنوبی</option><option value="RKH" >خراسان رضوی</option><option value="NKH" >خراسان شمالی</option><option value="SMN" >سمنان</option><option value="FRS" >فارس</option><option value="QHM" >قم</option><option value="KRD" >کردستان</option><option value="KBD" >کهگیلویه و بویراحمد</option><option value="GLS" >گلستان</option><option value="GIL" >گیلان</option><option value="MZN" >مازندران</option><option value="MKZ" >مرکزی</option><option value="HRZ" >هرمزگان</option><option value="SBN" >سیستان و بلوچستان</option></select></span>
                                </p>
                                <p class="form-row form-row-wide address-field validate-required validate-postcode" id="billing_postcode_field" data-priority="90">
                                    <label for="billing_postcode" class="">کدپستی (بدون فاصله و با اعداد انگلیسی)&nbsp;<abbr class="required" title="ضروری">*</abbr>
                                    </label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_postcode" id="billing_postcode" placeholder=""  value="" autocomplete="postal-code" /></span>
                                </p>
                                <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="100">
                                    <label for="billing_phone" class="">تلفن&nbsp;<abbr class="required" title="ضروری">*</abbr>
                                    </label><span class="woocommerce-input-wrapper"><input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder=""  value="" autocomplete="tel" /></span>
                                </p>
                                <p class="form-row form-row-wide validate-required validate-email" id="billing_email_field" data-priority="110">
                                    <label for="billing_email" class="">آدرس ایمیل&nbsp;<abbr class="required" title="ضروری">*</abbr>
                                    </label><span class="woocommerce-input-wrapper"><input type="email" class="input-text " name="billing_email" id="billing_email" placeholder=""  value="arbazargani123@gmail.com" autocomplete="email username" /></span>
                                </p>
                            </div>

                        </div>

                    </div>

                    <div class="col-2">
                        <div class="woocommerce-shipping-fields">
                        </div>
                        <div class="woocommerce-additional-fields">



                            <h3>اطلاعات بیشتر</h3>


                            <div class="woocommerce-additional-fields__field-wrapper">
                                <p class="form-row notes" id="order_comments_field" data-priority="">
                                    <label for="order_comments" class="">توضیحات سفارش&nbsp;<span class="optional">(اختیاری)</span>
                                    </label><span class="woocommerce-input-wrapper"><textarea name="order_comments" class="input-text " id="order_comments" placeholder="یادداشت‌ها درباره سفارش شما، برای مثال نکات مهم درباره نحوه تحویل سفارش"  rows="2" cols="5"></textarea></span>
                                </p>
                            </div>


                        </div>
                    </div>
                </div>




                <h3 id="order_review_heading">سفارش شما</h3>


                <div id="order_review" class="woocommerce-checkout-review-order">
                    <table class="shop_table woocommerce-checkout-review-order-table">
                        <thead>
                        <tr>
                            <th class="product-name">محصول</th>
                            <th class="product-total">جمع جزء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="cart_item">
                            <td class="product-name">
                                تئوری انتخاب&nbsp; <strong class="product-quantity">&times;&nbsp;1</strong>
                            </td>
                            <td class="product-total">
                                        <span class="woocommerce-Price-amount amount"><bdi>116,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;</span>
                                        </bdi>
                                        </span>
                            </td>
                        </tr>
                        <tr class="cart_item">
                            <td class="product-name">
                                رمان کوری (Blindness)&nbsp; <strong class="product-quantity">&times;&nbsp;1</strong>
                            </td>
                            <td class="product-total">
                                        <span class="woocommerce-Price-amount amount"><bdi>100,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;</span>
                                        </bdi>
                                        </span>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>

                        <tr class="cart-subtotal">
                            <th>جمع جزء</th>
                            <td><span class="woocommerce-Price-amount amount"><bdi>216,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;</span>
                                        </bdi>
                                        </span>
                            </td>
                        </tr>






                        <tr class="order-total">
                            <th>مجموع</th>
                            <td><strong><span class="woocommerce-Price-amount amount"><bdi>216,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;</span></bdi></span></strong>
                            </td>
                        </tr>


                        </tfoot>
                    </table>
                    <div id="payment" class="woocommerce-checkout-payment">
                        <ul class="wc_payment_methods payment_methods methods">
                            <li class="woocommerce-notice woocommerce-notice--info woocommerce-info">متاسفانه به نظر می رسد در حال حاضر هیچ روش پرداختی برای استان شما موجود نمی باشد. در صورتیکه نیاز به کمک دارید با ما تماس بگیرید.</li>
                        </ul>
                        <div class="form-row place-order">
                            <noscript>
                                به دلیل اینکه مرورگر شما جاوا اسکریپت را پشتیبانی نمی کند ، یا غیر فعال است ، لطفا کلیک کنید روی <em>بروزرسانی جمع </em> قبل از اینکه سفارش خود را ثبت کنید.در صورتیکه این کار را نکنید ممکن است مبلغ قابل پرداخت شما بیش
                                از چیزی که در بالا مشخص شده است باشد
                                <br/>
                                <button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="به روز رسانی جمع کل">به روز رسانی جمع کل</button>
                            </noscript>

                            <div class="woocommerce-terms-and-conditions-wrapper">
                                <div class="woocommerce-privacy-policy-text">
                                    <p>اطلاعات شخصی شما برای پردازش سفارش شما و پشتیبانی از تجربه شما در این وبسایت و برای اهداف دیگری که در <a href="http://localhost/ketabshop/?page_id=3" class="woocommerce-privacy-policy-link" target="_blank">سیاست حفظ حریم خصوصی</a> توضیح
                                        داده شده است استفاده می‌شود.</p>
                                </div>
                            </div>


                            <button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="ثبت سفارش" data-value="ثبت سفارش">ثبت سفارش</button>

                            <input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="8afbedddea" />
                            <input type="hidden" name="_wp_http_referer" value="/ketabshop/checkout/" />
                        </div>
                    </div>
                </div>


            </form>

        </div>
    </div>
    <div id="tag_cloud">
        <!--</div>-->
        <!--</div>-->
        <footer>
            <div id="footer-wrapper" class="wrapper">
                <div class="footer-logo-wrap footer-col">
                    <div class="footer-logo">
                        <img alt="لوگو انتشارات میراث اهل قلم" src="http://localhost/ketabshop/wp-content/themes/prime/template-parts/assets/img/Logo-footer.svg" />
                    </div>
                    <p>
                        انتشارات میراث اهل قلم
                    </p>
                </div>
                <div class="footer-about-wrap footer-col">
                    <div class="footer-about-us">
                        <h4>درباره ما</h4>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                            ابزارهای کاربردی می باشد.</p>
                    </div>
                </div>
                <div class="footer-contact-wrap footer-col">
                    <div class="footer-contact-us">
                        <div>
                            <h4>تماس با ما</h4>
                            <p>
                                تلفن: ۰۹۳۷۰۷۷۰۳۰۳ | ۳۳۳۵۵۵۷ - ۰۲۱
                                <br>کد پستی: ۳۴۴۹۱-۱۷۱۴۶
                                <br>صندوق پستی: ۳۳۸ -۱۷۱۸۵
                            </p>
                        </div>
                        <div>
                            <h4>آدرس</h4>
                            <p>
                                خیابان 17 شهریور، نرسیده به میدان شهدا، بن بست صادقی، پ 15
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-bottom-wrapper wrapper">
                    <img alt="آیکون کپی رایت" src="http://localhost/ketabshop/wp-content/themes/prime/template-parts/assets/img/Copyright-icon.svg" />
                    <p>۱۴۰۱ تمامی حقوق برای انتشارات میراث اهل قلم محفوظ می باشد.</p>
                </div>
            </div>
        </footer>
        <script type="text/javascript" src="http://localhost/ketabshop/wp-content/themes/prime/template-parts/assets/js/main.js"></script>
        <link rel='stylesheet' id='dashicons-css' href='http://localhost/ketabshop/wp-includes/css/dashicons.min.css?ver=5.9.3' type='text/css' media='all' />
        <link rel='stylesheet' id='admin-bar-rtl-css' href='http://localhost/ketabshop/wp-includes/css/admin-bar-rtl.min.css?ver=5.9.3' type='text/css' media='all' />
        <script type='text/javascript' src='http://localhost/ketabshop/wp-includes/js/hoverintent-js.min.js?ver=2.2.1' id='hoverintent-js-js'></script>
        <script type='text/javascript' src='http://localhost/ketabshop/wp-includes/js/admin-bar.min.js?ver=5.9.3' id='admin-bar-js'></script>
        <script type="text/javascript">
            (function() {
                var request, b = document.body,
                    c = 'className',
                    cs = 'customize-support',
                    rcs = new RegExp('(^|\\s+)(no-)?' + cs + '(\\s+|$)');

                request = true;

                b[c] = b[c].replace(rcs, ' ');
                // The customizer requires postMessage and CORS (if the site is cross domain).
                b[c] += (window.postMessage && request ? ' ' : ' no-') + cs;
            }());
        </script>
        <div id="wpadminbar" class="nojq nojs">
            <a class="screen-reader-shortcut" href="#wp-toolbar" tabindex="1">رفتن به نوار ابزار</a>
            <div class="quicklinks" id="wp-toolbar" role="navigation" aria-label="نوار ابزار">
                <ul id='wp-admin-bar-root-default' class="ab-top-menu">
                    <li id='wp-admin-bar-wp-logo' class="menupop"><a class='ab-item' aria-haspopup="true" href='http://localhost/ketabshop/wp-admin/about.php'><span class="ab-icon" aria-hidden="true"></span><span class="screen-reader-text">درباره وردپرس</span></a>
                        <div class="ab-sub-wrapper">
                            <ul id='wp-admin-bar-wp-logo-default' class="ab-submenu">
                                <li id='wp-admin-bar-about'><a class='ab-item' href='http://localhost/ketabshop/wp-admin/about.php'>درباره وردپرس</a>
                                </li>
                            </ul>
                            <ul id='wp-admin-bar-wp-logo-external' class="ab-sub-secondary ab-submenu">
                                <li id='wp-admin-bar-wporg'><a class='ab-item' href='https://wordpress.org/'>وردپرس</a>
                                </li>
                                <li id='wp-admin-bar-documentation'><a class='ab-item' href='https://wordpress.org/support/'>مستندات</a>
                                </li>
                                <li id='wp-admin-bar-support-forums'><a class='ab-item' href='https://fa.wordpress.org/support/forums/'>پشتیبانی</a>
                                </li>
                                <li id='wp-admin-bar-feedback'><a class='ab-item' href='https://wordpress.org/support/forum/requests-and-feedback'>بازخورد</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li id='wp-admin-bar-site-name' class="menupop"><a class='ab-item' aria-haspopup="true" href='http://localhost/ketabshop/wp-admin/'>میراث قلم</a>
                        <div class="ab-sub-wrapper">
                            <ul id='wp-admin-bar-site-name-default' class="ab-submenu">
                                <li id='wp-admin-bar-dashboard'><a class='ab-item' href='http://localhost/ketabshop/wp-admin/'>پیشخوان</a>
                                </li>
                            </ul>
                            <ul id='wp-admin-bar-appearance' class="ab-submenu">
                                <li id='wp-admin-bar-themes'><a class='ab-item' href='http://localhost/ketabshop/wp-admin/themes.php'>پوسته‌ها</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li id='wp-admin-bar-customize' class="hide-if-no-customize"><a class='ab-item' href='http://localhost/ketabshop/wp-admin/customize.php?url=http%3A%2F%2Flocalhost%2Fketabshop%2Fcheckout%2F'>سفارشی‌سازی</a>
                    </li>
                    <li id='wp-admin-bar-updates'><a class='ab-item' href='http://localhost/ketabshop/wp-admin/update-core.php'><span class="ab-icon" aria-hidden="true"></span><span class="ab-label" aria-hidden="true">5</span><span class="screen-reader-text updates-available-text">5 به‌روزرسانی دردسترس</span></a>
                    </li>
                    <li id='wp-admin-bar-comments'><a class='ab-item' href='http://localhost/ketabshop/wp-admin/edit-comments.php'><span class="ab-icon" aria-hidden="true"></span><span class="ab-label awaiting-mod pending-count count-0" aria-hidden="true">0</span><span class="screen-reader-text comments-in-moderation-text">0 دیدگاه در حالت رسیدگی</span></a>
                    </li>
                    <li id='wp-admin-bar-new-content' class="menupop"><a class='ab-item' aria-haspopup="true" href='http://localhost/ketabshop/wp-admin/post-new.php'><span class="ab-icon" aria-hidden="true"></span><span class="ab-label">تازه</span></a>
                        <div class="ab-sub-wrapper">
                            <ul id='wp-admin-bar-new-content-default' class="ab-submenu">
                                <li id='wp-admin-bar-new-post'><a class='ab-item' href='http://localhost/ketabshop/wp-admin/post-new.php'>نوشته</a>
                                </li>
                                <li id='wp-admin-bar-new-media'><a class='ab-item' href='http://localhost/ketabshop/wp-admin/media-new.php'>رسانه</a>
                                </li>
                                <li id='wp-admin-bar-new-page'><a class='ab-item' href='http://localhost/ketabshop/wp-admin/post-new.php?post_type=page'>برگه</a>
                                </li>
                                <li id='wp-admin-bar-new-product'><a class='ab-item' href='http://localhost/ketabshop/wp-admin/post-new.php?post_type=product'>محصول</a>
                                </li>
                                <li id='wp-admin-bar-new-shop_order'><a class='ab-item' href='http://localhost/ketabshop/wp-admin/post-new.php?post_type=shop_order'>سفارش</a>
                                </li>
                                <li id='wp-admin-bar-new-shop_coupon'><a class='ab-item' href='http://localhost/ketabshop/wp-admin/post-new.php?post_type=shop_coupon'>کد تخفیف</a>
                                </li>
                                <li id='wp-admin-bar-new-user'><a class='ab-item' href='http://localhost/ketabshop/wp-admin/user-new.php'>کاربر</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li id='wp-admin-bar-edit'><a class='ab-item' href='http://localhost/ketabshop/wp-admin/post.php?post=66&#038;action=edit'>ویرایش برگه</a>
                    </li>
                </ul>
                <ul id='wp-admin-bar-top-secondary' class="ab-top-secondary ab-top-menu">
                    <li id='wp-admin-bar-search' class="admin-bar-search">
                        <div class="ab-item ab-empty-item" tabindex="-1">
                            <form action="http://localhost/ketabshop/" method="get" id="adminbarsearch">
                                <input class="adminbar-input" name="s" id="adminbar-search" type="text" value="" maxlength="150" />
                                <label for="adminbar-search" class="screen-reader-text">جستجو</label>
                                <input type="submit" class="adminbar-button" value="جستجو" />
                            </form>
                        </div>
                    </li>
                    <li id='wp-admin-bar-my-account' class="menupop with-avatar"><a class='ab-item' aria-haspopup="true" href='http://localhost/ketabshop/wp-admin/profile.php'>سلام <span class="display-name">root</span><img alt='' src='http://2.gravatar.com/avatar/5d3831c0c3ac9e44f67b7fe675bccca0?s=26&#038;d=mm&#038;r=g' srcset='http://2.gravatar.com/avatar/5d3831c0c3ac9e44f67b7fe675bccca0?s=52&#038;d=mm&#038;r=g 2x' class='avatar avatar-26 photo' height='26' width='26' loading='lazy'/></a>
                        <div
                            class="ab-sub-wrapper">
                            <ul id='wp-admin-bar-user-actions' class="ab-submenu">
                                <li id='wp-admin-bar-user-info'>
                                    <a class='ab-item' tabindex="-1" href='http://localhost/ketabshop/wp-admin/profile.php'>
                                        <img alt='' src='http://2.gravatar.com/avatar/5d3831c0c3ac9e44f67b7fe675bccca0?s=64&#038;d=mm&#038;r=g' srcset='http://2.gravatar.com/avatar/5d3831c0c3ac9e44f67b7fe675bccca0?s=128&#038;d=mm&#038;r=g 2x' class='avatar avatar-64 photo'
                                             height='64' width='64' loading='lazy' /><span class='display-name'>root</span>
                                    </a>
                                </li>
                                <li id='wp-admin-bar-edit-profile'><a class='ab-item' href='http://localhost/ketabshop/wp-admin/profile.php'>ویرایش شناسنامه</a>
                                </li>
                                <li id='wp-admin-bar-logout'><a class='ab-item' href='http://localhost/ketabshop/wp-login.php?action=logout&#038;_wpnonce=454dc6647d'>بیرون رفتن</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <a class="screen-reader-shortcut" href="http://localhost/ketabshop/wp-login.php?action=logout&#038;_wpnonce=454dc6647d">بیرون رفتن</a>
        </div>

</body>

</html>