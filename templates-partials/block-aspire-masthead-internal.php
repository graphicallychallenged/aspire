<!-- Aspire Masthead -->
<?php

  // Get the ID and post type of current entry
  $entry_id  = get_the_ID();
  $entry_post_type = get_post_type();

  //  echo "Entry ID " . $entry_id;
  //  echo "Entry Post Type " . $entry_post_type;

  $background_media_url = aspire_get_background_media_url($entry_id, $entry_post_type);
  $masthead_video_id = aspire_get_masthead_video($entry_id, $entry_post_type);
  $masthead_image_url = aspire_get_foreground_media_url($entry_id, $entry_post_type);

  // echo $background_media_url;
  // echo $masthead_video_id;
  // echo $masthead_image_url;

?>

<!-- Render Masthead -->
<?php if ($background_media_url) { ?>

  <div id="masthead" class="block block-inverse aspire-masthead"
       style="background-image:url(<?php echo $background_media_url; ?>); ">

<?php

  // If we have a featured video, display it
  if (!empty($masthead_video_id)) { ?>

    <div class="dimmer dimmer-80"></div>

    <div class="container" style="position: relative; z-index: 3;">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">

          <h1 class="h3"><?php the_title(); ?></h1>
          <hr>

          <div id="featured-video" class="video m-b-md">
            <?php
              // Insert JW Player
              echo do_shortcode('[jwplayer ' . $masthead_video_id[0] . ']');
            ?>
          </div>

        </div>
      </div>
    </div>

<?php } elseif( !empty($masthead_image_url) ) { ?>

    <div class="dimmer dimmer-80"></div>

    <div class="container" style="position: relative; z-index: 3;">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">

            <?php if (!is_single()) { ?>

              <h1 class="h2">Featured</h1>

              <a href="<?php the_permalink(); ?>">
                <img src="<?php echo $masthead_image_url; ?>" class="img-fluid">
              </a>

              <br/>
              <h1 class="h3"><?php the_title(); ?></h1>

              <?php if (has_excerpt()) : ?>
                <hr>
                <p class="series-summary"><?php the_excerpt(); ?></p>
              <?php endif; ?>


            <?php } else { ?>

              <img src="<?php echo $masthead_image_url; ?>" class="img-fluid">

                <?php // echo get_the_post_thumbnail($entry_id, 'medium', array( 'class' => 'img-fluid' ) ); ?>

            <?php } ?>

          </div>
        </div>
      </div>

<?php } else { ?>

    <div class="container" style="position: relative; z-index: 3;">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">

          <!-- Nothing to Display -->

        </div>
      </div>
    </div>

    <?php } ?>

  </div>

<?php } ?>
