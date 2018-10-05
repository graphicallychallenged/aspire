<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aspire
 */
?>

<?php
// if ( ! is_active_sidebar( 'sidebar-primary' ) ) {
//   return;
// }
?>


<?php
// Find Channel
if(is_post_type_archive('timeslots')) {
  get_template_part('templates-partials/widget-find-channel');
}
?>

<aside id="sidebar-ad-upper" class="widget bg-white d-flex p-2 p-xl-4" style="border: 1px solid rgba(0,0,0,0.1);">
  <?php get_template_part('templates-ads/sidebar-upper-300x250'); ?>
</aside>

<?php
// Related posts widget only for individual programs;
// otherwise show Editor's Picks

if(is_singular(array('series', 'movies', 'videos', 'episodes'))):

  get_template_part('templates-partials/widget-related-posts');

else :

  get_template_part('templates-partials/widget-editors-picks');

endif;
?>


<?php
// On Tonight Widget -- Show everywhere except on Schedule page
if(!is_post_type_archive('timeslots')) {
  get_template_part('templates-partials/widget-tonight-on-aspire');
}
?>

<aside id="sidebar-ad-lower" class="widget bg-white d-flex p-2 p-xl-4" style="border: 1px solid rgba(0,0,0,0.1);">
  <?php get_template_part('templates-ads/sidebar-middle-300x250'); ?>
</aside>

<aside id="sidebar-ad-middle" class="widget bg-white d-flex p-2 p-xl-4" style="border: 1px solid rgba(0,0,0,0.1);">
  <?php get_template_part('templates-ads/sidebar-300x600'); ?>
</aside>

<aside id="sidebar-ad-lower" class="widget bg-white d-flex p-2 p-xl-4" style="border: 1px solid rgba(0,0,0,0.1);">
  <?php get_template_part('templates-ads/sidebar-lower-300x250'); ?>
</aside>

<!-- <hr> -->

<!-- <aside class="widget">
  <h3 class="widget-title">Email Newsletter</h3>

  [ Optin Form ]

</aside> -->

<?php dynamic_sidebar( 'sidebar-primary' ); ?>
