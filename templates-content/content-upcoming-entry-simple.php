<?php
/**
 * Display upcoming airings or episodes
 */

$timeslotid = get_the_ID();
$startdatetime = get_post_meta($timeslotid, 'wpcf-start-date-time', true );
$parent_content_id = get_post_meta($timeslotid, 'wpcf-parent-content-id', true);
$first_air_date = get_post_meta($parent_content_id, 'wpcf-first-air-date', true);
?>

<h6>
  <?php echo date('l M j', $startdatetime); ?> at <?php echo date('g:ia', $startdatetime); ?>

  <?php if( $first_air_date >= strtotime('today') ) : ?>
    <span class="badge badge-orange" style="line-height: 1.5">New</span>
  <?php endif; ?>
</h6>
