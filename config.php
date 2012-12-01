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