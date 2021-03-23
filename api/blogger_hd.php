<?php
error_reporting(0);
ini_set('user_agent', 'ExoPlayer Nonton Anime v7.0/7.0 (Linux;Android 7.1.1) ExoPlayerLib/2.11.0');
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
   $video_url_hd = $obj['streams'][1]['play_url'];
}
$poster_url = $obj['thumbnail'];
?>
<style type="text/css">
        body,
        .main,
        #videocontainer,
        .thumbnail-holder,
        .play-button {
          background: black;
          height: 100vh;
          margin: 0;
          overflow: hidden;
          position: absolute;
          width: 100%;
        }

        #videocontainer.type-BLOGGER_UPLOADED .thumbnail-holder {
          background-size: contain;
        }
			video {
			  position: fixed;
			  right: 0;
			  bottom: 0;
			  width: 100%    !important;
			  height: 100%   !important;
			}  

        .thumbnail-holder {
          background-repeat: no-repeat;
          background-position: center;
          z-index: 10;
        }

        .play-button {
          background: url('https://www.gstatic.com/images/icons/material/system/1x/play_arrow_white_48dp.png') rgba(0,0,0,0.1) no-repeat center;
          cursor: pointer;
          display: block;
          z-index: 20;
        }
      </style>
<video width="400" controls autoplay poster="<?=$poster_url;?>">
  <source src="<?=$video_url;?>" type="video/mp4">
</video>
<?php
if (isset($video_url_hd)) {
?>
<video width="400" controls autoplay poster="<?=$poster_url;?>">
  <source src="<?=$video_url_hd;?>" type="video/mp4">
</video>
<?php
}
?>