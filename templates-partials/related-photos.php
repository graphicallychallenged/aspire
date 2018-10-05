<?php
  // Get and display Photo Galleries associated with current program

  $entry_id  = get_the_ID();
  $entry_slug = $post->post_name;

  // Try to get Associated Gallery ID
  // $gallery_id = get_post_meta( $entry_id, 'wpcf-photo-gallery-id' );
  //
  // echo $entry_id;
  // echo 'Gallery ID: ' . $gallery_id[0];

  if ( function_exists( 'envira_album' ) && envira_get_album_by_slug( $entry_slug ) ) : ?>

    <div id="related-photos" class="py-3">

      <h4>Photo Galleries</h4>
      <hr>

      <?php envira_album( $entry_slug, 'slug' ); ?>

    </div>

  <?php
  endif; ?>
