<?php
/**
 * Retrieves the media used in the masthead foregrond
 * Tries to get the image from the current entry first, and then looks at the parent entry if that fails
 *
 */

function aspire_get_masthead_video($entry_id, $entry_post_type){

// Try to get JW Player Info first
  if( get_post_meta( $entry_id, 'wpcf-jw-media-id' ) ) {

    $vidpostid = $entry_id;
    $mediaid = get_post_meta( $entry_id, 'wpcf-jw-media-id' );

    return $mediaid;
    // echo 'Media ID: ' . $mediaid[0];

  } else {

    // IF no JW ID directly assigned, look for attached videos
    $args = array(
      'post_type'       => 'videos',
      'meta_key'        => '_wpcf_belongs_' . $entry_post_type . '_id',
      'meta_value'      => $entry_id,
      'meta_compare'    => '=',
      'orderby'         => 'modified',
      'order'           => 'DESC',
      'posts_per_page'  => 1,
      'tax_query' => array(
        array(
          'taxonomy' => 'featured-slots',
          'field'    => 'slug',
          'terms'    => 'featured',
          'orderby'  => 'modified',
          'order'    => 'DESC',
        ),
      ),
    );

    $featvid = new WP_Query( $args );
    // print_r($featvid);

    // If we have a featured video
    if ( $featvid->have_posts() ) {
      while ( $featvid->have_posts() ) {
              $featvid->the_post();

              $vidpostid = get_the_ID();
              $mediaid = get_post_meta( $vidpostid, 'wpcf-jw-media-id' );

            /* Restore original Post Data */
            wp_reset_postdata();
      }

      return $mediaid;

    } else {

      return false;

    }
  }
}
