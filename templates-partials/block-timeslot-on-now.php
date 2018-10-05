<!-- On Now -->
<?php

// Get Content Data attached to the current timeslot

date_default_timezone_set('US/Eastern');
$now = strtotime("now");

$args = array(
  'post_type'       => 'timeslots',
  'posts_per_page'  => 1,
  'meta_query' => array(
    'end_date_time_clause' => array(
      'key'     => 'wpcf-end-date-time',
      'value'   => $now,
      'compare' => '>=',
       'type'   => 'UNSIGNED'
    ),
  ),
  'orderby' => array(
      'end_date_time_clause' => 'ASC',
  ),
);

$timeslot_query_now = new WP_Query( $args );

// print_r($timeslot_query_now);

// If we have timeslots
if ( $timeslot_query_now->have_posts() ) {

  while ( $timeslot_query_now->have_posts() ) : $timeslot_query_now->the_post();

    get_template_part( 'templates-content/content', 'program-timeslot-display' );

  endwhile;

  /* Restore original Post Data */
  wp_reset_postdata();

} else {

  return false;

}

// echo $parent_content_id;
// echo $timeslot_program_type;

// $parent_series_id = get_post_meta($timeslotid, '_wpcf_belongs_series_id' );
// $parent_episode_id = get_post_meta($timeslotid, '_wpcf_belongs_episodes_id');
// $parent_episode_id = get_post_meta($timeslotid, '_wpcf_belongs_episodes_id');
// $parent_episode_id = get_post_meta($timeslotid, '_wpcf_belongs_episodes_id');
