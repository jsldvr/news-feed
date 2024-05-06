<?php defined('APPBASE') or die;

// Function to retrieve RSS feed and return an array of posts
function get_rss($url = null, $get_build_id = false)
{
    // Array to store posts and build date
    $posts = Config::Posts;

    // Load the RSS feed
    $rss = simplexml_load_file($url);

    // Check if the feed was loaded
    if ($rss === false) {
        app_log('error', 'Failed to load RSS feed from ' . $url);
        return false;
    }

    // Loop through the feed items and store them in the posts array
    foreach ($rss->channel->item as $item) {

        // create a formatted date
        $pub_date_create = date_create((string)$item->pubDate);
        $pub_date_format = date_format($pub_date_create, Config::PostDateFormat);

        // Store the post in the posts array
        $post = [
            'title' => (string)$item->title,
            'description' => (string)$item->description,
            'link' => (string)$item->link,
            'pubDate' => $pub_date_format
        ];

        // Log the retrieved item
        // app_log('log', 'Retrieved item - ' . $post['title'] . ' from ' . $url);

        // Add the post to the posts array
        $posts["Feed"]["Posts"][] = $post;
    }

    // Return the posts array
    return $posts;
}

// Array of RSS feed URLs
$feed_urls = Config::FeedUrls;

// Array to store all posts
$all_posts = [];

// Retrieve and merge posts from all feeds
foreach ($feed_urls as $url) {

    // Retrieve the posts from the feed
    $get_rss_url = get_rss($url);

    // Check if the feed was retrieved
    if ($get_rss_url === false) return;

    // Merge the posts
    $all_posts = array_merge($all_posts, $get_rss_url);
}

// Save the posts in a JSON file
$json_data = json_encode($all_posts, JSON_PRETTY_PRINT);

// Save the posts in the posts.json file
$file = Config::PostsPath;

// Save the posts in the posts.json file
file_put_contents($file, $json_data);

// echo "RSS feeds retrieved and saved successfully to $file";
