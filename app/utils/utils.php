<?php defined('APPBASE') or die;

/**
 * utils.php
 * 
 * Description: This file's purpose is to provide a function that requires_once 
 * a file from the app/utils directory. The function can accept a string or an
 * array of strings as an argument. If the argument is a string, the function
 * will require_once the file with the same name from the app/utils directory.
 * If the argument is an array, the function will require_once each file in the
 * array from the app/utils directory. Returns false if the file does not exist.
 * 
 * Usage: require_once(APPBASE . '/app/utils/utilstions.php');
 * 
 * Example with string: 
 *          utils('customHelper');
 * Result: 
 *          require_once(APPBASE . '/app/utils/customHelper.php');
 * 
 * Example with array: 
 *          utils(['file1', 'file2', 'file3']);
 * Result:  require_once(APPBASE . '/app/utils/file1.php');
 *          require_once(APPBASE . '/app/utils/file2.php');
 *          require_once(APPBASE . '/app/utils/file3.php'); 
 */

function utils($file = null)
{
    if ($file == null) return;

    // String
    if (is_string($file)) {

        $files = scandir(APPBASE . '/app/utils');

        // if the file does not exist, return
        if (!in_array($file . '.php', $files)) return;

        // if $file asks for index.php, or any file get... as a prefix, then return
        if (strpos($file, 'index.php') !== false || strpos($file, 'get') !== false) return;

        require_once(APPBASE . '/app/utils/' . $file . '.php');
    }
    // Array
    elseif (is_array($file)) {

        $files = scandir(APPBASE . '/app/utils');

        foreach ($file as $f) {

            // if the file does not exist, continue
            if (!in_array($f . '.php', $files)) return;

            // if $file asks for index.php, or any file get... as a prefix, then continue
            if (strpos($f, 'index.php') !== false || strpos($f, 'get') !== false) continue;

            require_once(APPBASE . '/app/utils/' . $f . '.php');
        }
    }
}
