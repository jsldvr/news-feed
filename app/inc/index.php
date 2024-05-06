<?php defined('APPBASE') or die; ?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<?php
// Require the head.php file
require_once(APPBASE . '/app/inc/head.php');
?>

<body>

    <?php
    // Header
    require_once(APPBASE . '/app/inc/header.php');

    // Main
    require_once(APPBASE . '/app/inc/main.php');

    // Footer
    require_once(APPBASE . '/app/inc/footer.php');

    // Footer Scripts
    require_once(APPBASE . '/app/inc/scripts.php');
    ?>

</body>

</html>