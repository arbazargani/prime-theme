<?php
$config = require_once 'config.php';

if ($config['options']['debug'] == 'false' && $config['options']['hide_script_errors']) {
    error_reporting(0);
}

setcookie(TEST_COOKIE, 'WP Cookie check', 0, COOKIEPATH, COOKIE_DOMAIN);
if ( SITECOOKIEPATH != COOKIEPATH ) setcookie(TEST_COOKIE, 'WP Cookie check', 0, SITECOOKIEPATH, COOKIE_DOMAIN);

function admin_bar(){
    if(is_user_logged_in()){
        add_filter( 'show_admin_bar', '__return_true' , 1000 );
    }
}
add_action('init', 'admin_bar' );

function change_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/template-parts/assets/img/Logo-header.svg);
            height:65px;
            width:320px;
            background-size: 320px 65px;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'change_login_logo' );

function change_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'change_login_logo_url' );

add_theme_support('post-thumbnails', ['post', 'authors', 'translators', 'category', 'taxonomy']);

require_once('helpers.php');
require_once('short_codes.php');
require_once('translation.php');
require_once('custom_post_types.php');
require_once('custom_post_types.php');
require_once('woocommerce_support.php');

function add_image_insert_override($sizes){
    unset( $sizes['thumbnail']);
    unset( $sizes['medium']);
    unset( $sizes['large']);
	
	unset( $sizes[ 'shop_thumbnail' ]);  // Remove Shop thumbnail (180 x 180 hard cropped)
	unset( $sizes[ 'shop_catalog' ]);    // Remove Shop catalog (300 x 300 hard cropped)
	unset( $sizes[ 'shop_single' ]);     // Shop single (600 x 600 hard cropped)
	
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'add_image_insert_override' );

//setcookie(TEST_COOKIE, 'WP Cookie check', 0, COOKIEPATH, COOKIE_DOMAIN);
//if ( SITECOOKIEPATH != COOKIEPATH ) setcookie(TEST_COOKIE, 'WP Cookie check', 0, SITECOOKIEPATH, COOKIE_DOMAIN);

function block_access_to_wp_admin_for_non_admins() {
    if ( is_admin() && ! current_user_can( 'administrator' ) &&
        ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
        wp_redirect( home_url() );
        exit;
    }
}

add_action( 'init', 'block_access_to_wp_admin_for_non_admins' );