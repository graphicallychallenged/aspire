<?php
/**
 * Functions relating to creating or filtering custom WP Queries
 *
 */

 function get_upcoming_episodes($program_id = null, $num = -1){

   // // If no Term ID provided...
   // if(empty($term_id) || is_wp_error($term_id)){
   //   // Get ID for current term
 	//   // $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
   //   $term_id = get_queried_object()->term_id;
   // }

   // print_r($term);
   // print_r($term_id);

   date_default_timezone_set('US/Eastern');
   $now = strtotime("now");
   $future = strtotime("+2 weeks");

   $args = array(
     'post_type'        => 'timeslots',
     'posts_per_page'   => $num,
     'suppress_filters' => true,
     // 'no_found_rows'   => 'true',

     'orderby' => array(
        'start_date_time_clause' => 'ASC',
      ),

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
         'value' => $program_id,
         'compare' => '='
       ),
       // 'future_first_air_clause' => array(
       //   'key' => 'wpcf-first-air-date',
       //   'value' => $future,
       //   'compare' => '<=',
       //   'type' => 'UNSIGNED'
       // ),
     ),
    //  'tax_query'       => array(
   	// 	'show_title'  => array(
   	// 		'taxonomy'  => 'show',
   	// 		'field'     => 'term_id',
   	// 		'terms'     => $term_id,
   	// 	),
   	// ),
   );

   $upcoming_episodes = new WP_query ($args);
   return $upcoming_episodes;

 }

 function get_upcoming_airings($program_id, $num = -1) {

   // if (empty($program_id) || is_wp_error($program_id)) {
   //   $program_id = get_the_id();
   // }

   // echo $program_id;

   date_default_timezone_set('US/Eastern');
   $now = strtotime("now");
   $future = strtotime("+2 weeks");

   // echo $now . '<br>';
   // echo $future . '<br>';

   $args = array(
     'post_type'        => 'timeslots',
     'posts_per_page'   => $num,
     'suppress_filters' => true,
     'no_found_rows'   => 'true',
     'orderby' => array(
        'start_date_time_clause' => 'ASC',
      ),

     'meta_query' => array(
       'relation' => 'AND',
       'start_date_time_clause' => array(
         'key' => 'wpcf-start-date-time',
         'value' => $now,
         'compare' => '>=',
         'type' => 'UNSIGNED'
       ),
       'child_post_clause' => array(
         'key' => 'wpcf-parent-content-id',
         'value' => $program_id,
         'compare' => '='
       ),
       // 'future_first_air_clause' => array(
       //   'key' => 'wpcf-first-air-date',
       //   'value' => $future,
       //   'compare' => '<=',
       //   'type' => 'UNSIGNED'
       // ),
     ),
   );

   $upcoming_airings = new WP_query ($args);
   return $upcoming_airings;

 }
