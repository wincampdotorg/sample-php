<?php
// example of how to use basic selector to retrieve HTML contents
include('simple_html_dom.php');

$url = $_GET["url"];
$index = $_GET["index"]-1;
// get DOM from URL or file
$html = file_get_html($url);

//foreach($html->find('iframe') as $e) 
$parse_url = $html->find('iframe')[$index]->src;
?>
<!DOCTYPE html>
<html>
<head>
<title>DOM Parser</title>
</head>
<body style="margin:0px;padding:0px;overflow:auto">
<iframe src="<?=$parse_url;?>" frameborder="0"
style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:100%;width:100%;position:absolute;top:0px;left:0px;right:0px;bottom:0px" 
height="100%" width="100%" webkitallowfullscreen="true" mozallowfullscreen="true" scrolling="no" allowfullscreen></iframe>
</body>
</html>