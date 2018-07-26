<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>
   
  <div class="jumbotron base-trio <?php echo get_theme_mod( 'body_background_image_choice' );?>">   
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
           <a href="https://lifesciences.vcu.edu/"><h2 class="major-section hvr-underline-from-center">VCU Life Sciences</h2></a>
          <div class="row">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Custom Zone - Left") ) : ?><?php endif;?>
            
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Custom Zone - Center Left") ) : ?><?php endif;?>
           
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Custom Zone - Center Right") ) : ?><?php endif;?>    

            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Custom Zone - Right") ) : ?><?php endif;?>                                  
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="wrapper" id="wrapper-footer">

	<footer class="<?php echo esc_attr( $container ); ?>">

		<div class="row" id="footer">

							<div class="footer-widget col-md-9">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer - far left one") ) : ?><?php endif;?>
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer - far left two") ) : ?><?php endif;?>
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer - far left three") ) : ?><?php endif;?>
							</div>
							<div class="footer-widget col-md-3">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer - far right") ) : ?><?php endif;?>
							</div>	
											


		</div><!-- row end -->

	</div><!-- container end -->

</footer><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

