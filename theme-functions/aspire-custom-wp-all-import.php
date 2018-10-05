<?php
/**
 * Functions for use with WP All Import
 *
 * Processes and assigns data for importing content inventories and timeslots
 */

function aspire_get_start_datetime($startdate, $starttime){

  date_default_timezone_set('US/Eastern');

  $start_datetime = strtotime($startdate . $starttime);

  return $start_datetime;

}

function aspire_get_end_datetime($startdate, $starttime, $endtime){

  date_default_timezone_set('US/Eastern');

  //    print "Start Date: " . date("m/d/y", strtotime($startdate)) . "\n";
  //    print "Start Date and Time: " . date("m/d/y h:i:s a", strtotime($startdate . $starttime)) . "\n";

  if($endtime < $starttime){
  //    print "End Time is Smaller than Start Time" . "\n";
    $enddate = strtotime("+1 day", strtotime($startdate));
    $enddatetime = strtotime("+1 day", strtotime($startdate . $endtime));

  //    print "End Date and Time: " . date("m/d/y", $enddate) . "\n";
  //    print "End Date and Time: " . date("m/d/y h:i:s a", $enddatetime) . "\n";
    return $enddatetime;

  } else {

  //    print "End Time Larger than Start Time" . "\n";
    $enddate = strtotime($startdate);
    $enddatetime = strtotime($startdate . $endtime);

  //    print "End Date: " . date("m/d/y", $enddate) . "\n";
  //    print "End Date and Time: " . date("m/d/y h:i:s a", $enddatetime) . "\n";
    return $enddatetime;
  }
}

add_action('pmxi_saved_post', 'update_timeslot_post_parent_meta', 10, 1);
function update_timeslot_post_parent_meta($id) {
  // Only do this for Timeslot posts
  if ( get_post_type( $id ) == 'timeslots' ) {

    // Test
    // $x = get_post_meta($id, 'your_new_meta_key', true);
    // update_post_meta($id, 'your_new_meta_key', $x);

    // Get Parent Program Type
    $timeslot_program_type = get_post_meta($id, 'wpcf-timeslot-program-type', true);
    echo "Timeslot Program Type: " . $timeslot_program_type . "<br>";

    // Get Parent Program ID
    $timeslot_program_id = get_post_meta($id, '_wpcf_belongs_program_id', true);
    echo "Timeslot Program ID: " . $timeslot_program_id . "<br>";

    // Generate correct Parent Key
    $timeslot_parent_key = "_wpcf_belongs_" . $timeslot_program_type . "_id";
    echo "Timeslot Parent Key: " . $timeslot_parent_key . "<br>";

    if ( ! add_post_meta( $id, $timeslot_parent_key, $timeslot_program_id, true ) ) {
      update_post_meta( $id, $timeslot_parent_key, $timeslot_program_id );
    }

  }
}

function program_lookup_title($program_id){
  $post = get_post($program_id);

  $program_title = get_the_title($post);
  return $program_title;
}

function program_lookup_post_type($program_id){
  $post = get_post($program_id);

  $program_post_type = get_post_type($post);
  return $program_post_type;
}


function get_post_id_by_meta_key_and_value($key, $value) {

  global $wpdb;

  $meta = $wpdb->get_results($wpdb->prepare(
      "
      SELECT *
      FROM $wpdb->postmeta
      WHERE meta_key = %s
        AND meta_value= %s
      ",
      $key,
      $value
    ) );

  // Exampple of wpdb::prepare syntax:
  // $wpdb->prepare( "SELECT * FROM table WHERE ID = %d AND name = %s", $id, $name );

  // print_r($meta);

  if (is_array($meta) && !empty($meta) && isset($meta[0])) {
    $meta = $meta[0];
  }

  if (is_object($meta)) {
    return $meta->post_id;
  } else {
    echo "meta was not an object";
    return false;
  }

}


// function aspire_timeslot_helper($titlecode, $startdate, $starttime, $enddate, $endtime){

//   $program_id = get_post_id_by_meta_key_and_value("wpcf-title-code", $titlecode);
//   $program_title = get_the_title($program_id);
//   $program_post_type = get_post_type($program_id);

//   $start_date_time = strtotime($startdate . $starttime);
//   $end_date_time = strtotime($enddate . $endtime);

//   echo "Program ID: " . $program_id . "<br>";
//   echo "Program Title: " . $program_title . "<br>";
//   echo "Start DateTime: " . $start_date_time . "<br>";
//   echo "End DateTime: " . $end_date_time . "<br>";

// }

// function custom_time_split($date, $time) {
//     // do something to $x
//  $x = strtotime($date . $time);
//  return $x;
// }

// function custom_time_merged($date, $time) {
//     // do something to $x
//  $x = strtotime($date . $time);
//  return $x;
// }
