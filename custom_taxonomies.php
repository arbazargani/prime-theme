<?php
// /**
//  * Add custom taxonomies
//  *
//  * Additional custom taxonomies can be defined here
//  * https://codex.wordpress.org/Function_Reference/register_taxonomy
//  */
// function add_custom_taxonomies() {
//     // Add new "نویسندگان" taxonomy to Posts
//     register_taxonomy('authors', 'post', array(
//       // Hierarchical taxonomy (like categories)
//       'hierarchical' => true,
//       // This array of options controls the labels displayed in the WordPress Admin UI
//       'labels' => array(
//         'name' => _x( 'نویسندگان', 'taxonomy general name' ),
//         'singular_name' => _x( 'نویسنده', 'taxonomy singular name' ),
//         'search_items' =>  __( 'جستجوی نویسندگان' ),
//         'all_items' => __( 'تمامی نویسندگان' ),
//         'parent_item' => __( 'نویسنده مادر' ),
//         'parent_item_colon' => __( 'نویسنده مادر:' ),
//         'edit_item' => __( 'ویرایش نویسنده' ),
//         'update_item' => __( 'بروزرسانی نویسنده' ),
//         'add_new_item' => __( 'افزودن نویسنده جدید' ),
//         'new_item_name' => __( 'نام نویسنده' ),
//         'menu_name' => __( 'نویسندگان' ),
//       ),
//       // Control the slugs used for this taxonomy
//       'rewrite' => array(
//         'slug' => 'authors', // This controls the base slug that will display before each term
//         'with_front' => false, // Don't display the category base before "/نویسندگان/"
//         'hierarchical' => true // This will allow URL's like "/نویسندگان/boston/cambridge/"
//       ),
//     ));
//   }
//   add_action( 'init', 'add_custom_taxonomies', 0 );