<?php
/**
 * aspire functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aspire
 */

require get_template_directory() . '/theme-functions/setup-theme.php';
require get_template_directory() . '/theme-functions/setup-sidebars.php';

require get_template_directory() . '/theme-functions/template-tags.php';

// Custom Walker Class to enable Bootstrap Styles on WordPress Nav Menus
// https://github.com/twittem/wp-bootstrap-navwalker
require_once('inc/class-wp-bootstrap-navwalker.php');

// Reusable Functions
require get_template_directory() . '/theme-functions/capture-body-classes.php';
require get_template_directory() . '/theme-functions/wp-cleanup.php';

// require get_template_directory() . '/theme-functions/is-tree.php';
// require get_template_directory() . '/theme-functions/taxonomy-term-links.php';


// Reusable Custom Queries
require get_template_directory() . '/theme-queries/custom-queries-episodes.php';
require get_template_directory() . '/theme-queries/custom-queries-exclusions.php';
require get_template_directory() . '/theme-queries/custom-queries-featured-slots.php';
require get_template_directory() . '/theme-queries/custom-queries-movies.php';
require get_template_directory() . '/theme-queries/custom-queries-posts.php';
require get_template_directory() . '/theme-queries/custom-queries-series.php';
require get_template_directory() . '/theme-queries/custom-queries-timeslots.php';
require get_template_directory() . '/theme-queries/custom-queries-upcoming.php';
require get_template_directory() . '/theme-queries/custom-queries-videos.php';


// Custom Functions
require get_template_directory() . '/theme-functions/aspire-timeslots-display.php';
require get_template_directory() . '/theme-functions/aspire-custom-toolset.php';
require get_template_directory() . '/theme-functions/aspire-custom-wp-all-import.php';

require get_template_directory() . '/theme-functions/aspire-get-masthead-background-media-url.php';
require get_template_directory() . '/theme-functions/aspire-get-masthead-foreground-media-url.php';
require get_template_directory() . '/theme-functions/aspire-get-masthead-video.php';

require get_template_directory() . '/theme-functions/get-jw-media-id.php';
require get_template_directory() . '/theme-functions/get-featured-media.php';

require get_template_directory() . '/theme-functions/aspire-smart-title.php';

require get_template_directory() . '/theme-functions/aspire-wp-title.php';

require get_template_directory() . '/theme-functions/get-thumbnail-url.php';

require get_template_directory() . '/theme-functions/aspire-woocommerce-functions.php';

require get_template_directory() . '/theme-functions/enqueue-scripts-styles.php';
