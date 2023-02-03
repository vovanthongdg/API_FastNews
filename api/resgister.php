<?php
require_once('connect.php');

$username = $_POST['username'];
$password = $_POST['password'];
$email 	  = $_POST['email'];

$error;
if(empty($username))
{
	$error = "Username is required";
}
else if(empty($password))
{
	$error = "password is required";
}
else if(empty($email))
{
	$error = "email is required";
}
else{
	
	$insertQry = "INSERT INTO `user`(`username`, `password`, `email`) 
	VALUES ($username,$password,$email)";
	
	$qry = mysqli_query($conn, $insertQry);
	
	if($qry)
	{
		$id_user = mysqli_insert_id($conn);
		$response['status'] = true;
		$response['message'] = "Register sucessfully";
		$response['userId'] = $id_user;
	}
	else{
		$response['status'] = false;
		$response['message'] = "Register failed";	
	}
	
	
}


header('Content-Type: application/json; charset=UTF-8');
echo json_encode($response);

?>