<?php defined('APPBASE') or die;

/**
 * config.php
 * 
 * This file contains configuration settings for the application.
 */

class Config
{
    /**
     * Site name
     */
    const SiteName = 'News Feed';

    /**
     * Site description
     */
    const SiteDesc = 'A simple news feed application';

    /**
     * Array of RSS feed URLs
     */
    const FeedUrls = [
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
        'https://feed.theepochtimes.com/us/us-features/feed',
        'https://www.businessinsider.com/rss',
        'https://www.military.com/rss-feeds/content?keyword=headlines&channel=news&type=news',
        'https://jonathanturley.org/rss',
        'https://rss.nytimes.com/services/xml/rss/nyt/Politics.xml',
        'https://rss.nytimes.com/services/xml/rss/nyt/Business.xml',
        'https://rss.nytimes.com/services/xml/rss/nyt/Technology.xml',
        'https://www.thefirearmblog.com/blog/feed/',
        'https://www.aol.com/rss',
        'https://www.newsweek.com/rss',
    ];

    /**
     * The configuration file for the news feed application.
     * 
     * This file contains the constant `Posts` which is an array that stores 
     * the posts for the news feed.
     * 
     * Caution should be taken when editing this constant/array as it may 
     * break the application.
     * 
     * The `Posts` array must have, at least, the following structure:
     * 
     *  "Feed" => [
     *      "Build" => [],
     *      "Posts" => [],
     *  ]
     * 
     * @var array
     */
    const Posts = [
        "Feed" => [
            "Build" => [],
            "Posts" => [],
        ]
    ];

    /**
     * Build format
     */
    const BuildFormat = 'Y-m-d-Hi';

    /**
     * Post date format
     */
    const PostDateFormat = 'Y-m-d H:i:s';

    /**
     * posts.json full path
     */
    const PostsDir = APPBASE . '/app/data'; // Directory to store posts
    const PostsFile = '/posts.json'; // File to store posts
    // Full posts path
    const PostsPath = self::PostsDir . self::PostsFile;
}
