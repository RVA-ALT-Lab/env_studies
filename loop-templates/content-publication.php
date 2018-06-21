<?php
/**
 * publication post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<header class="entry-header publication">
    <h1 class="publication-title"><?php echo get_the_title();?></h1>   		
	</header><!-- .entry-header -->

  <div class="row the-publication">
    <div class="col-md-4">
    	<?php 
        if ( has_post_thumbnail() ) {
          the_post_thumbnail('large', array('class' => 'publication-image responsive', 'alt' => 'Image representing the document.'));
        } 
        ?>
    </div>
    <div class="col-md-8 publication-content">  
      <div class="publication-titles"><?php the_title();?></div>
      <?php the_content();?>           
    </div>   
  </div>        

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
