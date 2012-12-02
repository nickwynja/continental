<?php

require_once(dirname(__FILE__) . '/engine/Updater.php'); // Don't touch this.

date_default_timezone_set('America/New_York');

$env = ((isset($_SERVER['HOSTNAME']) && ($_SERVER['HOSTNAME']) === 'severhostname')) || (($_SERVER['HOME']) === '/home/blog') ? 'PROD' : 'DEV'; #Accounts for if ran from CLI or cron
define('ENV', $env);


if (ENV == 'PROD') {
  $base_dir = '/path/to/continental';
  $content_dir = '/home/blog/Dropbox/blog';
  $shared_dir = '/path/to/continental/shared'; # /shared is part of capistrano deploy
} else {
  $base_dir = $_SERVER['HOME'] . '/Sites/continental';
  $content_dir = $base_dir . '/content';
  $shared_dir = $base_dir;
}

// Paths
Updater::$source_path   = $content_dir;
Template::$template_dir = $base_dir . '/resources/templates';
Updater::$dest_path     = $shared_dir . '/www';
Updater::$cache_path    = $base_dir . '/cache';
Updater::$hook_path    = $base_dir . '/engine';
Updater::$post_extension = '.md';

// Blog metadata
Post::$blog_title = 'My Blog';
Post::$blog_url   = 'http://www.mydomain.com/';
Post::$blog_description = 'I\'m a blogger.';