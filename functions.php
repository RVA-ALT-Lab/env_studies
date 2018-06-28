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
 * Load ACF functions.
 */
require get_template_directory() . '/inc/acf-specific.php';


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
    return '<div class="expertise">Area of expertise: '.$expertise.'</div>';
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

function the_pub_author_level(){
   global $post;
   $level = get_field( "author_level", $post->ID );
   if ($level){
    return strtolower($level);
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
                      'numberposts' => -1,
                      'post_type'   => 'faculty', 
                      'post_status' => 'publish', 
                      'order_by' => 'name',  
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
                        $html .=  get_the_post_thumbnail($post->ID,'large', array('class' => 'faculty-bio-image responsive', 'alt' => 'Faculty portrait.'));
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
                       $html .= the_faculty_group();
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
    ), $atts));     
    if ($year){
      $year; 
      $compare = '=';   
    } else {
      $year = '1';    
      $compare = '>';
    }
    $html ='';
    $type = htmlspecialchars_decode($type);
               $args = array(
                      'numberposts' => -1,
                      'post_type'   => 'publication', 
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
                    $the_query = new WP_Query( $args );
                    if( $the_query->have_posts() ): 
                      while ( $the_query->have_posts() ) : $the_query->the_post(); 
                     $html .= '<div class="row the-publication-row year-'.the_pub_year_class().' ' . the_pub_author_level() . '"><div class="col-md-4">';                         
                             if ( has_post_thumbnail() ) {
                               $html .=  get_the_post_thumbnail($post->ID,'large', array('class' => 'publication-image responsive', 'alt' => 'Document image.'));
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
                  endif;
            wp_reset_query();  // Restore global post data stomped by the_post().
   return $html;
}

add_shortcode( 'get-publications', 'altlab_publication_shortcode' );


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
                      'order_by' => 'date',  
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
                        $html .=  get_the_post_thumbnail($post->ID,'medium', array('class' => 'sc-post-image responsive aligncenter', 'alt' => 'Featured image.'));
                        }  
                       $html .= '</div><a href="'.get_post_permalink().'"><h3 class="sc-post-title">';
                       $html .=  get_the_title();
                       $html .= '</h3></a>';  
                       if ($ex){                  
                        $html .= '<div class="row"><div class="sc-post-content">' .get_the_excerpt() . '</div>';
                      }
                       $html .= '</div>';          
                     endwhile;
                     $html .= '<a href="'.$cat_link.'"><button>See More '. $cat_name .'</button></a>';
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





// Register and load the widget
function news_load_widget() {
    register_widget( 'news_widget' );
}
add_action( 'widgets_init', 'news_load_widget' );
 
// Creating the widget 
class news_widget extends WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of your widget
'news_widget', 
 
// Widget name will appear in UI
__('News Widget', 'news_widget_domain'), 
 
// Widget description
array( 'description' => __( 'This will put a :) ', 'wpb_widget_domain' ), ) 
);
}
 
// Creating widget front-end
 
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
 
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
 
// This is where you run the code and display the output
echo __( '<div class="col-md-3" style="width: 80px; height: 80px">:)</div>', 'news_widget_domain' );
echo $args['after_widget'];
}
         
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'news_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class ${1:this}_widget ends here



