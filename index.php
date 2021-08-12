<?php

header('x-hello-world: AG');

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$response = [
    'ip' => $ip,
];

if (!empty($_GET['name'])) {
    $response['greeting'] = 'Hello '.$_GET['name'];
}

$response_body = json_encode($response);
http_response_code(200);

echo $response_body;
