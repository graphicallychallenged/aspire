<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aspire
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header mb-3">

		<div class="entry-featured-image">
      <a href="<?php the_permalink(); ?>">
				<img src="<?php echo aspire_get_thumbnail_url('large'); ?>" class="img-fluid mb-3">
      </a>
    </div>

		<div class="entry-meta">
			<?php
			if(get_post_type() == 'post' && get_the_term_list($post->ID, 'category', '', ', ' )){
				echo get_the_term_list( $post->ID, 'category', '', ', ' ) . ' | ';
			} else {
				$obj = get_post_type_object(get_post_type());
				echo '<a href="'. get_post_type_archive_link(get_post_type()). '">' . $obj->labels->name .'</a> | ';
			} ?>

			<?php if( get_the_term_list($post->ID, 'seeyourselfhere') ) { echo get_the_term_list( $post->ID, 'seeyourselfhere', '', ', ' ); } ?>
		</div><!-- .entry-meta -->

		<h2 class="entry-title h3">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>

		<div class="entry-byline">
			<?php aspire_posted_on(); ?>
			<?php aspire_posted_by(); ?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
