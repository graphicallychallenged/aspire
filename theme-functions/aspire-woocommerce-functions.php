<?php

// Remove default WooCommerce breadcrumbs (we add our own)
add_action( 'init', 'jk_remove_wc_breadcrumbs' );
function jk_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

// Activate new WooCommerce gallery features
add_action( 'after_setup_theme', 'aspire_woocommerce_setup' );
function aspire_woocommerce_setup() {
//    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

// Customize URL for Home link
// add_filter( 'woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url' );
// function woo_custom_breadrumb_home_url() {
//     return 'http://woothemes.com';
// }


// Change number of products per page
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 20;
  return $cols;
}


// Remove Marketplace page title on main shop page
// add_filter( 'woocommerce_show_page_title', '__return_false' );

add_filter( 'woocommerce_page_title', 'woo_shop_page_title');
function woo_shop_page_title( $page_title ) {
  if( 'Marketplace' == $page_title) {
    return "All Products";
  } else {
    return $page_title;
  }
}


// Insert Marketplace disclaimer
// Priority 11 to output after closing divs for main content so this can be fullbleed
add_action('woocommerce_after_main_content', 'aspire_marketplace_legal', 11);

function aspire_marketplace_legal() {
  if (is_shop()){ ?>

  <div id="marketplace-legal" class="block p-y-md" style="background: #fafafa;">
     <!-- <div class="dimmer dimmer-60"></div> -->

     <div class="container text-center" style="position: relative; z-index: 3; color: #777;">
       <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <p><em>The product reviews provided herein are for informational purposes only, and Aspire accepts no responsibility for liability arising from your use or purchase of the reviewed products/services.</em></p>

          <p><em>We hope you love the products we recommend! Just so you know, Aspire may receive promotional support from these brands.</em></p>
        </div>
     </div>
   </div>
 </div>

<?php }
}


// Insert Masthead before opening divs so it can be fullbleed (Priority 9)
add_action('woocommerce_before_main_content', 'aspire_marketplace_masthead', 9);

function aspire_marketplace_masthead() {

  if( is_shop() ){

    get_template_part( 'templates-ads/block-ad', 'top-banner-970x90');

    remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description' );

  ?>

     <div class="featured-product bg-white py-5" id="featured-product">
      <div class="container">
         <?php
         $args = array(
         	'posts_per_page' => 1,
         	'post_type'      => 'product',
         	'post_status'    => 'publish',
         	'tax_query'      => array(
         		array(
         			'taxonomy' => 'product_visibility',
         			'field'    => 'name',
         			'terms'    => 'featured',
         			'operator' => 'IN',
         			),
         		)
         );

         $featured_product = new WP_Query( $args );
         if ( $featured_product->have_posts() ) :
         echo '<div class="row">';
         while ( $featured_product->have_posts() ) : $featured_product->the_post();

           $post_thumbnail_id     = get_post_thumbnail_id();
           $product_thumbnail     = wp_get_attachment_image_src($post_thumbnail_id, $size = 'shop-feature');
           $product_thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );

           global $product;

           $rating_count = $product->get_rating_count();
           $review_count = $product->get_review_count();
           $average      = $product->get_average_rating();

	         // do_action( 'woocommerce_single_product_summary' );
         ?>

         <div class="col-12">
           <h2>Featured Business</h2>
           <hr>
         </div>

        <div class="col-md-6 order-2 order-md-1" id="featured-product-description">
         		<a href="<?php the_permalink();?>">
         			<h2 class="woocommerce-loop-product__title"><?php the_title();?></h2>
         		</a>

            <!-- Disable Ratings for now
              <?php
              if ( $rating_count > 0 ) : ?>

                <div class="woocommerce-product-rating m-b-sm">
                  <?php echo wc_get_rating_html( $average, $rating_count ); ?>
                  <?php if ( comments_open() ) : ?><a href="<?php echo get_the_permalink() . '#reviews'; ?>" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'woocommerce' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>)</a><?php endif ?>
                </div>

              <?php endif; ?>
            -->

            <?php the_excerpt(); ?>

            <p><a class="button product_type_external" href="<?php the_permalink();?>">Learn More</a></p>

          </div>

          <div class="col-md-6 order-1 order-md-2" id="featured-product-image">
         		<a href="<?php the_permalink();?>">
     			    <img src="<?php echo $product_thumbnail[0];?>" alt="<?php echo $product_thumbnail_alt;?>" class="img-fluid mb-2" style="border: 1px solid #ccc;">
            </a>
          </div>

         <?php
         endwhile;
         echo '</div>';
         endif;

          wp_reset_query();
          ?>
         <!-- Featured products loop -->

       </div>

    </div>

    <?php

  } elseif ( is_product_category() ) {

    get_template_part( 'templates-ads/block-ad', 'top-banner-970x90-inverse');

  } elseif ( is_product() ) {

    get_template_part( 'templates-ads/block-ad', 'top-banner-970x90-inverse');

  }

}



// Change how Categories are displayed on main Shop page
add_action( 'woocommerce_before_main_content', 'aspire_product_subcategories', 50 );

