<?php
/**
 * Template part for displaying content for individual programs
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package uptv
 */
?>

<div class="card mb-3" id="post-<?php the_ID(); ?>">
	<div class="card-body">
		<div class="d-flex justify-content-between align-items-center">
			 <h5 class="card-title mb-0" style="text-transform: none;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
	 		 <span class="card-subtitle text-muted mt-0">Episode <?php echo get_post_meta(get_the_ID(), 'wpcf-episode-number', true); ?></span>
		</div>
	</div>
</div>
