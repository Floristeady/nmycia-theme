<?php
/**
 * Template Name: Plantilla inicio
 * @package WordPress
 * @subpackage nmycia
 * @since nmycia 1.0
 */

get_header(); ?>

<div id="content" class="site-content">
	
		<?php while ( have_posts() ) : the_post(); ?>
			
			<?php // Gallery home
			$rows = get_field('gallery_home');  ?>
			<?php if($rows) { ?>
			<div id="home-gallery" class="flexslider">
					<ul class="slides">
						<?php foreach($rows as $row) { ?>
						<li>
							<?php if ($row['gallery_text']) { ?>
							<div class="row">
								<div class="columns small-10 large-3 text">
									<div class="inner">
										<h1><?php echo $row['gallery_text'] ?></h1>
										<a title="" class="icon-arrow" href="#estudio"></a>
									</div>
								</div>
							</div>
							<?php } ?>	
							 <?php if ($row['gallery_image']) { ?>
							 	<span class="img">
							 	<?php $attachment_id = $row['gallery_image'];
								 echo wp_get_attachment_image( $attachment_id, 'large-content-image'); ?>
							 	</span>
							 <?php } ?>		
						</li>				
						<?php } ?>
					</ul>
			</div>
			<?php } ?>
			
			<?php // Logos Content
				include('inc/logos-content.php');
			?>
			
			<?php // Flexible Content
				include('inc/flexible-content.php');
			?>
			
			<?php // Areas Content
				include('inc/areas-content.php');
			?>


			<?php if ((get_field('title_section')) or (get_field('column_left_section')) or (get_field('column_right_section'))) : ?>
			<div id="<?php the_field('id_extra_section');?>" class="aditional-section slide">
				<div class="row">
					
					<div class="medium-5 column small-centered">
						<div class="text-section">
							<?php if (get_field('title_section')) : ?>
								<h1><?php the_field('title_section');?></h1>
							<?php endif; ?>
							
							<?php if (get_field('title_section')) : 
								 the_field('text_section');
							 endif; ?>
						</div>
					</div>
					
					<?php if (get_field('column_left_section')) : ?>
					<div class="col-left columns medium-6"><div class="inner"><?php the_field('column_left_section');?></div></div>
					<?php endif; ?>
					
					<?php if (get_field('column_right_section')) : ?>
					<div class="col-right columns medium-6 entry-cleartext"><div class="inner"><?php the_field('column_right_section');?></div></div>
					<?php endif; ?>
				
				</div>
				
			</div>
			<?php endif; ?>
				
	
		<?php endwhile; ?>

</div><!-- #content -->

<?php get_footer(); ?>