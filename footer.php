<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage nmycia
 * @since nmycia 1.0
 */
?>
	
	<footer id="footer" class="site-footer" role="contentinfo">
		<div id="footer-content">
			
		<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
			<ul class="widget-footer column small-12 medium-6">
				<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
			</ul>
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
			<ul class="widget-footer column small-12 medium-6">
				<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
			</ul>
		<?php endif; ?>

		
		</div>
	</footer><!-- footer -->
	
	</section><!-- #main -->
	
	<?php wp_footer(); ?>
	</body>
</html>