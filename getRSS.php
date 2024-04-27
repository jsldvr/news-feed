<?php

// Function to retrieve RSS feed and return an array of posts
function retrieveRSS($url) {
    $rss = simplexml_load_file($url);
    $posts = [];

    foreach ($rss->channel->item as $item) {
        $pubDate = date_create((string)$item->pubDate);
        $pubDate->setTimezone(new DateTimeZone('America/Chicago'));
        $formattedDate = date_format($pubDate, 'Y-m-d H:i:s');

        $post = [
            'title' => (string)$item->title,
            'description' => (string)$item->description,
            'link' => (string)$item->link,
            'pubDate' => $formattedDate
        ];
        
        $posts[] = $post;
    }
    
    return $posts;
}

// Array of RSS feed URLs
$feedURLs = [
    'https://feeds.feedburner.com/realclearpolitics/qlMj',
    'https://nypost.com/rss',
    'https://rss.politico.com/congress.xml',
    'https://news.yahoo.com/rss',
    'https://www.cbsnews.com/latest/rss/main',
    'https://feeds.nbcnews.com/nbcnews/public/news',
    'https://www.nationalreview.com/feed/',
    'https://thehill.com/rss/syndicator/19109',
    'https://feeds.feedburner.com/breitbart',
    'https://www.theblaze.com/rss',
    'https://thefederalist.com/feed/',
    'https://www.theepochtimes.com/feed',
    'https://www.businessinsider.com/rss',
    'https://www.military.com/rss-feeds/content?keyword=headlines&channel=news&type=news',
    'https://jonathanturley.org/rss',
    'https://rss.nytimes.com/services/xml/rss/nyt/Politics.xml',
    'https://rss.nytimes.com/services/xml/rss/nyt/Business.xml',
    'https://rss.nytimes.com/services/xml/rss/nyt/Technology.xml',
    'https://www.thefirearmblog.com/blog/feed/',
    'https://www.aol.com/rss',
    'https://www.newsweek.com/rss'
];

// Array to store all posts
$allPosts = [];

// Retrieve and merge posts from all feeds
foreach ($feedURLs as $url) {
    $posts = retrieveRSS($url);
    $allPosts = array_merge($allPosts, $posts);
}

// Save the posts in a JSON file
$jsonData = json_encode($allPosts, JSON_PRETTY_PRINT);
$file = 'app/data/posts.json';

file_put_contents($file, $jsonData);

// echo "RSS feeds retrieved and saved successfully to $file";
?>
