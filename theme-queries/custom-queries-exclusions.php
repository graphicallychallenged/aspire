<?php
/**
 * Functions relating to creating or filtering custom WP Queries
 *
 */

 // Filter Excluded Movies - applies to main query on MOVIE ARCHIVE ONLY
 add_action( 'pre_get_posts', 'exclude_movies' );
 function exclude_movies( $query ) {
   if ( !is_admin() && $query->is_main_query() && is_post_type_archive('movies') ) {

     $query->set('orderby', 'modified');
     $query->set('no_found_rows', 'true' );
     $query->set(
       'tax_query',
          array(
           array(
             'taxonomy'  => 'featured-slots',
             'field'     => 'slug',
             'terms'     => 'exclude',
             'operator'  => 'NOT IN'
           )
         )
      );

   }
 }

 // add_action('pre_get_posts','search_filter');
 function search_filter($query) {
   if ( !is_admin() && $query->is_main_query() ) {
     if ($query->is_search) {

       // $query->set('post_type', array( 'post', 'movie' ) );
       // $query->set('orderby', 'modified');
       // $query->set('no_found_rows', 'true' );

       // $query->set('posts_per_page', '20');
       // $query->set('post__not_in', array(7,11));

     }
   }
 }

 // Limit number of posts automatically queried on taxonomy archives
 // add_action( 'pre_get_posts', 'uptv_no_default_query_show' );
 function uptv_no_default_query_show( $query ) {
     if ( !is_admin() && $query->is_main_query() && is_tax('show') ){
 //        $query->set('posts_per_page', 1);
         // $query->set('post_type', 'videos');
     }
 }


 // // Filter Empty Terms
 // add_action( 'pre_get_posts', 'uptv_filter_excluded_terms', 9999 );
 // function uptv_filter_excluded_terms( $query ) {
 //
 //    if ( is_admin() ) {
 //        return;
 //    }
 //
 //    if ( ! $query->is_main_query() ) {
 //        echo 'not main query';
 //        return;
 //    }
 //
 //    if ( ! is_tax( 'show' ) ) {
 //        echo 'not show tax';
 //        return;
 //    }
 //
 //    print_r($query);
 //
 //    $meta_query[] = array(
 //        array(
 //            // 'taxonomy'       => 'show',
 //            // 'hide_empty'     => true,
 //            'meta_key'       => 'wpcf-show-status',
 //            'meta_value'     => 'exclude',
 //            'meta_compare'   => '=',
 //        ),
 //    );
 //    $query->set( 'meta_query', $meta_query );
 // }
