<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Initialize theme default settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom pagination for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Comments file.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';


//ADD FONTS and VCU Brand Bar
add_action('wp_enqueue_scripts', 'alt_lab_scripts');
function alt_lab_scripts() {
	$query_args = array(
		'family' => 'Roboto:300,400,700|Old+Standard+TT:400,700|Oswald:400,500,700',
		'subset' => 'latin,latin-ext',
	);
	wp_enqueue_style ( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );

	wp_enqueue_script( 'vcu_brand_bar', 'https:///branding.vcu.edu/bar/academic/latest.js', array(), '1.1.1', true );

	wp_enqueue_script( 'alt_lab_js', get_template_directory_uri() . '/js/alt-lab.js', array(), '1.1.1', true );

    }

//add footer widget areas
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - far left',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - medium left',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);


if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - medium right',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - far right',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

//set a path for IMGS

  if( !defined(THEME_IMG_PATH)){
   define( 'THEME_IMG_PATH', get_stylesheet_directory_uri() . '/imgs/' );
  }


function bannerMaker(){
	global $post;
	 if ( get_the_post_thumbnail_url( $post->ID ) && $post->post_type === 'page' ) {
      //$thumbnail_id = get_post_thumbnail_id( $post->ID );
      $thumb_url = get_the_post_thumbnail_url($post->ID);
      //$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

        return '<div class="jumbotron custom-header-img" style="background-image:url('. $thumb_url .')"></div>';

    } 
}

//Faculty custom post type

// Register Custom Post Type faculty
// Post Type Key: faculty
function create_faculty_cpt() {

  $labels = array(
    'name' => __( 'Faculty', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Faculty', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Faculty', 'textdomain' ),
    'name_admin_bar' => __( 'Faculty', 'textdomain' ),
    'archives' => __( 'Faculty Archives', 'textdomain' ),
    'attributes' => __( 'Faculty Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Parent faculty:', 'textdomain' ),
    'all_items' => __( 'All faculty', 'textdomain' ),
    'add_new_item' => __( 'Add New Faculty', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Faculty', 'textdomain' ),
    'edit_item' => __( 'Edit Faculty', 'textdomain' ),
    'update_item' => __( 'Update Faculty', 'textdomain' ),
    'view_item' => __( 'View Faculty', 'textdomain' ),
    'view_items' => __( 'View Faculty', 'textdomain' ),
    'search_items' => __( 'Search Faculty', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into faculty', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this faculty', 'textdomain' ),
    'items_list' => __( 'faculty list', 'textdomain' ),
    'items_list_navigation' => __( 'faculty list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter faculty list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'faculty', 'textdomain' ),
    'description' => __( 'the great people we work with', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array(),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-universal-access-alt',
  );
  register_post_type( 'faculty', $args );
  
  // flush rewrite rules because we changed the permalink structure -----NOT FULLY TESTED !!!!!!!!!!!!!!!!!!!!!!!!!
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_faculty_cpt', 0 );

//FACULTY BIO FUNCTIONS
function the_faculty_degree() {
  global $post;
  $degrees = get_field( "degree", $post->ID );

  if( $degrees ) {
    foreach ($degrees as $degree )    
      echo ', '.$degree;
  } 
}

function the_faculty_title() {
  global $post;
  $titles = get_field( "title", $post->ID );

  if( $titles ) {
    foreach ($titles as $title )    
      echo '<div class="title">'.$title.'</div>';
  } 
}

function the_faculty_expertise(){
   global $post;
   $expertise = get_field( "area_of_expertise", $post->ID );
   if ($expertise){
    echo '<div class="expertise">Area of expertise: '.$expertise.'</div>';
   }
}

function the_faculty_phone(){
   global $post;
   $phone = get_field( "phone_number", $post->ID );
   if ($phone){
    echo '<div class="phone">Phone: <a href="tel:'.$phone.'">'.$phone.'</a></div>';
   }
}

function the_faculty_office(){
   global $post;
   $office = get_field( "office_location", $post->ID );
   if ($office){
    echo '<div class="office">Office: '.$office.'</div>';
   }
}

function the_faculty_email(){
   global $post;
   $email = get_field( "email_address", $post->ID );
   if ($email){
    echo '<div class="email">Email: <a href="mailto:'.$email.'">'.$email.'</a></div>';
   }
}

function the_faculty_website(){
   global $post;
   $faculty = $post->post_title;
   $website = get_field( "website", $post->ID );
   if ($website){
    echo '<div class="website"><a href="'.$website.'">Visit the website of '. $faculty .'</a></div>';
   }
}


//ACF option that will automatically include these in sites with ACF active
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
  'key' => 'group_5b290ff211e39',
  'title' => 'faculty details',
  'fields' => array (
    array (
      'key' => 'field_5b290ff8b299b',
      'label' => 'Degree',
      'name' => 'degree',
      'type' => 'checkbox',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'choices' => array (
        'Ph.D.' => 'Ph.D.',
        'M.S.' => 'M.S.',
        'M.Ed.' => 'M.Ed.',
        'J.D.' => 'J.D.',
      ),
      'allow_custom' => 0,
      'save_custom' => 0,
      'default_value' => array (
      ),
      'layout' => 'vertical',
      'toggle' => 0,
      'return_format' => 'value',
    ),
    array (
      'key' => 'field_5b29104bb299c',
      'label' => 'Title',
      'name' => 'title',
      'type' => 'checkbox',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'choices' => array (
        'Academic Advisor' => 'Academic Advisor',
        'Adjunct Instructor' => 'Adjunct Instructor',
        'Assistant Director' => 'Assistant Director',
        'Associate Professor' => 'Associate Professor',
        'Assistant Professor' => 'Assistant Professor',
        'Director' => 'Director',
        'Full Professor' => 'Full Professor',
        'Graduate Program Director' => 'Graduate Program Director',
        'Instructor' => 'Instructor',
      ),
      'allow_custom' => 0,
      'save_custom' => 0,
      'default_value' => array (
      ),
      'layout' => 'vertical',
      'toggle' => 0,
      'return_format' => 'value',
    ),
    array (
      'key' => 'field_5b2910dd36a77',
      'label' => 'Area of Expertise',
      'name' => 'area_of_expertise',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array (
      'key' => 'field_5b2910f6169d6',
      'label' => 'Office Location',
      'name' => 'office_location',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array (
      'key' => 'field_5b291100cbdb3',
      'label' => 'Phone Number',
      'name' => 'phone_number',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array (
      'key' => 'field_5b29111bb948a',
      'label' => 'Email Address',
      'name' => 'email_address',
      'type' => 'email',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
    ),
    array (
      'key' => 'field_5b29112bf8a27',
      'label' => 'Website',
      'name' => 'website',
      'type' => 'url',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'faculty',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 1,
  'description' => '',
));

endif;

/*/attempt to auto activate ACF Pro
$result = activate_plugin('advanced-custom-fields-pro/acf.php' );
if ( is_wp_error( $result ) ) {
  // Process Error
}
*/
