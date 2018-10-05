<?php
/**
 * Template part for displaying content for individual Series
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aspire
 */

$post_type = get_post_type();
$obj = get_post_type_object($post_type);
$post_id = get_the_ID();
$jw_media_id = get_jw_media_id();
// echo $jw_media_id;

// Determine what, if any, upcoming airings to display
if($post_type == 'series'):

		$upcoming = get_upcoming_episodes($post_id, 1);

elseif($post_type == 'movies'):

		$upcoming = get_upcoming_airings($post_id, 1);

// If the post belongs to a Series
elseif ( metadata_exists( 'post', $post_id, '_wpcf_belongs_series_id' ) ):

		$parent_series_id = get_post_meta( $post_id, '_wpcf_belongs_series_id', true );
		$upcoming = get_upcoming_episodes($parent_series_id, 1);

// If the post belongs to a Movie
elseif( metadata_exists( 'post', $post_id, '_wpcf_belongs_movies_id' ) ):

		$parent_movie_id = get_post_meta( $post_id, '_wpcf_belongs_movies_id', true );
		$upcoming = get_upcoming_airings($parent_movie_id, 1);

// If the post has no parent
else:
		// If no parent, look up airings for self
		$parent_id = null;
		$upcoming = null;

endif;


?>

<div class="card mb-3 mb-lg-0" id="post-<?php the_ID(); ?>">

	<?php
	if($jw_media_id) : ?>

		<div id="featured-video" class="video masthead-video">
			<?php echo do_shortcode('[jwplayer ' . $jw_media_id . ']'); ?>
		</div>

	<?php
	elseif(has_post_thumbnail()) : ?>

		<a href="<?php the_permalink(); ?>">
			<img src="<?php echo get_the_post_thumbnail_url($post->ID, 'medium_large' ); ?>" class="img-fluid card-img-top">
		</a>

	<?php
	endif; ?>

	<div class="card-body text-dark">

		<!-- <p class="program-type text-muted mb-1">
      <?php
      if( get_the_term_list($post->ID, 'series-type') ) {
        echo get_the_term_list( $post->ID, 'series-type', '', ', ' );
      } else { ?>
        <a href="<?php echo get_post_type_archive_link($post_type); ?>" class="text-muted"><?php echo $obj->labels->name; ?></a>
      <?php
      } ?>
    </p> -->

		<?php

		// If we have upcoming airings to display
		if ( isset($upcoming) && $upcoming->have_posts() ) :?>

			<div class="row">
				<div class="col-lg-7 mb-2 mb-lg-0">
					<h2 class="card-title mb-2">
			      <a href="<?php the_permalink(); ?>">
			        <?php the_title(); ?>
			      </a>
			    </h2>

					<span class="text-secondary">
						<?php echo wp_trim_words(get_the_excerpt(), 25); ?>
					</span>
				</div>

				<div class="col-lg-5 text-lg-right">
					<hr class="d-lg-none">
					<h6 class="text-secondary">Next Airing</h6>

					<?php
	        echo "<ul class='list-unstyled'>";
	        while ( $upcoming->have_posts() ) : $upcoming->the_post();
	          echo "<li>";
	          get_template_part( 'templates-content/content', 'upcoming-entry' );
	          echo "</li>";
	        endwhile;
	        echo "</ul>";
	        wp_reset_postdata(); ?>
				</div>
			</div>

		<?php
		// if no upcoming airings to show
		// Display title and excerpt at full-width
		else: ?>

			<div class="row">
				<div class="col-12">
					<h2 class="card-title mb-2">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>

					<span class="text-secondary">
						<?php echo wp_trim_words(get_the_excerpt(), 25); ?>
					</span>
				</div>
			</div>

    <?php
    endif; ?>


	</div>

</div>
