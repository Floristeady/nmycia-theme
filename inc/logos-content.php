<?php // Logos home
$rows = get_field('logo_section');  ?>
<?php if($rows) { ?>

<div id="logos-section" class="">
	
	<ul class="slides">
		<?php foreach($rows as $row) { ?>
		<li>
		
		<?php if ($row['logo_image']) { ?>
		 	<?php $attachment_id = $row['logo_image'];
		 	  $attachment_link = $row['logo_link']; ?>
		 	    <?php if ($row['logo_link']) { ?>
		 	  	<a target="_blank" href="<?php echo $attachment_link ?>" class="img"> 
			 	 <?php } else { ?><span class="img"><?php } ?>		
			 	  <?php echo wp_get_attachment_image( $attachment_id, 'original'); ?>
			 	 <?php if ($row['logo_link']) { ?>
		 		 </a><?php } else { ?></span><?php } ?>	
		 <?php } ?>	
		 </li>				
		<?php } ?>

	<?php if (get_field('logo_text')) : ?>
	<div class="logo-text">
		<p><?php the_field('logo_text'); ?></p>
	</div>
	<?php endif; ?>
	
</div>
<?php } ?>