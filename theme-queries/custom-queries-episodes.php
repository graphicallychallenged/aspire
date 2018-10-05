<?php
/**
 * Functions relating to creating or filtering custom WP Queries
 *
 */

 // Get Episodes associated with current show, filtered by a prefix
 function uptv_get_program_episodes_filtered($term_id, $title_prefix, $filter) {

   date_default_timezone_set('US/Eastern');
   $now = strtotime("now");
   $future = strtotime("+2 weeks");

   $args = array(
       'post_type'       => 'episodes',
       'posts_per_page'  => -1,
       'hide_empty'      => false,
       'orderby'         => 'meta_value_num',
       'meta_key'        => 'wpcf-episode-number',
       'order'           => 'ASC',
       'no_found_rows'   => 'true',
       'tax_query'       => array(
           'relation'    => 'AND',
       		'show_title'  => array(
       			'taxonomy'  => 'show',
       			'field'     => 'term_id',
       			'terms'     => $term_id,
       		),
     	),
       'meta_query'      => array(
           'relation'    => 'AND',
           'show_variation' => array(
             'key'       => 'wpcf-series-prefix',
             'value'     => $title_prefix,
             'compare'   => 'LIKE',
           ),
           'future_first_air_clause' => array(
             'key'       => 'wpcf-first-air-date',
             'value'     => $future,
             'compare'   => '<=',
             'type'      => 'UNSIGNED'
           ),
           'show_filter' => array(
             'key'       => 'wpcf-title-code',
             'value'     => $filter,
             'compare'   => 'LIKE',
           ),
         ),
   );

   $episodes = new WP_Query( $args );
   // print_r($episodes);
   return $episodes;
 }


 // Get Episodes associated with a specific season of current show
 function uptv_get_program_episodes_by_season($term_id, $season, $title_prefix = '', $filter = '') {

   // if(!empty($term_id) || is_wp_error($term_id) ){
   //   //$term = get_queried_object();
   //   $term_id = get_queried_object()->term_id;
   // }

   date_default_timezone_set('US/Eastern');
   $now = strtotime("now");
   $future = strtotime("+2 weeks");

   $args = array(
       'post_type'       => 'episodes',
       'posts_per_page'  => -1,
       'hide_empty'      => false,
       'orderby'         => 'meta_value_num',
       'meta_key'        => 'wpcf-episode-number',
       'order'           => 'ASC',
       'no_found_rows'   => 'true',
       'suppress_filters'=> 'true',
 //	  'fields'          => 'ids',
       'tax_query'       => array(
           'relation'    => 'AND',
       		'show_title'  => array(
       			'taxonomy'  => 'show',
       			'field'     => 'term_id',
       			'terms'     => $term_id,
       		),
           'show_season' => array(
       			'taxonomy'  => 'season',
       			'field'     => 'slug',
       			'terms'     => $season,
       		),
     	),
       'meta_query'      => array(
           'relation'    => 'AND',
           'show_variation' => array(
             'key'       => 'wpcf-series-prefix',
             'value'     => $title_prefix,
             'compare'   => 'LIKE',
           ),
           'show_filter' => array(
             'key'       => 'wpcf-title-code',
             'value'     => $filter,
             'compare'   => 'LIKE',
           ),
           'future_date' => array(
             'key'       => 'wpcf-first-air-date',
             'value'     => $future,
             'compare'   => '<=',
             'type'      => 'UNSIGNED',
           ),
           'date_exists' => array(
             'key'       => 'wpcf-first-air-date',
             'value'     => array(''),
             'compare'   => 'NOT IN',
           ),
       ),
   );
   $episodes = new WP_Query( $args );
   // print_r($episodes);
   return $episodes;
 }


 // Get ALL Episodes associated with current show
 function uptv_get_program_episodes_all($term_id) {

   // if(!empty($term_id) || is_wp_error($term_id) ){
   //   //$term = get_queried_object();
   //   $term_id = get_queried_object()->term_id;
   // }

   date_default_timezone_set('US/Eastern');
   $now = strtotime("now");
   $future = strtotime("+2 weeks");

   $args = array(
       'post_type'       => 'episodes',
       'posts_per_page'  => -1,
       'hide_empty'      => false,
       'orderby'         => 'meta_value_num',
       'meta_key'        => 'wpcf-episode-number',
       'order'           => 'ASC',
       'no_found_rows'   => 'true',
       'tax_query'       => array(
           'relation'    => 'AND',
       		'show_title'  => array(
       			'taxonomy'  => 'show',
       			'field'     => 'term_id',
       			'terms'     => $term_id,
       		),
     	),
       'meta_query' => array(
         'future_first_air_clause' => array(
           'key'         => 'wpcf-first-air-date',
           'value'       => $future,
           'compare'     => '<=',
           'type'        => 'UNSIGNED'
         ),
       ),
   );

   $episodes = new WP_Query( $args );
   return $episodes;
 }


 // Get FULL EPISODES associated with current show
 function uptv_get_program_full_episodes($term) {

   date_default_timezone_set('US/Eastern');
   $now = strtotime("now");
   $future = strtotime("+2 weeks");

   $args = array(
     'post_type'       => 'episodes',
     'posts_per_page'  => -1,
     'hide_empty'      => true,
     'orderby'         => 'meta_value_num',
     'meta_key'        => 'wpcf-episode-number',
     'order'           => 'ASC',
     'no_found_rows'   => 'true',
     'tax_query'       => array(
       'relation'    => 'AND',
   		'show_title'  => array(
   			'taxonomy'  => 'show',
   			'field'     => 'slug',
   			'terms'     => array($term->slug),
   		),
       'full_episodes'  => array(
   			'taxonomy'  => 'episode-type',
   			'field'     => 'slug',
   			'terms'     => 'full-episode',
   		),
       'meta_query' => array(
         'future_first_air_clause' => array(
           'key'     => 'wpcf-first-air-date',
           'value'   => $future,
           'compare' => '<=',
           'type'    => 'UNSIGNED'
         ),
       ),
   	),
   );

   $episodes = new WP_Query( $args );
   return $episodes;
 }


 // Get ALL FULL EPISODES
 function uptv_get_all_full_episodes() {

   date_default_timezone_set('US/Eastern');
   $now = strtotime("now");
   $future = strtotime("+2 weeks");

   $args = array(
     'post_type'       => 'episodes',
     'posts_per_page'  => -1,
     'hide_empty'      => false,
     'orderby'         => 'meta_value_num',
     'meta_key'        => 'wpcf-episode-number',
     'order'           => 'ASC',
     'no_found_rows'   => 'true',
     'tax_query'       => array(
       'full_episodes'  => array(
   			'taxonomy'  => 'episode-type',
   			'field'     => 'slug',
   			'terms'     => 'full-episode',
   		),
   	),
     'meta_query' => array(
       'future_first_air_clause' => array(
         'key' => 'wpcf-first-air-date',
         'value' => $future,
         'compare' => '<=',
         'type' => 'UNSIGNED'
       ),
     ),
   );

   $episodes = new WP_Query( $args );
   return $episodes;
 }
