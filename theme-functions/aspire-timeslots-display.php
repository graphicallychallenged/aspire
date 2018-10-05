<?php
/**
 * Functions relating to Timeslot entries
 *
 */

// Display the current timeslot
function aspire_display_timeslot_now($now){

  $timeslot_now_query = aspire_get_timeslot_now($now);

  // If we have timeslots
  if ( $timeslot_now_query->have_posts() ) {

    while ( $timeslot_now_query->have_posts() ) : $timeslot_now_query->the_post();

      get_template_part( 'templates-content/content', 'schedule-entry' );

    endwhile;
    /* Restore original Post Data */
    wp_reset_postdata();
    wp_reset_query();

  }
}

// Display the next timeslot
function aspire_display_timeslot_next($now, $offset = '0'){

  $timeslot_next_query = aspire_get_timeslot_next($now, $offset);

  // If we have timeslots
  if ( $timeslot_next_query->have_posts() ) {

    while ( $timeslot_next_query->have_posts() ) : $timeslot_next_query->the_post();

      get_template_part( 'templates-content/content', 'schedule-entry' );

    endwhile;
    /* Restore original Post Data */
    wp_reset_postdata();
    wp_reset_query();

  }
}

// Display a specific timeslot
function aspire_display_timeslot($starttime){

  $timeslot_query = aspire_get_timeslot($starttime);

  // If we have timeslots
  if ( $timeslot_query->have_posts() ) {

    while ( $timeslot_query->have_posts() ) : $timeslot_query->the_post();

      get_template_part( 'templates-content/content', 'schedule-entry' );

    endwhile;
    /* Restore original Post Data */
    wp_reset_postdata();
    wp_reset_query();

  }
}

// Display the schedule between specific dates or times
function aspire_display_timeslots_between($starttime, $endtime, $item_num){

  $timeslot_query = aspire_get_timeslots_between($starttime, $endtime);

  // If we have timeslots
  if ( $timeslot_query->have_posts() ) {

    while ( $timeslot_query->have_posts() ) : $timeslot_query->the_post();

      get_template_part( 'templates-content/content', 'schedule-entry' );

    endwhile;

    /* Restore original Post Data */
    wp_reset_postdata();
    wp_reset_query();

  }
}



// Display upcoming AIRINGS of a given PROGRAM
function aspire_display_upcoming_airings($upcoming_airings){

  //  $upcoming_airings = aspire_get_upcoming_airings();

  // If we have timeslots
  if ( $upcoming_airings->have_posts() ) : ?>

    <ul class="program-air-times">

      <?php while ( $upcoming_airings->have_posts() ) : $upcoming_airings->the_post();

      $timeslotid = get_the_ID();
      $startdatetime = get_post_meta($timeslotid, 'wpcf-start-date-time', true );
      $parent_content_id = get_post_meta($timeslotid, 'wpcf-parent-content-id', true);
      $grandparent_content_id = get_post_meta($timeslotid, 'wpcf-grandparent-content-id', true);

      ?>

      <li class="program-start-time"><?php echo date('l F j \a\t\ g:ia', $startdatetime); ?></li>

    <?php
      endwhile;

      return $parent_content_id;

      /* Restore original Post Data */
      wp_reset_postdata();
      wp_reset_query();
      ?>

  </ul>

  <?php else : ?>

    <p>No upcoming airings at this time</p>

  <?php endif;

    wp_reset_postdata();
    wp_reset_query();

}


// Display upcoming EPISODES of a given SERIES
function aspire_display_upcoming_episodes($upcoming_episodes){

//  $upcoming_episodes = aspire_get_upcoming_episodes();

  // If we have timeslots
  if ( $upcoming_episodes->have_posts() ) : ?>

    <ul class="program-air-times list-unstyled">

      <?php while ( $upcoming_episodes->have_posts() ) : $upcoming_episodes->the_post();

      $timeslotid = get_the_ID();
      $startdatetime = get_post_meta($timeslotid, 'wpcf-start-date-time', true );
      $parent_content_id = get_post_meta($timeslotid, 'wpcf-parent-content-id', true);
      $grandparent_content_id = get_post_meta($timeslotid, 'wpcf-grandparent-content-id', true);
      $first_air_date = get_post_meta($parent_content_id, 'wpcf-first-air-date', true);

      ?>

      <li class="program-start-time">

        <?php if( $first_air_date >= strtotime('today') ) : ?>

          <p class="episode-label" style="font-size: 16px; text-transform: uppercase; letter-spacing: 1px;">New Episode</p>

        <?php endif; ?>

        <a href="<?php echo get_permalink($parent_content_id); ?>">
          <?php echo get_the_title($parent_content_id); ?>
        </a>
        <br>
        <?php echo date('l F j \a\t\ g:ia', $startdatetime); ?> EDT
      </li>

    <?php
      endwhile;

      return $grandparent_content_id;
      /* Restore original Post Data */
      wp_reset_postdata();
      wp_reset_query();
      ?>

  </ul>

  <?php else : ?>

    <p>No upcoming airings at this time</p>

  <?php endif;

  wp_reset_postdata();
  wp_reset_query();

}
