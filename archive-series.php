<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aspire
 */
get_header(); ?>

<div class="site-container container" id="site-container">
  <div class="site-content row" id="site-content">
    <main class="site-main col-lg-12" id="site-main" role="main">

      <?php
      if(!is_paged()): ?>

        <div id="series-featured" class="series-featured pt-3 pb-4">
          <h3>Featured Series</h3>
          <hr>

          <?php
          $featured_series = aspire_get_featured_series(2);
          if ( $featured_series->have_posts() ) :

            echo '<div class="row">';

              while ( $featured_series->have_posts() ) : $featured_series->the_post();

//                print_r($featured_series);

                echo '<div class="col-md">';
                  get_template_part( 'templates-content/card-series-featured' );
                echo '</div>';

              endwhile;

            echo '</div>';

            /* Restore original Post Data */
            wp_reset_postdata();
            wp_reset_query();

          endif;
          ?>
        </div>

      <?php
      endif; ?>



      <?php
      $all_series = aspire_get_all_series();

      // Pagination fix
      $temp_query = $wp_query;
      $wp_query   = NULL;
      $wp_query   = $all_series;

      if ( $all_series->have_posts() ) :


        echo '<h3>All Series</h3>';
        echo '<hr>';
        echo '<div class="row">';

          while ( $all_series->have_posts() ) : $all_series->the_post();

            echo '<div class="col-sm-6 col-lg-4">';
              get_template_part( 'templates-content/card-series' );
            echo '</div>';

          endwhile;

        echo '</div>'; ?>


        <nav aria-label="Pagination">
          <ul class="pagination">
            <li class="page-item"><?php echo get_next_posts_link( 'Older Entries', $all_series->max_num_pages ); ?></li>
            <li class="page-item"><?php echo get_previous_posts_link( 'Newer Entries' ); ?></li>
          </ul>
        </nav>

        <?php
        // Reset main query object
        $wp_query = NULL;
        $wp_query = $temp_query;

        /* Restore original Post Data */
        // wp_reset_postdata();
        // wp_reset_query();

      endif;
      ?>
	  </main>

    <!-- <div id="sidebar" class="sidebar sidebar-primary col-lg-4 offset-lg-1" role="complementary"> -->
      <?php // get_sidebar(); ?>
    <!-- </div> -->

  </div>
</div>

<?php
get_footer();
