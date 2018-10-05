<?php
/**
 * Template part for displaying content for individual programs
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package uptv
 */

// See if we have a Show taxonomy term...

// echo '<pre>';
// print_r(array_keys(get_defined_vars()));
// echo '</pre>';
// print '<pre>' . htmlspecialchars(print_r(get_defined_vars(), true)) . '</pre>';


// See if content is attached to a Movie
$parent_movie_id = get_post_meta(get_the_ID(), '_wpcf_belongs_movies_id', true);
$episodenum = get_post_meta($post->ID, 'wpcf-episode-number', true);
$shows = get_the_terms( get_the_ID(), 'show' );

if($parent_movie_id){

	$program_name = get_the_title($parent_movie_id);
	$program_link = get_the_permalink($parent_movie_id);

} elseif($shows) {

	foreach ( $shows as $show ) {
			 // print_r($show);
			 $program_ids[] = $show->ID;
			 $program_names[] = $show->name;
			 $program_links[] = esc_url( get_term_link( $show->slug, 'show' ) );
			 // echo $show_names[0];
			 // echo $show_links[0];
	}

	$program_id = $program_ids[0];
	$program_name = $program_names[0];
	$program_link = $program_links[0];

} else {

	$program_name = false;
	$program_link = false;

}

// echo get_the_title($parent_content_id);
// echo $parent_program_type;
//
// $program_type_obj = get_post_type_object( $parent_program_type );

?>

<div class="col-sm-12 col-md-6">
	<div class="card mb-3" id="post-<?php the_ID(); ?>">

		<?php if(get_program_thumbnail()) { ?>
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo get_program_thumbnail(); ?>" class="img-fluid card-img-top">
			</a>
		<?php } ?>

		<div class="card-body">
			<p class="program-type text-muted mb-1">
				<?php if($program_name && $program_link) { ?>
        <a href="<?php echo $program_link; ?>" class="text-muted"><?php echo $program_name; ?></a><?php if($episodenum) { ?>, Episode <?php echo $episodenum; ?><?php } ?>
				<?php } ?>
      </p>
			<h5 class="card-title mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		</div>

	</div>
</div>
