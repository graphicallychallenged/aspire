<?php
/**
 * Retrieves the image to use as a program thumbnail
 * Tries to get the image from the current entry first, and then looks at the parent taxonomy if that fails
 *
 */

function get_program_thumbnail_url() {

  // Define fallback image
  $fallback_image_url = get_stylesheet_directory_uri() . '/img/aspire-fallback-logo-720x405.jpg';

  // Define featured image as fallback; overwrite below if other options available
  $featured_image_url = $fallback_image_url;

  // Get the ID of current program
  $program_id = get_the_ID();
  //echo 'Program ID: ' . $program_id;

  // Get the parent content ID, if any:
  $parent_id  = get_post_meta( $program_id, '_wpcf_belongs_series_id', true );
  //echo 'Parent ID: ' . $parent_id;

  // Get Content type
  $content_type = get_post_type($program_id);
  //echo 'Content Type: ' . $content_type;

  $parent_content_type = get_post_type($parent_id);
  // echo 'Parent Content Type: ' . $parent_content_type;

  // Check for Featured Images

  // Check Custom featured image
  if(get_post_meta($program_id, 'wpcf-featured-thumbnail', true)) {

    //echo 'Has WPCF Post Thumbnail';
    $featured_image_url = get_post_meta($program_id, 'wpcf-featured-thumbnail', true);
    //echo esc_url($featured_image_url);
    return $featured_image_url;

  // Check WP Featured Image
  } elseif(has_post_thumbnail($program_id)) {

    //echo 'Has WP Post Thumbnail';
    $featured_image_url = get_the_post_thumbnail_url($program_id, 'full');
    //echo esc_url($featured_image_url);
    return $featured_image_url;

  // If content does not have its own featured image, see if it has a parent with one
  } elseif($parent_id) {

    // Check Parent for Custom featured image
    if(get_post_meta($parent_id, 'wpcf-featured-thumbnail', true)) {
      //echo 'Parent Has WPCF Post Thumbnail';
      $featured_image_url = get_post_meta($parent_id, 'wpcf-featured-thumbnail', true);
      //echo esc_url($featured_image_url);
      return $featured_image_url;

    // Check Parent for WP Featured Image
    } elseif(has_post_thumbnail($parent_id)) {
      //echo 'Parent Has WP Post Thumbnail';
      $featured_image_url = get_the_post_thumbnail_url($parent_id, 'full');
      //echo esc_url($featured_image_url);
      return $featured_image_url;

    // Has Parent ID, but parent has no featured images -- Fallback
    } else {
      //echo 'Featured Image URL: ' . $featured_image_url;
      return $featured_image_url;
    }

  // No Featured Images and No Parent -- Fallback
  } else {
    //echo 'Featured Image URL: ' . $featured_image_url;
    return $featured_image_url;
  }

}
