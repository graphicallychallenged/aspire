<?php
/**
 * Retrieves the media used in the masthead foregrond
 * Tries to get the image from the current entry first, and then looks at the parent entry if that fails
 *
 */

function aspire_get_foreground_media_url($entry_id, $entry_post_type){

  $aspire_featured_thumbnail_url = get_post_meta($entry_id, 'wpcf-featured-thumbnail', true);
  $wp_featured_image_url         = get_the_post_thumbnail_url($entry_id, 'medium');

  if( $aspire_featured_thumbnail_url ) {

    $masthead_foreground_media_url = $aspire_featured_thumbnail_url;
    return $masthead_foreground_media_url;

  } elseif( $wp_featured_image_url ) {

    $masthead_foreground_media_url = $wp_featured_image_url;
    return $masthead_foreground_media_url;

  } else {

    return false;

  }

}
