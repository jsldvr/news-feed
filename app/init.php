<?php defined('APPBASE') or die;

/**
 * init.php
 * 
 * This file is required_once from the index.php file. It is used to initialize 
 * the application.
 * 
 * @since 1.1.1
 * @version 1.0.0
 */

/** Require once */
require_once(APPBASE . '/app/config.php');
require_once(APPBASE . '/app/utils/utils.php');

/** Use the following functions */
utils('app_log');

/**
 * Checks if a crontab is set up for the current user.
 *
 * @return bool Returns true if a crontab is set up, false otherwise.
 */
function crontab_check()
{
    $crontab = shell_exec('crontab -l') ? true : false;
    return $crontab;
}

if (crontab_check()) {
    app_log('log', 'Crontab is enabled and running.');
    // required logic goes here
    // basically check if the crontab is enabled and running
    // if enabled and running, check if the crontab is set to run the script
} else {
    app_log('warn', 'Crontab is not enabled or running.');
    require_once(APPBASE . '/app/utils/getRss.php');
}
