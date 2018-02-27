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
    //wp_enqueue_script('media-uploader', get_stylesheet_directory_uri() . '/js/media-uploader.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('enquiry', get_stylesheet_directory_uri() . '/js/enquiry.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('html5', get_stylesheet_directory_uri() . '/js/html5.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('jquery-mcustomscrollbar', get_stylesheet_directory_uri() . '/js/jquery.mCustomScrollbar.concat.min.js', array('jquery'), '3.1.13', true);
    wp_enqueue_script('owl-carousel', get_stylesheet_directory_uri() . '/js/owl-carousel.min.js', array('jquery'), '2.2.0', true);
    wp_enqueue_script('respond', get_stylesheet_directory_uri() . '/js/respond.js', array('jquery'), '1.4.2', true);
    wp_enqueue_script('wow', get_stylesheet_directory_uri() . '/js/wow.js', array('jquery'), '1.0.0', true);
	//wp_enqueue_script( 'pd-media_uploader', get_template_directory_uri(). '/js/media-uploader.js', array(jquery), '1.0', true );
	
	/* if(function_exists( 'wp_enqueue_media' )){
        wp_enqueue_media();
    }else{
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
    } */

} 

/* sam chauhan  // custom my acount filed*/

add_action( 'woocommerce_save_account_details', 'my_account_saving_billing_phone', 10, 1 );
function my_account_saving_billing_phone( $user_id ) {
    $txt_Brokerage = $_POST['txt_Brokerage'];
    if( ! empty( $txt_Brokerage ) ) {
        update_user_meta( $user_id, 'txt_Brokerage', sanitize_text_field( $txt_Brokerage ) );
    }
	$txt_image = $_FILES['txt_image']['name'];
    if( ! empty( $txt_image ) ) {
		$upload_dir = wp_upload_dir();
		$upload_dir = $upload_dir[basedir];
		$uploaddir = $upload_dir.'/large_image/'; 
		$RandomAccountNumber = uniqid();
        $txt_image = $RandomAccountNumber.$_FILES['txt_image']['name'];
        $file = $uploaddir . basename($RandomAccountNumber.$_FILES['txt_image']['name']);
		$raw_file_name = $_FILES['txt_image']['tmp_name'];
	if (move_uploaded_file($_FILES['txt_image']['tmp_name'], $file)) { update_user_meta( $user_id, 'txt_image', sanitize_text_field( $txt_image ) );}else { echo "error";}
    }
	
    $billing_phone = $_POST['billing_phone'];
    if( ! empty( $billing_phone ) ) {
        update_user_meta( $user_id, 'billing_phone', sanitize_text_field( $billing_phone ) );
    }

    $txt_Website = $_POST['txt_Website'];
    if( ! empty( $txt_Website ) ) {
        update_user_meta( $user_id, 'txt_Website', sanitize_text_field( $txt_Website ) );
    }

    $txt_Facebook = $_POST['txt_Facebook'];
    if( ! empty( $txt_Facebook ) ) {
        update_user_meta( $user_id, 'txt_Facebook', sanitize_text_field( $txt_Facebook ) );
    }

    $author_linkedin = $_POST['author_linkedin'];
    if( ! empty( $author_linkedin ) ) {
        update_user_meta( $user_id, 'author_linkedin', sanitize_text_field( $author_linkedin ) );
    }

    $txt_PersonalMessage = $_POST['txt_PersonalMessage'];
    if( ! empty( $txt_PersonalMessage ) ) {
        update_user_meta( $user_id, 'txt_PersonalMessage', sanitize_text_field( $txt_PersonalMessage ) );
    }

    $txt_city = $_POST['txt_city'];
    if( ! empty( $txt_city) ) {
        $txt_city = implode("," , $txt_city);
        update_user_meta( $user_id, 'txt_city', sanitize_text_field( $txt_city ) );
    }
	
	$txt_city = $_POST['txt_city'];
    if( ! empty( $txt_city) ) {
        $txt_city = implode("," , $txt_city);
        update_user_meta( $user_id, 'txt_city', sanitize_text_field( $txt_city ) );
    }
}


