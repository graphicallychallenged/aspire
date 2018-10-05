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

	<?php 
	if(aspire_get_thumbnail_url()) : ?>

		<a href="<?php the_permalink(); ?>">
			<img src="<?php echo aspire_get_thumbnail_url(); ?>" class="img-fluid card-img-top">
		</a>

	<?php
	endif; ?>

	<div class="card-body">

		<!-- <p class="program-type text-muted mb-1">
      <?php
      if( get_the_term_list($post->ID, 'series-type') ) {

        echo get_the_term_list( $post->ID, 'series-type', '', ', ' );

      } else { ?>

        <a href="<?php echo get_post_type_archive_link($post_type); ?>" class="text-muted"><?php echo $obj->labels->name; ?></a>

      <?php
      } ?>

    </p> -->

		<h4 class="card-title mb-0 h6">
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h4>
	</div>

</div>
