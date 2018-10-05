<?php
/**
 * Functions relating to Timeslot entries
 *
 */

// Get Timeslots On Now
function aspire_get_timeslot_now($now) {

  // echo "Now: " . $now;

    $args = array(
      'post_type'       => 'timeslots',
      'posts_per_page'  => 1,
      'meta_query' => array(
          'end_date_time_clause' => array(
            'key' => 'wpcf-end-date-time',
            'value' => $now,
            'compare' => '>=',
            'type' => 'UNSIGNED'
          ),
        ),
        'orderby' => array(
            'end_date_time_clause' => 'ASC',
        ),
    );

    $timeslot_now_query = new WP_Query( $args );
    return $timeslot_now_query;
}

// Get Timeslots Up Next
function aspire_get_timeslot_next($now, $offset) {

    // echo "Now: " . $now;

    $args = array(
      'post_type'       => 'timeslots',
      'posts_per_page'  => 1,
      'offset'          => $offset,
      'meta_query' => array(
          'start_date_time_clause' => array(
            'key' => 'wpcf-start-date-time',
            'value' => $now,
            'compare' => '>=',
            'type' => 'UNSIGNED'
          ),
        ),
        'orderby' => array(
            'start_date_time_clause' => 'ASC',
        ),
    );

    $timeslot_next_query = new WP_Query( $args );
    return $timeslot_next_query;
}

// Get Timeslots at Specific time
function aspire_get_timeslot($starttime) {

    $args = array(
      'post_type'       => 'timeslots',
      'posts_per_page'  => 1,
      'meta_query' => array(
          'start_date_time_clause' => array(
            'key' => 'wpcf-start-date-time',
            'value' => $starttime,
            'compare' => '>=',
            'type' => 'UNSIGNED'
          ),
        ),
        'orderby' => array(
            'start_date_time_clause' => 'ASC',
        ),
    );

    $timeslot_query = new WP_Query( $args );
    return $timeslot_query;
}

// Get Timeslots between specific dates or times
function aspire_get_timeslots_between($starttime, $endtime) {

  date_default_timezone_set('US/Eastern');
//    echo "Is Start Time an Integer?" . is_int($starttime);
//    echo "Is End Time an Integer?" . is_int($endtime);

    $args = array(
      'post_type'       => 'timeslots',
      'posts_per_page'  => -1,
      'suppress_filters' => true,
      'meta_query' => array(
        'relation' => 'AND',
          'start_date_time_clause' => array(
            'key' => 'wpcf-start-date-time',
            'value' => $starttime,
            'compare' => '>',
            'type' => 'UNSIGNED'
          ),
          'end_date_time_clause' => array(
            'key' => 'wpcf-start-date-time',
            'value' => $endtime,
            'compare' => '<=',
            'type' => 'UNSIGNED'
          ),
        ),
        'orderby' => array(
            'start_date_time_clause' => 'ASC',
            'end_date_time_clause' => 'DESC'
        )
    );

    $timeslot_query = new WP_Query( $args );
    return $timeslot_query;
}



function aspire_get_upcoming_airings($num = -1){

  $id = get_the_id();
  $post_type = get_post_type();

  date_default_timezone_set('US/Eastern');
  $now = strtotime("now");

  $args = array(
    'post_type'        => 'timeslots',
    'posts_per_page'   => $num,
    'suppress_filters' => true,

    'meta_query' => array(
      'relation' => 'AND',
        'start_date_time_clause' => array(
          'key' => 'wpcf-start-date-time',
          'value' => $now,
          'compare' => '>=',
          'type' => 'UNSIGNED'
        ),
        'child_post_clause' => array(
//          'key' => '_wpcf_belongs_' . $post_type . '_id',
          'key' => 'wpcf-parent-content-id',
          'value' => $id,
          'compare' => '='
        ),
      ),
   'orderby' => array(
      'start_date_time_clause' => 'ASC',
    ),
  );

  $upcoming_airings = new WP_query ($args);
  return $upcoming_airings;

}


function aspire_get_upcoming_episodes($num = -1){

  $series_id = get_the_id();
  $post_type = get_post_type();

  date_default_timezone_set('US/Eastern');
  $now = strtotime("now");

  $args = array(
    'post_type'        => 'timeslots',
    'posts_per_page'   => $num,
    'suppress_filters' => true,

    'meta_query' => array(
      'relation' => 'AND',
        'start_date_time_clause' => array(
          'key' => 'wpcf-start-date-time',
          'value' => $now,
          'compare' => '>=',
          'type' => 'UNSIGNED'
        ),
        'child_post_clause' => array(
          'key' => 'wpcf-grandparent-content-id',
          'value' => $series_id,
          'compare' => '='
        ),
      ),
   'orderby' => array(
      'start_date_time_clause' => 'ASC',
    ),
  );

  $upcoming_episodes = new WP_query ($args);
  return $upcoming_episodes;

}


// function aspire_get_upcoming_episodes(){

//   $args = array(

//     )

//   $upcoming_episodes = new WP_query ($args);
//   return $upcoming_episodes;

// }
