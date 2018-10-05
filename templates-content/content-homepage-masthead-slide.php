<?php
/**
 * Template part for displaying a slide in the homepage masthead.
 */
?>

<div class="hero-content container text-left">
  <h1 class="masthead-title">
    <a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
  </h1>

  <?php
    if(get_post_type() == 'series') {

      $upcoming_episodes = aspire_get_upcoming_episodes(1);
      aspire_display_upcoming_episodes($upcoming_episodes);

    } elseif (get_post_type() == 'exclusives') { ?>

      <a href="<?php echo the_permalink();?>" class="btn btn-primary btn-favs">More Details</a>

<?php	} elseif (get_post_type() == 'page') { ?>

      <a href="<?php echo the_permalink();?>" class="btn btn-primary btn-favs">More Details</a>

<?php } else {

      $upcoming_airings = aspire_get_upcoming_airings(1);
      aspire_display_upcoming_airings($upcoming_airings);

    } ?>

</div>
