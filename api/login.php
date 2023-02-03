<?php
require_once('connect.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

$loginqry = "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'";

$qry = mysqli_query($conn, $loginqry);

if(mysqli_num_rows($qry) > 0)
    {
        $userObj = mysqli_fetch_assoc($qry);
        $response['status']=true;
        $response['message']="Login success";
        $response['data']=$userObj;
    }
else
    {
        $response['status']=false;
        $response['message']="User not found";
    }


header('Content-Type: application/json; charset=UTF-8');
echo json_encode($response);

?>