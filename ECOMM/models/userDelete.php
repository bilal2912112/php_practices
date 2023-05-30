<?php
error_reporting(E_ALL);

ini_set('display_errors', 1);
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: DELETE');
header('Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');
include('../controllers/getUser.php');
$requestMethod=$_SERVER["REQUEST_METHOD"];
if ($requestMethod=='DELETE') {
  
    
   $deleteUser=deleteUser($_GET);
   echo $deleteUser;
    
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