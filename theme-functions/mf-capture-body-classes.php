<?php
/**
 * Adds custom classes to Body and Entry elements for easier styling.
 */


/**
 * Adds custom Post classes based on content types.
 */

add_filter( 'post_class', 'mf_capture_post_classes');

function mf_capture_post_classes( $classes ) {

  global $post;

  // Entry Classes
  $classes[] = 'entry';
  $classes[] = 'entry-type' . '-' . $post->post_type;

  // Teaser Classes on Archives
  if( is_archive() || is_home() || is_front_page() ) {
    $classes[] = 'entry-teaser';
  }

  return $classes;
}

/**
 * Adds custom Body classes based on layouts and content types.
 * ref: https://gist.github.com/svizion/5722276
 */

add_filter( 'body_class', 'mf_capture_body_classes');

function mf_capture_body_classes( $classes ) {

    global $post;
    global $wp_query;

    // Prefixes
    $post_name_prefix = 'postname-';
    $page_name_prefix = 'pagename-';
    $single_term_prefix = 'single-';
    $single_parent_prefix = 'parent-';
    $category_parent_prefix = 'parent-category-';
    $term_parent_prefix = 'parent-term-';
    $site_prefix = 'site-';

    // Handle Special Cases First

    if ( is_404() ) {
      $classes[] = 'page-404';

    // Front Page
    } elseif( is_front_page() ) {

      $classes[] = 'page-front-page';
      $classes[] = 'page-index';

    // Blog Page (wordpress calls this "Home")
    } elseif ( is_home() ) {

      $classes[] = 'archive archive-type-posts';
      $classes[] = 'layout-default-archive';

    // For Single Entries
    } elseif ( is_single() ) {

      // Setup
      // $wp_query->post = $wp_query->posts[0];
      // setup_postdata($wp_query->post);

      // Entry Classes
      $classes[] = 'entry';
      $classes[] = 'entry-type' . '-' . $post->post_type;

      // Categories
      $category = get_the_category($post->ID);

      if (!empty($category)) {
        $slug = $category[0]->slug;
        $classes[] = 'category-' . $slug;
      }

      // Name
      $classes[] = 'entry-title' . '-' . $post->post_name;

      // Single Classes
      $classes[] = 'single';
      $classes[] = 'single' . '-' . $post->post_type;

      // Give Posts a default layout class
      if($post->post_type == 'post'){
        $classes[] = 'layout-default-post';
      }

      // Taxonomies
      // $taxonomies = array_filter( get_post_taxonomies($wp_query->post->ID), "is_taxonomy_hierarchical" );
      // foreach ( $taxonomies as $taxonomy ) {
      //   $tax_name = ( $taxonomy != 'category') ? $taxonomy . '-' : '';
      //   $terms = get_the_terms($wp_query->post->ID, $taxonomy);
      //   if ( $terms ) {
      //     foreach( $terms as $term ) {
      //       if ( !empty($term->slug ) )
      //         $classes[] = $single_term_prefix . $tax_name . sanitize_html_class($term->slug, $term->term_id);
      //       while ( $term->parent ) {
      //         $term = &get_term( (int) $term->parent, $taxonomy );
      //         if ( !empty( $term->slug ) )
      //           $classes[] = $single_parent_prefix . $tax_name . sanitize_html_class($term->slug, $term->term_id);
      //       }
      //     }
      //   }
      // }

    } elseif ( is_author() ) {

        $classes[] = 'archive-author';
        $classes[] = 'layout-default-archive';

    } elseif ( is_date() ) {

        $classes[] = 'archive-date';
        $classes[] = 'layout-default-archive';

    } elseif ( is_category() ) {

        $classes[] = 'archive-category';
        $classes[] = 'layout-default-archive';

        $cat = $wp_query->get_queried_object();
          while ( $cat->parent ) {
            $cat = &get_category( (int) $cat->parent);
            if ( !empty( $cat->slug ) )
              $classes[] = $category_parent_prefix . sanitize_html_class($cat->slug, $cat->cat_ID);
          }

    } elseif ( is_tax() ) {

        $classes[] = 'archive-taxonomy';
        $classes[] = 'layout-default-archive';

        $term = $wp_query->get_queried_object();
        while ( $term->parent ) {
          $term = &get_term( (int) $term->parent, $term->taxonomy );
          if ( !empty( $term->slug ) )
            $classes[] = $term_parent_prefix . sanitize_html_class($term->slug, $term->term_id);
        }

    // For Archives
    } elseif ( is_archive() ) {

        $classes[] = 'archive';
        $classes[] = 'archive-type'. '-' . $post->post_type;

    // For Pages
    } elseif ( is_page() ) {
      // $wp_query->post = $wp_query->posts[0];
      // setup_postdata($wp_query->post);
      // $classes[] = $page_name_prefix . $wp_query->post->post_name;

      // Page Templates
      if ( is_page_template() ) {
        $template_slug  = get_page_template_slug( $post->ID );
        $template_parts = explode( '/', $template_slug );

        $classes[] = 'layout' . '-' . sanitize_html_class( str_replace( array( '.', '/' ), '-', basename( $template_slug, '.php' ) ) );
      } else {
        $classes[] = 'layout-default-page';
      }

      // Name
      $classes[] = 'page' . '-' . $post->post_name;

      // DUPLICATE OF ABOVE - RESOLVE
      // Add class for the name of the custom template used (if any)
      // $temp = get_page_template();
      // if ( $temp != null ) {
      //     $path = pathinfo($temp);
      //     $tmp = $path['filename'] . "." . $path['extension'];
      //     $tn= str_replace(".php", "", $tmp);
      //     $classes[] = "template-".$tn;
      // }

      // For Child Pages - Add Parent Page Class
      if ( is_page() && $post->post_parent ) {
          $post_parent = get_post($post->post_parent);
          $parentSlug = $post_parent->post_name;
          $classes[] = "child-of-".$parentSlug;
      }

    }


    // Add body class of featured-image if the post has a featured image
    // if( has_post_thumbnail() ) {
    //     $classes[] = 'has-featured-image';
    // }

    // Add body class if a custom background color is set
    // $custom_background_color = get_post_meta( $post->ID, '_custom_background_color', true);
    // if( !empty( $custom_background_color ) ) {
    //     $classes[] = 'has-custom-background-color';
    // }

    // Add body class if a custom background image is set
    // $custom_background = get_post_meta( $post->ID, '_custom_background_image_id', true);
    // if( !empty( $custom_background ) ) {

    //     // Add an additional class if the image is a repeating image
    //     if ( 'no-repeat' !== get_post_meta( $post->ID, '_custom_background_repeat', true )) {
    //         $bg_repeat = '-repeating';
    //     } else {
    //         $bg_repeat = '';
    //     }

    //     $classes[] = 'has-custom-background-image' . $bg_repeat;
    // }

    // Add body class of featured-video if the post has a featured video
    // if( function_exists( 'has_post_video' ) && has_post_video() ){
    //     $classes[] = 'has-featured-video';
    // }

    // Add body class depending on if front page is Posts or Static Page
    // if ( get_option( 'show_on_front' ) == 'page' ) {
    //     $classes[] = 'front-page-static';
    // } else {
    //     $classes[] = 'front-page-posts';
    // }

    return $classes;
}



