<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage nmycia
 * @since nmycia 1.0
 */

get_header(); ?>

<div id="content" class="site-content">

	<?php if ( have_posts() ) : ?>

	<header class="page-header">
		<h1 class="page-title">
			<?php
				if ( is_day() ) :
					printf( __( 'Daily Archives: %s', 'nmycia' ), get_the_date() );

				elseif ( is_month() ) :
					printf( __( 'Monthly Archives: %s', 'nmycia' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'nmycia' ) ) );

				elseif ( is_year() ) :
					printf( __( 'Yearly Archives: %s', 'nmycia' ), get_the_date( _x( 'Y', 'yearly archives date format', 'nmycia' ) ) );

				else :
					_e( 'Archives', 'nmycia' );

				endif;
			?>
		</h1>
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

<?php get_sidebar(); ?>

<?php get_footer(); ?>