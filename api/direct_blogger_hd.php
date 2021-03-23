<?php
set_time_limit(0);  
error_reporting(0);
ini_set('user_agent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36 Edg/86.0.622.38');
include('simple_html_dom.php');

$url = $_GET["url"];
$index = $_GET["index"]-1;
// get DOM from URL or file
$html = file_get_html($url);
$parse_url = $html->find('iframe')[$index]->src;
$html = file_get_html($parse_url);
$oke = $html->find('script')[0];
$text = str_replace("var VIDEO_CONFIG = ","", $oke->innertext);
//var_dump(json_decode($text, true));
$obj = json_decode($text,true);
$video_url = $obj['streams'][0]['play_url'];
$video_url_hd = $obj['streams'][1]['play_url'];
if (isset($video_url_hd)) {
   $video_url = $obj['streams'][1]['play_url'];
}

header("Location: ".$video_url);
?>

