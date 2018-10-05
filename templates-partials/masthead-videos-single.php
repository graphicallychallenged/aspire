<?php
  // Get the ID and post type of current entry
  $entry_id  = get_the_ID();
  $entry_post_type = get_post_type();

  //  echo "Entry ID " . $entry_id;
  //  echo "Entry Post Type " . $entry_post_type;

  $background_media_url = aspire_get_background_media_url($entry_id, $entry_post_type);
  $masthead_video_id    = aspire_get_masthead_video($entry_id, $entry_post_type);
  $masthead_image_url   = aspire_get_foreground_media_url($entry_id, $entry_post_type);

  // echo $background_media_url;
  // echo $masthead_video_id;
  // echo $masthead_image_url;
?>

<div id="masthead-programs" class="masthead masthead-programs text-light py-3 py-lg-4">
  <div class="container" style="position: relative; z-index: 3;">
    <div class="row">
      <div class="col-md-7">

        <?php // If we have a featured video, display it
        if (!empty($masthead_video_id)) : ?>

          <div id="featured-video" class="video mb-2 mb-lg-0">
            <?php
              // Insert JW Player
              echo do_shortcode('[jwplayer ' . $masthead_video_id[0] . ']');
            ?>
          </div>

        <?php
        elseif(aspire_get_thumbnail_url()) : ?>

          <a href="<?php the_permalink(); ?>">
            <img src="<?php echo aspire_get_thumbnail_url(); ?>" class="img-fluid mb-2 mb-lg-0 card-img-top">
          </a>

        <?php
        else : ?>

        <?php
        endif; ?>

      </div>

      <div class="col-md-5">

        <?php // Get the parent content ID, if any:
          $parent_id = get_post_meta( get_the_ID(), '_wpcf_belongs_series_id', true );

          if($parent_id) :

            $parent_title = get_the_title($parent_id);
            $parent_link = get_the_permalink($parent_id); ?>

            <a href="<?php echo $parent_link; ?>" class="text-secondary">
              <h6>
                <?php echo $parent_title; ?>
              </h6>
            </a>

          <?php
          endif; ?>

        <h2><?php the_title(); ?></h2>
        <p><?php echo get_the_excerpt(); ?></p>
      </div>

    </div>
  </div>
  <div class="dimmer dimmer-90"></div>
</div>
