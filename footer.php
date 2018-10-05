<?php /**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aspire
 */
?>

  </div> <!-- / #wrapper -->

  <?php get_template_part( 'templates-ads/bottom-banner-970x90'); ?>

  <footer id="footer" class="site-footer" role="contentinfo">

    <?php get_template_part( 'templates-partials/newsletter' ); ?>

    <div id="footer-content" class="footer-content pt-5">
      <div class="container">
        <div class="row">
          <?php
          if ( is_active_sidebar( 'sidebar-footer' ) ) {
            dynamic_sidebar( 'sidebar-footer' );
          } ?>
        </div>

        <hr class="mt-0 mb-0" style="border-color: rgba(255,255,255,0.3);">

        <!-- Footer Search (alternate)  -->
        <form id="footer-search" role="search" method="get" class="footer-search search-form py-4 my-0" action="<?php echo esc_url(home_url('/')); ?>">
          <div class="input-group">
            <label class="sr-only"><span class="screen-reader-text sr-only">Search for:</span></label>

        		<input id="search-field" type="search" class="search-field form-control" placeholder="Search aspire.tv..." value="" name="s" title="Search for:">
            <span class="input-group-btn">
      	       <input type="submit" id="search-submit" class="search-submit btn px-3 px-lg-5 button" value="Search">
            </span>

          </div>
        </form>
      </div>
    </div>

      <div id="footer-credits" class="footer-credits pt-3 pb-1">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-9 text-center text-md-left">
              <p>&nbsp; &copy; <?=date('Y');?> Aspire Channel, LLC. All rights reserved.
                <a href="<?php echo esc_url(home_url()); ?>/privacy-policy/">Privacy Policy</a> | <a href="<?php echo esc_url(home_url()); ?>/terms-of-use/">Terms of Use</a>
              </p>
            </div>

            <div class="col-xs-12 col-sm-3 text-center text-md-right">
              <p>Designed by <a href="http://heyjohnsexton.com/" rel="designer" target="_blank">John Sexton</a></p>
            </div>
          </div>
        </div>
      </div>

    </footer>

<?php wp_footer(); ?>

</body>
</html>
