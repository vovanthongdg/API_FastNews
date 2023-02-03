<?php
    require 'connect.php';

    // $save = $_POST['save'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    if(isset($idAdmin)) {
        $query = "INSERT INTO user (`email`, `username`, `password`) VALUES ('$email', '$username', '$password )";
        $datainsert = mysqli_query($conn, $query);
        if($datainsert){
            $response['success'] = true; 
            $response['message'] = 'Thêm thành công!'; 
        }else{
            $response['success'] = false; 
            $response['message'] = 'Thêm thất bại!';
        }
    }
    echo json_encode($response);

?>