<?php
    require 'connect.php';

    // $save = $_POST['save'];
    $idUser = $_POST['iduser'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass = $_POST['password'];

    if(isset($idUser)) {
        $query = "UPDATE `user` SET `email` = $email, `username` = $username, `password` = $password WHERE id_user = $idUser";
        $dataup = mysqli_query($conn, $query);
        if($dataup){
            $response['success'] = true; 
            $response['message'] = 'Cập nhật thành công!'; 
            $response['user'] = $idUser; 
        }else{
            $response['success'] = false; 
            $response['message'] = 'Cập nhật thất bại!';
        }
    }
    echo json_encode($response);

?>