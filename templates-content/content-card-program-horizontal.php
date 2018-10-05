<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package uptv
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card mb-3'); ?>>

	<div class="card-body">
		<div class="row">
			<div class="col-md-5">
				<a href="<?php the_permalink(); ?>">
					<img src="<?php echo get_program_thumbnail(); ?>" class="img-fluid mb-3" alt="Thumbnail image for <?php the_title(); ?>">
				</a>
			</div>

			<div class="col-md-7">
				<header class="entry-header">
					<p class="text-muted text-uppercase" style="letter-spacing: 1px; margin-bottom: 8px;">

						<?php
						$content_type = get_post_type_object(get_post_type())->labels->singular_name;

						if(get_post_type() == 'movies'){

  						$parent_content_id = get_post_meta($post->ID, '_wpcf_belongs_movies_id', true);
							$parent_content_link = get_permalink($post->ID);
							?>

							<a href="<?php echo $parent_content_link; ?>" class="text-muted">
								<?php echo get_the_title($parent_content_id); ?>
							</a> | <?php echo $content_type; ?>

						<?php } else {

							$shows = get_the_terms( get_the_ID(), 'show' );
							if($shows){
								$show_name = $shows[0]->name;
								$show_link = esc_url( get_term_link( $shows[0]->slug, 'show' ) );
							?>

							<a href="<?php echo $show_link; ?>" class="text-muted">
								<?php echo $show_name; ?>
							</a> |
							<?php } ?>

							<?php echo $content_type; ?>


							<?php if(get_post_type() == 'episodes'){
								$episodenum = get_post_meta($post->ID, 'wpcf-episode-number', true);
									if($episodenum) {
										echo ' ' . $episodenum;
									}
								}
						}
						?>

					</p>

					<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

					<?php if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta">
							<?php uptv_posted_on(); ?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</header>

				<div class="entry-summary text-muted">
					<?php the_excerpt(); ?>
				</div>

			</div>
		</div>
	</div>

</article><!-- #post-## -->
