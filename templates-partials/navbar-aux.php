<nav id="navbar-aux" class="navbar-aux navbar navbar-expand-md d-none d-md-block navbar-dark text-light">
  <div class="container">

    <?php
       wp_nav_menu(array(
        'menu'            => 'upper-menu',
        'theme_location'  => 'nav-upper',
        'container'       => 'div',
        'container_id'    => 'aspire-navbar-super',
        'container_class' => 'collapse navbar-collapse',
        'menu_id'         => false,
        'menu_class'      => 'navbar-nav nav ml-auto',
        'depth'           => 2,
        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
        'walker'          => new WP_Bootstrap_Navwalker()
       )
     );
    ?>

    <form class="form-inline" id="nav-search" role="search" method="get" class="search-form py-0" action="<?php echo esc_url(home_url('/')); ?>">
  		<input id="search-field-nav" type="search" class="search-field form-control d-none d-md-block" placeholder="Search" value="" name="s" title="Search for:" aria-label="Search" style="padding: 0.25rem 0.5rem; font-size: 0.875rem; color: rgba(255,255,255,0.8); border-color: rgba(255,255,255,0.2); background-color: rgba(255,255,255,0.05); margin-left: 0.5rem; border-top: 0; border-left: 0; border-right: 0;">
      <!-- <button class="btn btn-dark my-0 my-sm-0" type="submit">Search</button> -->
    </form>

  </div>
</nav>
