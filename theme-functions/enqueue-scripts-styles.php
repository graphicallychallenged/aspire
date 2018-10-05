<?php

/**
 * Enqueue Scripts and Styles to load them properly within WP
 *
 */

add_action('wp_enqueue_scripts', 'aspire_enqueue_scripts_styles');

function aspire_enqueue_scripts_styles() {

  wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Poppins:300,400,400i,700');

  if(is_front_page() || is_post_type_archive('timeslots')) {
    wp_enqueue_style('slick-css', '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css');
    wp_enqueue_style('slick-theme-css', '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css');
    wp_enqueue_script('slick-min-js', '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js', array( 'jquery' ), '', true);
  }

  if(is_front_page()) {
    // wp_enqueue_script('jwPlayer', 'https://content.jwplatform.com/libraries/kH9NyE1U.js', array( 'jquery' ), '', true);
  }

  if(is_post_type_archive('timeslots')) {
    //no need for this (combined into one file (timeslots): wp_enqueue_script( 'slickslider-custom-js', get_template_directory_uri() .'/js/slickslider-custom.js', array( 'jquery' ), '', true);

    wp_enqueue_script( 'timeslots', get_template_directory_uri() .'/js/timeslots.js', array( 'jquery' ), '', true);
    wp_localize_script( 'timeslots', 'ajax_object', array('ajax_url' => admin_url( 'admin-ajax.php' )) );
  }

  wp_enqueue_style( 'aspire-style', get_stylesheet_uri() );

  // JS to Load in Footer:
  // wp_enqueue_script( 'popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', array( 'jquery' ), '', true);
  // wp_enqueue_script( 'aspire-js', get_template_directory_uri() .'/dist/aspire.js', array( 'jquery' ), '', true);

  // wp_enqueue_script( 'toolkit-js', get_template_directory_uri() .'/dist/toolkit.min.js', array( 'jquery' ), '', true);
  // wp_enqueue_script( 'blazy-js', get_template_directory_uri() .'/js/blazy.min.js', array( 'jquery' ), '', true);
}

/**
 * Theme Footer Scripts & Styles
 *
 * Scripts that should be loaded at the end of the document
 *
 */

add_action( 'wp_footer', 'aspire_footer_scripts_styles', 100);

function aspire_footer_scripts_styles() { ?>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php
}

/**
 * Only WooCommerce Scripts and Styles on Specific Pages
 *
 * http://crunchify.com/how-to-stop-loading-woocommerce-js-javascript-and-css-files-on-all-wordpress-postspages/
 * https://gist.github.com/DevinWalker/7621777
 */

add_action( 'wp_enqueue_scripts', 'aspire_conditional_woocommerce_css_js' );

function aspire_conditional_woocommerce_css_js() {

	// Check if WooCommerce plugin is active
	if( function_exists( 'is_woocommerce' ) ){

		// Check if it's any of WooCommerce page
		if(! is_woocommerce() && ! is_cart() && ! is_checkout() ) {

			## Dequeue WooCommerce styles
			wp_dequeue_style('woocommerce-layout');
			wp_dequeue_style('woocommerce-general');
			wp_dequeue_style('woocommerce-smallscreen');
      wp_dequeue_style('woocommerce_frontend_styles');
      wp_dequeue_style('woocommerce_fancybox_styles');
      wp_dequeue_style('woocommerce_chosen_styles');
      wp_dequeue_style('woocommerce_prettyPhoto_css');

			## Dequeue WooCommerce scripts
			wp_dequeue_script('wc-cart-fragments');
			wp_dequeue_script('woocommerce');
			wp_dequeue_script('wc-add-to-cart');
      wp_dequeue_script('wc_price_slider');
      wp_dequeue_script('wc-single-product');
      wp_dequeue_script('wc-checkout');
      wp_dequeue_script('wc-add-to-cart-variation');
      wp_dequeue_script('wc-single-product');
      wp_dequeue_script('wc-cart');
      wp_dequeue_script('wc-chosen');
      wp_dequeue_script('prettyPhoto');
      wp_dequeue_script('prettyPhoto-init');
      wp_dequeue_script('jquery-blockui');
      wp_dequeue_script('jquery-placeholder');
      wp_dequeue_script('fancybox');
      wp_dequeue_script('jqueryui');

		}
	}
}
