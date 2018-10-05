<?php
/**
 * Functions relating to creating or filtering custom WP Queries
 *
 */

 // Get Video Archive Masthead
 function aspire_get_video_archive_masthead($n = 1) {
   $args = array(
     'post_type'       => 'videos',
     'posts_per_page'  => $n,
     'no_found_rows'   => 'true',
     'post_status'     => 'publish',
     'orderby'         => 'menu_order',
     'order'           => 'ASC',
     'tax_query' => array(
   		array(
   			'taxonomy' => 'featured-slots',
   			'field'    => 'slug',
   			'terms'    => 'video-archive-masthead',
   		),
   	),
   );

   $video_archive_masthead = new WP_Query( $args );
   return $video_archive_masthead;
 }


 // Get Featured Videos
 function aspire_get_featured_videos($n = 3) {
   $args = array(
     'post_type'       => 'videos',
     'posts_per_page'  => $n,
     'no_found_rows'   => 'true',
     'post_status'     => 'publish',
     'orderby'         => 'date',
     'order'           => 'desc',
//     'orderby'         => 'menu_order',
//     'order'           => 'ASC',
     'tax_query' => array(
   		array(
   			'taxonomy' => 'featured-slots',
   			'field'    => 'slug',
   			'terms'    => 'featured',
   		),
   	),
   );

   $featured_videos = new WP_Query( $args );
   return $featured_videos;
 }


 // Get Videos that are not excluded
 function aspire_get_all_videos() {
   $args = array(
     'post_type'       => 'videos',
     'posts_per_page'  => 12,
     'post_status'     => 'publish',
     'orderby'         => 'date',
     'order'           => 'desc',
     // 'orderby'         => 'menu_order',
     // 'order'           => 'ASC',
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

   $aspire_videos = new WP_Query( $args );
   return $aspire_videos;
 }




 // Get Related Posts using CPTonomies
 function aspire_get_related_videos($post_type, $post_slug, $n = 4) {
   $args = array(
     'post_type'         => 'videos',
     'suppress_filters'  => false,
     'posts_per_page'    => $n,
     'no_found_rows'     => true,
     $post_type          => $post_slug,
   );

   $related_videos = new WP_Query( $args );
   return $related_videos;
 }





 // Get Videos associated with current show
 function uptv_get_program_videos($program_id) {

   if(get_post_type($program_id) == 'movies'){

     $args = array(
       'post_type'       => 'videos',
       'posts_per_page'  => 12,
       'hide_empty'      => false,
       'no_found_rows'   => 'true',
       'meta_key'        => '_wpcf_belongs_movies_id',
       'meta_value'      => $program_id,
       'meta_compare'    => '=',
     );

   } else {

     // echo 'NOT MOVIE';
     // echo $program_id;

     $args = array(
       'post_type'       => 'videos',
       'posts_per_page'  => 12,
       'hide_empty'      => false,
       'no_found_rows'   => 'true',
       'tax_query'       => array(
         array(
     			'taxonomy' => 'show',
     			'field'    => 'term_id',
     			'terms'    => $program_id,
     	 ),
      ),
     );

   }

   $program_videos = new WP_Query( $args );

   // echo '<pre>';
   //   print_r($program_videos);
   // echo '</pre>';

   return $program_videos;
 }


 // Get Recent Videos site-wide
 function uptv_get_recent_videos() {
   $args = array(
     'post_type'       => 'videos',
     'posts_per_page'  => 12,
     'hide_empty'      => false,
     'no_found_rows'   => 'true',
   );

   $recent_videos = new WP_Query( $args );

   // echo '<pre>';
   //   print_r($recent_videos);
   // echo '</pre>';

   return $recent_videos;
 }
