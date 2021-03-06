<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage nmycia
 * @since nmycia 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && nmycia_categorized_blog() ) : ?>
			<div class="entry-meta">
				<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'nmycia' ) ); ?></span>
			</div>
			<?php
				endif;
	
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
				endif;
			?>
	
			<div class="entry-meta">
				<?php
					if ( 'post' == get_post_type() )
						nmycia_posted_on();
	
					if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
				?>
				
					   <?php if ( 'post' == get_post_type() ) : ?>
						<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'nmycia' ), __( '1 Comment', 'nmycia' ), __( '% Comments', 'nmycia' ) ); ?></span>
						<?php endif; ?>
				<?php
			    endif;
				     if ( !is_search() ) : 
					edit_post_link( __( 'Edit', 'nmycia' ), '<span class="edit-link">', '</span>' );
					 endif;
				?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
	
		<?php if ( is_search() ) : ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'nmycia' ) );
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'nmycia' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
	
		</div><!-- .entry-content -->
		<?php endif; ?>
	
		<?php
			if ( is_single() ) :
			 the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' );
			 endif; ?>
	
</article><!-- #post-## -->
