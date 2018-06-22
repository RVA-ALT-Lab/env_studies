<?php
/**
 * publication post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<header class="entry-header publication">
    <!--<h1 class="publication-title"><?php //echo get_the_title();?></h1> REMOVE IF DROPPING PERMANANTLY -->  		
	</header><!-- .entry-header -->

  <div class="row the-publication-row">
    <div class="col-md-4">
    	<?php 
        if ( has_post_thumbnail() ) {
          the_post_thumbnail('large', array('class' => 'publication-image responsive', 'alt' => 'Image representing the document.'));
        } 
        ?>
    </div>
    <div class="col-md-8 publication-content">  
      <h1 class="the-pub"><?php echo the_pub_authors();?> (<?php echo the_pub_year();?>) <?php the_title(); echo the_pub_title(); echo the_pub_issue(); echo the_pub_pages(); echo the_pub_link();?></h1>
      <h3 id="abstract-button">Abstract<span id="abstract-status"> +</span></h3>
      <div class="the-abstract hide" id="abstract-container">
        <?php the_content();?>    
      </div>       
    </div>   
  </div>        

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
