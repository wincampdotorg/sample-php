<?php
$url = substr($_SERVER['REQUEST_URI'],25);
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_HEADER => true,
  CURLOPT_NOBODY => true,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_CUSTOMREQUEST => "GET",
));
$response = curl_exec($curl);
curl_close($curl);
$response_code = substr($response,9,3); 
echo json_encode($response_code);
?>