/* 
function ml_restrict_media_library( $wp_query_obj ) {
    global $current_user, $pagenow;
    if( !is_a( $current_user, 'WP_User') )
    return;
    if( 'admin-ajax.php' != $pagenow || $_REQUEST['action'] != 'query-attachments' )
    return;
    if( !current_user_can('manage_media_library') )
    $wp_query_obj->set('author', $current_user->ID );
    return;
}

add_action('admin_init', 'enable_file_uploads_by_role');
add_action('pre_get_posts','ml_restrict_media_library');
add_shortcode( 'the_dramatist_front_upload', 'the_dramatist_front_upload' );


function enable_file_uploads_by_role( ) {
  $role = 'contributor';
  if(!current_user_can($role) || current_user_can('upload_files'))
    return;
    $contributor = get_role( $role );
    $contributor->add_cap('upload_files');
} 

function the_dramatist_front_upload( $args ) {
        // check if user can upload files
         //if ( current_user_can( 'upload_files' ) ) {
		//if ( current_user_can('author') && !current_user_can('upload_files') ) {
        //add_action('admin_init', 'allow_contributor_uploads');
		$str = __( 'Select File', 'text-domain' );
        return '<input id="frontend-button" type="button" value="' . $str . '" class="button" style="position: relative; z-index: 1;"><img id="frontend-image" />';
   //}
    return __( 'Please Login To Upload', 'text-domain' );
} */

/*add_action( 'wp_enqueue_scripts', 'pd_scripts' );
function pd_scripts(){
	
	wp_enqueue_script( 'pd-media_uploader', get_template_directory_uri(). '/js/media-uploader.js', array(), '1.0', true );
	
	if(function_exists( 'wp_enqueue_media' )){
        wp_enqueue_media();
    }else{
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
    }
}



add_action( 'wp_enqueue_scripts', 'the_dramatist_enqueue_scripts' );
add_action('admin_init', 'allow_contributor_uploads');
//add_filter( 'ajax_query_attachments_args', 'the_dramatist_filter_media' );
add_shortcode( 'the_dramatist_front_upload', 'the_dramatist_front_upload' );

function the_dramatist_enqueue_scripts() {
    wp_enqueue_media();
    wp_enqueue_script(
        'some-script',
        get_template_directory_uri() . '/js/media-uploader.js',
        // if you are building a plugin
        // plugins_url( '/', __FILE__ ) . '/js/media-uploader.js',
        array( 'jquery' ),
        null
    );
}

function the_dramatist_filter_media( $query ) {
    // admins get to see everything
    if ( ! current_user_can( 'manage_options' ) )
        $query['author'] = get_current_user_id();
    return $query;
}

function allow_contributor_uploads() {
$contributor = get_role('author');
$contributor->add_cap('upload_files');
}

function the_dramatist_front_upload( $args ) {
    // check if user can upload files
    //if ( current_user_can( 'upload_files' ) ) {
        //if ( current_user_can('author') && !current_user_can('upload_files') ) {
        //add_action('admin_init', 'allow_contributor_uploads');
        $str = __( 'Select File', 'text-domain' );
        return '<input id="frontend-button" type="button" value="' . $str . '" class="button" style="position: relative; z-index: 1;"><img id="frontend-image" />';
    //}
    return __( 'Please Login To Upload', 'text-domain' );
}
*/

/* sam chauhan  // custom my acount filed*/
add_action('wp_enqueue_scripts', 'scripts');

function admin_scripts()
{
    // enqueue script
    wp_enqueue_style('dataTablescss', 'https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css');
    wp_enqueue_script('dataTablesjs', 'https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js', array(), '', true);

}

add_action('admin_enqueue_scripts', 'admin_scripts');

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
        'name' => _x('CCW Events', 'Post Type General Name', 'avada'),
        'singular_name' => _x('CCW Events', 'Post Type Singular Name', 'avada'),
        'menu_name' => __('CCW Events', 'avada'),
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
        'label' => __('ccw events', 'avada'),
        'description' => __('CCW Events', 'avada'),
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
    register_post_type('ccw_events', $args);

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

add_action('parse_query', 'changept');
function changept()
{
    if (is_category() && !is_admin())
        set_query_var('post_type', array('post', 'coaching'));
    return;
}

