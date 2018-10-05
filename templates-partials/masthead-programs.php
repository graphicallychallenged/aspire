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
        <h2><?php the_title(); ?></h2>
        <p><?php echo wp_trim_words(get_the_excerpt(), 26); ?></p>

        <p><a href="#program-about" class="text-light">More Details</a></p>

        <?php
        if( !has_term( 'digital', 'series-type' ) ): ?>
          <hr class="border-secondary">

          <h5 class="mb-3">Next Airings</h5>
          <?php
          // echo get_the_ID();
  				// echo the_title(get_the_ID());

          $upcoming = get_upcoming_episodes(get_the_ID(), 2);
          if ( $upcoming->have_posts() ) :
            echo "<ul>";
            while ( $upcoming->have_posts() ) : $upcoming->the_post();
              echo "<li>";
              get_template_part( 'templates-content/content', 'upcoming-entry' );
              echo "</li>";
            endwhile;
            echo "</ul>";
            wp_reset_postdata();
          else : ?>
            <p>No scheduled airing at this time.<br>Check back again soon.</p>
          <?php
          endif;
          ?>
      <?php
      endif;?>
    </div>

    </div>
  </div>
  <div class="dimmer dimmer-90"></div>
</div>
