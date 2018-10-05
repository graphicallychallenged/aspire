<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @package aspire
 *
 */


// Add Author Support to WooCommerce
add_action('init', 'function_to_add_author_woocommerce', 999 );

function function_to_add_author_woocommerce() {
 add_post_type_support( 'product', 'author' );
 }


add_action( 'after_setup_theme', 'aspire_setup' );

function aspire_setup() {
  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on aspire, use a find and replace
   * to change 'aspire' to the name of your theme in all the template files.
   */
  load_theme_textdomain( 'aspire', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  // Register Navigation Menu
  register_nav_menus( array(
      'nav-upper'   => __( 'Upper Menu', 'aspire' ),
      'nav-main' => __( 'Main Menu', 'aspire' ),
    )
  );

  // Enable support for Post Formats
  // add_theme_support( 'post-formats',
  //   array(  'aside',
  //           'audio',
  //           'chat',
  //           'gallery',
  //           'image',
  //           'link',
  //           'quote',
  //           'status',
  //           'video',
  //   )
  // );

  // Enable Excerpts on Pages
  add_post_type_support( 'page', 'excerpt' );


  // Set up the WordPress core custom background feature.
  // add_theme_support( 'custom-background', apply_filters( 'aspire_custom_background_args', array(
  //   'default-color' => 'ffffff',
  //   'default-image' => '',
  // ) ) );


  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support( 'post-thumbnails' );


  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );


  // Add theme support for selective refresh for widgets.
  add_theme_support( 'customize-selective-refresh-widgets' );

  // Declare WooCommerce Support
  add_theme_support( 'woocommerce' );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );

  @ini_set( 'upload_max_size' , '64M' );
  @ini_set( 'post_max_size', '64M');
  @ini_set( 'max_execution_time', '300' );


  /**
   * Set the content width in pixels, based on the theme's design and stylesheet.
   *
   * Priority 0 to make it available to lower priority callbacks.
   *
   * @global int $content_width
   */
  function aspire_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'aspire_content_width', 665 );
  }
  add_action( 'after_setup_theme', 'aspire_content_width', 0 );

}
