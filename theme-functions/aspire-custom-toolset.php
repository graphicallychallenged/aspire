<?php
/**
 * Functions for use with Toolset, Types and Views
 *
 */

// add_filter('wpv_filter_query', 'wpv_show_season_by_default', 99, 3);

function wpv_show_season_by_default( $query_args, $view_settings, $view_id ) {

    if($view_id == 251735){

      if(!isset($_GET['wpv_view_count'])) {
              $query_args['meta_key'] = "wpcf-season";
              $query_args['meta_value'] = "1";
          }
    }

    return $query_args;
}


/*
function getJWVideoID () {

  $args = array(
    //'post_type'       => array( 'series', 'episodes', 'movies', 'specials', 'documentaries', 'videos' ),
    'meta_key'        => 'wpcf-jw-media-id',
    //'meta_value'      => $entry_id,
    //'meta_compare'    => '=',
    // 'orderby'         => 'rand',
    // 'order'           => 'DESC',
    //'posts_per_page'  => 1,
    'tax_query' => array(
      array(
        'taxonomy' => 'featured-slots',
        'field'    => 'slug',
        'terms'    => 'homepage-masthead',
        'orderby'  => 'modified',
        //'order'    => 'rand',
      ),
    ),
  );

  $query = new WP_Query( $args );
  return $query;

}*/




/**
 * Check to see if a given entry has children of a specific post type
 */

// function child_exists_func( $atts ){
//   $child_posts = types_child_posts('your-child-post-type-slug-here');
//     if ($child_posts) {
//       return true;
//     }
// }
// add_shortcode( 'child-exists', 'child_exists_func' );



/**
 * Add support for wpv-view shortcode to be loaded via ajax
 */

/* timeslots ajax callback */
add_action( 'wp_ajax_get_timeslots_ajax', 'get_timeslots_ajax_callback' );
add_action( 'wp_ajax_nopriv_get_timeslots_ajax', 'get_timeslots_ajax_callback' );

function get_timeslots_ajax_callback() {

    //$postid = $_POST['postid'];
    //$viewtemplate = $_POST['viewtemplate'];
    $day = $_POST['day'];
    $next_day = $_POST['nextday'];
    $item_num = $_POST['item_num'];
    //$wrapper = $_POST['wrapper'];

    aspire_display_timeslots_between($day, $next_day, $item_num);

    wp_die();


/*
   global $wpdb; // this is how you get access to the database
//   $view_template  = $_POST['viewtemplate'];
//   $post_id        = $_POST['postid'];
   $starttime      = $_POST['starttime'];
   $endtime        = $_POST['endtime'];

//   echo "View Template: " . $view_template . "<br>";
//   echo "Post ID: " . $post_id  . "<br>";
// echo "Start Time: " . $starttime  . "<br>";
//   echo "End Time: " . $endtime  . "<br>";

    aspire_display_schedule_between($starttime, $endtime);

//    echo do_shortcode( "[wpv-view name='" . $view_template . "' start='" . $starttime . "'  end='" . $endtime . "']" );

//    echo do_shortcode("[wpv-view name='timeslots-between-times' start='FUTURE_DAY(" . $starttime . ")' end='FUTURE_DAY(" . $endtime . ")']");

//    echo "[wpv-view name='timeslots-between-times' start='FUTURE_DAY(" . $starttime . ")' end='FUTURE_DAY(" . $endtime . ")']";

  //    echo do_shortcode( "[wpv-view name='" . $view_template . "' post_id='" . $post_id . "']" );

//    echo do_shortcode('[wpv-view name="timeslots-between-times" start="'. FUTURE_DAY(1) . '" end="' . FUTURE_DAY(2). '"]');


  //  echo "[wpv-view name='timeslots-between-times' start='" . FUTURE_DAY(1) . "' end='" . FUTURE_DAY(2). "']";

*/


}

/**
 * Add support for wpv-view shortcode to use post_id argument to display a specific post
 * https://wp-types.com/forums/topic/cant-get-render_view-to-show-a-specific-post/
 */

// add_filter('wpv_filter_query', 'show_only_postid', 10, 2);
// function show_only_postid($query, $settings) {
//     if ($settings['view_id'] == 1439) {
//         global $WP_Views;
//         $view_shortcode_attributes = $WP_Views->view_shortcode_attributes;
//         $query['p'] = $view_shortcode_attributes[0]['post_id'];
//     }
//     return $query;
// }
