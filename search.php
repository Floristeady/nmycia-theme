<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage nmycia
 * @since nmycia 1.0
 */

get_header(); ?>

<div id="content" class="site-content grey">
	
	<div class="row">
		
		<div class="column small-centered small-12">

			<?php if ( have_posts() ) : ?>
		
			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'nmycia' ), get_search_query() ); ?></h1>
			</header>
		
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
