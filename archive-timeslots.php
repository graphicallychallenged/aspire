<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aspire
 */
get_header(); ?>

<?php
  date_default_timezone_set('US/Eastern');

  // Define Times to Display
  $today = strtotime("today");
  $day_0 = mktime(0, 0, 0, date("m"), date("d")+0, date("Y"));
  $today_7pm = strtotime('today 7pm');
  $today_8pm = strtotime('today 8pm');
  $now = strtotime("now");
?>

  <div class="site-container container p-y-md" id="site-container">
    <div class="site-content row" id="site-content">
      <main class="site-main col-lg-7" id="site-main" role="main">

        <?php

        //  echo date_default_timezone_get();
        // date_default_timezone_set('US/Eastern');
        // echo date_default_timezone_get();

        // echo "current_time( 'mysql' ) returns local site time: " . current_time( 'mysql' ) . '<br />';
        // echo "current_time( 'mysql', 1 ) returns GMT: " . current_time( 'mysql', 1 ) . '<br />';

        // echo "current_time( 'timestamp' ) returns local site time: " . date( 'Y-m-d H:i:s', current_time( 'timestamp', 0 ) ) . '<br />';
        // echo "current_time( 'timestamp', 1 ) returns GMT: " . date( 'Y-m-d H:i:s', current_time( 'timestamp', 1 ) ) . '<br/>';

        // echo "current_time( 'timestamp' ) raw: " . current_time( 'timestamp') . '<br />';

        $num_of_days = 6;
        ?>

        <div class="slider-nav">
            <?php for ($i=0;$i<=$num_of_days;$i++) {
              $day =  mktime(0, 0, 0, date("m"), date("d")+$i, date("Y"));
              $next_day = mktime(0, 0, 0, date("m"), date("d")+($i+1), date("Y"));
              // $id = get_the_id();
              // do we really need the ID? In any case, it's being duplicated..
              // also removed id attrivutre from a tag... duplicate IDs are no good ?>

              <a href="javascript:;" class="date-link<?php if ($i==0) echo ' ajaxed';?>" data-item-num="<?php echo $i;?>" data-day="<?php echo $day; ?>" data-nextday="<?php echo $next_day; ?>">
                <div class="card mr-2">
                  <div class="card-body" style="padding: 1rem;">
                    <h6><?php echo ($i>0) ? date("l", $day ) : "Today"; ?></h6>
                    <p class="lead mb-0"><?php echo date("F j", $day ); ?></p>
                  </div>
                </div>
              </a>
            <?php } ?>
        </div>

        <hr>

        <div id="schedule-data-wrapper" class="slider-for">

          <?php
            $day =  mktime(0, 0, 0, date("m"), date("d"), date("Y"));
            $next_day = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
            echo '<div class="day-0">';
            aspire_display_timeslots_between($now, $next_day, 0);
            echo '</div>';

            for ($i=1;$i<=$num_of_days;$i++) {
              $day =  mktime(0, 0, 0, date("m"), date("d")+$i, date("Y"));
              $next_day = mktime(0, 0, 0, date("m"), date("d")+($i+1), date("Y"));
              echo '<div class="day-'.$i.'"><div class="loader"></div></div>';

            }

          ?>


        </div>

     </main>

      <div id="sidebar" class="sidebar sidebar-primary col-lg-4 offset-lg-1" role="complementary">
        <?php get_sidebar(); ?>
      </div>

    </div>
  </div>



<?php
get_footer();
