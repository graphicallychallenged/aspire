
<?php
/**
 * Template part for displaying Schedule entries in a sidebar widget
 */

$timeslotid             = get_the_ID();
$startdatetime          = get_post_meta($timeslotid, 'wpcf-start-date-time', true );
$enddatetime            = get_post_meta($timeslotid, 'wpcf-end-date-time', true );

$timeslot_program_type  = get_post_meta($timeslotid, 'wpcf-timeslot-program-type', true );
$program_type_obj       = get_post_type_object( $timeslot_program_type );

$parent_content_id      = get_post_meta($timeslotid, 'wpcf-parent-content-id', true);
$parent_thumb_url       = get_the_post_thumbnail_url($parent_content_id, 'thumbnail');
$parent_title           = get_the_title($parent_content_id);
$parent_link            = get_permalink($parent_content_id);

$grandparent_content_id = get_post_meta($timeslotid, 'wpcf-grandparent-content-id', true);
$grandparent_thumb_url  = get_the_post_thumbnail_url($grandparent_content_id, 'thumbnail');
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

  $timeslot_title_primary   = $parent_title;
  $timeslot_link_primary    = $parent_link;

  $timeslot_title_secondary = '';
  $timeslot_link_secondary  = '';

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

<li class="media pt-2 pb-2">
  <p class="mr-3 timeslot-time font-weight-bold text-secondary text-uppercase">
    <?php echo date('g:ia', $startdatetime); ?>
  </p>

  <div class="media-body">

    <!--
    <a href="<?php echo $timeslot_link_primary; ?>">
      <img src="<?php echo $timeslot_image; ?>" class="img-fluid">
    </a>
    -->

    <h6 class="timeslot-program-title mb-1">
      <?php
      if( !empty($timeslot_title_primary) ) { ?>

        <a class="text-dark" href="<?php echo $timeslot_link_primary; ?>">
          <?php echo $timeslot_title_primary; ?>
        </a>

      <?php
      } else { ?>

        <span class="text-muted">Paid Program</span>

      <?php
      } ?>

    </h6>

    <?php
    if(!empty($timeslot_title_secondary)) : ?>

      <p class="timeslot-episode-title mb-0">
        <a class="text-muted" href="<?php echo $timeslot_link_secondary; ?>">
          <?php echo $timeslot_title_secondary; ?>
        </a>

        <?php
        if( $first_air_date >= strtotime("today") ) : ?>
          <br>
          <strong class="text-ribbon text-ribbon-primary mt-2">
            <span>New!</span>
          </strong>
        <?php endif; ?>
      </p>

    <?php endif; ?>

  </div>
</li>
