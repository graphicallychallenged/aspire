<?php
/**
 * Retrieves the image to use as a program thumbnail
 * Tries to get the image from the current entry first, and then looks at the parent taxonomy if that fails
 *
 */

function aspire_get_thumbnail_url($size = 'medium_large') {

  // Define fallback image
  $fallback_image_url = get_stylesheet_directory_uri() . '/img/aspire-fallback-image-720.jpg';

  // Define featured image as fallback; overwrite below if other options available
  $featured_image_url = $fallback_image_url;

  // Get the ID of current program
  $program_id = get_the_ID();

  // Get the parent content ID, if any:
  $parent_id  = get_post_meta( $program_id, '_wpcf_belongs_series_id', true );

  $wp_featured_image_url = get_the_post_thumbnail_url($program_id, $size);
  $aspire_featured_thumbnail_url = get_post_meta($program_id, 'wpcf-featured-thumbnail', true);

  // Get Content type
  $content_type = get_post_type($program_id);
  $parent_content_type = get_post_type($parent_id);


  // Check for WordPress featured image
  if($wp_featured_image_url) :

    return $wp_featured_image_url;

  // Check for custom "featured thumbnail"
  elseif($aspire_featured_thumbnail_url) :

    //echo 'Has WPCF Post Thumbnail';
    return $aspire_featured_thumbnail_url;

  // If content does not have its own featured image, see if it has a parent with one
  elseif($parent_id) :

    // Check Parent for WP Featured Image
    if(has_post_thumbnail($parent_id)) :

      //echo 'Parent Has WP Post Thumbnail';
      $featured_image_url = get_the_post_thumbnail_url($parent_id, $size);
      return $featured_image_url;

    // Check Parent for custom featured thumbnail
    elseif(get_post_meta($parent_id, 'wpcf-featured-thumbnail', true)) :
      //echo 'Parent Has WPCF Post Thumbnail';
      $featured_image_url = get_post_meta($parent_id, 'wpcf-featured-thumbnail', true);
      return $featured_image_url;

    // Has Parent ID, but parent has no featured images -- Fallback
    else :

      $featured_image_url = $fallback_image_url;
      return $featured_image_url;

    endif;

  // No Featured Images and No Parent -- Fallback
  else :

    $featured_image_url = $fallback_image_url;
    return $featured_image_url;

  endif;

}