function get_cpt_archives($cpt, $echo = false)
{
    global $wpdb;
    $sql = $wpdb->prepare("SELECT * FROM $wpdb->posts WHERE post_type = %s AND post_status = 'publish' GROUP BY YEAR($wpdb->posts.post_date), MONTH($wpdb->posts.post_date) ORDER BY $wpdb->posts.post_date DESC", $cpt);
    $results = $wpdb->get_results($sql);

    if ($results) {
        $archive = array();
        foreach ($results as $r) {
            $year = date('Y', strtotime($r->post_date));
            $month = date('m', strtotime($r->post_date));
            $link = get_bloginfo('siteurl') . '/' . $cpt . '/' . $year . '/' . $month;
            $this_archive = array('month' => $month, 'year' => $year, 'link' => $link);
            array_push($archive, $this_archive);
        }

        if (!$echo) {
            return $archive;
        }
        foreach ($archive as $a) {
            echo '<li><a href="' . $a['link'] . '">' . $a['month'] . ' ' . $a['year'] . '</a></li>';
        }
    }
    return false;
}

function cpt_add_rewrite_rules()
{
    $cpt = 'coaching';

    add_rewrite_rule($cpt . '/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})?$',
        'index.php?post_type=' . $cpt . '&year=$matches[1]&monthnum=$matches[2]&day=$matches[3]',
        'top');

    add_rewrite_rule($cpt . '/([0-9]{4})/([0-9]{1,2})?$',
        'index.php?post_type=' . $cpt . '&year=$matches[1]&monthnum=$matches[2]',
        'top');

    add_rewrite_rule($cpt . '/([0-9]{4})?$',
        'index.php?post_type=' . $cpt . '&year=$matches[1]',
        'top');

    add_rewrite_rule($cpt . '/page/([0-9]{4})?$',
        'index.php?post_type=' . $cpt . '&paged=$matches[1]',
        'top');
}

add_filter('init', 'cpt_add_rewrite_rules');

function cpt_add_rewrite_rules2()
{
    $cpt = 'ccw_events';

    add_rewrite_rule($cpt . '/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})?$',
        'index.php?post_type=' . $cpt . '&year=$matches[1]&monthnum=$matches[2]&day=$matches[3]',
        'top');

    add_rewrite_rule($cpt . '/([0-9]{4})/([0-9]{1,2})?$',
        'index.php?post_type=' . $cpt . '&year=$matches[1]&monthnum=$matches[2]',
        'top');

    add_rewrite_rule($cpt . '/([0-9]{4})?$',
        'index.php?post_type=' . $cpt . '&year=$matches[1]',
        'top');
}

add_filter('init', 'cpt_add_rewrite_rules2');

function cpt_add_rewrite_rules3()
{
    $cpt = 'liners';

    add_rewrite_rule($cpt . '/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})?$',
        'index.php?post_type=' . $cpt . '&year=$matches[1]&monthnum=$matches[2]&day=$matches[3]',
        'top');

    add_rewrite_rule($cpt . '/([0-9]{4})/([0-9]{1,2})?$',
        'index.php?post_type=' . $cpt . '&year=$matches[1]&monthnum=$matches[2]',
        'top');

    add_rewrite_rule($cpt . '/([0-9]{4})?$',
        'index.php?post_type=' . $cpt . '&year=$matches[1]',
        'top');
}

add_filter('init', 'cpt_add_rewrite_rules3');

function cpt_add_rewrite_rules4()
{
    $cpt = 'market';

    add_rewrite_rule($cpt . '/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})?$',
        'index.php?post_type=' . $cpt . '&year=$matches[1]&monthnum=$matches[2]&day=$matches[3]',
        'top');

    add_rewrite_rule($cpt . '/([0-9]{4})/([0-9]{1,2})?$',
        'index.php?post_type=' . $cpt . '&year=$matches[1]&monthnum=$matches[2]',
        'top');

    add_rewrite_rule($cpt . '/([0-9]{4})?$',
        'index.php?post_type=' . $cpt . '&year=$matches[1]',
        'top');
}

add_filter('init', 'cpt_add_rewrite_rules4');

function cpt_add_rewrite_rules5()
{
    $cpt = 'scripts';

    add_rewrite_rule($cpt . '/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})?$',
        'index.php?post_type=' . $cpt . '&year=$matches[1]&monthnum=$matches[2]&day=$matches[3]',
        'top');

    add_rewrite_rule($cpt . '/([0-9]{4})/([0-9]{1,2})?$',
        'index.php?post_type=' . $cpt . '&year=$matches[1]&monthnum=$matches[2]',
        'top');

    add_rewrite_rule($cpt . '/([0-9]{4})?$',
        'index.php?post_type=' . $cpt . '&year=$matches[1]',
        'top');
}

