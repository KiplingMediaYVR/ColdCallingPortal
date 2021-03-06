<?php
function theme_enqueue_styles()
{
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('avada-stylesheet'));
    wp_enqueue_style('animate', get_stylesheet_directory_uri() . '/css/animate.css');
    wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('jquery-mcustomscrollbar', get_stylesheet_directory_uri() . '/css/jquery.mCustomScrollbar.css');
    wp_enqueue_style('owl-carousel', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css');
    wp_enqueue_style('owl-theme', get_stylesheet_directory_uri() . '/css/owl.theme.default.min.css');
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/css/style.css');
    wp_enqueue_style('responsive', get_stylesheet_directory_uri() . '/css/responsive.css');

}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function scripts()
{
    // enqueue script
    wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array(), '4.0.0', true);
    wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custome.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('enquiry', get_stylesheet_directory_uri() . '/js/enquiry.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('html5', get_stylesheet_directory_uri() . '/js/html5.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('jquery-mcustomscrollbar', get_stylesheet_directory_uri() . '/js/jquery.mCustomScrollbar.concat.min.js', array('jquery'), '3.1.13', true);
    wp_enqueue_script('owl-carousel', get_stylesheet_directory_uri() . '/js/owl-carousel.min.js', array('jquery'), '2.2.0', true);
    wp_enqueue_script('respond', get_stylesheet_directory_uri() . '/js/respond.js', array('jquery'), '1.4.2', true);
    wp_enqueue_script('wow', get_stylesheet_directory_uri() . '/js/wow.js', array('jquery'), '1.0.0', true);

}

add_action('wp_enqueue_scripts', 'scripts');

function avada_lang_setup()
{
    $lang = get_stylesheet_directory() . '/languages';
    load_child_theme_textdomain('Avada', $lang);
}

add_action('after_setup_theme', 'avada_lang_setup');


/*
* Creating a function to create our CPT Coaching
*/

function custom_post_type_coaching()
{

// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Coaching', 'Post Type General Name', 'avada'),
        'singular_name' => _x('Coaching', 'Post Type Singular Name', 'avada'),
        'menu_name' => __('Coaching', 'avada'),
        'parent_item_colon' => __('Parent Coaching', 'avada'),
        'all_items' => __('All Coaching', 'avada'),
        'view_item' => __('View Coaching', 'avada'),
        'add_new_item' => __('Add New Coaching', 'avada'),
        'add_new' => __('Add New', 'avada'),
        'edit_item' => __('Edit Coaching', 'avada'),
        'update_item' => __('Update Coaching', 'avada'),
        'search_items' => __('Search Coaching', 'avada'),
        'not_found' => __('Not Found', 'avada'),
        'not_found_in_trash' => __('Not found in Trash', 'avada'),
    );

