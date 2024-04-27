<?php require_once __DIR__ . '/../../app/utils/getAppVersion.php'; ?>
<header class="container py-2 mt-3" style="max-width: 576px;">
    <div class="row">
        <div class="col">
            <div class="h3 text-center">
                <a href="./">
                    <i class="bi bi-rss-fill"></i>
                    <?php echo $app['title']; ?>
                    <span class="badge text-bg-light">v<?php echo getAppVersion(); ?></span>
                </a>
            </div>
        </div>
    </div>
</header>