<?php
$cart_url = get_permalink( wc_get_page_id( 'cart' ) );
$cart_items = WC()->cart->get_cart();
?>
<!DOCTYPE html>
<html id="doc">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_bloginfo(); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/css/bootstrap.css'; ?>">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/custom.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo get_template_directory_uri() . "/template-parts/assets/js/city.js"; ?>"></script>
    
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() . "/template-parts/assets/fav/apple-touch-icon.png"; ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() . "/template-parts/assets/fav/favicon-32x32.png"; ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() . "/template-parts/assets/fav/favicon-16x16.png"; ?>">
    <link rel="manifest" href="<?php echo get_template_directory_uri() . "/template-parts/assets/fav/site.webmanifest"; ?>">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri() . "/template-parts/assets/fav/safari-pinned-tab.svg"; ?>" color="#cba044">
    <meta name="apple-mobile-web-app-title" content="میراث اهل قلم">
    <meta name="application-name" content="میراث اهل قلم">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
<?php if (is_user_logged_in()): ?>
    <?php if (user_has_role(get_current_user_id(), 'administrator')): ?>
        <div style="margin-bottom: 32px;">
            <?php wp_footer(); //echo get_current_template(true); ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
<header class="section">
    <div id="header-wrapper" class="wrapper desktop-header">
        <div class="header-left">
            <a href="#"></a>
                <div class="shopping-bag">
                    <div class="shopping-bag-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/shopping-bag.svg'; ?>"
                             alt="آیکون سبد خرید">
                    </div>
                    <div class="shopping-badge">
                        <i id="card-items-count"><?php echo str_en_to_fa(WC()->cart->get_cart_contents_count()); ?></i>
                    </div>
                    <?php if(WC()->cart->get_cart_contents_count() > 0): ?>
                            <!-- Shopping Bag Pop -->
                            <div class="shopping-bag-pop-cont transition-300">
                                <div class="shopping-bag-pop">
                                    <div class="shopping-bag-pop-title">
                                        <a href="#">
                                            سبد خرید‌
                                        </a>
                                    </div>
                                    <div class="shopping-bag-pop-item-wrap">
                                        <?php
                                            foreach ($cart_items as $cart_item_key => $cart_item):
                                                $product = $cart_item['data'];
                                                $product_id = $cart_item['product_id'];
                                                $quantity = $cart_item['quantity'];
                                                $price = WC()->cart->get_product_price($product);
                                                $price_without_unit = $product->price;
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
                                        <div class="shopping-bag-pop-item">
                                            <div class="shopping-bag-pop-item-close">
                                                <a href="<?php echo $remove_url; ?>">
                                                    <svg width="18" height="18" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.96672 9.16732C7.25838 9.16732 9.13338 7.29232 9.13338 5.00065C9.13338 2.70898 7.25838 0.833984 4.96672 0.833984C2.67505 0.833984 0.800049 2.70898 0.800049 5.00065C0.800049 7.29232 2.67505 9.16732 4.96672 9.16732Z" stroke="#292D32" stroke-width="0.625" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path opacity="0.34" d="M3.30005 5H6.63338" stroke="#292D32" stroke-width="0.625" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="shopping-bag-pop-item-count">
                                                <span>
                                                    <?php echo "x " . str_en_to_fa($quantity); ?>
                                                </span>
                                            </div>
                                            <div class="shopping-bag-pop-item-title">
                                                <a href="<?php echo $link; ?>" class="text-overflow-anim">
                                                    <?php echo $product->name; ?>
                                                </a>
                                            </div>
                                            <div class="shopping-bag-pop-item-img">
                                            <a href="#">
                                                <img src="<?php echo $thumbnail; ?>" alt="خرید کتاب <?php echo $product->name; ?>" />
                                                </a>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="shopping-bag-pop-more">
                                        <a href="#">
                                            <svg width="30" height="5" viewBox="0 0 17 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="15.5" cy="1.5" r="1.5" fill="black" fill-opacity="0.1"/>
                                                <circle cx="8.5" cy="1.5" r="1.5" fill="black" fill-opacity="0.1"/>
                                                <circle cx="1.5" cy="1.5" r="1.5" fill="black" fill-opacity="0.1"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="shopping-bag-pop-btn transition-300">
                                        <div class="shopping-bag-pop-btn-close">
                                            <svg width="25" height="25" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.00008 12.8327C10.2084 12.8327 12.8334 10.2077 12.8334 6.99935C12.8334 3.79102 10.2084 1.16602 7.00008 1.16602C3.79175 1.16602 1.16675 3.79102 1.16675 6.99935C1.16675 10.2077 3.79175 12.8327 7.00008 12.8327Z" stroke="#292D32" stroke-width="0.875" stroke-linecap="round" stroke-linejoin="round"/>
                                                <g opacity="0.4">
                                                <path d="M5.34912 8.64932L8.65079 5.34766" stroke="#292D32" stroke-width="0.875" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M8.65079 8.64932L5.34912 5.34766" stroke="#292D32" stroke-width="0.875" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="shopping-bag-pop-btn-basket btn-type-3">
                                            <a href="<?php echo $cart_url; ?>">
                                                تکمیل سفارش
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Shopping Bag Pop End -->
                        <?PHP endif; ?>
                </div>
            <div class="register-btn btn btn-small btn-type-1">
                <?php if (!is_user_logged_in()): ?>
                    <a href="<?php echo helper_register_url(); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/Register-icon.svg'; ?>"
                             alt="آیکون ثبت نام">
                        ثبت نام
                    </a>
                <?php else: ?>
                    <a href="<?php echo home_url('my-account', true); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/Register-icon.svg'; ?>"
                             alt="آیکون ثبت نام">
                        <?php echo (empty(wp_get_current_user()->first_name)) ? wp_get_current_user()->user_login : wp_get_current_user()->first_name; ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class="login-btn btn btn-small btn-type-2">
                <?php if (!is_user_logged_in()): ?>
                    <a href="<?php echo helper_login_url(); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/login-icon.svg'; ?>"
                             alt="آیکون ثبت نام">
                        ورود
                    </a>
                <?php else: ?>
                    <a href="<?php echo wp_logout_url(); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/login-icon.svg'; ?>"
                             alt="آیکون ثبت نام">
                        خروج
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="header-right">
            <div class="header-logo">
                <a href="<?php echo get_home_url(null, true); ?>">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/logo-miraspub.png'; ?>"
                         alt="لوگو انتشارات اهل قلم"/>
                </a>
            </div>
            <div class="navbar">
                <ul>
