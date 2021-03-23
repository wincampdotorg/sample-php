<?php
// fungsi enkripsi base64 dengan key
function base64_encrypt($plain_text)
{
$hasil=base64_encode($plain_text);
return $hasil;
}
 
// fungsi base64 decrypt
// untuk mendekripsi string base64
function base64_decrypt($enc_text)
{
$hasil=base64_decode($enc_text);
return $hasil;
}
 
?>