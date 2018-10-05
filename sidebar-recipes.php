<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aspire
 */
?>

<?php if ( ! is_active_sidebar( 'sidebar-recipes' ) ) {
  return;
} ?>

<h4>Browse Aspire Recipes</h4>
<hr style="margin-top: 12px; margin-bottom: 12px;">

<?php dynamic_sidebar( 'sidebar-recipes' ); ?>
