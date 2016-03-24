<?php
/**
 * Template Name: Plantilla abogados
 * @package WordPress
 * @subpackage nmycia
 * @since nmycia 1.0
 */

get_header(); ?>

<div id="content" class="site-content page-team">
	
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<div class="row <?php if( $post->post_parent ) { echo 'with-parent'; }?>">
					
					<div class="column medium-8">
							
						<header class="entry-header">
						<?php
							if( $post->post_parent ) {
								$slug = sanitize_title( get_the_title($post->post_parent), $fallback_title );
							 ?>
							<h4 class="entry-subtitle"><a href="/#<?php echo $slug ?>"><?php echo get_the_title( $post->post_parent ); ?></a></h4>
						<?php } ?>
						
						<?php the_title( '<h1 class="entry-title">', '</h1>' );?>
						
						<?php  if (has_excerpt()) :
			
							$excerpt = get_the_excerpt(); 
								echo '<h2 class="entry-excerpt">'. $excerpt .'</h2>';
						 endif; ?>
						
						</header>
	
						<div class="entry-content">
							<?php
								the_content();
					
								edit_post_link( __( 'Edit', 'nmycia' ), '<span class="edit-link">', '</span>' );
							?>
						</div>
					</div>
					
				</div>
				
				<?php  $rows = get_field('info_team');  ?>
				<?php if($rows) { ?>
				<div id="team">					
					
					<ul class="items">
						
						<?php foreach($rows as $row) { ?>
						<li>
							<div class="row">
								<div class="column medium-7 info">
									<div class="inner">
									<?php if($row['name_team']) { ?>
										<h4><?php echo ($row['name_team'])  ?></h4>
										<?php if($row['email_team']) { ?>
										<a href="mailto:<?php echo ($row['email_team'])  ?>"><?php echo ($row['email_team'])  ?></a>			<?php } ?>
									<?php } ?>
									
									<?php if($row['bio_team']) { ?>
										<div class="entry-bio">
										<?php echo ($row['bio_team'])  ?>	
										</div>									
									<?php } ?>
									
									</div>
											
								</div>
								
								<?php if($row['image_team']) { ?>
								
								<div class="column medium-5 img img-team">
									
									<?php 
									   $image = $row['image_team'];
									   $url = $image['url']; 
									   echo wp_get_attachment_image( $image, 'medium-team-image'); 
								    ?>
								    
								</div>
								<?php } ?>
								
							</div>
						</li>
						<?php }?>
						
					</ul>	
										
				</div>
				<?php } ?>
				
			</article>
		<?php endwhile; ?>

</div><!-- #content -->

<?php get_footer(); ?>