<?php
    require 'connect.php';

    // $save = $_POST['save'];
    $idbanner = $_POST['idbanner'];

    if(isset($idUser)) {
        $query = "DELETE FROM `banner` WHERE id_banner = $idbanner";
        $datadel = mysqli_query($conn, $query);
        if($datadel){
            $response['success'] = true; 
            $response['message'] = 'Xoá thành công!'; 
            $response['user'] = $idbanner; 
        }else{
            $response['success'] = false; 
            $response['message'] = 'Xoá thất bại!';
        }
    }
    echo json_encode($response);

?>