<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage nmycia
 * @since nmycia 1.0
 */

get_header(); ?>


<div id="content" class="site-content grey">
	
	<div class="row">
	<?php
		
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
	
				get_template_part( 'content', get_post_format() );
	
			endwhile;
			nmycia_paging_nav();
	
		else :
			get_template_part( 'content', 'none' );
	
		endif;
	?>
	</div>

</div>


<?php get_footer(); ?>