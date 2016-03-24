<?php
/**
 * @package WordPress
 * @subpackage nmycia
 * @since nmycia 1.0
 */

get_header(); ?>

<div id="content" class="site-content grey">
	
	<div class="post-thumbnail">
		<?php the_post_thumbnail('large-top-image'); ?>
	</div>
	
	<div class="row <?php if( $post->post_parent ) { echo 'with-parent'; }?>">
	
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post(); ?>
	
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<div class="column medium-4">
						
						<header class="entry-header">
						<?php
							if( $post->post_parent ) { ?>
							<h4 class="entry-subtitle"><a href="/#equipo"><?php echo get_the_title( $post->post_parent ); ?></a></h4>
						<?php } ?>
						
						<?php the_title( '<h1 class="entry-title">', '</h1>' );?>
						
						<?php  if (has_excerpt()) :
			
							$excerpt = get_the_excerpt(); 
								echo '<h2 class="entry-excerpt">'. $excerpt .'</h2>';
						 endif; ?>
						
						</header>
						
					</div>
				
					<div class="column medium-8">
						<div class="entry-content">
							<?php
								the_content();
					
								edit_post_link( __( 'Edit', 'nmycia' ), '<span class="edit-link">', '</span>' );
							?>
						</div>
					</div>
				</article>
	
		<?php endwhile; ?>
		
	</div>

</div><!-- #content -->

<?php get_footer(); ?>