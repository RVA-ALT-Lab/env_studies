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

/**
 * Load widget functions.
 */
require get_template_directory() . '/inc/custom-widgets.php';

/**
 * Load widget functions.
 */
require get_template_directory() . '/inc/custom-post-types.php';


//set a path for IMGS

  if( !defined('THEME_IMG_PATH')){
   define( 'THEME_IMG_PATH', get_stylesheet_directory_uri() . '/imgs/' );
  }

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


function bannerMaker(){
	global $post;
	 if ( get_the_post_thumbnail_url( $post->ID ) && $post->post_type === 'page' ) {
      //$thumbnail_id = get_post_thumbnail_id( $post->ID );
      $thumb_url = get_the_post_thumbnail_url($post->ID);
      //$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

        return '<div class="jumbotron custom-header-img" style="background-image:url('. $thumb_url .')"></div>';

    } 
}


//FACULTY BIO FUNCTIONS
function the_faculty_degree() {
  global $post;
  $degrees = get_field( "degree", $post->ID );

  if( $degrees ) {
    foreach ($degrees as $degree )    
      return ', '.$degree;
  } 
}

function the_faculty_title() {
  global $post;
  $titles = get_field( "title", $post->ID );

  if( $titles ) {
    foreach ($titles as $title )    
      return '<div class="title">'.$title.'</div>';
  } 
}

function the_faculty_expertise(){
   global $post;
   $expertise = get_field( "area_of_expertise", $post->ID );
   if ($expertise){
    return '<div class="expertise">'.$expertise.'</div>';
   }
}

function the_faculty_phone(){
   global $post;
   $phone = get_field( "phone_number", $post->ID );
   if ($phone){
    return '<div class="phone">Phone: <a href="tel:'.$phone.'">'.$phone.'</a></div>';
   }
}

function the_faculty_office(){
   global $post;
   $office = get_field( "office_location", $post->ID );
   if ($office){
    return '<div class="office">Office: '.$office.'</div>';
   }
}

function the_faculty_email(){
   global $post;
   $email = get_field( "email_address", $post->ID );
   if ($email){
    return '<div class="email">Email: <a href="mailto:'.$email.'">'.$email.'</a></div>';
   }
}

function the_faculty_website(){
   global $post;
   $faculty = $post->post_title;
   $website = get_field( "website", $post->ID );
   if ($website){
    return '<div class="website"><a href="'.$website.'">Visit the website of '. $faculty .'</a></div>';
   }
}


function the_faculty_group() {
  global $post;
  $group = get_field( "staff_group", $post->ID );

  if( $group ) {
    foreach ($group as $the_group )    
      return strtolower($the_group);
  } 
}


//FUNCTIONS FOR PUBLICATIONS

function the_pub_authors(){
   global $post;
   $authors = get_field( "authors", $post->ID );
   if ($authors){
    return '<span class="pub-authors">'.$authors.'</span>';
   }
}

function get_the_pub_author_level(){
   global $post;
   $level = get_field( "author_level", $post->ID );
   if ($level && $level != 'None'){
    return $level . ' Author(s)';
   }
}


function the_pub_year(){
   global $post;
   $year = get_field( "publication_year", $post->ID );
   if ($year){
    return '<span class="pub-year">'.$year.'</span>';
   }
}

function the_pub_year_class(){
   global $post;
   $year = get_field( "publication_year", $post->ID );
   if ($year){
    return $year;
   }
}

function the_pub_title(){
   global $post;
   $pub_title = get_field( "publication", $post->ID );
   if ($pub_title){
    return '<span class="pub-title"> '.$pub_title.'</span>';
   }
}

function the_pub_issue(){
   global $post;
   $pub_issue = get_field( "issue", $post->ID );
   if ($pub_issue){
    return '<span class="pub-issue"> '.$pub_issue.':</span>';
   }
}


