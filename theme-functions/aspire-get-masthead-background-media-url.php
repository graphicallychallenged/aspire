<?php
/**
 * Retrieves the image to be used for the masthead background.
 * Tries to get the image from the current entry first, and then looks at the parent entry if that fails
 *
 */

function aspire_get_background_media_url($entry_id = null) {

  if(is_shop()):
    $entry_id = 262481;
  endif;

  if(!isset($entry_id)):
    $entry_id = get_the_ID();
  endif;

  $entry_post_type = get_post_type($entry_id);

  // Try to get fullbleed masthead and featured image URL for this entry
  $fullbleed_masthead_image_url     = get_post_meta($entry_id, 'wpcf-full-bleed-image', true);
  $aspire_featured_thumbnail_url    = get_post_meta($entry_id, 'wpcf-featured-thumbnail', true);
  //	$mobile_featured_image_url        = get_post_meta($entry_id,'wpcf-mobile-featured-image', true);
  $wp_featured_image_url            = get_the_post_thumbnail_url($entry_id, 'full');

  //  $fallback_header_image_url        = get_stylesheet_directory_uri() . '/img/aspire-nav-bg-test.jpg';
  $fallback_header_image_url        = get_stylesheet_directory_uri() . '/img/header-bg-fallback-2.jpg';

  if(is_page() || is_shop()):

    if($wp_featured_image_url):
      return $wp_featured_image_url;
    elseif($fullbleed_masthead_image_url):
      return $fullbleed_masthead_image_url;
    elseif($aspire_featured_thumbnail_url):
      return $aspire_featured_thumbnail_url;
    else:
      return $fallback_header_image_url;
    endif;

  elseif( is_tax() || is_category() ):

    // Try to get the Term Header Image
    $term_header_image_url = get_term_meta( get_queried_object_id(), 'wpcf-term-header-image', true);

    if($term_header_image_url):
      return $term_header_image_url;
    else:
      return $fallback_header_image_url;
    endif;

  else:

    return $fallback_header_image_url;

  endif;

  // elseif(is_single() && $fullbleed_masthead_image_url ):
  //
  //   return $fullbleed_masthead_image_url;
  //
  // elseif(is_single() && $wp_featured_image_url ):
  //
  //   return $wp_featured_image_url;
  //
  // elseif(is_single() && $aspire_featured_thumbnail_url):
  //
  //   return $aspire_featured_thumbnail_url;
  //
  // elseif(is_single() && $entry_post_type == 'episodes' ):
  //
  //   // If this is an episode, get the parent series id:
  //   $series_id  = get_post_meta( $entry_id, '_wpcf_belongs_series_id', true );
  //
  //   // Try to get the masthead or feature image URLs for the parent
  //   $parent_fullbleed_masthead_image_url =  get_post_meta($series_id, 'wpcf-full-bleed-image', true);
  //   $parent_wp_featured_image_url =         get_the_post_thumbnail_url($series_id, 'full');
  //
  //   if($parent_wp_featured_image_url):
  //
  //     return $parent_wp_featured_image_url;
  //
  //   elseif( $parent_fullbleed_masthead_image_url ):
  //
  //     return $parent_fullbleed_masthead_image_url;
  //
  //   else:
  //
  //     return   $fallback_header_image_url;
  //
  //   endif;

}
