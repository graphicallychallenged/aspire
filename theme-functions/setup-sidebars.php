<?php
/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

add_action( 'widgets_init', 'aspire_widgets_init' );

function aspire_widgets_init() {

  register_sidebar( array(
      'name'          => esc_html__( 'Primary Sidebar', 'aspire' ),
      'id'            => 'sidebar-primary',
      'description'   => 'Primary sidebar. Appears on all layouts that include at least one sidebar.',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h4 class="widget-title">',
      'after_title'   => '</h4>'
  ) );

  register_sidebar( array(
      'name'          => esc_html__( 'Footer Widget Area', 'aspire' ),
      'id'            => 'sidebar-footer',
      'description'   => 'Appears in the Footer.',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h4 class="widget-title">',
      'after_title'   => '</h4>'
  ) );

  // register_sidebar( array(
  //     'name'          => esc_html__( 'Recipes Sidebar', 'aspire' ),
  //     'id'            => 'sidebar-recipes',
  //     'description'   => 'Recieps sidebar. Appears on Recipes Archives and Single Recipes.',
  //     'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  //     'after_widget'  => '</aside>',
  //     'before_title'  => '<h4 class="widget-title">',
  //     'after_title'   => '</h4>'
  // ) );

  // register_sidebar( array(
  //     'name'          => esc_html__( 'Programs Sidebar', 'aspire' ),
  //     'id'            => 'sidebar-programs',
  //     'description'   => 'Programs sidebar. Appears on individual programs (episodes, movies, docs, specials).',
  //     'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  //     'after_widget'  => '</aside>',
  //     'before_title'  => '<h3 class="widget-title">',
  //     'after_title'   => '</h3>'
  // ) );

  // register_sidebar( array(
  //     'name'          => esc_html__( 'Series Sidebar', 'aspire' ),
  //     'id'            => 'sidebar-series',
  //     'description'   => 'Series sidebar. Appears on individual Series.',
  //     'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  //     'after_widget'  => '</aside>',
  //     'before_title'  => '<h3 class="widget-title">',
  //     'after_title'   => '</h3>'
  // ) );

}