function the_pub_pages(){
   global $post;
   $pub_pages = get_field( "pages", $post->ID );
   if ($pub_pages){
    return '<span class="pub-pages">'.$pub_pages.'.</span>';
   }
}

function the_pub_link(){
   global $post;
   $pub_link = get_field( "doi_url", $post->ID );
   if ($pub_link){
    return '<span class="pub-link"> <a href="'.$pub_link.'">'.$pub_link.'</a>.</span>';
   }
}


//shortcode for faculty content by type
function altlab_faculty_shortcode( $atts, $content = null ) {
    extract(shortcode_atts( array(
         'type' => '',  
    ), $atts));     

    $html ='';
    $type = htmlspecialchars_decode($type);
               $args = array(
                      'posts_per_page' => -1,
                      'post_type'   => 'faculty', 
                      'post_status' => 'publish', 
                      'orderby' => 'name', 
                      'order' => 'ASC',                
                      'meta_query' => array(
                      'relation'    => 'OR',
                      array(
                        'key'   => 'staff_group',
                        'value'   => $type,
                        'compare' => 'LIKE'
                      ),
                  )
                      //do the published option and consider sorting
                    );
                    // query
                    $the_query = new WP_Query( $args );
                    if( $the_query->have_posts() ): 
                      while ( $the_query->have_posts() ) : $the_query->the_post(); 
                      $html .= '<div class="row the-faculty">';
                      $html .= '<div class="faculty-img col-md-4">';
                        if ( has_post_thumbnail() ) {
                        $html .=  get_the_post_thumbnail(get_the_ID(),'large', array('class' => 'faculty-bio-image responsive', 'alt' => 'Faculty portrait.'));
                        }  
                       $html .= '</div><div class="col-md-8"><h2 class="faculty-title">';
                       $html .=  get_the_title(); the_faculty_degree();
                       $html .= '</h2><div class="row"><div class="col-md-6 faculty-bio-content"><div class="faculty-titles">';
                       $html .= the_faculty_title();
                       $html .= '</div>';
                       $html .= the_faculty_expertise();
                       $html .= '</div><div class="col-md-6 faculty-contact-info">';
                       $html .= the_faculty_phone();
                       $html .= the_faculty_office();    
                       $html .= the_faculty_email(); 
                       $html .= the_faculty_website();
                       $html .= the_content();
                       //$html .= the_faculty_group();
                       $html .= '</div></div></div></div>';          
                     endwhile;
                  endif;
            wp_reset_query();  // Restore global post data stomped by the_post().
   return $html;
}

add_shortcode( 'get-faculty', 'altlab_faculty_shortcode' );

//modify faculty JSON endpoint to include faculty type 
add_action( 'rest_api_init', 'add_faculty_type_to_json' );
function add_faculty_type_to_json() {

    register_rest_field(
        'faculty',
        'staff_group',
        array(
            'get_callback'    => 'faculty_return_type',
        )
    );
}

// Return acf field staff_group
function faculty_return_type( $object, $field_name, $request ) {
    global $post;
    $faculty_type = get_field('staff_group', $post->ID); 
    return $faculty_type[0];
}

//allow filtering of that JSON by the new field

//THIS LETS US SEARCH BY staff_group variables **********or does it
add_filter( 'rest_faculty_query', function( $args, $request ) {
    $staff_group   = $request->get_param( 'staff_group' );
 
    if ( ! empty( $staff_group ) ) {
        $args['staff_group'] = array(
            array(
                'key'     => 'staff_group',
                'value'   => $staff_group,
                'compare' => '===',
            )
        );      
    }
 
    return $args;
}, 10, 2 );

