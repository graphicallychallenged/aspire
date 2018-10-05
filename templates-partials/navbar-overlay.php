<div id="navbar-overlay" class="overlay">
  <div class="container">

    <div class="overlay-content text-light row">
        <div class="col-md-8 offset-md-2">

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <div class="overlay-section">
          <h5 class="overlay-section-header">Explore Aspire</h5>
          <hr class="border-light">
          <ul class="overlay-menu row list-unstyled">
            <?php
               wp_nav_menu(array(
                'menu'            => 'mobile-menu-segment-blog-menu',
                'theme_location'  => '',
                'container'       => false,
                'container_id'    => '',
                'container_class' => '',
                'menu_id'         => false,
                'items_wrap'      => '%3$s',
                'menu_class'      => 'nav',
                'depth'           => 2,
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'walker'          => new WP_Bootstrap_Navwalker()
               )
             );
            ?>
          </ul>
        </div>

        <div class="overlay-section">
          <h5 class="overlay-section-header">Watch</h5>
          <hr class="border-light">
          <ul class="overlay-menu row list-unstyled">
            <?php
              wp_nav_menu(array(
               'menu'            => 'mobile-menu-segment-watch',
               'theme_location'  => '',
               'container'       => false,
               'container_id'    => '',
               'container_class' => '',
               'menu_id'         => false,
               'items_wrap'      => '%3$s',
               'menu_class'      => 'nav',
               'depth'           => 2,
               'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
               'walker'          => new WP_Bootstrap_Navwalker()
              )
            );
            ?>
          </ul>
        </div>

        <div class="overlay-section">
          <h5 class="overlay-section-header">About</h5>
          <hr class="border-light">
          <ul class="overlay-menu row list-unstyled">
            <?php
              wp_nav_menu(array(
               'menu'            => 'mobile-menu-segment-about',
               'theme_location'  => '',
               'container'       => false,
               'container_id'    => '',
               'container_class' => '',
               'menu_id'         => false,
               'items_wrap'      => '%3$s',
               'menu_class'      => 'nav',
               'depth'           => 2,
               'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
               'walker'          => new WP_Bootstrap_Navwalker()
              )
            );
            ?>
          </ul>
        </div>

        <div class="overlay-section">
          <h5 class="overlay-section-header">Search</h5>
          <hr class="border-light">
          <form class="search-form" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
            <input class="search-field" type="search" placeholder="Search aspire.tv" value="<?php echo get_search_query(); ?>" name="s" aria-label="Search">
            <!-- <button class="btn btn-block btn-outline-offwhite search-submit" style="cursor: pointer;" type="submit">Search<span class="sr-only">Submit Button</span></button> -->
          </form>
        </div>

        <div class="overlay-section">
          <h5 class="overlay-section-header">Get Social</h5>
          <hr class="border-light">
          <div class="row">
            <div class="col-3"><a class="nav-link-social" href="https://www.facebook.com/AspireTV" target="_blank"><i class="fab fa-lg fa-facebook"></i></a></div>
            <div class="col-3"><a class="nav-link-social" href="https://twitter.com/tvASPiRE" target=_"blank"><i class="fab fa-lg fa-twitter"></i></a></div>
            <div class="col-3"><a class="nav-link-social" href="https://www.instagram.com/aspiretv/" target="_blank"><i class="fab fa-lg fa-instagram"></i></a></div>
            <div class="col-3"><a class="nav-link-social" href="https://www.pinterest.com/aspiretv/" target=_"blank"><i class="fab fa-lg fa-pinterest"></i></a></div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
