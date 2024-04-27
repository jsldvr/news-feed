<main class="container py-2" style="max-width: 576px;">
    <div class="row">
        <div class="col">
            <div class="alert alert-info text-center">
                View and fork this project on
                <a href="https://github.com/jsldvr/simple-rss-feed-display" target="_blank" rel="noopener noreferrer">GitHub</a>!
            </div>

            <table class="table w-100" id="news-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Post</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Read the JSON file contents
                    $file = 'app/data/posts.json';
                    $jsonData = file_get_contents($file);
                    $posts = json_decode($jsonData, true);

                    // Display each post
                    foreach ($posts as $post) {
                        $desc = $post['description'];
                        $stripDesc = strip_tags($desc);
                        $limitDesc = substr($stripDesc, 0, 512);
                        // we issue each post a unique id
                        $uniquePostId = uniqid();
                    ?>

                        <tr class="post" id="post-<?php echo $uniquePostId; ?>">
                            <td>
                                <time>
                                    <?php
                                    $theDate = $post['pubDate']; // returns 2024-04-27 11:40:01 UTC
                                    $theDateString = strtotime($theDate); // returns 2024-04-27 11:40:01
                                    echo date('Y', $theDateString) . "<br>";
                                    echo date('m-d', $theDateString) . "<br>";
                                    // echo date('h:i A T', strtotime($theDate));
                                    // format to central time zone
                                    echo date('h:i A T', $theDateString);
                                    ?>
                                </time>
                            </td>
                            <td>
                                <div class="fw-bold fs-5 mb-2">
                                    <a href="<?php echo $post['link']; ?>" target="_blank" rel="noopener noreferrer">
                                        <?php echo $post['title']; ?>
                                    </a>
                                </div>
                                <div><?php echo $limitDesc; ?></div>
                                <div class="text-success-emphasis text-wrap my-3 post-link">
                                    <?php
                                    // echo $post['link'] . "\n"; 
                                    $thePostLink = $post['link'];
                                    // Using regular expression to extract FQDN
                                    preg_match('/^(?:https?:\/\/)?(?:[^@\n]+@)?(?:www\.)?([^:\/\n?]+)/', $thePostLink, $matches);
                                    // Extracting the FQDN from the URL
                                    $postFqdn = isset($matches[1]) ? $matches[1] : "";
                                    // Display the FQDN
                                    echo $postFqdn;
                                    ?>
                                </div>
                                <div class="my-3">
                                    <a class="twitter-share-button btn btn-sm btn-outline-primary" href="https://twitter.com/intent/tweet?text=<?php echo urlencode($post['title']); ?>&url=<?php echo $post['link'] . "\n"; ?>" target="_blank" rel="noopener noreferrer">
                                        Share on 𝕏
                                    </a>
                                </div>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>