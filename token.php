<?php

include_once("includes/mysql_connect.php");

$api_key = '8d6d2bcd59032e7aa735d8119f4cf1b3';
$secret_key = 'f06a264cf9f535a8bcca281341662f53';
$parameters = $_GET;
$shop_url = $parameters['shop'];
$hmac = $parameters['hmac'];
$parameters = array_diff_key($parameters, array('hmac' => ''));
ksort($parameters);

$new_hmac = hash_hmac('sha256', http_build_query($parameters), $secret_key);
echo print_r($parameters);
echo "<br/>";
echo $hmac;
echo "<br/>";
echo $new_hmac;
if(hash_equals($hmac, $new_hmac)) {
    $access_token_endpoint = 'https://' . $shop_url . '/admin/oauth/access_token';
    $var = array(
        "client_id" => $api_key,
        "client_secret" => $secret_key,
        "code" => $parameters['code']
    );

    print_r($access_token_endpoint.'?'.http_build_query($var));

    $ch =  curl_init();

    curl_setopt_array($ch, array(
      CURLOPT_URL => $access_token_endpoint.'?'.http_build_query($var),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
    ));
    $response = curl_exec($ch);
    print_r($response);
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        echo $error_msg;
        exit;
    }
    curl_close($ch);

    $response = json_decode($response, true);

    if (isset($response['access_token'])) {
        $query = "INSERT INTO shops (shop_url, access_token, hmac) VALUES ('{$shop_url}','{$response['access_token']}', '{$hmac}') ON DUPLICATE KEY UPDATE access_token='{$response['access_token']}'";
        if($mysql->query($query)) {
            echo "<script>top.window.location = 'https://" . $shop_url . "/admin/apps'</script>";
            die;
        }
    }
} else {
    echo 'This is not coming from Shopify and probably someone is hacking.';
}
