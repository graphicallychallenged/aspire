<?php
/**
 * Functions relating to creating or filtering custom WP Queries
 *
 */

// Get Featured Movies
function aspire_get_featured_movies($n = 3) {
  $args = array(
    'post_type'       => 'movies',
    'posts_per_page'  => $n,
    'no_found_rows'   => 'true',
    'post_status'     => 'publish',
    'orderby'         => 'menu_order',
    'order'           => 'ASC',
    'tax_query' => array(
  		array(
  			'taxonomy' => 'featured-slots',
  			'field'    => 'slug',
  			'terms'    => 'featured',
  		),
  	),
  );

  $featured_movies = new WP_Query( $args );
  return $featured_movies;
}


// Get Movies that are not excluded
function aspire_get_all_movies() {
  $args = array(
    'post_type'       => 'movies',
    'posts_per_page'  => 9,
    'post_status'     => 'publish',
    'orderby'         => 'menu_order',
    'order'           => 'ASC',
    'tax_query' => array(
  		array(
  			'taxonomy' => 'featured-slots',
  			'field'    => 'slug',
  			'terms'    => 'exclude',
        'operator'  => 'NOT IN'
  		),
  	),
  );

  // Get current page and append to custom query parameters array
  $args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

  $aspire_movies = new WP_Query( $args );
  return $aspire_movies;
}


// Get Related movies, not including the current movie
function aspire_get_related_movies($n = 3) {
  $args = array(
    'post_type'       => 'movies',
    'posts_per_page'  => $n,
    'orderby'         => 'rand modified',
    'post__not_in'    => array(get_the_ID()),
    'no_found_rows'   => 'true',
    'tax_query' => array(
  		array(
  			'taxonomy' => 'featured-slots',
  			'field'    => 'slug',
  			'terms'    => 'exclude',
        'operator'  => 'NOT IN'
  		),
  	),
  );

  $related_movies = new WP_Query( $args );

  // echo '<pre>';
  //   print_r($related_movies);
  // echo '</pre>';

  return $related_movies;
}
