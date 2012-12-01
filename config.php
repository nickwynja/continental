<?php

require_once(dirname(__FILE__) . '/engine/Updater.php'); // Don't touch this.

date_default_timezone_set('America/New_York');

$db_dir = '';
$base_dir = '/Users/nickwynja/Sites/continental';

// Paths
Updater::$source_path   = $base_dir . '/content';
Template::$template_dir = $base_dir . '/resources/templates';
Updater::$dest_path     = $base_dir . '/www';
Updater::$cache_path    = $base_dir . '/cache';
Updater::$post_extension = '.md';

// Blog metadata
Post::$blog_title = 'My Blog';
Post::$blog_url   = 'http://www.mydomain.com/';
Post::$blog_description = 'I\'m a blogger.';

// Meta Weblog API params
Updater::$api_blog_id = 1; // leave this, probably
Updater::$api_blog_username = 'make up a username';
Updater::$api_blog_password = 'whatever password you want';

