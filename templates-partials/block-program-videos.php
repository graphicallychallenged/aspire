<?php

  // Get and display videos assocaited with current program

  wp_reset_postdata();
  wp_reset_query();

  $entry_id = get_the_ID();

//  echo $entry_id;

  $entry_videos = types_child_posts("videos");

  $childargs = array(
    'post_type' => 'videos',
    'numberposts' => -1,
    //'meta_key' => 'wpcf-description',
    //'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query' => array(
        array(
          'key' => '_wpcf_belongs_series_id', 'value' => get_the_ID()
        )
    )
  );

  $child_posts = get_posts($childargs);

  // echo $entry_videos;
  // print_r($entry_videos);
  //
  // echo $child_posts;
  // print_r($child_posts);

  if($entry_videos) {
    // print_r($entry_videos);
    // echo " HAS VIDEOS ";
    echo do_shortcode("[wpv-view name='featured-videos-of-current-program']");

  } else {

    echo do_shortcode( '[wpv-view name="videos-most-recent"]' );

  }

  wp_reset_postdata();
  wp_reset_query();

?>
