<?php 
//add footer widget areas
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - far left one',
    'id'            => 'footer-far-left-one',    // ID should be LOWERCASE  ! ! !
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - far left two',
    'id'            => 'footer-far-left-two',    // ID should be LOWERCASE  ! ! !
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);


if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - far left three',
    'id'            => 'footer-far-left-three',    // ID should be LOWERCASE  ! ! !    
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - far right',
    'id'            => 'footer-far-right',    // ID should be LOWERCASE  ! ! !    
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

//ABOVE FOOTER WIDGET AREA
//add footer widget areas
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Custom Zone - Left',
    'id'            => 'custom-left',    // ID should be LOWERCASE  ! ! !    
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Custom Zone - Center',
    'id'            => 'custom-center',    // ID should be LOWERCASE  ! ! !        
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);


if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Custom Zone - Right',
    'id'            => 'custom-right',    // ID should be LOWERCASE  ! ! !        
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);




// Register and load the widget
function bio_complex_load_widget() {
    register_widget( 'bio_complex_widget' );
}
add_action( 'widgets_init', 'bio_complex_load_widget' );
 

// Creating the widget 
class bio_complex_widget extends WP_Widget {
 

function __construct() {
  parent::__construct(
   
  // Base ID of your widget
  'bio_complex_widget', 
   
  // Widget name will appear in UI
  __('Bio Complexity', 'bio_complex_widget_domain'), 
   
  // Widget description
  array( 'description' => __( 'Add bio complexity box ', 'wpb_widget_domain' ), ) 
  );
}
 
// Creating widget front-end
 
public function widget( $args, $instance ) {
  //$title = apply_filters( 'widget_title', $instance['title'] );

$bio_complex = '<div class="col-lg-4"><div class="card"><img class="card-img-top" src="'. THEME_IMG_PATH . 'bio-complexity.jpg" alt=""><a href="https://csbc.vcu.edu/"><div class="card-body hvr-underline-from-center"><h3 class="card-title">Center for the Study of Biological Complexity</h3></div></a></div></div>';

 
// before and after widget arguments are defined by themes
  
      // This is where you run the code and display the output
      echo __( $bio_complex, 'bio_complex_widget_domain' );
    }
           
  // Widget Backend 
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
  else {
    $title = __( 'New title', 'bio_complex_widget_domain' );
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




//RICE RIVERS

// Register and load the widget
function rice_rivers_load_widget() {
    register_widget( 'rice_rivers_widget' );
}
add_action( 'widgets_init', 'rice_rivers_load_widget' );
 

// Creating the widget 
class rice_rivers_widget extends WP_Widget {
 

function __construct() {
  parent::__construct(
   
  // Base ID of your widget
  'rice_rivers_widget', 
   
  // Widget name will appear in UI
  __('Rice Rivers', 'rice_rivers_widget_domain'), 
   
  // Widget description
  array( 'description' => __( 'Add rice rivers box ', 'wpb_widget_domain' ), ) 
  );
}
 
// Creating widget front-end
 
public function widget( $args, $instance ) {
  //$title = apply_filters( 'widget_title', $instance['title'] );

$rice_rivers = '<div class="col-lg-4"><div class="card"><img class="card-img-top" src="'. THEME_IMG_PATH . 'rice-center.jpg" alt=""><a href="https://ricerivers.vcu.edu/"><div class="card-body hvr-underline-from-center"><h3 class="card-title">Rice Rivers Center<br>&nbsp;</h3></div></a></div></div>';

 
// before and after widget arguments are defined by themes
  
      // This is where you run the code and display the output
      echo __( $rice_rivers, 'rice_rivers_widget_domain' );
    }
           
  // Widget Backend 
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
  else {
    $title = __( 'New title', 'rice_rivers_widget_domain' );
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



//center for life science education 

// Register and load the widget
function life_sci_load_widget() {
    register_widget( 'life_sci_widget' );
}
add_action( 'widgets_init', 'life_sci_load_widget' );
 

// Creating the widget 
class life_sci_widget extends WP_Widget {
 

function __construct() {
  parent::__construct(
   
  // Base ID of your widget
  'life_sci_widget', 
   
  // Widget name will appear in UI
  __('Life Science', 'life_sci_widget_domain'), 
   
  // Widget description
  array( 'description' => __( 'Add Life Sci box ', 'wpb_widget_domain' ), ) 
  );
}
 
// Creating widget front-end
 
public function widget( $args, $instance ) {
  //$title = apply_filters( 'widget_title', $instance['title'] );

$life_sci = '<div class="col-lg-4"><div class="card"><img class="card-img-top" src="'. THEME_IMG_PATH . 'env-studies.jpg" alt=""><a href="https://lifesciences.vcu.edu/"><div class="card-body hvr-underline-from-center"><h3 class="card-title">Center for Life Science Education</h3></div></a></div></div>';

 
// before and after widget arguments are defined by themes
  
      // This is where you run the code and display the output
      echo __( $life_sci, 'life_sci_widget_domain' );
    }
           
  // Widget Backend 
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
  else {
    $title = __( 'New title', 'life_sci_widget_domain' );
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

