<?php 	
	$id = get_field('select_page', 'option');
	$args = array(
	'post_type'	=> array('page'),
	'posts_per_page' => 1,
	'p' => $id[0]
	 );

	$featured_page = new WP_Query( $args ); ?>
	
	<?php if ( $featured_page->have_posts() ) { ?>
	<div id="<?php the_field('id_select_page', 'option');?>" class="areas-section slide">
	
		<?php while ( $featured_page->have_posts() ) : $featured_page->the_post(); ?>
		<div class="title-section">
			<h1><?php the_title();?></h1>
		</div>
		
		<?php 
			$id = get_field('select_page', 'option');
			$args = array(
	        'parent' => $id[0],
	        'hierarchical' => 0,
	        'sort_column' => 'menu_order',
	        'sort_order' => 'ASC'
	        );
	
			$mypages = get_pages( $args );?>
	
		<ul id="areas-list" class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
			
			<?php foreach( $mypages as $postpage ) {
				$childtitle = $postpage->post_title;
				$childid = $postpage->ID;
				$permalink = get_permalink( $childid );
				$thumbnail = get_the_post_thumbnail($childid,'medium-content-image');
				$childslug = $postpage->post_name; 
			?>
			
			<li class="<?php if (!has_post_thumbnail($childid) ) { ?>no-thum<?php }?>">
				<div class="inner">
					<a class="img" href="<?php echo $permalink; ?>">
						<?php echo $thumbnail; ?>
					</a>
					<a class="text" href="<?php echo $permalink; ?>">
						<span class="title"><?php echo $childtitle; ?></span>
						<span class="btn"><?php _e('Read more >', 'nmycia'); ?></span>
					</a>
				</div>
			</li>
			
			<?php  }  ?>
			
		</ul>
	
	<?php endwhile; ?>
	</div>
	
<?php } ?>
<?php wp_reset_query(); ?>