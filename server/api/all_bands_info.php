<?php
header('Access-Control-Allow-Origin: *'); 
$method = $_SERVER['REQUEST_METHOD'];
require("../inc/functions.php");

$method = $_SERVER['REQUEST_METHOD'];


if ($method == 'GET') {
    $result = get_artists_and_albums();
    if (!$result) {
        http_response_code(404);
        exit;
      }
    echo json_encode($result);
  } 