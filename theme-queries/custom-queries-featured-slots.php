<?php
/**
 * Functions relating to creating or filtering custom WP Queries
 *
 */

 // Get Homepage Featured Slot
 function aspire_get_featured_slot($slot, $n = 1) {
   $args = array(
     'post_type'       => array('post', 'series', 'videos', 'movies'),
     'posts_per_page'  => $n,
     'tax_query'       => array(
       array(
        'taxonomy' => 'featured-slots',
        'field'    => 'slug',
        'operator' => 'IN',
        'terms'    => $slot,
      ),
    ),
   );

   $featured_slot_content = new WP_Query( $args );

   // echo '<pre>';
   //   print_r($featured_slot_content);
   // echo '</pre>';

   return $featured_slot_content;
 }


// // Get Homepage Featured Slot
// function uptv_get_homepage_featured_slot($slot) {
//
//  //echo $slot;
//
//  if($slot == 'M'){
//    // Get all entries for Masthead
//    $number = '';
//  } else {
//    // Otherwise only get 1 entry
//    $number = 1;
//  }
//
//  $args = array(
//    'taxonomy'        => 'show',
//    'meta_key'        => 'wpcf-homepage-featured-slots',
//    'meta_value'      => $slot,  // only allow ABC?
//    'meta_compare'    => 'LIKE',
//    'order'           => 'ASC',
//    'orderby'         => 'meta_value',
//    'number'          => $number,
//  );
//
//  $terms = get_terms( $args );
//  // print_r($terms);
//  return $terms;
//
// }


 //   $args = array(
 //     'taxonomy'        => 'show',
 //     'meta_key'        => 'wpcf-homepage-featured-slots',
 //     'meta_value'      => $slot,  // only allow ABC?
 //     'meta_compare'    => 'LIKE',
 //     'order'           => 'ASC',
 //     'orderby'         => 'meta_value',
 //     'number'          => $number,
 //   );
 //
 //   $terms = get_terms( $args );
 //   // print_r($terms);
 //   return $terms;
 //
 // }
