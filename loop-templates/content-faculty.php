<?php
/**
 * faculty post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">


    <h1 class="faculty-title"><?php echo get_the_title(); the_faculty_degree();?></h1>   		
    <div class="faculty-titles"><?php the_faculty_title();?></div>
	</header><!-- .entry-header -->
  <div class="row">
    <div class="faculty-bio col-md-4">
    	<?php 
        if ( has_post_thumbnail() ) {
          the_post_thumbnail('large', array('class' => 'faculty-bio-image responsive'));
        } else {

        }
        ?>
    </div>

    <div class="col-md-8 faculty-bio-content">  
    <?php the_content();?>
     
      </div>
    </div>        

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
