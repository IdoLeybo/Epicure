<?php
/**
 * Configuration overrides for WP_ENV === 'production'
 */
use Roots\WPConfig\Config;

ini_set('display_errors', 0);
Config::define('WP_DEBUG_DISPLAY', false);
Config::define('SCRIPT_DEBUG', false);

Config::define('PATH_CURRENT_SITE', '/');
Config::define( 'WP_DEFAULT_THEME', 'epicure');