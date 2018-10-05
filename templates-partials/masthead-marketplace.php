<?php

// Get postdata for Marketplace page (ID = 262481)
$marketplace_data = get_post(262481);
$entry_id = $marketplace_data->ID;
$entry_post_type = $marketplace_data->post_type;
$masthead_content = $marketplace_data->post_content;

// $obj = get_queried_object();
// print_r($obj);
//
//    print_r($marketplace_data);
//    echo $marketplace_data->ID;

// $background_media_url = aspire_get_background_media_url($entry_id);
$masthead_excerpt = get_the_excerpt($entry_id);

?>

<div id="masthead" class="masthead masthead-marketplace text-light py-0 py-md-5">
  <div class="container" style="position: relative; z-index: 3;">
    <div class="row">
      <div class="col-md-7" style="padding: 2rem; background-color: rgba(255, 44, 126, 0.9);">
        <?php echo $marketplace_data->post_content; ?>
      </div>
    </div>
  </div>
  <div class="dimmer dimmer-90"></div>
</div>
