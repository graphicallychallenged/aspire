<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until beginning of the main content
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aspire
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <!-- Index -->
  <meta name="robots" content="INDEX, FOLLOW">

  <!-- Favicon -->
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/aspire-favicon-32x32.png" sizes="32x32">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/aspire-favicon-192x192.png" sizes="192x192">
  <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/img/aspire-favicon-180x180.png">
  <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img/aspire-favicon-270x270.png">

  <!-- Bugherd -->
  <!-- <script type='text/javascript'>
  (function (d, t) {
    var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
    bh.type = 'text/javascript';
    bh.src = 'https://www.bugherd.com/sidebarv2.js?apikey=dzeooemuk2shbdri4jc8tg';
    s.parentNode.insertBefore(bh, s);
    })(document, 'script');
  </script> -->

  <!-- Google Analytics -->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-29389510-1', 'auto');
    ga('send', 'pageview');
  </script>

  <!-- Font Awesome  -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

  <!-- DFP Code  -->
  <?php get_template_part( 'templates-ads/dfp-code' ); ?>

  <?php date_default_timezone_set('US/Eastern'); // Important for displaying timeslots correctly ?>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


  <script>
  function openNav() {
      document.getElementById("navbar-overlay").style.height = "100%";
  }

  function closeNav() {
      document.getElementById("navbar-overlay").style.height = "0%";
  }
  </script>

  <?php // get_template_part( 'templates-partials/module', 'browser-update' ); ?>

  <?php get_template_part( 'templates-partials/navbar-overlay' ); ?>

  <?php get_template_part( 'templates-ads/top-banner-970x90-inverse'); ?>

  <?php get_template_part( 'templates-partials/navbar-aux' ); ?>

  <?php get_template_part( 'templates-partials/navbar-main' ); ?>

  <?php
  // Get custom background for site header
  $header_bg_image = aspire_get_background_media_url(); ?>

  <div class="site-header" style="background-image:url(<?php echo $header_bg_image; ?>); background-repeat: no-repeat; background-size: cover; background-position: 50% 50%; position: relative;">

    <?php get_template_part( 'templates-partials/masthead' ); ?>
    <?php get_template_part( 'templates-partials/nav-contextual' ); ?>

  </div>

  <div class="site-wrapper bg-light" id="wrapper">