/**
 * Adds custom classes based on active Browser.
 */

// add_filter('body_class','browser_body_class');

function browser_body_class($classes) {

  global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

  if($is_lynx) $classes[] = 'browser-lynx';
  elseif($is_gecko) $classes[] = 'browser-gecko';
  elseif($is_opera) $classes[] = 'browser-opera';
  elseif($is_NS4) $classes[] = 'browser-ns4';
  elseif($is_safari) $classes[] = 'browser-safari';
  elseif($is_chrome) $classes[] = 'browser-chrome';
  elseif($is_IE) $classes[] = 'browser-ie';
  else $classes[] = 'browser-unknown';

  if($is_iphone) $classes[] = 'device-iphone';

  return $classes;
}


// Remove Unwanted Body Classes

add_filter( 'body_class', 'adjust_body_class' );

function adjust_body_class( $classes ) {

    foreach ( $classes as $key => $value ) {
        if ( $value == 'page-template-default' ) unset( $classes[ $key ] );
        if ( $value == 'page-template' ) unset( $classes[ $key ] );
        if ( $value == 'page-template-page-templates' ) unset( $classes[ $key ] );
        if ( $value == 'page-template-page-templatescontent-sidebar-sidebar-php' ) unset( $classes[ $key ] );
        if ( $value == 'page-template-page-templatescontent-sidebar-php' ) unset( $classes[ $key ] );
        if ( $value == 'page-template-page-templatessidebar-sidebar-content-php' ) unset( $classes[ $key ] );
        if ( $value == 'page-template-page-templatessidebar-content-php' ) unset( $classes[ $key ] );
        if ( $value == 'page-template-page-templatessidebar-content-sidebar-php' ) unset( $classes[ $key ] );
        if ( $value == 'page-template-page-templatesfullbleed-php' ) unset( $classes[ $key ] );
        if ( $value == 'page-template-page-templatesfullwidth-php' ) unset( $classes[ $key ] );
        if ( $value == 'page-template-page-templatescustom-php' ) unset( $classes[ $key ] );
        if ( $value == 'page-template-page-templatescover-php' ) unset( $classes[ $key ] );
    }

    return $classes;
}
