<?php
/**
 * Configuration overrides for WP_ENV === 'production'
 */
ini_set('display_errors', 0);
define('WP_DEBUG_DISPLAY', false);
define('SCRIPT_DEBUG', false);

define('PATH_CURRENT_SITE', '/');
define( 'WP_DEFAULT_THEME', 'epicure');