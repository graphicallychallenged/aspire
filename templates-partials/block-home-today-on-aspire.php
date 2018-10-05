<!-- Today on Aspire -->
<div id="today-on-aspire" class="block p-t-lg p-b-md">
  <div class="container">

    <div class="row">
      <div class="col-md-8">
        <h2 class="block-title m-y-0">
          <a href="<?php esc_url(home_url())?>/?post_type=timeslots">Today on Aspire</a>
        </h2>
      </div>
      <div class="col-md-4 text-right">
         <p class="m-t m-b-0"><a href="<?php esc_url(home_url())?>/schedule/">View Full Schedule <span class="icon icon-lg icon-arrow-with-circle-right"></span></a></p>
      </div>
    </div>

    <hr>

    <div id="today-timeslots" class="row m-t-md">

      <div class="col-lg-3 col-sm-6 m-b">
        <h5 style="color:#aaa; letter-spacing: 0.03em;">ON NOW</h5>
        <?php // date_default_timezone_set('US/Eastern');
              // $now = strtotime("now");
        ?>
        <?php get_template_part('templates-partials/block', 'timeslot-on-now'); ?>
      </div>

      <div class="col-lg-3 col-sm-6 m-b">
        <h5 style="color:#aaa; letter-spacing: 0.03em;">UP NEXT</h5>
        <?php // date_default_timezone_set('US/Eastern');
              // $now = strtotime("now"); ?>
        <?php get_template_part('templates-partials/block', 'timeslot-up-next'); ?>
      </div>


      <?php
      // Before Prime Time
      date_default_timezone_set('US/Eastern');
      if(strtotime("now") <= strtotime("today 7pm")) { ?>

        <div class="col-lg-3 col-sm-6 m-b">
          <h5 style="color:#aaa; letter-spacing: 0.03em;">TONIGHT AT 7 ET</h5>
          <?php // $specific_time = strtotime('today 7pm'); //echo $specific_time; ?>
          <?php get_template_part('templates-partials/block', 'timeslot-tonight-7pm'); ?>
        </div>

        <div class="col-lg-3 col-sm-6 m-b">
          <h5 style="color:#aaa; letter-spacing: 0.03em;">TONIGHT AT 8 ET</h5>
          <?php // $specific_time = strtotime('today 8pm'); //echo $specific_time; ?>
          <?php get_template_part('templates-partials/block', 'timeslot-tonight-8pm'); ?>
        </div>

    <?php
    // During / After Prime Time
    } else { ?>

      <div class="col-lg-3 col-sm-6 m-b">
        <h5 style="color:#aaa; letter-spacing: 0.03em;">LATER</h5>
        <?php // $specific_time = strtotime('today 7pm'); //echo $specific_time; ?>
        <?php get_template_part('templates-partials/block', 'timeslot-up-next-offset-2'); ?>
      </div>

      <div class="col-lg-3 col-sm-6 m-b">
        <h5 style="color:#aaa; letter-spacing: 0.03em;">&nbsp;</h5>
        <?php // $specific_time = strtotime('today 8pm'); //echo $specific_time; ?>
        <?php get_template_part('templates-partials/block', 'timeslot-up-next-offset-3'); ?>
      </div>

    <?php } ?>

    </div>

  </div>
</div>