<!--                    <li>-->
<!--                        <a href="--><?php ////echo home_url(null, true) ?><!--">صفحه اصلی</a>-->
<!--                    </li>-->
                    <li>
                        <a href="<?php echo home_url(null, true) ?>">کتاب ها</a>
                    </li>
                    <li>
                        <a href="<?php echo home_url('/authors/', true); ?>">پدید آورندگان</a>
                    </li>
                    <!--<li>-->
                    <!--    <a href="<?php //echo home_url('/about-us/', true); ?>">درباره ما</a>-->
                    <!--</li>-->
                    <li>
                        <a href="<?php echo home_url('/contact-us/', true); ?>">تماس با ما</a>
                    </li>
                    <li>
                        <a href="<?php echo home_url('/?s', true); ?>">
                            <svg width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.4 23.8C18.696 23.8 23.8 18.696 23.8 12.4C23.8 6.10395 18.696 1 12.4 1C6.10395 1 1 6.10395 1 12.4C1 18.696 6.10395 23.8 12.4 23.8Z" stroke="#FEFEFE" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M24.9996 25.0001L22.5996 22.6001" stroke="#FEFEFE" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>                         
                        </a>
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
            <a href="#"></a>
                <div class="shopping-bag">
                    <div class="shopping-bag-icon">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/shopping-bag.svg'; ?>">
                    </div>
                    <div class="shopping-badge">
                        <i id="card-items-count"><?php echo str_en_to_fa(WC()->cart->get_cart_contents_count()); ?></i>
                    </div>
                    <?php if(WC()->cart->get_cart_contents_count() > 0): ?>
                    <!-- Shopping Bag Pop -->
                    <div class="shopping-bag-pop-cont shopping-bag-pop-cont-mobile transition-300">
                        <div class="shopping-bag-pop">
                            <div class="shopping-bag-pop-title">
                                <a href="#">
                                    سبد خرید‌
                                </a>
                            </div>
                            <div class="shopping-bag-pop-item-wrap">
                                <?php
                                    foreach ($cart_items as $cart_item_key => $cart_item):
                                        $product = $cart_item['data'];
                                        $product_id = $cart_item['product_id'];
                                        $quantity = $cart_item['quantity'];
                                        $price = WC()->cart->get_product_price($product);
                                        $price_without_unit = $product->price;
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
                                <div class="shopping-bag-pop-item">
                                    <div class="shopping-bag-pop-item-close">
                                        <a href="<?php echo $remove_url; ?>">
                                            <svg width="18" height="18" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.96672 9.16732C7.25838 9.16732 9.13338 7.29232 9.13338 5.00065C9.13338 2.70898 7.25838 0.833984 4.96672 0.833984C2.67505 0.833984 0.800049 2.70898 0.800049 5.00065C0.800049 7.29232 2.67505 9.16732 4.96672 9.16732Z" stroke="#292D32" stroke-width="0.625" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.34" d="M3.30005 5H6.63338" stroke="#292D32" stroke-width="0.625" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="shopping-bag-pop-item-count">
                                        <span>
                                            <?php echo "x " . str_en_to_fa($quantity); ?>
                                        </span>
                                    </div>
                                    <div class="shopping-bag-pop-item-title transition-300">
                                        <a href="#">
                                            <?php echo $product->name; ?>
                                        </a>
                                    </div>
                                    <div class="shopping-bag-pop-item-img">
                                    <a href="#">
                                        <img src="<?php echo $thumbnail; ?>" alt="کتاب <?php echo $product->name; ?>" />
                                        </a>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="shopping-bag-pop-more">
                                <a href="#">
                                    <svg width="30" height="5" viewBox="0 0 17 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="15.5" cy="1.5" r="1.5" fill="black" fill-opacity="0.1"/>
                                        <circle cx="8.5" cy="1.5" r="1.5" fill="black" fill-opacity="0.1"/>
                                        <circle cx="1.5" cy="1.5" r="1.5" fill="black" fill-opacity="0.1"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="shopping-bag-pop-btn transition-300">
                                <div class="shopping-bag-pop-btn-close">
                                    <svg width="25" height="25" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.00008 12.8327C10.2084 12.8327 12.8334 10.2077 12.8334 6.99935C12.8334 3.79102 10.2084 1.16602 7.00008 1.16602C3.79175 1.16602 1.16675 3.79102 1.16675 6.99935C1.16675 10.2077 3.79175 12.8327 7.00008 12.8327Z" stroke="#292D32" stroke-width="0.875" stroke-linecap="round" stroke-linejoin="round"/>
                                        <g opacity="0.4">
                                        <path d="M5.34912 8.64932L8.65079 5.34766" stroke="#292D32" stroke-width="0.875" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.65079 8.64932L5.34912 5.34766" stroke="#292D32" stroke-width="0.875" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="shopping-bag-pop-btn-basket btn-type-3">
                                    <a href="<?php echo $cart_url; ?>">
                                        تکمیل سفارش
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Shopping Bag Pop End -->
                    <?php endif; ?>
                </div>
            <a href="<?php echo home_url('/?s', true); ?>" class="header-responsive-search">
                <svg width="23" height="23" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.4 23.8C18.696 23.8 23.8 18.696 23.8 12.4C23.8 6.10395 18.696 1 12.4 1C6.10395 1 1 6.10395 1 12.4C1 18.696 6.10395 23.8 12.4 23.8Z" stroke="#FEFEFE" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M24.9996 25.0001L22.5996 22.6001" stroke="#FEFEFE" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>                         
            </a>
        </div>
        <div class="header-right">
            <a href="<?php echo home_url(null, true) ?>">
                <div class="header-logo">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/logo-miraspub.png'; ?>"
                         alt="لوگو انتشارات اهل قلم"/>
                </div>
            </a>
        </div>
    </div>
    <div id="mobile-nav" class="mobile-nav-wrapper transition-300">
        <div class="mobile-nav-wrap">
            <div class="mobile-nav-logo">
                <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/Mobile-Side-Nav-Logo.svg'; ?>"
                     alt="انتشارات میراث اهل قلم">
            </div>
            <div class="mobile-nav-btn-wrap">
                <div class="register-btn btn btn-small btn-type-1">
                    <?php if (!is_user_logged_in()): ?>
                        <a href="<?php echo helper_register_url(); ?>">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/Register-icon.svg'; ?>"
                                 alt="آیکون ثبت نام">
                            ثبت نام
                        </a>
                    <?php else: ?>
                        <a href="<?php echo home_url('my-account', true); ?>">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/Register-icon.svg'; ?>"
                                 alt="آیکون ثبت نام">
                            <?php echo wp_get_current_user()->first_name; ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="login-btn btn btn-small btn-type-2">
                    <?php if (!is_user_logged_in()): ?>
                        <a href="<?php echo helper_login_url(); ?>">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/login-icon.svg'; ?>"
                                 alt="آیکون ثبت نام">
                            ورود
                        </a>
                    <?php else: ?>
                        <a href="<?php echo wp_logout_url(); ?>">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/template-parts/assets/img/login-icon.svg'; ?>"
                                 alt="آیکون ثبت نام">
                            خروج
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mobile-nav">
                <ul>
<!--                    <li>-->
<!--                        <a href="--><?php ////echo home_url(null, true) ?><!--">صفحه اصلی</a>-->
<!--                    </li>-->
                    <li>
                        <a href="<?php echo home_url(null, true) ?>">کتاب ها</a>
                    </li>
                    <li>
                        <a href="<?php echo home_url('/authors/', true); ?>">پدید آورندگان</a>
                    </li>
                    <!-- <li>
                        <a href="<?php echo home_url('/about-us/', true); ?>">درباره ما</a>
                    </li> -->
                    <li>
                        <a href="<?php echo home_url('/contact-us/', true); ?>">تماس با ما</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>