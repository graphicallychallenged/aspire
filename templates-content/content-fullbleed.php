<?php
/**
 * Template part for displaying page content in pages using the Fullbleed Template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aspire
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<!-- 	<header class="entry-header">
		<div class="container">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</div>
	</header> -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aspire' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
