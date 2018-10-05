<!-- Program Summary Block -->
<div class="block block-inverse p-y-md" id="program-about">
  <div class="container">
    <div class="row">

      <?php if (get_post_type() == 'videos' || get_post_type() == 'i-aspire') { ?>

        <div class="col-md-10 col-md-offset-1">
          <h1 class="h3"><?php the_title(); ?></h1>
          <hr>
          <p class="series-summary"><?php echo get_the_excerpt();?></p>
        </div>

      <?php } elseif (get_post_type() =='series'){

          $series_id  = get_post_meta($post->ID, '_wpcf_belongs_series_id', true);
        ?>

        <?php if(has_term('digital-series','series-type')){ ?>

          <div class="col-md-10 col-md-offset-1">
            <h1 class="h3"><?php the_title(); ?></h1>
            <hr>
            <p class="series-summary"><?php echo get_the_excerpt();?></p>

            <?php
            $entry_episodes = types_child_posts("episodes");
              if($entry_episodes) {
            ?>
              <p><a href="#section-episodes" class="btn btn-primary">Watch Episodes Online</a></p>
            <?php } ?>
          
          </div>

        <?php } else { ?>

          <div class="col-md-7">
            <h1 class="h3"><?php the_title(); ?></h1>
            <hr>
            <p class="series-summary"><?php echo get_the_excerpt();?></p>
          </div>

          <div class="col-md-4 col-md-offset-1">
            <h3>Upcoming Episodes</h3>
            <hr>

            <?php

              date_default_timezone_set('US/Eastern'); // Important for displaying timeslots correctly
              $now = strtotime("now");

              $upcoming_episodes = aspire_get_upcoming_episodes(2);
              aspire_display_upcoming_episodes($upcoming_episodes);
            ?>

          </div>

        <?php } ?>

      <?php } elseif (get_post_type() == 'episodes') {

            $series_id  = get_post_meta($post->ID, '_wpcf_belongs_series_id', true);
            $episodenum = get_post_meta($post->ID, 'wpcf-episode-number', true);
            $seasonnum  = get_post_meta($post->ID, 'wpcf-season', true);
      ?>

        <div class="col-md-7">

          <h2><?php the_title(); ?></h2>

          <h5 class="episode-details">
            <a class="series-link" href="<?php the_permalink($series_id); ?>"><?php echo get_the_title($series_id); ?></a> - Season <?php echo $seasonnum; ?>, Episode <?php echo $episodenum; ?>
          </h5>
          <hr>
          <p class="series-summary"><?php echo get_the_excerpt();?></p>
        </div>

        <div class="col-md-4 col-md-offset-1">
          <h3>Next Airings</h3>
          <hr>

          <?php
            date_default_timezone_set('US/Eastern'); // Important for displaying timeslots correctly
            $now = strtotime("now");

            $upcoming_airings = aspire_get_upcoming_airings(2);
            aspire_display_upcoming_airings($upcoming_airings);
          ?>

        </div>

      <?php } else { ?>

        <div class="col-md-7">
          <h1 class="h3"><?php the_title(); ?></h1>
          <hr>
          <p class="series-summary"><?php echo get_the_excerpt();?></p>
        </div>

        <div class="col-md-4 col-md-offset-1">
          <h3>Upcoming Airings</h3>
          <hr>

          <?php
            date_default_timezone_set('US/Eastern'); // Important for displaying timeslots correctly
            $now = strtotime("now");

            $upcoming_airings = aspire_get_upcoming_airings(2);
            aspire_display_upcoming_airings($upcoming_airings);
          ?>

        </div>

      <?php } ?>

    </div>
  </div>
</div>
