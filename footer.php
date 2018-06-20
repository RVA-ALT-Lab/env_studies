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
   <div class="jumbotron water">   
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
           <h2 class="major-section">VCU Life Sciences</h2>
          <div class="row">
          <div class="col-lg-4">
            <div class="card">
              <img class="card-img-top" src="<?php echo THEME_IMG_PATH; ?>bio-complexity.jpg" alt="Card image cap">
              <div class="card-body hvr-underline-from-center">
                <h3 class="card-title">
                  <a href="#">Center for the Study of Biological Complexity</a>
                </h3>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
              <img class="card-img-top" src="<?php echo THEME_IMG_PATH; ?>rice-center.jpg" alt="Card image cap">
              <div class="card-body hvr-underline-from-center">
                <h3 class="card-title">
                  <a href="#">Rice Rivers Center</a>
                </h3>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
              <img class="card-img-top" src="<?php echo THEME_IMG_PATH; ?>env-studies.jpg" alt="Card image cap">
              <a href="#">
                <div class="card-body hvr-underline-from-center">
                  <h3 class="card-title">
				           Center for Life Sciences Education
                  </h3>
                </div>
              </a>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="wrapper" id="wrapper-footer">

	<footer class="<?php echo esc_attr( $container ); ?>">

		<div class="row" id="footer">


							<div class="footer-widget col-md-3">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer - far left") ) : ?><?php endif;?>
							</div>
							<div class="footer-widget col-md-3">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer - medium left") ) : ?><?php endif;?>
							</div>
							<div class="footer-widget col-md-3">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer - medium right") ) : ?><?php endif;?>
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

