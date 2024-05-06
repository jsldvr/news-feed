<?php defined('APPBASE') or die;

/**
 * app_log.php
 * 
 * Description: This file's purpose is to provide a function that logs a message
 * to the app/logs directory. The function can accept a string or an array of 
 * strings as an argument. If the argument is a string, the function will log 
 * the message to the file with the same name in the app/logs directory. If the 
 * argument is an array, the function will log the message to each file in the 
 * array in the app/logs directory. Returns false if the file does not exist.
 */

function app_log($log_type = null, $log_message = null)
{
    // define the $log_type types
    $log_types = ['log', 'warn', 'error', 'unknown'];

    // if $log_type is null, give it a default value
    if ($log_type == null) {
        $log_type = 'unknown';
    }

    // if $log_type doesn't exist, return
    if (!in_array($log_type, $log_types)) {
        return false;
    }

    // if APPBASE . '/app/logs/' dir does not exist, create it
    if (!file_exists(APPBASE . '/app/logs/')) {
        mkdir(APPBASE . '/app/logs/', 0777, true);
    }

    // if the APPBASE . '/app/logs/' . $log_type . '.log' file does not exist, create it
    if (!file_exists(APPBASE . '/app/logs/' . $log_type . '.log')) {
        $file = fopen(APPBASE . '/app/logs/' . $log_type . '.log', 'w');
        fclose($file);
    }

    // get user client info
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']);

    // $log_message in a json format
    $fwrite_log_msg = "{
    \"date\": \"" . date('Y-m-d H:i:s') . "\",
    \"method\": \"" . $_SERVER['REQUEST_METHOD'] . "\",
    \"message\": \"" . $log_message . "\",
    \"user_agent\": \"" . $user_agent . "\",
    \"ip_address\": \"" . $ip_address . "\",
    \"host_name\": \"" . $host_name . "\"\n},\n";

    // we add the date, time, and log message to the file
    $file = fopen(APPBASE . '/app/logs/' . $log_type . '.log', 'a');
    fwrite($file, $fwrite_log_msg);
    fclose($file);
}
