<?php
function str_en_to_fa($input)
{
    return strtr($input, array('0' => '۰', '1' => '۱', '2' => '۲', '3' => '۳', '4' => '۴', '5' => '۵', '6' => '۶', '7' => '۷', '8' => '۸', '9' => '۹'));
}

function str_en_to_ar($input)
{
    return strtr($input, array('0' => '٠', '1' => '١', '2' => '٢', '3' => '٣', '4' => '٤', '5' => '٥', '6' => '٦', '7' => '٧', '8' => '٨', '9' => '٩'));
}

function helper_get_product_taxonomies($product_object, $taxonomy_name)
{
    $tax = get_the_terms($product_object->get_id(), $taxonomy_name);
    if (is_bool($tax))
        return [
            'link' => null,
            'name' => 'تعریف نشده'
        ];
    $tax_link = get_term_link($tax[0], $taxonomy_name);
    $tax_name = $tax[0]->name;
    return [
        'link' => $tax_link,
        'name' => $tax_name
    ];
}

function helper_get_product_terms($product_object, $slug, $attribute)
{
    $term = wc_get_product_terms($product_object->id, "pa_$slug");
    if (count($term) && !is_null($term) && $term != '') {
        return $term[0]->$attribute;
    } else {
        return str_replace('-', ' ', $slug) . " تعریف نشده";
    }
}

function helper_is_product_purchasable($product_object)
{
    return ($product_object->get_price() != '' && $product_object->is_in_stock()) ? true : false;
}

function helper_get_taxonomy_archive_link($taxonomy)
{
    $tax = get_taxonomy($taxonomy);
    return get_bloginfo('url') . '/' . $tax->rewrite['slug'];
}

function helper_get_tax_terms($taxonomy)
{
    $terms = get_terms(array(
        'taxonomy' => 'authors',
        'hide_empty' => false,
    ));
    return $terms;
}

function helper_login_url()
{
    return home_url('/login/', true);
}

function helper_register_url()
{
    return home_url('/register/', true);
}

function helper_redirect_logged_in_user($path)
{
    if (is_user_logged_in())
        return header("location: $path");
}

function helper_issetNotNull($input) {
    return (isset($input) && !is_null($input) && strlen($input) != 0) ? true : false;
}

add_filter( 'template_include', 'var_template_include', 1000 );
function var_template_include( $t ){
    $GLOBALS['current_theme_template'] = basename($t);
    return $t;
}

function get_current_template( $echo = false ) {
    if( !isset( $GLOBALS['current_theme_template'] ) )
        return false;
    if( $echo )
        echo $GLOBALS['current_theme_template'];
    else
        return $GLOBALS['current_theme_template'];
}

function user_has_role($user_id, $role_name)
{
    $user_meta = get_userdata($user_id);
    $user_roles = $user_meta->roles;
    return in_array($role_name, $user_roles);
}