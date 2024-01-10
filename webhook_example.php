<?php

define('SHOPIFY_APP_SECRET', 'shpua_7515c3817b636c6941c6953b0d181b6a');

function verify_webhook($data, $hmac_header)
{
  $calculated_hmac = base64_encode(hash_hmac('sha256', $data, SHOPIFY_APP_SECRET, true));
  return hash_equals($hmac_header, $calculated_hmac);
}


$hmac_header = $_SERVER['HTTP_X_SHOPIFY_HMAC_SHA256'];
$shop_domain = $_SERVER['HTTP_X_SHOPIFY_SHOP_DOMAIN'];

$data = file_get_contents('php://input');
$verified = verify_webhook($data, $hmac_header);

$store_directory = 'data/stores/' . $shop_domain;

if(!file_exists($store_directory)) {
    mkdir($store_directory, 0777, TRUE);

    $file = fopen($store_directory . '/store.txt', 'w');

    fwrite($file, 'Is the webhook of the store verified? Status: ' . $verified);
}
?>