//shortcode for RESEARCH content by type
function altlab_publication_shortcode( $atts, $content = null ) {
    extract(shortcode_atts( array(
         'year' => '', 
         'type' => '', 
    ), $atts));     
    if ($year){
      $year; 
      $compare = '=';   
    } else {
      $year = '1';    
      $compare = '>';
    }
    $html ='';
    if($type){
       $type = htmlspecialchars_decode($type);
    }
              $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; 

               $args = array(
                      'posts_per_page' => 10,
                      'paged' => $paged,
                      'post_type'   => 'publication', 
                      'nopaging' => false,
                      'post_status' => 'publish', 
                      'meta_key' => 'publication_year',                                                         
                      'orderby' => 'meta_value_num',                
                      'meta_query' => array(
                      'relation'    => 'OR',
                      array(
                        'key'   => 'publication_year',
                        'value'   => $year,
                        'compare' => $compare
                      ),                     
                  )
                      //do the published option and consider sorting
                    );
                    // query
                    $the_pub_query = new WP_Query( $args );
                    if( $the_pub_query->have_posts() ): 
                      while ( $the_pub_query->have_posts() ) : $the_pub_query->the_post(); 
                     $html .= '<div class="row the-publication-row year-'.the_pub_year_class().' ' . the_pub_author_level() . '"><div class="col-md-4">';                         
                             if ( has_post_thumbnail() ) {
                               $html .=  get_the_post_thumbnail(get_the_ID(),'large', array('class' => 'publication-image responsive', 'alt' => 'Document image.'));
                        }                         
                       $html .= '</div><div class="col-md-8 publication-content"><h1 class="the-pub">';
                       $html .= the_pub_authors();
                       $html .= the_pub_year();
                       $html .= get_the_title(); 
                       $html .= the_pub_title(); 
                       $html .= the_pub_issue(); 
                       $html .= the_pub_pages(); 
                       $html .= the_pub_link();                     
                       $html .= '</h1><button data-toggle="collapse" data-target="#post-' . get_the_ID(). '" class="abstract-button">Abstract</button><div class="the-abstract abstract-container collapse" id="post-' . get_the_ID(). '">';
                       $html .= get_the_content();
                         $html .= '</div></div></div>';                
                     endwhile;
                         $html .= pagination( $paged, $the_pub_query->max_num_pages);
                  endif;
                  
            wp_reset_query();  // Restore global post data stomped by the_post().
   return $html;
}

add_shortcode( 'get-publications', 'altlab_publication_shortcode' );


//PAGINATION ADDITION FROM STACKOVERFLOW https://wordpress.stackexchange.com/questions/154360/pagination-custom-query
if ( ! function_exists( 'pagination' ) ) :
    function pagination( $paged = '', $max_page = '' )
    {
        $big = 999999999; // need an unlikely integer
        if( ! $paged )
            $paged = get_query_var('paged');
        if( ! $max_page )
            $max_page = $wp_query->max_num_pages;

        return paginate_links( array(
            'base'       => str_replace($big, '%#%', esc_url(get_pagenum_link( $big ))),
            'format'     => '?paged=%#%',
            'current'    => max( 1, $paged ),
            'total'      => $max_page,
            'mid_size'   => 1,
            'prev_text'  => __('«'),
            'next_text'  => __('»'),
            'type'       => 'list'
        ) );
    }
endif;




