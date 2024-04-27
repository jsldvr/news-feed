<?php

/**
 * Require the script to refresh the json file.
 */
require_once('getRSS.php');

/**
 * Set some global params
 */
$app = [
    'title' => 'News Feed'
];

/**
 * Website HTML
 */
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<?php require_once('app/inc/head.php'); ?>

<body>

    <?php
    // Header
    require_once('app/inc/header.php');

    // Main
    require_once('app/inc/main.php');

    // Footer
    require_once('app/inc/footer.php');

    // Footer Scripts
    require_once('app/inc/scripts.php');
    ?>

</body>

</html>