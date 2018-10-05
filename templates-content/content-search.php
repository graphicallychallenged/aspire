<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aspire
 */

$content_type = get_post_type_object(get_post_type())->labels->singular_name;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row mb-0'); ?>>

	<div class="entry-image col-md-6 mb-3">
		<a href="<?php the_permalink(); ?>">
			<img src="<?php echo aspire_get_thumbnail_url(); ?>" class="img-fluid">
		</a>
	</div>

	<div class="entry-content col-md-6">
		<header class="entry-header">
			<div class="entry-meta text-muted text-uppercase">
				<p style="margin-bottom: 6px;">
					<?php // Get the parent content ID, if any:
						$parent_id = get_post_meta( get_the_ID(), '_wpcf_belongs_series_id', true );
						if($parent_id) {

							$parent_title = get_the_title($parent_id);
							$parent_link = get_the_permalink($parent_id); ?>

							<a href="<?php echo $parent_link; ?>" class="text-muted">
								<?php echo $parent_title; ?>
							</a> |

							<?php
						}

						// Output Content Type
						echo $content_type;

						// If this is an episode, output episode number
						if(get_post_type() == 'episodes') {
							$episodenum = get_post_meta($post->ID, 'wpcf-episode-number', true);
							if($episodenum) {
								echo ' ' . $episodenum;
							}
						}
					?>
				</p>
			</div><!-- .entry-meta -->

			<?php the_title( sprintf( '<h3 class="entry-title h4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php aspire_posted_on(); ?>
				</div>
			<?php endif; ?>

		</header><!-- .entry-header -->

		<!-- <div class="entry-summary">
			<?php // the_excerpt(); ?>
		</div> -->
	</div>

</article><!-- #post-## -->

<hr>
