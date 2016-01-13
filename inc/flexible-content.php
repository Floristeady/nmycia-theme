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
	        	
        	<div id="<?php echo $id; ?>" class="content-section slide">
        	
		     	<div class="column <?php if($text): ?>medium-6 <?php else : ?>medium-12 <?php endif; ?>">
					<div class="title-section">
						<div class="inner">
							<?php if($subtitle): ?>
							<h4><?php echo $subtitle; ?></h4>
							<?php endif; ?>
							
							<?php if($title): ?>
							<h1><?php echo $title; ?></h1>
							<hr>
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
	        
	        <div id="<?php echo $id; ?>" class="featured-section slide" data-equalizer>
				<div class="column <?php if($link_right and $title_right): ?>medium-8 large-7<?php else: ?> medium-12 small-centered<?php endif; ?>">
					<div class="left-section" data-equalizer-watch>
						<div class="inner">
							<div class="intro-section column <?php if($text_left): ?>medium-4<?php else: ?> medium-12<?php endif; ?>">
								<?php if($subtitle_left): ?>
								<h4><?php echo $subtitle_left; ?></h4>
								<?php endif; ?>
								<?php if($title_left): ?>
								<h1><?php echo $title_left; ?></h1><hr>
								<?php endif; ?>
								
								<?php if($link_left): ?>
								<a class="button-line button-white" href="<?php echo $link_left; ?>"><?php _e('Saber más', 'nmycia'); ?></a>
								<?php endif; ?>
							</div>
							
							<?php if($text_left): ?>
							<div class="column medium-offset-1 medium-7 text">
								<?php echo $text_left; ?>
							</div>
							<?php endif; ?>
						</div>
					</div>
					
				</div>
				
				<?php if($link_right and $title_right): ?>
				<div class="column medium-4 large-5">
					
					<div class="right-section" data-equalizer-watch>
						<div class="inner">
							<?php if($subtitle_right): ?>
							<h4><?php echo $subtitle_right; ?></h4>
							<?php endif; ?>
							
							<?php if($title_right): ?>
							<h1><?php echo $title_right; ?></h1><hr>
							<?php endif; ?>
							
							<?php if($link_right): ?>
							<a class="button-line" href="<?php echo $link_right; ?>"><?php _e('Saber más', 'nmycia'); ?></a>
							<?php endif; ?>

						</div>
					</div>
					
				</div>
				<?php endif; ?>

			</div><!--featured-section-->
		        
	    <?php endif; ?>
	
	<?php endwhile;  ?>
	
<?php //end
	endif; ?>

