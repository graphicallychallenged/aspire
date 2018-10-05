<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aspire
 */

 // Get the ID and post type of current entry
 $entry_id  = get_the_ID();
 $entry_post_type = get_post_type();
 $masthead_video_id    = aspire_get_masthead_video($entry_id, $entry_post_type);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php // If we have a featured video, display it
		if (!empty($masthead_video_id)) : ?>

			<div id="featured-video" class="video entry-featured-video mb-3">
				<?php
					// Insert JW Player
					echo do_shortcode('[jwplayer ' . $masthead_video_id[0] . ']');
				?>
			</div>

		<?php
		elseif(aspire_get_thumbnail_url()) : ?>

			<div class="entry-featured-image">
				<img src="<?php echo aspire_get_thumbnail_url('large'); ?>" class="img-fluid mb-3">
			</div>

		<?php
		else : ?>

		<?php
		endif; ?>

		<div class="entry-meta">
			<?php echo get_the_term_list( $post->ID, 'category', '', ', ' ); ?> <?php if( get_the_term_list($post->ID, 'seeyourselfhere') ) { echo ' | ' . get_the_term_list( $post->ID, 'seeyourselfhere', '', ', ' ); } ?>
		</div><!-- .entry-meta -->

		<h1 class="entry-title">
			<?php the_title(); ?>
		</h1>

		<?php
		if ( has_excerpt() ) : ?>
			<div class="entry-summary">
				<p class="lead"><?php echo get_the_excerpt(); ?></p>
	    </div>
		<?php
		endif; ?>

		<div class="entry-byline">
			<?php aspire_posted_on(); ?>
			<?php aspire_posted_by(); ?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<hr>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
