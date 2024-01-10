<?php

$_API_KEY = '8d6d2bcd59032e7aa735d8119f4cf1b3';
$_NGROK_URL = 'https://f874-103-169-0-114.ngrok-free.app';
$shop = $_GET['shop'];
$scopes = 'read_products,write_products,read_orders,write_orders,read_script_tags,write_script_tags,read_checkouts,write_checkouts,read_content,write_content,read_customers,write_customers,read_discounts,write_discounts,read_draft_orders,write_draft_orders,read_inventory,write_inventory,read_shipping,write_shipping,unauthenticated_read_checkouts,unauthenticated_write_checkouts,unauthenticated_read_customers,unauthenticated_write_customers';
$redirect_uri = $_NGROK_URL . '/token.php';
$nonce = bin2hex(random_bytes(12));
$access_mode = 'offline';

$oauth_url = 'https://' . $shop . '/admin/oauth/authorize?client_id=' . $_API_KEY . '&scope=' . $scopes . '&redirect_uri=' . urlencode($redirect_uri) . '&state=' . $nonce . '&grant_options[]=' . $access_mode;

header("Location: " . $oauth_url);
exit();
