<?php
// /*
// * Creating a function to create our CPT
// */
  
// function custom_post_type() {
  
//     // Set UI labels for Custom Post Type
//         $labels = array(
//             'name'                => _x( 'نویسندگان', 'Post Type General Name', 'twentytwentyone' ),
//             'singular_name'       => _x( 'نویسنده', 'Post Type Singular Name', 'twentytwentyone' ),
//             'menu_name'           => __( 'نویسندگان', 'twentytwentyone' ),
//             'parent_item_colon'   => __( 'نویسنده', 'twentytwentyone' ),
//             'all_items'           => __( 'همه نویسندگان', 'twentytwentyone' ),
//             'view_item'           => __( 'نمایش نویسنده', 'twentytwentyone' ),
//             'add_new_item'        => __( 'افزودن نویسنده تازه', 'twentytwentyone' ),
//             'add_new'             => __( 'افزودن نویسنده', 'twentytwentyone' ),
//             'edit_item'           => __( 'ویرایش نویسنده', 'twentytwentyone' ),
//             'update_item'         => __( 'بروزرسانی', 'twentytwentyone' ),
//             'search_items'        => __( 'جسجتوی نویسنده', 'twentytwentyone' ),
//             'not_found'           => __( 'پیدا نشد.', 'twentytwentyone' ),
//             'not_found_in_trash'  => __( 'در زباله‌دان پیدا نشد.', 'twentytwentyone' ),
//         );
          
//     // Set other options for Custom Post Type
          
//         $args = array(
//             'label'               => __( 'نویسنده‌گان', 'twentytwentyone' ),
//             'description'         => __( 'نویسندگان و آثار', 'twentytwentyone' ),
//             'labels'              => $labels,
//             // Features this CPT supports in Post Editor
//             // 'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
//             'supports'            => array( 'title', 'editor','author', 'thumbnail'),
//             // You can associate this CPT with a taxonomy or custom taxonomy. 
//             'taxonomies'          => array( 'نویسنده' ),
//             /* A hierarchical CPT is like Pages and can have
//             * Parent and child items. A non-hierarchical CPT
//             * is like Posts.
//             */
//             'hierarchical'        => false,
//             'public'              => true,
//             'show_ui'             => true,
//             'show_in_menu'        => true,
//             'show_in_nav_menus'   => true,
//             'show_in_admin_bar'   => true,
//             'menu_position'       => 5,
//             'can_export'          => true,
//             'has_archive'         => true,
//             'exclude_from_search' => false,
//             'publicly_queryable'  => true,
//             'capability_type'     => 'post',
//             'show_in_rest' => true,
      
//         );
          
//         // Registering your Custom Post Type
//         register_post_type( 'book_authors', $args );
      
//     }
      
//     /* Hook into the 'init' action so that the function
//     * Containing our post type registration is not 
//     * unnecessarily executed. 
//     */
      
//     add_action( 'init', 'custom_post_type', 0 );