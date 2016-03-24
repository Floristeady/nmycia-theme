<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage nmycia
 * @since nmycia 1.0
 */

get_header(); ?>

<div id="content" class="site-content grey">
	
	<div class="row">


		<?php if ( have_posts() ) : ?>
	
		<header class="archive-header">
			<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'nmycia' ), single_cat_title( '', false ) ); ?></h1>
	
			<?php
				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
				endif;
			?>
		</header>
	
		<div class="">
	
			<?php 
	
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
	
</div><!-- #content -->

<?php get_footer(); ?>