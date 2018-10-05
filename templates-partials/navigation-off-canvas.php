<div id="sidebar" class="stage-shelf hidden" data-spy="affix" data-offset-top="0">

  <ul class="nav nav-bordered nav-stacked">

    <li class="nav-header"><small>MENU</small></li>

   <?php
      wp_nav_menu(array(
       'menu'            => 'off-canvas-menu',
       'theme_location'  => 'off-canvas',
       'container'       => false,
       'container_id'    => '',
       'container_class' => '',
       'menu_id'         => false,
       'items_wrap'      => '%3$s',
       'menu_class'      => 'nav nav-bordered nav-stacked',
       'depth'           => 2,
       'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
       'walker'          => new WP_Bootstrap_Navwalker()
      )
    );
   ?>

    <!--
    <li class="nav-divider"></li>
    <li class="nav-header"><small>Find Channel</small></li>

    <li class="nav-item">
      <a class="nav-link" href="<?php esc_url(home_url()); ?>/find-channel/">FIND ASPIRE</a>
    </li>
    -->

    <li class="nav-divider" style="margin-top: 12px; margin-bottom: 12px;"></li>
    <!-- <li class="nav-header"><small>Search</small></li> -->

    <!--
      <li id="search-offcanvas">
        <?php // get_template_part('searchform');?>
      </li>
    -->

    <li class="nav-item">
      <form class="search-form" role="search" method="get" action="<?php echo home_url( '/' ); ?>"
            style="display: block;
            padding: 0px 24px 0px 34px;
            border-bottom: 0;">
        <input id="off-canvas-search" class="search-field mb-2" style="max-width: 100%; width: 100%; border: 1px solid rgba(0,0,0,0.3); padding: 6px; font-size: 14px;" type="search" placeholder="Search aspire.tv" value="<?php echo get_search_query(); ?>" name="s" aria-label="Search">
        <!-- <button class="btn btn-block btn-outline-offwhite search-submit" style="cursor: pointer;" type="submit">Search<span class="sr-only">Submit Button</span></button> -->
      </form>
    </li>

    <li class="nav-divider" style="margin-top: 12px; margin-bottom: 12px;"></li>

    <li class="nav-header"><small>Get Social</small></li>
    <li class="nav-item">
      <a class="nav-link nav-link-social" href="https://www.facebook.com/AspireTV" target="_blank"><span class="icon icon-facebook"> Facebook</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link nav-link-social" href="https://twitter.com/tvASPiRE" target=_"blank"><span class="icon icon-twitter"> Twitter</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link nav-link-social" href="https://www.instagram.com/aspiretv/" target="_blank"><span class="icon icon-instagram"> Instagram</span></a>
    </li>
    <li class="nav-item ">
      <a class="nav-link nav-link-social" href="https://www.pinterest.com/aspiretv/" target=_"blank"><span class="icon icon-pinterest"> Pinterest</span></a>
    </li>
  </ul>

</div>
