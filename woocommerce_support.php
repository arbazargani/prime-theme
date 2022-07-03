<?php
function mytheme_add_woocommerce_support()
{
    add_theme_support("woocommerce", [
        'thumbnail_image_height' => 200,
        'gallery_thumbnail_image_width' => 100,
        // 'single_image_width' => 330,
        // 'single_image_hight' => 470,
        'crop' => 0,
    ]);
    add_theme_support("post-thumbnails");
}

function mytheme_remove_woocommerce_sidebar()
{
//    if( is_checkout() || is_cart() || is_product() ){
//        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
//    }
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
}

add_action('woocommerce_before_main_content', 'mytheme_remove_woocommerce_sidebar');
add_action("after_setup_theme", "mytheme_add_woocommerce_support");
add_filter( 'woocommerce_prevent_admin_access', '__return_false');
// add_filter('woocommerce_disable_admin_bar', '__return_false');

add_theme_support("wc-product-gallery-zoom");
add_theme_support("wc-product-gallery-lightbox");
add_theme_support("wc-product-gallery-slider");
add_filter("woocommerce_enqueue_styles", "__return_false");

function add_custom_taxonomy($name, $singular, $after_singular)
{
    $labels = array(
        "name" => "$singular",
        "singular_name" => "$singular",
        "menu_name" => "$singular$after_singular",
        "all_items" => "تمام $singular$after_singular",
        "parent_item" => "$singular والد",
        "parent_item_colon" => "$singular والد:",
        "new_item_name" => "نام $singular",
        "add_new_item" => "افزودن $singular",
        "edit_item" => "ویرایش $singular",
        "update_item" => "بروزرسانی $singular",
        "separate_items_with_commas" => "جداسازی به وسیله (,)",
        "search_items" => "جستجوی $singular$after_singular",
        "add_or_remove_items" => "ایجاد و یا حذف $singular",
        "choose_from_most_used" => "انتخاب از بیشترین مورد استفاده$after_singular",
    );
    $args = array(
        "labels" => $labels,
        "hierarchical" => true,
        "public" => true,
        "show_ui" => true,
        "show_admin_column" => true,
        "show_in_nav_menus" => true,
        "show_tagcloud" => true,
        "has_archive" => true,
    );
    register_taxonomy("$name", "product", $args);
    register_taxonomy_for_object_type("$name", "product");
}

function register_custom_taxonomies()
{
    add_custom_taxonomy('authors', 'نویسنده', '‌ها');
    add_custom_taxonomy('translators', 'مترجم', '‌ها');
}

add_action("init", "register_custom_taxonomies");



//add to cart button ajax
function ql_woocommerce_ajax_add_to_cart_js() {
    if (function_exists('is_product') && is_product()) {
        wp_enqueue_script('custom_script', get_bloginfo('stylesheet_directory') . 'template-parts/assets/js/ajax_add_to_cart.js', array('jquery'),'1.0' );
    }
}
add_action('wp_enqueue_scripts', 'ql_woocommerce_ajax_add_to_cart_js');

add_action('wp_ajax_ql_woocommerce_ajax_add_to_cart', 'ql_woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_ql_woocommerce_ajax_add_to_cart', 'ql_woocommerce_ajax_add_to_cart');
function ql_woocommerce_ajax_add_to_cart() {
    $product_id = apply_filters('ql_woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('ql_woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);
    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {
        do_action('ql_woocommerce_ajax_added_to_cart', $product_id);
        if ('yes' === get_option('ql_woocommerce_cart_redirect_after_add')) {
            wc_add_to_cart_message(array($product_id => $quantity), true);
        }
        WC_AJAX :: get_refreshed_fragments();
    } else {
        $data = array(
            'error' => true,
            'product_url' => apply_filters('ql_woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));
        echo wp_send_json($data);
    }
    wp_die();
}

function prime_woocommerce_clear_cart_shortcode() {

    global $woocommerce;

    if ( isset( $_GET['empty-cart'] ) ) {
        $woocommerce->cart->empty_cart();
    }
}

add_action( 'init', 'prime_woocommerce_clear_cart_shortcode' );



function reset_wp_query_per_page_count( $query ){
    $query->set('posts_per_page', -1);
    return $query;
}
add_action('pre_get_posts', 'reset_wp_query_per_page_count');
