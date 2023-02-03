<?php
    require 'connect.php';

    // $save = $_POST['save'];
    $idUser = $_POST['iduser'];

    if(isset($idUser)) {
        $query = "DELETE FROM `user` WHERE id_user = $idUser";
        $datadel = mysqli_query($conn, $query);
        if($datadel){
            $response['success'] = true; 
            $response['message'] = 'Xoá thành công!'; 
            $response['user'] = $idUser; 
        }else{
            $response['success'] = false; 
            $response['message'] = 'Xoá thất bại!';
        }
    }
    echo json_encode($response);

?>