# custom-tax-url
Custom URL for WordPress Taxonomy



Step-by-Step Instructions:
1. Register Your Custom Post Type: When you register your custom post type, you can specify the rewrite rules. Here’s an example of how to do this in your theme's functions.php file or a custom plugin:

```
function my_custom_post_type() {
    $args = array(
        'label' => 'My Custom Post',
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'my_custom_post/%category%'), // Include category in the slug
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'taxonomies' => array('category'), // Register the category taxonomy
    );
    register_post_type('my_custom_post', $args);
}
add_action('init', 'my_custom_post_type');
```

2. Flush Rewrite Rules: After registering your custom post type, you need to flush the rewrite rules. You can do this by visiting the Settings > Permalinks page in your WordPress admin. Simply visiting this page will refresh the rewrite rules.

3. Create a Custom Rewrite Tag (Optional): If you want to use a custom rewrite tag for the category, you can add the following code to your functions.php file:


```
function my_custom_rewrite_tag() {
    add_rewrite_tag('%category%', '([^&]+)');
}
add_action('init', 'my_custom_rewrite_tag');

```

4. Update Your Permalink Structure: Make sure your permalink structure is set to use the custom structure that includes the category. You can set it to something like:

```
/%category%/my_custom_post/%postname%/
```