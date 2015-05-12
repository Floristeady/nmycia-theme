<?php
/**
 * Template Name: Plantilla Inicio
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
								<div class="columns small-11 large-4 text">
									<h1><?php echo $row['gallery_text'] ?></h1>
									<a title="" class="icon-arrow" href="javascript:vois(0)"></a>
								</div>
							</div>
							<?php } ?>	
							 <?php if ($row['gallery_image']) { ?>
							 	<?php $attachment_id = $row['gallery_image'];
								 echo wp_get_attachment_image( $attachment_id, 'large-content-image'); ?>
							 <?php } ?>		
						</li>				
						<?php } ?>
					</ul>
			</div>
			<?php } ?>
			
			<?php // Flexible Content
			if( have_rows('content_flexible') ):
			
			     // loop through the rows of data
			    while ( have_rows('content_flexible') ) : the_row();  ?>
				
			      	<?php //image_big
				      	
				      	if( get_row_layout() == 'image' ): ?>
						
				        <?php if(get_sub_field('image_big')): ?>
				        	<div class="thumbnail">
							<?php $attachment_id = get_sub_field('image_big');
							echo wp_get_attachment_image( $attachment_id, 'large-content-image'); ?>
				        	</div>
						<?php endif; ?>	
			
			        <?php  //content_main
				        
				        elseif( get_row_layout() == 'content_main' ): ?>

			        	<?php 
				        	$id = get_sub_field('id_section_main'); 
				        	$title = get_sub_field('title_section_main');
				        	$subtitle = get_sub_field('subtitle_section_main');
				        	$excerpt = get_sub_field('excerpt_section_main');
				        	$text = get_sub_field('text_section_main');
			        	?>
			        	
			        	<div id="<?php echo $id; ?>" class="content-section">
			        	
					     	<div class="column <?php if($text): ?>medium-6 <?php else : ?>medium-12 <?php endif; ?>">
								<div class="title-section">
									<div class="inner">
										<?php if($subtitle): ?>
										<h4><?php echo $subtitle; ?></h4>
										<?php endif; ?>
										
										<?php if($title): ?>
										<h1><?php echo $title; ?></h1>
										<?php endif; ?>
									</div>
								</div>
								
								<?php if($excerpt): ?>
								<div class="excerpt-section">
									<div class="inner">
										<h2><?php echo $excerpt; ?></h2>
									</div>
									
								</div>
								<?php endif; ?>
								
					     	</div>
							
							<?php if($text): ?>
							<div class="column medium-6 content-text">
								<div class="text-section">
									
									<div class="inner">
										<?php echo $text; ?>
									</div>
								</div>
							</div>
							<?php endif; ?>

						</div><!--content-section-->
						
						
					<?php  //content_featured
				        elseif( get_row_layout() == 'content_featured' ): ?>
				        
				        <?php 
				        	$id = get_sub_field('id_section_featured'); 
				        	$title_left = get_sub_field('title_left_featured');
				        	$subtitle_left = get_sub_field('subtitle_left_featured');
				        	$link_left = get_sub_field('link_left_featured');
				        	$text_left = get_sub_field('text_left_featured');
				        	
				        	$title_right = get_sub_field('title_right_featured');
				        	$subtitle_right = get_sub_field('subtitle_right_featured');
				        	$link_right = get_sub_field('link_right_featured');
			        	?>
				        
				        <div id="<?php echo $id; ?>" class="featured-section" data-equalizer>
							<div class="column medium-8 large-7">
								<div class="left-section" data-equalizer-watch>
									<div class="inner">
										<div class="intro-section column medium-4">
											<h4><?php echo $subtitle_left; ?></h4>
											<h1><?php echo $title_left; ?></h1>
											<a class="button-line button-white" href="<?php echo $link_left; ?>"><?php _e('Saber más', 'nmycia'); ?></a>
										</div>
										
										<div class="column medium-offset-1 medium-7">
											<p><?php echo $text_left; ?></p>
										</div>
									</div>
								</div>
								
							</div>
							
							<div class="column medium-4 large-5">
								
								<div class="right-section" data-equalizer-watch>
									<div class="inner">
										<h4><?php echo $subtitle_right; ?></h4>
										<h1><?php echo $title_right; ?></h1>
										<a class="button-line" href="<?php echo $link_right; ?>"><?php _e('Saber más', 'nmycia'); ?></a>

									</div>
								</div>
								
							</div>
			
						</div><!--featured-section-->
				        
			        <?php endif; ?>
			
			   <?php endwhile;  ?>
			
			<?php endif; ?>
			
			<?php if($title): ?>
			<?php endif; ?>

			<div id="areas" class="areas-section">
				
				<div class="title-section">
					<h1>Áreas de Práctica</h1>
				</div>
				
				<ul id="areas-list" class="small-block-grid-2 medium-block-grid-3">
					<li>
						<a href="#" class="img">
							<img width="500" src="<?php echo get_template_directory_uri(); ?>/images/test/1400x800_3.jpg" alt="1400x800_1">
						</a>
						<a class="text">
							<span class="title">Aguas</span>
							<span class="btn"> Saber más  ></span>
						</a>
					</li>
					
					<li>
						<a href="#" class="img">
							<img width="500" src="<?php echo get_template_directory_uri(); ?>/images/test/1400x800_2.jpg" alt="1400x800_1">
						</a>
						<a class="text">
							<span class="title">Aguas</span>
							<span class="btn"> Saber más  ></span>
						</a>
					</li>
					
					<li>
						<a href="#" class="img">
							<img width="500" src="<?php echo get_template_directory_uri(); ?>/images/test/1400x800_1.jpg" alt="1400x800_1">
						</a>
						<a class="text">
							<span class="title">LITIGIOS Y ARBITRAJES</span>
							<span class="btn"> Saber más  ></span>
						</a>
					</li>
					
					<li>
						<a href="#" class="img">
							<img src="<?php echo get_template_directory_uri(); ?>/images/test/1400x800_3.jpg" alt="1400x800_1">
						</a>
						<a class="text">
							<span class="title">Aguas</span>
							<span class="btn"> Saber más  ></span>
						</a>
					</li>
					
				</ul>
				
			</div>
			
			<div class="aditional-section">
				<div class="row">
					
					<div class="medium-5 column small-centered">
						<div class="text-section">
							<h1>Contacto</h1>
							<p>Por favor completar el formulario con tus datos, pronto te contactaremos.</p>
						</div>
					</div>
					
					<div class="medium-6">
						
						
					</div>
					
					<div class="medium-6">
						
					</div>
				
				</div>
				
			</div>
				
	
		<?php endwhile; ?>

</div><!-- #content -->

<?php get_footer(); ?>