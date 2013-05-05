/*

Thanks to [jmartindf](https://github.com/jmartindf/secondcrack/commit/d2745ff414330eb1f48ee661d4466354c717b4cb)
for the heavy lifting on this hook.

*/

<?php
require_once(dirname( dirname(__FILE__) )."/lib/AppDotNetPHP/AppDotNet.php");


/*

See http://developers.app.net/docs/authentication/flows/web/
for information on how to get your `$access_token`

*/

class AdnCredentials
{
    public static $client_id = 'YOUR_CLIENT_ID';
    public static $client_secret = 'YOUR_CLIENT_SECRET';
    public static $access_token = 'YOUR_ACCESS_TOKEN';
}

function postADNLink($post) {
  $adn = new AppDotNet(AdnCredentials::$client_id, AdnCredentials::$client_secret);
  if (isset($post['link'])) {
    $intro = "\xE2\x86\x92 ";
  } else {
    $intro = "";
  }
  $title = $post['post-title'];
  $data=array("entities"=>array("links"=>array(array(
    "text"=>$title,
    "url"=>$post['post-absolute-permalink'],
    "pos"=>mb_strlen($intro,'UTF-8'),
    "len"=>mb_strlen($title,'UTF-8'),
  ))));
  $params = array(
    'access_token' => AdnCredentials::$access_token
  );
  $adn->createPost($intro.$title, $data, $params);
  error_log("Created post: ".$intro.$title);
}

class Adn extends Hook
{
    public function doHook(Post $post)
    {
        postADNLink($post->array_for_template());
    }
}