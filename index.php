<?php

/**
 * Define the root path
 */

define('APPBASE', __DIR__);

/**
 * Initialize the app
 */
require_once('app/init.php');

/**
 * Set some global params
 */
$app = [
    'title' => Config::SiteName,
    'desc' => Config::SiteDesc,
];

/**
 * Require the index.php file
 */
require_once(APPBASE . '/app/inc/index.php');
