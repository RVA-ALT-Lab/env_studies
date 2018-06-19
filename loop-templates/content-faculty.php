<?php
/**
 * faculty post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<header class="entry-header faculty">
    <h1 class="faculty-title"><?php echo get_the_title(); the_faculty_degree();?></h1>   		
	</header><!-- .entry-header -->

  <div class="row the-faculty">
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
      <?php the_faculty_website();?>   
      <?php the_content();?>
    </div>
  </div>        

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
