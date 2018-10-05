<div id="related-episodes" class="related-episodes">
  <?php
    // Get and display Episodes associated with current program
    if(is_singular('episodes')) :

      $entry_id = get_the_ID();
      // Get the parent content ID, if any:
      $parent_id  = get_post_meta( $entry_id, '_wpcf_belongs_series_id', true );
      $parent_post = get_post($parent_id);
      $parent_title = get_the_title($parent_id);

      $section_header = "More " . $parent_title;

      $args = array(
          'post_type'       => 'episodes',
          'posts_per_page'  => 11,
          'order'           => 'DESC',
          'orderby'         => 'meta_value_num',
          'meta_key'        => 'wpcf-episode-number',
          'meta_query'      => array(
            array(
              'key' => '_wpcf_belongs_series_id',
              'value' => $parent_id
            )
          )
        );

      $related_episodes = get_posts($args);

    else :

      $entry_id = get_the_ID();
      $section_header = get_the_title();
      $related_episodes = types_child_posts('episodes');

    endif;


    if ($related_episodes) : ?>

      <h4><?php echo $section_header ?> Episodes</h4>
      <hr>

      <?php
      foreach ($related_episodes as $episode) :
      ?>

        <div class="entry-episode row">
          <div class="col-md-6">
            <a href="<?php echo get_the_permalink($episode->ID); ?>">
              <img src="<?php echo aspire_get_thumbnail_url(); ?>" class="img-fluid card-img-top mb-2">
            </a>
          </div>

          <div class="col-md-6">
		        <p class="text-muted">Episode <?php echo get_post_meta($episode->ID, 'wpcf-episode-number', true); ?></p>
            <a href="<?php echo get_the_permalink($episode->ID); ?>">
              <h5><?php echo $episode->post_title; ?></h5>
            </a>
            <!-- <p class="text-secondary"><?php echo $episode->post_excerpt; ?></p> -->
          </div>
        </div>

        <hr>

      <?php
      endforeach;

    else :

      // echo 'Nothing to display';

    endif;

    wp_reset_postdata();
    wp_reset_query();
  ?>

</div>
