<?php
  // Get and display Photo Galleries associated with current program
    // Try to get Associated Gallery ID

  $entry_id  = get_the_ID();

  // echo $entry_id;

  if( get_post_meta( $entry_id, 'wpcf-photo-gallery-id' ) ) {

    $gallery_id = get_post_meta( $entry_id, 'wpcf-photo-gallery-id' );

    // echo 'Gallery ID: ' . $gallery_id[0];

    if ( function_exists( 'envira_gallery' ) ) {
    ?>

      <div id="section-photos" class="p-y-md">
        <h3><?php the_title(); ?> - Photos</h3>
        <hr class="m-t-sm">
        <?php envira_gallery( $gallery_id[0] ); ?>
      </div>

    <?php }

  } else {

    // echo ' No Gallery ID ';

  }

  wp_reset_postdata();

?>
