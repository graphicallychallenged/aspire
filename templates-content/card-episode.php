<?php
/**
 * Template part for displaying content for individual episodes
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aspire
 */
?>

<div class="card mb-3" id="post-<?php the_ID(); ?>">
	<?php if(aspire_get_thumbnail_url($episode->ID)) { ?>
		<a href="<?php echo get_the_permalink($episode->ID); ?>">
			<img src="<?php echo aspire_get_thumbnail_url($episode->ID); ?>" class="img-fluid card-img-top">
		</a>
	<?php } ?>

	<div class="card-body">
		<p class="text-muted">Episode <?php echo get_post_meta($episode->ID, 'wpcf-episode-number', true); ?></p>
		<h5 class="card-title mb-0"><a href="<?php echo get_the_permalink($episode->ID); ?>"><?php echo get_the_title($episode->ID); ?></a></h5>
		<!-- <p><?php the_excerpt(); ?></p> -->
	</div>
</div>
