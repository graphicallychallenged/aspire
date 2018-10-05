<?php
/**
 * Template part for displaying a homepage spotlight
 */

 // Get the ID and post type of current entry
 $entry_id  = get_the_ID();
 $entry_post_type = get_post_type();

 //  echo "Entry ID " . $entry_id;
 //  echo "Entry Post Type " . $entry_post_type;

// Find background media
 $background_media_url = aspire_get_background_media_url($entry_id, $entry_post_type);

 ?>

<div class="spotlight-fullbleed" style="background-image: url(<?php echo $background_media_url ?>);">

  <div class="spotlight-details block-sm-bottom block-xs-bottom">

    <h3 class="spotlight-title"><a href="<?php echo the_permalink();?>"><?php the_title();?></a></h3>

    <?php if( get_post_type() == 'series' && has_term('digital-series', 'series-type') ) { ?>

      <a href="<?php echo get_permalink(); ?>" class="btn btn-primary btn-favs">More Details</a>

    <?php } elseif(get_post_type() == 'series') {

        $upcoming_episodes = aspire_get_upcoming_episodes(1);
        $parent_id = aspire_display_upcoming_episodes($upcoming_episodes);
      ?>

      <a href="<?php echo get_permalink($parent_id); ?>" class="btn btn-primary btn-favs">More Details</a>

   <?php } elseif (get_post_type() == 'exclusives') { ?>

    <a href="<?php echo get_permalink() ; ?>" class="btn btn-primary btn-favs">More Details</a>

   <?php } elseif (get_post_type() == 'page') { ?>

    <a href="<?php echo get_permalink(); ?>" class="btn btn-primary btn-favs">More Details</a>

   <?php } elseif (get_post_type() == 'videos') { ?>

    <a href="<?php echo get_permalink(); ?>" class="btn btn-primary btn-favs">Watch Video</a>

   <?php } else {

      $upcoming_airings = aspire_get_upcoming_airings(1);
      $parent_id = aspire_display_upcoming_airings($upcoming_airings); ?>

      <a href="<?php echo get_permalink($parent_id);?>" class="btn btn-primary btn-favs">More Details</a>

   <?php } ?>

  </div>

  <div class="dimmer dimmer-30"></div>

</div>
