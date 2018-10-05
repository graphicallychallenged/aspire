<div id="program-about" class="program-about bg-dark" style="background-image: url(<?php echo aspire_get_thumbnail_url('large'); ?>); background-repeat: no-repeat; background-size: cover; background-position: 50% 50%;">

  <div class="container">
    <div class="row">

      <div class="program-about-content col-md-8 col-lg-6 p-4">
        <h1 class="h3">About <?php the_title(); ?></h1>
        <hr>

        <div class="series-summary">

          <?php
          $show_content = get_the_content();
          if(!empty($show_content)):
            the_content();
          else:
            echo get_the_excerpt();
          endif; ?>

        </div>

        <p><small><a href="#" class="text-secondary">Back to Top</a></small></p>
      </div>

    </div>
  </div>

</div>
