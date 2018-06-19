<?php
/**
 * Template Name: Faculty Full Width Page
 *
 * Template for displaying a page without sidebar for faculty.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>
						<?php

							 $args = array(
					            'numberposts' => -1,
					            'post_type'   => 'faculty',					           
					            //do the published option and consider sorting
					          );

					          // query
					          $the_query = new WP_Query( $args );

					          ?>
							 <?php if( $the_query->have_posts() ): ?>
						          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						           <div class="row">
						           	<div class="col-md-12"><h2 class="faculty-title"><?php echo get_the_title(); the_faculty_degree();?></h2></div>   	
								    <div class="faculty-bio col-md-4">
								    	<?php 
								        if ( has_post_thumbnail() ) {
								          the_post_thumbnail('large', array('class' => 'faculty-bio-image responsive', 'alt' => 'Faculty portrait.'));
								        } 
								        ?>
								    </div>
								    <div class="col-md-4 faculty-bio-content">  
								      <div class="faculty-titles"><?php the_faculty_title();?></div>
								      <?php the_faculty_expertise();?>           
								    </div>
								    <div class="col-md-4 faculty-contact-info">
								      <?php the_faculty_phone();?>
								      <?php the_faculty_office();?>    
								      <?php the_faculty_email();?>    
								      <?php the_content();?>
								    </div>
								  </div>        
						          <?php endwhile; ?>
						       <?php endif; ?>

          <?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>
						
						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :

							comments_template();

						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
