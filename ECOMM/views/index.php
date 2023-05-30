<?php
error_reporting(E_ALL);

ini_set('display_errors', 1);
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');
include('../views/getUser.php');
$requestMethod=$_SERVER["REQUEST_METHOD"];
if ($requestMethod=='GET') {
    if (isset($_GET['user_id'])) {
      $user=getUser($_GET);
      echo $user;
    } else {
       
    
   $userList=getUserList();
   echo $userList;
    }
}
else {
    $data=[
        'status'=>405,
        'message'=>$requestMethod.'Method not Allow',
    ];
    header('HTTP/1.0 405 Method Not Allowed');
    echo json_encode($data); 
}


?>