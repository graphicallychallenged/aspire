<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aspire
 */
get_header(); ?>

  <?php get_template_part( 'templates-partials/block-aspire', 'masthead-internal' ); ?>

  <?php get_template_part( 'templates-ads/block-ad', 'top-banner-970x90'); ?>

<div class="site-container container" id="site-container">
  <div class="site-content row" id="site-content">
    <main class="site-main col-md-8" id="site-main" role="main">
	    <?php echo do_shortcode('[wpv-view name="i-aspire-all"]'); ?>
	  </main>

    <div id="sidebar" class="sidebar sidebar-primary col-md-3 col-md-offset-1" role="complementary">
      <?php get_sidebar(); ?>
    </div>

  </div>
</div>

<?php
get_footer();
