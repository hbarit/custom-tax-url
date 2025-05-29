<?php
/***
 * Example for Product CPT
 * 
 * */


function my_custom_post_type() {
    $args = array(
        'label' => 'Products',
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'products/%product-category%'), // Include category in the slug
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'taxonomies' => array('product-category'), // Register the category taxonomy
    );
    register_post_type('my_custom_post', $args);
}
add_action('init', 'my_custom_post_type');



function my_custom_rewrite_tag() {
    add_rewrite_tag('%product-category%', '([^&]+)');
}
add_action('init', 'my_custom_rewrite_tag');


