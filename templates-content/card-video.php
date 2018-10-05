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

?>

<div class="card mb-3" id="post-<?php the_ID(); ?>">

	<a href="<?php the_permalink(); ?>">
		<img src="<?php echo aspire_get_thumbnail_url(); ?>" class="img-fluid card-img-top">
	</a>

	<div class="card-body">
		<h5 class="card-title mb-0">
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h5>
	</div>

</div>
