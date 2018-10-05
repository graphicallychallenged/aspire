<?php
/**
 * Display upcoming airings or episodes
 */

$timeslotid = get_the_ID();
$startdatetime = get_post_meta($timeslotid, 'wpcf-start-date-time', true );
$enddatetime = get_post_meta($timeslotid, 'wpcf-end-date-time', true );
$parent_content_id = get_post_meta($timeslotid, 'wpcf-parent-content-id', true);
$first_air_date = get_post_meta($parent_content_id, 'wpcf-first-air-date', true);
$parent_program_type = get_post_type($parent_content_id);
$program_type_obj = get_post_type_object( $parent_program_type );

?>

 <li class="program-upcoming list-group-item align-items-center">

     <!-- <p class="lead schedule-time text-muted mb-md-0"><strong><?php echo date('g:ia', $startdatetime); ?></strong></p> -->

     <!-- <a href="<?php echo get_permalink($parent_content_id); ?>">
         <?php $timeslot_featured_image_url = get_timeslot_thumbnail(); ?>
         <img src="<?php echo $timeslot_featured_image_url; ?>" class="img-fluid mb-2">
     </a> -->

     <p class="d-flex justify-content-between text-muted" style="margin-bottom: 0.5rem;">
       <?php echo date('l M j', $startdatetime); ?> at <?php echo date('g:ia', $startdatetime); ?>

       <?php if( $first_air_date >= strtotime('today') ) : ?>
         <span class="badge badge-blue" style="line-height: 1.5">New</span>
        <?php endif; ?>
     </p>

      <?php if($parent_program_type == 'episodes'){

           $shows = get_the_terms( $parent_content_id, 'show' );

           foreach ( $shows as $show ) {
                // print_r($show);
                $show_names[] = $show->name;
                $show_links[] = esc_url( get_term_link( $show->slug, 'show' ) );
                // echo $show_names[0];
                // echo $show_links[0];
           }
         ?>
           <p class="schedule-program-type">
             <a href="<?php echo $show_links[0]; ?>">
               <?php echo $show_names[0]; ?>
             </a>
           </p>

           <p class="" style="margin-bottom: 0.5rem;">
             <a href="<?php echo get_permalink($parent_content_id); ?>">
               <?php echo get_the_title($parent_content_id); ?>
             </a>
           </p>

          <!-- <p class="schedule-program-description mb-0 text-muted"><?php echo wp_trim_words(get_the_excerpt($parent_content_id), 15); ?></p> -->

        <?php } elseif (in_array($parent_program_type, array('movies'))) { ?>

           <p class="schedule-program-type">
             <a href="<?php echo get_post_type_archive_link($parent_program_type); ?>">
               <?php echo $program_type_obj->labels->singular_name; ?>
             </a>
           </p>

           <p class="" style="margin-bottom: 0.5rem;">
             <a href="<?php echo get_permalink($parent_content_id); ?>">
               <?php echo get_the_title($parent_content_id); ?>
             </a>
           </p>

           <!-- <p class="schedule-program-description mb-0 text-muted"><?php echo wp_trim_words(get_the_excerpt($parent_content_id), 15); ?></p> -->

         <?php } else { ?>

           <h4 class="schedule-program-title">
             Paid Program
           </h4>

         <?php } ?>

 </li>
