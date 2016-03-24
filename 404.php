<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage nmycia
 * @since nmycia 1.0
 */

get_header(); ?>


<div id="content" class="site-content grey">
	
	<div class="row">
		
		<div class="column small-centered small-12">

		<article style="margin:30px 0 120px; text-align: center;" id="post-0" class="post error404 not-found" role="main">
			<h1 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'nmycia' ); ?></h1>
			<p><?php _e( 'It appears the page you are looking for does not exist. Perhaps searching, or one of the links below, can help.', 'nmycia' ); ?></p>
	
		</article>
		
		</div>
	
	</div>
	
</div>

<?php get_footer(); ?>
