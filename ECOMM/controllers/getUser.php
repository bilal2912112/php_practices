<?php
require '../config/dbconn.php';
function error422($message){
    $data=[
        'status'=>422,
        'message'=>$message,
        
    ];
    header('HTTP/1.0 422 user found');
echo json_encode($data); 
exit();
}
function storeUser($userInput){
    global $mysqli;
    $user_id=mysqli_real_escape_string($mysqli,$userInput['user_id']);
    $username=mysqli_real_escape_string($mysqli,$userInput['username']);
    $email=mysqli_real_escape_string($mysqli,$userInput['email']);
    $password=mysqli_real_escape_string($mysqli,$userInput['password']);
    $address=mysqli_real_escape_string($mysqli,$userInput['address']);
    $phone_number=mysqli_real_escape_string($mysqli,$userInput['phone_number']);
    if (empty(trim($user_id))) {
       return error422('Enter id');
    } elseif(empty(trim($username))) {
        return error422('Enter username');
    }
    elseif(empty(trim($email))) {
        return error422('Enter email');

    }
    elseif(empty(trim($password))) {
        return error422('Enter password');

    }
    elseif(empty(trim($address))) {
        return error422('Enter address');

    }
    elseif(empty(trim($phone_number))) {
        return error422('Enter phone_number');

    }
    else{
        $query="INSERT INTO Users (user_id,username,email,password,address,phone_number) VALUES ('$user_id','$username','$email','$password','$address','$phone_number')";
        $result=mysqli_query($mysqli,$query);
        if ($result) {
            $data=[
                'status'=>201,
                'message'=>'User Created',
            ];
            header('HTTP/1.0 201 Created');
            return json_encode($data); 
        } else {
            $data=[
                'status'=>500,
                'message'=>'internal Server Error',
            ];
            header('HTTP/1.0 500 Internel Server Error');
            return json_encode($data); 
        }
        
    }

}
function getUserList(){
global $mysqli;
$query="SELECT * FROM Users";
$query_run=mysqli_query($mysqli,$query);

if ($query_run) {
   if (mysqli_num_rows($query_run)>0) {
   $res=mysqli_fetch_all($query_run,MYSQLI_ASSOC);
   $data=[
    'status'=>200,
    'message'=>'User Found',
    'data'=>$res
];
header('HTTP/1.0 200 user found');
return json_encode($data); 
   } else {
    $data=[
        'status'=>404,
        'message'=>'No user found',
    ];
    header('HTTP/1.0 404 not user found');
    return json_encode($data); 
   }
   
} else {
    $data=[
        'status'=>500,
        'message'=>'internal Server Error',
    ];
    header('HTTP/1.0 500 Internel Server Error');
    return json_encode($data); 
}

}
function getUser($userParams){
    global $mysqli;
    if($userParams['user_id']==null){
        return error422('enter your id');
    }
    $user_id=mysqli_real_escape_string($mysqli,$userParams['user_id']);
    $query="SELECT * FROM  Users where user_id='$user_id' LIMIT 1";
    $result=mysqli_query($mysqli,$query);
    if ($result) {
        
        if (mysqli_num_rows($result)==1) {
         $res=mysqli_fetch_assoc($result);
         $data=[
            'status'=>200,
            'message'=>'User found',
            'data'=>$res
        ];
        header('HTTP/1.0 200 user  found');
        return json_encode($data); 
        } else {
            $data=[
                'status'=>404,
                'message'=>'User not found',
            ];
            header('HTTP/1.0 404 user not found');
            return json_encode($data); 
        }
        
    } else {
        $data=[
            'status'=>500,
            'message'=>'Internal server error',
        ];
        header('HTTP/1.0 Internal server error');
        return json_encode($data); 
    }
    

}

function updateUser($userInput,$userParams){
    global $mysqli;
    if (!isset($userParams['user_id'])) {
        return error422('user id not found in URL');
    } elseif($userParams['user_id']==null ) {
        return error422('Enter user id');
    }
     
    $user_id=mysqli_real_escape_string($mysqli,$userParams['user_id']);
    $username=mysqli_real_escape_string($mysqli,$userInput['username']);
    $email=mysqli_real_escape_string($mysqli,$userInput['email']);
    $password=mysqli_real_escape_string($mysqli,$userInput['password']);
    $address=mysqli_real_escape_string($mysqli,$userInput['address']);
    $phone_number=mysqli_real_escape_string($mysqli,$userInput['phone_number']);
    if (empty(trim($user_id))) {
       return error422('Enter id');
    } elseif(empty(trim($username))) {
        return error422('Enter username');
    }
    if(empty(trim($email))) {
        return error422('Enter email');

    }
    elseif(empty(trim($password))) {
        return error422('Enter password');

    }
    elseif(empty(trim($address))) {
        return error422('Enter address');

    }
    elseif(empty(trim($phone_number))) {
        return error422('Enter phone_number');

    }
    else{
        $query="UPDATE Users SET username='$username',email='$email',password='$password',username='$address',username='$address' where user_id='$user_id' LIMIT 1";
        $result=mysqli_query($mysqli,$query);
        if ($result) {
            $data=[
                'status'=>200,
                'message'=>'User UPDATED',
            ];
            header('HTTP/1.0 200 UPDATED');
            return json_encode($data); 
        } else {
            $data=[
                'status'=>500,
                'message'=>'internal Server Error',
            ];
            header('HTTP/1.0 500 Internel Server Error');
            return json_encode($data); 
        }
        
    }

}
function deleteUser($userParams){
    global $mysqli;
    if (!isset($userParams['user_id'])) {
        return error422('user id not found in URL');
    } elseif($userParams['user_id']==null ) {
        return error422('Enter user id');
    }
     
    $user_id=mysqli_real_escape_string($mysqli,$userParams['user_id']);
    $query="DELETE FROM Users WHERE user_id='$user_id' LIMIT 1";
    $result=mysqli_query($mysqli,$query);
    if ($result) {
        $data=[
            'status'=>204,
            'message'=>'User deleted',
        ];
        header('HTTP/1.0 204 deleted');
        return json_encode($data); 
    } else {
        $data=[
            'status'=>404,
            'message'=>'user not found',
        ];
        header('HTTP/1.0 404 user not found');
        return json_encode($data); 
    }

  
}
?>
