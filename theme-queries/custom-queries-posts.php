<?php

// Get Featured Posts
function aspire_get_featured_posts($n = '1') {
  $args = array(
    'post_type'       => 'post',
    'posts_per_page'  => $n,
    'no_found_rows'   => 'true',
    'tax_query' => array(
      array(
  			'taxonomy' => 'featured-slots',
  			'field'    => 'slug',
  			'terms'    => 'featured',
  		),
  	),
  );

  $featured_posts = new WP_Query( $args );
  return $featured_posts;
}

// Get Featured Posts
function aspire_get_editors_picks($n = '3') {
  $args = array(
    'post_type'       => 'post',
    'posts_per_page'  => $n,
    'orderby'         => 'rand',
    'no_found_rows'   => 'true',
    'tax_query' => array(
      array(
  			'taxonomy' => 'featured-slots',
  			'field'    => 'slug',
  			'terms'    => 'editors-picks',
  		),
  	),
  );

  $editors_picks = new WP_Query( $args );
  return $editors_picks;
}


// Get Editor's Picks
function aspire_get_editor_picks_by_category($lifestyle_category, $n = '1') {
  $args = array(
    'post_type'       => 'post',
    'posts_per_page'  => $n,
    'no_found_rows'   => 'true',
  	'tax_query' => array(
  		'relation' => 'AND',
  		array(
  			'taxonomy' => 'seeyourselfhere',
  			'field'    => 'slug',
  			'terms'    => $lifestyle_category,
  		),
      array(
  			'taxonomy' => 'featured-slots',
  			'field'    => 'slug',
  			'terms'    => 'editors-picks',
  		),
  	),
  );

  $featured_posts = new WP_Query( $args );
  return $featured_posts;
}


// Get Related Posts using Tags
// function aspire_get_related_posts($post_slug, $n = 4) {
//   $args = array(
//     'post_type'       => 'post',
//     'posts_per_page'  => $n,
//     'no_found_rows'   => 'true',
//     'tag'             => $post_slug,
//   );
//
//   $related_posts = new WP_Query( $args );
//   return $related_posts;
// }


// Get Related Posts using CPTonomies
function aspire_get_related_posts($post_type, $post_slug, $n = 4) {
  $args = array(
    'post_type'         => 'post',
    'suppress_filters'  => false,
    'posts_per_page'    => $n,
    'no_found_rows'     => true,
    $post_type          => $post_slug,
  );

  $related_posts = new WP_Query( $args );
  return $related_posts;
}
