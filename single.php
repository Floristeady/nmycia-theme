<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage nmycia
 * @since nmycia 1.0
 */

get_header(); ?>

<div id="content" class="site-content grey">
	
	<?php nmycia_post_thumbnail(); ?>
	
	<div class="row">

	<?php
		
		while ( have_posts() ) : the_post();

			get_template_part( 'content', get_post_format() );

			nmycia_post_nav();

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		endwhile;
	?>
	
	</div>

</div><!-- #content -->

<?php get_footer(); ?>
