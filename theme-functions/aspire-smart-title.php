<?php
/**
 * Display the correct post / page / archive title.
 */

function aspire_smart_title($sep = '', $display = true, $seplocation = 'right'){
  global $wp_locale;

      $m        = get_query_var( 'm' );
      $year     = get_query_var( 'year' );
      $monthnum = get_query_var( 'monthnum' );
      $day      = get_query_var( 'day' );
      $search   = get_query_var( 's' );
      $title    = '';

      $t_sep = '%WP_TITLE_SEP%'; // Temporary separator, for accurate flipping, if necessary

      // If there is a post
      if ( is_single() || ( is_home() && ! is_front_page() ) || ( is_page() && ! is_front_page() ) ) {
          $title = single_post_title( '', false );
      }

      // If there's a post type archive
      if ( is_post_type_archive() ) {
          $post_type = get_query_var( 'post_type' );
          if ( is_array( $post_type ) ) {
              $post_type = reset( $post_type );
          }
          $post_type_object = get_post_type_object( $post_type );
          if ( ! $post_type_object->has_archive ) {
              $title = post_type_archive_title( '', false );
          }
      }

      // If there's a category or tag
      if ( is_category() || is_tag() ) {
          $title = single_term_title( '', false );
      }

      // If there's a taxonomy
      if ( is_tax() ) {
          $term = get_queried_object();
          if ( $term ) {
              $tax   = get_taxonomy( $term->taxonomy );
//              $title = single_term_title( $tax->labels->name . $t_sep, false );
              $title = single_term_title( '', false );
          }

          if (is_tax('seeyourselfhere','eat')) {
              $title = $title . ' Well';
          }

          if (is_tax('seeyourselfhere','live')) {
              $title = $title . ' Your Life';
          }

          if (is_tax('seeyourselfhere','play')) {
              $title = $title . ' Hard';
          }

          if (is_tax('seeyourselfhere','dream')) {
              $title = $title . ' Big';
          }

          if (is_tax('seeyourselfhere','shop')) {
              $title = $title . ' With Purpose';
          }

      }

      // If there's an author
      if ( is_author() && ! is_post_type_archive() ) {
          $author = get_queried_object();
          if ( $author ) {
              $title = $author->display_name;
          }
      }

      // Post type archives with has_archive should override terms.
      if ( is_post_type_archive() && $post_type_object->has_archive ) {
          $title = post_type_archive_title( '', false );
      }

      if( is_post_type_archive('timeslots')){
        $title = "What's On Aspire";
      }


      // If there's a month
      if ( is_archive() && ! empty( $m ) ) {
          $my_year  = substr( $m, 0, 4 );
          $my_month = $wp_locale->get_month( substr( $m, 4, 2 ) );
          $my_day   = intval( substr( $m, 6, 2 ) );
          $title    = $my_year . ( $my_month ? $t_sep . $my_month : '' ) . ( $my_day ? $t_sep . $my_day : '' );
      }

      // If there's a year
      if ( is_archive() && ! empty( $year ) ) {
          $title = $year;
          if ( ! empty( $monthnum ) ) {
              $title .= $t_sep . $wp_locale->get_month( $monthnum );
          }
          if ( ! empty( $day ) ) {
              $title .= $t_sep . zeroise( $day, 2 );
          }
      }

      // If it's a search
      if ( is_search() ) {
          /* translators: 1: separator, 2: search phrase */
          $title = sprintf( __( 'Search Results %1$s %2$s' ), $t_sep, strip_tags( $search ) );
      }

      // If it's a 404 page
      if ( is_404() ) {
          $title = __( 'Page not found' );
      }

      $prefix = '';
      if ( ! empty( $title ) ) {
          $prefix = " $sep ";
      }

      /**
       * Filters the parts of the page title.
       *
       * @since 4.0.0
       *
       * @param array $title_array Parts of the page title.
       */
      $title_array = apply_filters( 'wp_title_parts', explode( $t_sep, $title ) );

      // Determines position of the separator and direction of the breadcrumb
      if ( 'right' == $seplocation ) { // sep on right, so reverse the order
          $title_array = array_reverse( $title_array );
          $title       = implode( " $sep ", $title_array ) . $prefix;
      } else {
          $title = $prefix . implode( " $sep ", $title_array );
      }


      // Send it out
      if ( $display ) {
          echo $title;
      } else {
          return $title;
      }

}
