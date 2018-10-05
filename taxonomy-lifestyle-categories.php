<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aspire
 */
get_header();

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
// print_r($term);
?>

<?php get_template_part( 'templates-partials/block-aspire', 'masthead-internal' ); ?>

<?php get_template_part( 'templates-ads/block-ad', 'top-banner-970x90'); ?>

<div class="site-container container" id="site-container">
  <div class="site-content row" id="site-content">
    <main class="site-main col-md-8" id="site-main" role="main">

      <div id="series-play" class="block-play p-y-lg">
        <!--<h2 class="block-title text-play">Content Tagged <?php echo $term->name; ?></h2>-->
        <h2 class="block-title text-play"><?php echo $term->name; ?></h2>
        <hr>
        <?php echo do_shortcode('[wpv-view name="all-content-by-lifestyle-category" lifestylecat="'. $term->slug .'"]'); ?>
      </div>

    </main>

    <div id="sidebar" class="sidebar sidebar-primary col-md-3 col-md-offset-1" role="complementary">
      <?php get_sidebar(); ?>
    </div>

  </div>
</div>

<?php
get_footer();