//shortcode for content by category
function altlab_content_shortcode( $atts, $content = null ) {
    extract(shortcode_atts( array(
         'cat' => '',  
         'num' => '',
         'ex' => ''
    ), $atts));     

    if (!$num){
      $num = 3;
    } 

    if (!$cat){
      $cat = false;
      $cat_link = get_post_type_archive_link();
    } else {
      $cat_id = get_cat_id($cat);
      $cat_name = get_cat_name($cat_id);
      $cat_link = get_category_link($cat_id);
    }

    if (!$ex){
      $ex = false;
    } 

    $html ='';
    $num = intval($num);    
   
               $args = array(
                      'posts_per_page' => $num,
                      'post_type'   => 'post', 
                      'post_status' => 'publish', 
                      'orderby' => 'date',  
                      'category_name' => $cat,
                      'nopaging' => false,                                        
                    );
               
                    // query
                    $the_query = new WP_Query( $args );
                    if( $the_query->have_posts() ): 
                      while ( $the_query->have_posts() ) : $the_query->the_post(); 
                      $html .= '<div class="row sc-posts">';
                      $html .= '<div class="sc-post-img col-md-12">';
                        if ( has_post_thumbnail() ) {
                        $html .=  get_the_post_thumbnail(get_the_ID(),'medium', array('class' => 'sc-post-image responsive aligncenter', 'alt' => 'Featured image.'));
                        }  
                       $html .= '</div><a href="'.get_post_permalink().'"><h3 class="sc-post-title">';
                       $html .=  get_the_title();
                       $html .= '</h3></a>';  
                       if ($ex){                  
                        $html .= '<div class="sc-post-content">' .get_the_excerpt() . '</div>';
                      }
                       $html .= '</div>';          
                     endwhile;
                     $html .= '<a class="content-button" href="'.$cat_link.'">See More '. $cat_name .'</a>';
                  endif;
            wp_reset_query();  // Restore global post data stomped by the_post().
   return $html;
}

add_shortcode( 'get-posts', 'altlab_content_shortcode' );




/*
NO LONGER NEEDED BC OF FUNCTIONAL CHANGES

function people_sorter(){
  if (is_page_template('page-templates/fullwidthpage-faculty.php')){
   return '<div id="sorting-row" class="sorting-hat bg-transparent"><button id="academic_button">ACADEMIC FACULTY</button><button id="staff_button" >STAFF</button><button id="adjunct_button">ADJUNCTS & AFFILIATES</button>
        </div>'; 
      }

}
*/


//*****************ACF option that will automatically include these in sites with ACF active
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
      'key' => 'field_5b29104bb299c991',
      'label' => 'Staff Group',
      'name' => 'staff_group',
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
        'Academic Faculty' => 'Academic Faculty',
        'Staff' => 'Staff',
        'Adjuncts & Affiliates' => 'Adjuncts & Affiliates',
        'Emeritus' => 'Emeritus', 
        'Student' => 'Student',      
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

acf_add_local_field_group(array (
  'key' => 'group_5b2bd623ba8a6',
  'title' => 'publication',
  'fields' => array (
    array (
      'key' => 'field_5b2bd6298ee60',
      'label' => 'Author(s)',
      'name' => 'authors',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '70',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'tabs' => 'all',
      'toolbar' => 'basic',
      'media_upload' => 0,
      'delay' => 0,
    ),
    array (
      'key' => 'field_5b2d078f61d64',
      'label' => 'Author level',
      'name' => 'author_level',
      'type' => 'radio',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '30',
        'class' => '',
        'id' => '',
      ),
      'choices' => array (
        'None' => 'None',
        'Undergraduate' => 'Undergraduate',
        'Graduate' => 'Graduate',
        'Graduate' => 'Graduate',
        'Undergraduate & Graduate' => 'Undergraduate & Graduate',
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
      'key' => 'field_5b2d02294c743',
      'label' => 'Publication',
      'name' => 'publication',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '50',
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
      'key' => 'field_5b2d0188f65ff',
      'label' => 'Publication Year',
      'name' => 'publication_year',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '50',
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
      'key' => 'field_5b2d05df1ddeb',
      'label' => 'Volume',
      'name' => 'issue',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '33',
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
      'key' => 'field_5b2d05f1fc4ec',
      'label' => 'Pages',
      'name' => 'pages',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '33',
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
      'key' => 'field_5b2d023e4c744',
      'label' => 'DOI URL',
      'name' => 'doi_url',
      'type' => 'url',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '33',
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
        'value' => 'publication',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'acf_after_title',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => array (
    0 => 'discussion',
    1 => 'comments',
    2 => 'format',
    3 => 'page_attributes',
    4 => 'categories',
    5 => 'tags',
    6 => 'send-trackbacks',
  ),
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
 
