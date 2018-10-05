<?php
/**
 * Retrieves the image to be used for the masthead background.
 * Tries to get the image from the current entry first, and then looks at the parent entry if that fails
 *
 */

function aspire_get_background_media_url($entry_id, $entry_post_type){

  // Try to get fullbleed masthead and featured image URL for this entry
  $fullbleed_masthead_image_url = get_post_meta($entry_id, 'wpcf-full-bleed-image', true);
  $wp_featured_image_url        = get_the_post_thumbnail_url($entry_id, 'full');

    if( $fullbleed_masthead_image_url ) {

        $masthead_image_url = $fullbleed_masthead_image_url;

//      echo 'This entry has a Fullbleed Masthead URL and it is : ' . $masthead_image_url;
        return $masthead_image_url;

    } elseif( $wp_featured_image_url ) {

      $masthead_image_url = $wp_featured_image_url;

//    echo 'This entry has a WordPress Featured Image and it is : ' . $masthead_image_url;
      return $masthead_image_url;

    } else {
    // No Fullbleed or Featured image found so far...

      // If we're an Episode...
      if($entry_post_type == 'episodes'){

        // If this is an episode, get the parent series id:
        $series_id  = get_post_meta( $entry_id, '_wpcf_belongs_series_id', true );

        // Try to get the masthead or feature image URLs for the parent
        $parent_fullbleed_masthead_image_url =  get_post_meta($series_id, 'wpcf-full-bleed-image', true);
        $parent_wp_featured_image_url =         get_the_post_thumbnail_url($series_id, 'full');

        if( $parent_fullbleed_masthead_image_url ){

          $masthead_image_url = $parent_fullbleed_masthead_image_url;
  //        echo 'This entry had no masthead of its own, but its parent series has a Fullbleed Masthead and it is : ' . $masthead_image_url;
          return $masthead_image_url;

        } elseif( $parent_wp_featured_image_url ) {

          $masthead_image_url = $parent_wp_featured_image_url;

//          echo 'This entry had no masthead of its own, but its parent series has a WP Featured Image and it is : ' . $masthead_image_url;
          return $masthead_image_url;

        } else {

          // No fullbleed masthead or Featured Image for either the current post or its parent
          echo 'Neither this episode, nor its parent series, had any mastheads defined';
          return false;
        }
      }

    // If we're not an Episode and we also have no fullbleed masthead or featured image attached, return false
    echo 'This ' . $entry_post_type . ' has no masthead defined';
    return false;
  }

}
