<?php

/**
 * Get App Version
 * 
 * This function returns the version of the app. It checks the root directory 
 * for the CHANGELOG.md and returns the first line that contains the version, 
 * i.e., ## [1.0.0] - 2024-04-27 will return 1.0.0. 
 * 
 * Usage:
 * require_once __DIR__ . '/app/utils/getAppVersion.php';
 * echo getAppVersion();
 * 
 * cli usage:
 * php -r "require_once __DIR__ . '/app/utils/getAppVersion.php'; echo getAppVersion();"
 * 
 * @return string
 * @since 1.0.0
 * @version 1.0.0
 */

function getAppVersion()
{
    $changelog = file_get_contents(__DIR__ . '/../../CHANGELOG.md');
    $lines = explode("\n", $changelog);
    foreach ($lines as $line) {
        if (strpos($line, '## [') === 0) {
            return substr($line, 4, strpos($line, ']') - 4);
        }
    }
    return '0.0.0';
}
