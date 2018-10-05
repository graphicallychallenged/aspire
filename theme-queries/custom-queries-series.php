<?php
/**
 * Functions relating to creating or filtering custom WP Queries
 *
 */

// Get Featured Series
function aspire_get_featured_series($n = 3) {
  $args = array(
    'post_type'       => 'series',
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

  $featured_series = new WP_Query( $args );
  return $featured_series;
}


// Get Series that are not excluded
function aspire_get_all_series() {
  $args = array(
    'post_type'       => 'series',
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

  $aspire_series = new WP_Query( $args );
  return $aspire_series;
}
