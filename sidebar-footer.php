<?php
/**
 * The sidebar containing the Footer widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aspire
 */
?>

<?php if ( ! is_active_sidebar( 'sidebar-footer' ) ) {
  return;
} ?>

<?php dynamic_sidebar( 'sidebar-footer' ); ?>
