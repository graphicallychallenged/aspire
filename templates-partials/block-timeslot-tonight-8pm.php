<?php
// Get Content Data attached to a specific timeslot
date_default_timezone_set('US/Eastern');
$starttime = strtotime("today 8pm");

$args = array(
  'post_type'       => 'timeslots',
  'posts_per_page'  => 1,
  'meta_query'      => array(
    'start_date_time_clause' => array(
      'key'       => 'wpcf-start-date-time',
      'value'     => $starttime,
      'compare'   => '>=',
      'type'      => 'UNSIGNED'
    ),
  ),
  'orderby' => array(
    'start_date_time_clause' => 'ASC',
  ),
);

$timeslot_query = new WP_Query( $args );

// If we have timeslots
if ( $timeslot_query->have_posts() ) {

  while ( $timeslot_query->have_posts() ) : $timeslot_query->the_post();

    get_template_part( 'templates-content/content', 'program-timeslot-display' );

  endwhile;
  /* Restore original Post Data */
  wp_reset_postdata();

} else {

  return false;

}
