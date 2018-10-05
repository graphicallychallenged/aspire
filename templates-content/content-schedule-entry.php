<?php
/**
 * Template part for displaying Schedule entries.
 */


// Get Content Data attached to the current timeslot

$timeslotid = get_the_ID();
$startdatetime = get_post_meta($timeslotid, 'wpcf-start-date-time', true );
$enddatetime = get_post_meta($timeslotid, 'wpcf-end-date-time', true );
$parent_content_id = get_post_meta($timeslotid, 'wpcf-parent-content-id', true);
$grandparent_content_id = get_post_meta($timeslotid, 'wpcf-grandparent-content-id', true);
$first_air_date = get_post_meta($parent_content_id, 'wpcf-first-air-date', true);
$timeslot_program_type = get_post_meta($timeslotid, 'wpcf-timeslot-program-type', true );
$program_type_obj = get_post_type_object( $timeslot_program_type );

// echo $parent_content_id;
// echo $timeslot_program_type;

// $parent_series_id = get_post_meta($timeslotid, '_wpcf_belongs_series_id' );
// $parent_episode_id = get_post_meta($timeslotid, '_wpcf_belongs_episodes_id');
// $parent_episode_id = get_post_meta($timeslotid, '_wpcf_belongs_episodes_id');
// $parent_episode_id = get_post_meta($timeslotid, '_wpcf_belongs_episodes_id');

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('card mb-2'); ?>>
  <div class="card-body">

    <div class="row">
    <div class="col-md-2 d-flex align-items-center">
      <p class="schedule-date sr-only"><?php // echo date('F j', $startdatetime); ?></p>
      <p class="schedule-time h5"><?php echo date('g:ia', $startdatetime); ?></p>
    </div>

    <div class="col-md-5">
      <a href="<?php echo get_permalink($parent_content_id); ?>">

        <?php if(has_post_thumbnail($parent_content_id)){ // Parent Thumbnail

          echo get_the_post_thumbnail($parent_content_id, 'medium', array( 'class' => 'img-fluid' ));

        } elseif(has_post_thumbnail($grandparent_content_id)) { // Grandparent Thumbnail

          echo get_the_post_thumbnail($grandparent_content_id, 'medium', array( 'class' => 'img-fluid' ));

        } else { // Fallback Image ?>

          <img src="<?php echo get_template_directory_uri() . '/img/aspire-fallback-logo-366x206.jpg'; ?>" class="img-fluid">

       <?php } ?>
      </a>
    </div>

    <div class="col-md-5 d-flex align-items-center">
      <div class="schedule-entry-details">

        <?php if( $first_air_date >= strtotime("today") ) { ?>

          <p class="schedule-program-label" style="font-size: 14px;">
            <strong class="text-ribbon text-ribbon-primary">
              <span>New Episode!</span>
            </strong>
          </p>

        <?php } ?>

        <?php if($timeslot_program_type == 'episodes'){ ?>

          <p class="schedule-program-type mb-2">
            <a class="text-muted" href="<?php echo get_permalink($grandparent_content_id); ?>">
              <?php echo get_the_title($grandparent_content_id); ?>
            </a>
          </p>

          <h5 class="schedule-program-title">
            <a href="<?php echo get_permalink($parent_content_id); ?>">
              <?php echo get_the_title($parent_content_id); ?>
            </a>
          </h5>

         <!-- <p class="schedule-program-description"><?php echo wp_trim_words(get_the_excerpt($parent_content_id), 15); ?></p> -->

        <?php } elseif (in_array($timeslot_program_type, array('specials', 'documentaries', 'movies'))) { ?>

          <p class="schedule-program-type mb-2">
            <a class="text-muted" href="<?php echo get_post_type_archive_link($timeslot_program_type); ?>">
              <?php echo $program_type_obj->labels->name; ?>
            </a>
          </p>

          <h5 class="schedule-program-title">
            <a href="<?php echo get_permalink($parent_content_id); ?>">
              <?php echo get_the_title($parent_content_id); ?>
            </a>
          </h5>

          <!-- <p class="schedule-program-description"><?php echo wp_trim_words(get_the_excerpt($parent_content_id), 15); ?></p> -->

        <?php } else { ?>

          <h5 class="schedule-program-title text-muted">
            Paid Program
          </h5>

        <?php } ?>

      </div>
    </div>
  </div>

  </div>
</div>
