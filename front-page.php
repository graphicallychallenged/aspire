<?php
/**
 * The template for displaying the Front Page.
 */
get_header(); ?>

<div class="site-container" id="site-container">
  <div class="site-content" id="site-content">
    <main class="site-main" id="site-main" role="main">

      <?php get_template_part( 'templates-partials/today-on-aspire' ); ?>

      <?php get_template_part( 'templates-partials/editors-picks' ); ?>

      <?php get_template_part( 'templates-partials/explore-aspire' ); ?>

      <?php // get_template_part( 'templates-partials/block-home', 'spotlights' ); ?>

    </main>
  </div>
</div>

<?php
get_footer();
