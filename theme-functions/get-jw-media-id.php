<?php
function get_jw_media_id() {
  global $post;

  // Check for Full Episode
  $full_episode_media_id = get_post_meta( $post->ID, 'wpcf-full-episode-media-id', true );

  // Check for manually assigned video
  $video_media_id = get_post_meta( $post->ID, 'wpcf-jw-media-id', true );

  if($full_episode_media_id && has_term('full-episode','episode-type', $post->ID)){

    return $full_episode_media_id;

  } elseif($video_media_id) {

    return $video_media_id;

  } else {

    return false;

  }
}
