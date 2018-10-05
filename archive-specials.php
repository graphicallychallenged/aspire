<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aspire
 */
get_header(); ?>

<div id="specials-featured" class="featured-programs block block-inverse p-y-md">
  <div class="container">
    <h3>Featured Specials</h3>
    <hr>
    <?php echo do_shortcode('[wpv-view name="specials-featured"]'); ?>
  </div>
</div>

<?php get_template_part( 'templates-ads/block-ad', 'top-banner-970x90'); ?>

<div class="site-container container" id="site-container">
  <div class="site-content row" id="site-content">
    <main class="site-main col-md-8" id="site-main" role="main">
      <?php echo do_shortcode('[wpv-view name="specials-non-featured"]'); ?>
	  </main>

    <div id="sidebar" class="sidebar sidebar-primary col-md-3 col-md-offset-1" role="complementary">
      <?php get_sidebar(); ?>
    </div>

  </div>
</div>

<?php
get_footer();
