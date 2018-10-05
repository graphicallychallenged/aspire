<aside class="widget">

  <div class="widget-header d-flex justify-content-between align-items-center">
    <h4 class="widget-title mb-0">Tonight</h4>
    <a href="<?php echo esc_url(home_url()); ?>/schedule" class="text-secondary">Full Schedule ></a>
  </div>

  <hr class="mb-2">

  <?php

  date_default_timezone_set('US/Eastern');
  $starttime = strtotime('today 7pm');

  $on_tonight = aspire_get_timeslot($starttime, 5);

  ?>

  <?php
  // If we have timeslots
  if ( $on_tonight->have_posts() ) : ?>
    <ul class="list-unstyled">
      <?php
      while ( $on_tonight->have_posts() ) : $on_tonight->the_post();

      get_template_part( 'templates-content/widget-timeslot-display' );

      echo '<hr class="mt-1 mb-1">';

      endwhile;
      /* Restore original Post Data */
      wp_reset_postdata();
      wp_reset_query();
      ?>
    </ul>
  <?php
  endif; ?>

  <!-- <p class="text-right"><a href="<?php echo esc_url(home_url()); ?>/schedule">Full Schedule ></a></p> -->

</aside>
