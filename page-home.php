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
			
			<?php  $rows = get_field('gallery_home');  ?>
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
			        	
			        	<?php if($title): ?>
			        	<?php endif; ?>
			        	
						</div><!--content-section-->
			        <?php endif; ?>
			
			   <?php endwhile;  ?>
			
			<?php endif; ?>
			
			<div class="content-section hide">
				
				<div class="column medium-6">
					<div class="title-section">
						<div class="inner">
							<h4>Estudio</h4>
							<h1>Nieto, Moran & Cía. Abogados</h1>
						</div>
					</div>
					
					<div class="excerpt-section">
						<div class="inner">
							<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</h2>
						</div>
						
					</div>
				</div>
				
				<div class="column medium-6 content-text">
					<div class="text-section">
						
						<div class="inner">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate.</p>
 
							<p>Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate.</p>
						</div>
					</div>
				
				</div>
					
				<div class="thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/test/1400x800_2.jpg" alt="1400x800_1">
				</div>

			</div>

			<div class="featured-section" data-equalizer>
				<div class="column medium-8 large-7">
					<div class="left-section" data-equalizer-watch>
						<div class="inner">
							<div class="intro-section column medium-4">
								<h4>Nuestro equipo</h4>
								<h1>Abogados</h1>
								<a class="button-line button-white" href="">Saber más</a>
							</div>
							
							<div class="column medium-offset-1 medium-7">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
							</div>
						</div>
					</div>
					
				</div>
				
				<div class="column medium-4 large-5">
					
					<div class="right-section" data-equalizer-watch>
						<div class="inner">
							<h4>Nuestro equipo</h4>
							<h1>Consultores</h1>
							<a class="button-line" href="">Saber más</a>
						</div>
					</div>
					
				</div>
				
				<div class="thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/test/1400x800_3.jpg" alt="1400x800_1">
				</div>

			</div>

			<div id="areas-section">
				
				<div class="title-section">
					<h1>Áreas de Práctica</h1>
				</div>
				
				<ul id="areas" class="small-block-grid-2 medium-block-grid-3">
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