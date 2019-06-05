<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin: http://localhost:3000");
$method = $_SERVER['REQUEST_METHOD'];
require("../inc/functions.php");

$method = $_SERVER['REQUEST_METHOD'];
// $request = explode('/', trim($_SERVER['PATH_INFO'],'/'));


if ($method == 'GET') {
  header('Access-Control-Allow-Origin: *'); 
    $result = get_artists_and_albums();
    if (!$result) {
        http_response_code(404);
        exit;
      }
      
    // echo '[';
    // for ($i=0 ; $i<$result ; $i++) {
    //   echo ($i>0?',':'').json_encode($result);
    // }
    // echo ']';
    echo json_encode($result);
  } 