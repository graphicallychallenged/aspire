<?php
  // Get the ID and post type of current entry
  $entry_id  = get_the_ID();
  $entry_post_type = get_post_type();
  $background_media_url = aspire_get_background_media_url();
?>

<div id="masthead" class="masthead masthead-internal text-light py-3 py-lg-5">
  <div class="container">
      <h1 class="page-title h4 my-0 text-light mr-auto">

        <?php $title = wp_title('|', false, 'right');

        // printf($title);

        // echo '<br>via custom smart title<br>';

        aspire_smart_title();

        // echo '<br>via str_replace<br>';

        // $trimmed = str_replace(" | Aspire TV", "", $title);
        // printf($trimmed);

        ?>
      </h1>
  </div>
  <div class="dimmer dimmer-90"></div>
</div>