add_filter('init', 'cpt_add_rewrite_rules5');

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar()
{
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}


function custom_post_type_phone()
{

// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Phone', 'Post Type General Name', 'avada'),
        'singular_name' => _x('Phone', 'Post Type Singular Name', 'avada'),
        'menu_name' => __('Phone', 'avada'),
        'parent_item_colon' => __('Parent Phone', 'avada'),
        'all_items' => __('All Phone', 'avada'),
        'view_item' => __('View Phone', 'avada'),
        'add_new_item' => __('Add New Phone', 'avada'),
        'add_new' => __('Add New', 'avada'),
        'edit_item' => __('Edit Phone', 'avada'),
        'update_item' => __('Update Phone', 'avada'),
        'search_items' => __('Search Phone', 'avada'),
        'not_found' => __('Not Found', 'avada'),
        'not_found_in_trash' => __('Not found in Trash', 'avada'),
    );

// Set other options for Custom Post Type

    $args = array(
        'label' => __('phone', 'avada'),
        'description' => __('Phone', 'avada'),
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
    register_post_type('phone', $args);

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action('init', 'custom_post_type_phone', 0);


function custom_post_type_door()
{

// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Door to Door', 'Post Type General Name', 'avada'),
        'singular_name' => _x('Door to Door', 'Post Type Singular Name', 'avada'),
        'menu_name' => __('Door to Door', 'avada'),
        'parent_item_colon' => __('Parent Door to Door', 'avada'),
        'all_items' => __('All Door to Door', 'avada'),
        'view_item' => __('View Door to Door', 'avada'),
        'add_new_item' => __('Add New Door to Door', 'avada'),
        'add_new' => __('Add New', 'avada'),
        'edit_item' => __('Edit Door to Door', 'avada'),
        'update_item' => __('Update Door to Door', 'avada'),
        'search_items' => __('Search Door to Door', 'avada'),
        'not_found' => __('Not Found', 'avada'),
        'not_found_in_trash' => __('Not found in Trash', 'avada'),
    );

// Set other options for Custom Post Type

    $args = array(
        'label' => __('door', 'avada'),
        'description' => __('Door to Door', 'avada'),
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
    register_post_type('door', $args);

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action('init', 'custom_post_type_door', 0);

function custom_post_type_email()
{

// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Email/Direct Email', 'Post Type General Name', 'avada'),
        'singular_name' => _x('Email/Direct Email', 'Post Type Singular Name', 'avada'),
        'menu_name' => __('Email/Direct Email', 'avada'),
        'parent_item_colon' => __('Parent Email/Direct Email', 'avada'),
        'all_items' => __('All Email/Direct Email', 'avada'),
        'view_item' => __('View Email/Direct Email', 'avada'),
        'add_new_item' => __('Add New Email/Direct Email', 'avada'),
        'add_new' => __('Add New', 'avada'),
        'edit_item' => __('Edit Email/Direct Email', 'avada'),
        'update_item' => __('Update Email/Direct Email', 'avada'),
        'search_items' => __('Search Email/Direct Email', 'avada'),
        'not_found' => __('Not Found', 'avada'),
        'not_found_in_trash' => __('Not found in Trash', 'avada'),
    );

// Set other options for Custom Post Type

    $args = array(
        'label' => __('email', 'avada'),
        'description' => __('Email/Direct Email', 'avada'),
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
    register_post_type('email', $args);

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action('init', 'custom_post_type_email', 0);

if (!function_exists('ei_services_infinite_scroll')) :
    function ei_services_infinite_scroll()
    {

        $subject = $_POST["subject"];
        $userEmail = $_POST['userEmail'];
        $message = $_POST['message'];
        $cuid = $_POST['cuid'];
        $luid = $_POST['luid'];

        global $wpdb;

        //for upload
        $parent_post_id = isset($_POST['post_id']) ? $_POST['post_id'] : 0;  // The parent ID of our attachments
        $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg", "txt", "pdf", "doc", "docx", "odt"); // Supported file types
        $max_file_size = 1024 * 500; // in kb
        $max_image_upload = 200; // Define how many images can be uploaded to the current post
        $wp_upload_dir = wp_upload_dir();
        $path = $wp_upload_dir['path'] . '/';
        $count = 0;

        $attachments = get_posts(array(
            'post_type' => 'attachment',
            'posts_per_page' => -1,
            'post_parent' => $parent_post_id,
            'exclude' => get_post_thumbnail_id() // Exclude post thumbnail to the attachment count
        ));

        // Image upload handler
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            // Check if user is trying to upload more than the allowed number of images for the current post
            if ((count($attachments) + count($_FILES['files']['name'])) > $max_image_upload) {
                $upload_message[] = "Sorry you can only upload " . $max_image_upload . " images for each Ad";
            } else {
                $multiple_f = array();

                foreach ($_FILES['files']['name'] as $f => $name) {
                    $extension = pathinfo($name, PATHINFO_EXTENSION);
                    // Generate a randon code for each file name
                    $new_filename = cvf_td_generate_random_code(20) . '.' . $extension;

                    if ($_FILES['files']['error'][$f] == 4) {
                        continue;
                    }

                    if ($_FILES['files']['error'][$f] == 0) {
                        // Check if image size is larger than the allowed file size
                        if ($_FILES['files']['size'][$f] > $max_file_size) {
                            $upload_message[] = "$name is too large!.";
                            continue;

                            // Check if the file being uploaded is in the allowed file types
                        } elseif (!in_array(strtolower($extension), $valid_formats)) {
                            $upload_message[] = "$name is not a valid format";
                            continue;

                        } else {
                            // If no errors, upload the file...
                            if (move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path . $new_filename)) {

                                $count++;

                                $filename = $path . $new_filename;
                                $filetype = wp_check_filetype(basename($filename), null);
                                $wp_upload_dir = wp_upload_dir();
                                $attachment = array(
                                    'guid' => $wp_upload_dir['url'] . '/' . basename($filename),
                                    'post_mime_type' => $filetype['type'],
                                    'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                                    'post_content' => '',
                                    'post_status' => 'inherit'
                                );
                                // Insert attachment to the database
                                $attach_id = wp_insert_attachment($attachment, $filename, $parent_post_id);

                                require_once(ABSPATH . 'wp-admin/includes/image.php');

                                // Generate meta data
                                $attach_data = wp_generate_attachment_metadata($attach_id, $filename);
                                wp_update_attachment_metadata($attach_id, $attach_data);

                                $multiple_f[] = wp_get_attachment_url($attach_id);
                            }
                        }
                    }
                }
            }
        }
        // Loop through each error then output it to the screen
        if (isset($upload_message)) :
            foreach ($upload_message as $msg) {
                printf(__('<p class="bg-danger">%s</p>', 'wp-trade'), $msg);
            }
        endif;

        // If no error, show success message
        // if( $count != 0 ){
        //     printf( __('<p class = "bg-success">%d files added successfully!</p>', 'wp-trade'), $count );
        // }
        // end upload

        // $success = $wpdb->insert( 'wp_customuserlist', array(
        //$upload_p = wp_get_attachment_url($attach_id);
       // $upload_p2 = array (serialize($multiple_f));
        $upload_p = maybe_serialize($multiple_f);
        $success = $wpdb->insert('wp_customuserlist', array(
                'current_user_id' => $cuid,
                'list_user_id' => $luid,
                'subject' => $subject,
                'message' => $message,
                'upload_path' => $upload_p,
                'status' => 'new',)
        //array( '%s', '%s', '%s', '%s', '%s', '%s' )
        );


        echo $success . '<br>';
       // print_r($upload_p);
        //echo '<br>';
       // print_r($upload_p2);


        die();
    }
endif;

add_action('wp_ajax_eis_infinite_scroll', 'ei_services_infinite_scroll');
add_action('wp_ajax_nopriv_eis_infinite_scroll', 'ei_services_infinite_scroll');

// upload function
function cvf_td_generate_random_code($length = 10)
{

    $string = '';
    $characters = "23456789ABCDEFHJKLMNPRTVWXYZabcdefghijklmnopqrstuvwxyz";

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $string;

}
add_filter('woocommerce_login_redirect', 'wc_login_redirect');
 
function wc_login_redirect( $redirect_to ) {
     $redirect_to = 'http://youmewebs.com/demo/cold-calling/coaching/';
     return $redirect_to;
}
add_action('after_switch_theme', 'flush_rewrite_rules');