function aspire_product_subcategories( $args = array() ) {

  $parentid = get_queried_object_id();

  $args = array(
      'parent' => $parentid
  );

  $terms = get_terms( 'product_cat', $args );

  if ( $terms ) { ?>

    <div id="product-categories" class="my-5">
      <h2>Product Categories</h2>
      <hr>
      <div class="card-deck product-category-deck">

        <?php
        foreach ( $terms as $term ) { ?>

          <div class="card border-dark">
            <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="<?php echo $term->slug; ?>">
              <?php woocommerce_subcategory_thumbnail( $term ); ?>
            </a>

            <div class="card-img-overlay">
              <h5 class="card-title mb-0">
                <a class="text-light" href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="<?php echo $term->slug; ?>">
                  <?php echo $term->name; ?>
                </a>
              </h5>
            </div>

            <div class="dimmer dimmer-30"></div>
          </div>
        <?php
        } ?>

      </div>
  </div>
<hr>

<?php
  }
}




// Insert feaatured products on main page
// Insert before closing divs (Priority 9)
add_action('woocommerce_after_main_content', 'aspire_marketplace_featured_products', 9);

function aspire_marketplace_featured_products() {
  if( is_shop() ){ ?>

    <!-- <h3>Featured Products in Cooking</h3> -->

    <?php // echo do_shortcode('[featured_products per_page="4" columns="4" category="cooking"]'); ?>

    <!-- <h3>Featured Products in Beauty</h3> -->

    <?php // echo do_shortcode('[featured_products per_page="4" columns="4" category="beauty"]'); ?>

    <?php // get_template_part( 'templates-ads/block-ad', 'bottom-banner-970x90'); ?>

    <!-- <h3>Featured Products in Fashion</h3> -->

    <?php // echo do_shortcode('[featured_products per_page="4" columns="4" category="fashion"]'); ?>

<?php  }
}

// Insert Featured Company Owner
// Insert after closing divs (Priority 11)
// add_action('woocommerce_after_main_content', 'aspire_marketplace_featured_owner', 11);

function aspire_marketplace_featured_owner() {
  if( is_shop() ){ ?>

    <div class="block" style="background: #f4f4f4;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>Featured Company Owner</h3>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
            <a href="#" class="btn btn-primary">Visit Company Site</a>
          </div>
          <div class="col-md-6">
            <img src="http://placehold.it/400">
          </div>
        </div>
      </div>
    </div>

<?php  }
}


// Remove WooCommerce-retreived sidebar, we will replace with our own (if needed)
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');

// Unhook default WooCommerce wrapping divs and replace with our own
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end');

add_action('woocommerce_before_main_content', 'aspire_woocommerce_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'aspire_woocommerce_wrapper_end', 10);

function aspire_woocommerce_wrapper_start() {
  // echo '<section id="main">';

  echo '<div id="site-container" class="site-container container">
          <div id="site-content" class="site-content">
            <main class="site-main" id="site-main" role="main">';
}

function aspire_woocommerce_wrapper_end() {
  // echo '</section>';

  echo '    </main>
          </div>
        </div>';
}




/**
 * Changes the external product button's add to cart text
 *
 * @param string $button_text the button's text
 * @param \WC_Product $product
 * @return string - updated button text
 */

function sv_wc_external_product_button( $button_text, $product ) {

    if ( 'external' === $product->get_type() ) {
        // enter the default text for external products
        return $product->button_text ? $product->button_text : 'Visit Website';
    }

    return $button_text;
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'sv_wc_external_product_button', 10, 2 );
add_filter( 'woocommerce_product_add_to_cart_text', 'sv_wc_external_product_button', 10, 2 );



/**
 * Display Attributes as links in product description
 *
 */

add_action('woocommerce_single_product_summary', 'aspire_product_social_links', 25);
function aspire_product_social_links() {
  echo '<div id="social-links">';
  echo '<h5 style="color: #333;">Connect with ' . get_the_title() . '</h5>';

  global $product;
  $attributes = $product->get_attributes();
  $social_attributes = array("pa_attribute-facebook", "pa_attribute-twitter", "pa_attribute-instagram");

  // print_r($attributes);

  echo '<ul class="social-links list-unstyled m-b-sm">';

  foreach ( $attributes as $attribute ) :

    if(in_array($attribute->get_name(), $social_attributes)):
//      print_r($attributes);

      $attribute_label = wc_attribute_label( $attribute->get_name() );

      $values = array();

      if ( $attribute->is_taxonomy() ) {
        $attribute_taxonomy = $attribute->get_taxonomy_object();
        $attribute_values = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );

        foreach ( $attribute_values as $attribute_value ) {

          // print_r($attribute_value);
          $value_name = esc_html( $attribute_value->name );
          $values[] = '<li class="m-b-sm"><a href="' . esc_url( $value_name ) . '" target="_blank"><span class="icon icon-' . strtolower($attribute_label) . '"></span> ' . $attribute_label . '</a></li>';
        }

      } else {
        // $values = $attribute->get_options();
        //
        // foreach ( $values as &$value ) {
        //   $value = make_clickable( esc_html( $value ) );
        // }
      }

      echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );

    endif;
  endforeach;

  echo '</ul>';
  echo '</div>';

}
