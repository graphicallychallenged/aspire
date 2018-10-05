<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package
 */

get_header(); ?>

<div class="site-container container" id="site-container">
  <div class="site-content" id="site-content">
    <main class="site-main" id="site-main" role="main">

      <section class="error-404 not-found">
        <header class="page-header">
          <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'aspire' ); ?></h1>
        </header><!-- .page-header -->

        <div class="page-content">
          <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'aspire' ); ?></p>

          <?php get_search_form(); ?>

          <hr>

          <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

          <div class="widget widget_categories">
            <h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'aspire' ); ?></h2>
            <ul>
            <?php
              wp_list_categories( array(
                'orderby'    => 'count',
                'order'      => 'DESC',
                'show_count' => 1,
                'title_li'   => '',
                'number'     => 10,
              ) );
            ?>
            </ul>
          </div><!-- .widget -->
        </div><!-- .page-content -->
      </section><!-- .error-404 -->

    </main>
  </div>
</div>

<?php
get_footer();
