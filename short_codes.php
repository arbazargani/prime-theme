<?php
function authors_list() {
    $response = helper_get_tax_terms('authors');
    $output = '';
    $output_wrapper_before = '<ul class="authors-list">';
    $output_wrapper_after = '</ul>';
    foreach ($response as $term) {
        $link = get_term_link($term->slug, 'authors');
        $output .= '<li>' . "<a href='$link' target='_blank'>" . $term->name . '</a></li>';
    }
    return $output_wrapper_before . $output . $output_wrapper_after;
}
// register shortcode
add_shortcode('render_authors_list', 'authors_list');
