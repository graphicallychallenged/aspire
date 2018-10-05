
<?php
/**
 * Template part for displaying Schedule entries.
 */

$timeslotid             = get_the_ID();
$startdatetime          = get_post_meta($timeslotid, 'wpcf-start-date-time', true );
$enddatetime            = get_post_meta($timeslotid, 'wpcf-end-date-time', true );

$timeslot_program_type  = get_post_meta($timeslotid, 'wpcf-timeslot-program-type', true );
$program_type_obj       = get_post_type_object( $timeslot_program_type );

$parent_content_id      = get_post_meta($timeslotid, 'wpcf-parent-content-id', true);
$parent_thumb_url       = get_the_post_thumbnail_url($parent_content_id, 'medium');
$parent_title           = get_the_title($parent_content_id);
$parent_link            = get_permalink($parent_content_id);

$grandparent_content_id = get_post_meta($timeslotid, 'wpcf-grandparent-content-id', true);
$grandparent_thumb_url  = get_the_post_thumbnail_url($grandparent_content_id, 'medium');
$grandparent_title      = get_the_title($grandparent_content_id);
$grandparent_link       = get_permalink($grandparent_content_id);

$fallback_thumb_url     = get_template_directory_uri() . '/img/aspire-fallback-logo-366x206.jpg';

$first_air_date         = get_post_meta($parent_content_id, 'wpcf-first-air-date', true);


// Find correct Program Data

if ($timeslot_program_type == 'episodes') {

  $timeslot_title_primary   = $grandparent_title;
  $timeslot_link_primary    = $grandparent_link;

  $timeslot_title_secondary = $parent_title;
  $timeslot_link_secondary  = $parent_link;

} else {

  $obj = get_post_type_object(get_post_type($parent_content_id));

  $timeslot_title_primary   = $obj->labels->singular_name;
  $timeslot_link_primary    = get_post_type_archive_link(get_post_type($parent_content_id));

  $timeslot_title_secondary = $parent_title;
  $timeslot_link_secondary  = $parent_link;

}

// Find correct Image
if (!empty($parent_thumb_url)) {

  $timeslot_image = $parent_thumb_url;

} elseif(!empty($grandparent_thumb_url)) {

  $timeslot_image = $grandparent_thumb_url;

} else{

  $timeslot_image = $fallback_thumb_url;

}

// echo $timeslotid . '<br>';
// echo $startdatetime . '<br>';
// echo $enddatetime . '<br>';
// echo $parent_content_id . '<br>';
// echo $grandparent_content_id . '<br>';
// echo $first_air_date . '<br>';
// echo $timeslot_program_type . '<br>';
// echo print_r($program_type_obj) . '<br>';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card mb-3'); ?>>

    <a href="<?php echo get_permalink($parent_content_id); ?>">
      <img src="<?php echo $timeslot_image; ?>" class="img-fluid card-img-top">
    </a>

    <div class="card-body">

      <?php if( $first_air_date >= strtotime("today") ) { ?>

        <p class="schedule-program-label" style="font-size: 14px; margin-bottom: 0.5rem;">
          <span class="badge badge-blue text-white" style="padding: 0.5rem; font-size: 100%;">New!</span>
        </p>

      <?php } ?>

     <div class="d-flex justify-content-between align-items-center">
        <?php
        if( !empty($timeslot_title_primary) ) { ?>
          <a class="text-muted" href="<?php echo $timeslot_link_primary; ?>">
            <?php echo $timeslot_title_primary; ?>
          </a>
        <?php
        } else { ?>
          <span class="text-muted">Paid Program</span>
        <?php
        } ?>

        <span style="margin-bottom: 0;"><?php echo date('g:ia', $startdatetime); ?></span>
      </div>

      <hr class="mt-2 mb-3">

      <?php if(!empty($timeslot_title_secondary)) { ?>

          <?php if( $first_air_date >= strtotime("today") ) { ?>
            <br>
            <strong class="text-ribbon text-ribbon-primary">
              <span>New!</span>
            </strong>
          <?php } ?>
        </p>

        <h6 class="card-title mb-0">
          <a href="<?php echo get_permalink($parent_content_id); ?>">
            <?php echo wp_trim_words(get_the_title($parent_content_id), 8); ?>
          </a>
        </h6>

        <!-- <p class="schedule-program-description text-muted d-none d-sm-block"><?php echo wp_trim_words(get_the_excerpt($parent_content_id), 10); ?></p> -->


      </div>

    <?php } else { ?>

      <h6 class="card-title mb-0">
          <span class="text-muted">Paid Program</span>
      </h6>

    <?php } ?>

</article>