// Set other options for Custom Post Type

    $args = array(
        'label' => __('coaching', 'avada'),
        'description' => __('Coaching', 'avada'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    // Registering your Custom Post Type
    register_post_type('coaching', $args);

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action('init', 'custom_post_type_coaching', 0);

/*
* Creating a function to create our CPT Events
*/

function custom_post_type_events()
{

// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Events', 'Post Type General Name', 'avada'),
        'singular_name' => _x('Events', 'Post Type Singular Name', 'avada'),
        'menu_name' => __('Events', 'avada'),
        'parent_item_colon' => __('Parent Events', 'avada'),
        'all_items' => __('All Events', 'avada'),
        'view_item' => __('View Events', 'avada'),
        'add_new_item' => __('Add New Events', 'avada'),
        'add_new' => __('Add New', 'avada'),
        'edit_item' => __('Edit Events', 'avada'),
        'update_item' => __('Update Events', 'avada'),
        'search_items' => __('Search Events', 'avada'),
        'not_found' => __('Not Found', 'avada'),
        'not_found_in_trash' => __('Not found in Trash', 'avada'),
    );

// Set other options for Custom Post Type

    $args = array(
        'label' => __('events', 'avada'),
        'description' => __('Events', 'avada'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    // Registering your Custom Post Type
    register_post_type('events', $args);

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action('init', 'custom_post_type_events', 0);


/*
* Creating a function to create our CPT Scripts
*/

function custom_post_type_scripts()
{

// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Scripts', 'Post Type General Name', 'avada'),
        'singular_name' => _x('Scripts', 'Post Type Singular Name', 'avada'),
        'menu_name' => __('Scripts', 'avada'),
        'parent_item_colon' => __('Parent Scripts', 'avada'),
        'all_items' => __('All Scripts', 'avada'),
        'view_item' => __('View Scripts', 'avada'),
        'add_new_item' => __('Add New Scripts', 'avada'),
        'add_new' => __('Add New', 'avada'),
        'edit_item' => __('Edit Scripts', 'avada'),
        'update_item' => __('Update Scripts', 'avada'),
        'search_items' => __('Search Scripts', 'avada'),
        'not_found' => __('Not Found', 'avada'),
        'not_found_in_trash' => __('Not found in Trash', 'avada'),
    );

// Set other options for Custom Post Type

    $args = array(
        'label' => __('scripts', 'avada'),
        'description' => __('Scripts', 'avada'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    // Registering your Custom Post Type
    register_post_type('scripts', $args);

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action('init', 'custom_post_type_scripts', 0);

/*
* Creating a function to create our CPT Liners
*/

function custom_post_type_liners()
{

// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Liners', 'Post Type General Name', 'avada'),
        'singular_name' => _x('Liners', 'Post Type Singular Name', 'avada'),
        'menu_name' => __('Liners', 'avada'),
        'parent_item_colon' => __('Parent Liners', 'avada'),
        'all_items' => __('All Liners', 'avada'),
        'view_item' => __('View Liners', 'avada'),
        'add_new_item' => __('Add New Liners', 'avada'),
        'add_new' => __('Add New', 'avada'),
        'edit_item' => __('Edit Liners', 'avada'),
        'update_item' => __('Update Liners', 'avada'),
        'search_items' => __('Search Liners', 'avada'),
        'not_found' => __('Not Found', 'avada'),
        'not_found_in_trash' => __('Not found in Trash', 'avada'),
    );

// Set other options for Custom Post Type

    $args = array(
        'label' => __('liners', 'avada'),
        'description' => __('Liners', 'avada'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    // Registering your Custom Post Type
    register_post_type('liners', $args);

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action('init', 'custom_post_type_liners', 0);

/*
* Creating a function to create our CPT Market
*/

function custom_post_type_market()
{

// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Market', 'Post Type General Name', 'avada'),
        'singular_name' => _x('Market', 'Post Type Singular Name', 'avada'),
        'menu_name' => __('Market', 'avada'),
        'parent_item_colon' => __('Parent Market', 'avada'),
        'all_items' => __('All Market', 'avada'),
        'view_item' => __('View Market', 'avada'),
        'add_new_item' => __('Add New Market', 'avada'),
        'add_new' => __('Add New', 'avada'),
        'edit_item' => __('Edit Market', 'avada'),
        'update_item' => __('Update Market', 'avada'),
        'search_items' => __('Search Market', 'avada'),
        'not_found' => __('Not Found', 'avada'),
        'not_found_in_trash' => __('Not found in Trash', 'avada'),
    );

// Set other options for Custom Post Type

    $args = array(
        'label' => __('market', 'avada'),
        'description' => __('Market', 'avada'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    // Registering your Custom Post Type
    register_post_type('market', $args);

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action('init', 'custom_post_type_market', 0);

add_action( 'parse_query','changept' );
function changept() {
    if( is_category() && !is_admin() )
        set_query_var( 'post_type', array( 'post', 'coaching' ) );
    return;
}

/**
 * For create Dashboard page - Start
 */
add_action('init', 't5_add_epex');

function t5_add_epex()
{
    add_rewrite_endpoint('member', EP_PERMALINK);
}

add_action('template_redirect', 't5_render_epex');

/**
 * Handle calls to the endpoint.
 */
function t5_render_epex()
{
    if (!is_singular() or !get_query_var('member')) {
        return;
    }

    // You will probably do something more productive.
    $post = get_queried_object();
    get_template_part("pages/member");
    exit;
//    print '<pre>' . htmlspecialchars(print_r($post, TRUE)) . '</pre>';
//    exit;
}


add_filter('request', 't5_set_epex_var');

/**
 * Make sure that 'get_query_var( 'epex' )' will not return just an empty string if it is set.
 *
 * @param  array $vars
 * @return array
 */
function t5_set_epex_var($vars)
{
    isset($vars['member']) and $vars['member'] = true;
    return $vars;
}

/**
 * For Dashboard Page - END
 */