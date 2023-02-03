<?php
require_once('connect.php');

$response = array();

if(isset($_GET['lo'])){

switch($_GET['lo']){

case 'signup':

//checking the parameters required are available or not 
if(isTheseParametersAvailable(array('username','email','password'))){
 
	//getting the values 
	$username = $_POST['username']; 
	$email = $_POST['email']; 
	$password = md5($_POST['password']);
	
	//checking if the user is already exist with this username or email
	//as the email and username should be unique for every user 
	$stmt = $conn->prepare("SELECT `id_user` FROM `user` WHERE `username` = ? OR `email` = ?");
	$stmt->bind_param("ss", $username, $email);
	$stmt->execute();
	$stmt->store_result();
	
	//if the user already exist in the database 
	if($stmt->num_rows > 0){
	$response['success'] = false;
	$response['message'] = 'Người dùng đã được sử dụng';
	$stmt->close();
	}else{
	
	//if user is new creating an insert query 
	$stmt = $conn->prepare("INSERT INTO `user` (`username`, `email`, `password`) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $username, $email, $password);
	
	//if the user is successfully added to the database 
	if($stmt->execute()){
	
	//fetching the user back 
	$stmt = $conn->prepare("SELECT `id_user`, `username`, `email` FROM `user` WHERE `username` = ?"); 
	$stmt->bind_param("s",$username);
	$stmt->execute();
	$stmt->bind_result($id, $username, $email);
	$stmt->fetch();
	
	$user = array(
	'id_user'=>$id, 
	'username'=>$username, 
	'email'=>$email
	);
	
	$stmt->close();
	
	//adding the user data in response 
	$response['success'] = true; 
	$response['message'] = 'Đăng ký thành công!'; 
	$response['user'] = $user; 
	}
	}
	
	}else{
	$response['success'] = false; 
	$response['message'] = 'required parameters are not available'; 
	}

break; 

case 'login':

//for login we need the username and password 
if(isTheseParametersAvailable(array('username', 'password'))){
	//getting values 
	$username = $_POST['username'];
	$password = md5($_POST['password']); 
	
	//creating the query 
	$stmt = $conn->prepare("SELECT id_user, username, email FROM `user` WHERE `username` = ? AND `password` = ?");
	$stmt->bind_param("ss",$username, $password);
	
	$stmt->execute();
	
	$stmt->store_result();
	
	//if the user exist with given credentials 
	if($stmt->num_rows > 0){
	
	$stmt->bind_result($id, $username, $email);
	$stmt->fetch();
	
	$user = array(
	'id_user'=>$id, 
	'username'=>$username, 
	'email'=>$email
	);
	
	$response['success'] = true; 
	$response['message'] = 'Đăng nhập thành công!'; 
	$response['user'] = $user; 
	}else{
	//if the user not found 
	$response['success'] = false; 
	$response['message'] = 'Invalid username or password';
	}
	}

break; 

default: 
$response['success'] = false; 
$response['message'] = 'Invalid Operation Called';
}

}else{
//if it is not api call 
//pushing appropriate values to response array 
$response['success'] = false; 
$response['message'] = 'Invalid API Call';
}

//displaying the response in json structure 
echo json_encode($response);

function isTheseParametersAvailable($params){
 
	//traversing through all the parameters 
	foreach($params as $param){
	//if the paramter is not available
	if(!isset($_POST[$param])){
	//return false 
	return false; 
	}
	}
	//return true if every param is available 
	return true; 
	}

?>