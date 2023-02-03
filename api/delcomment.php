<?php
    require 'connect.php';

    // $save = $_POST['save'];
    $idcomment = $_POST['idcomment'];

    if(isset($idcomment)) {
        $query = "DELETE FROM `comment` WHERE id_comment = $idcomment";
        $datadel = mysqli_query($conn, $query);
        if($datadel){
            $response['success'] = true; 
            $response['message'] = 'Xoá thành công!'; 
            $response['comment'] = $idcomment; 
        }else{
            $response['success'] = false; 
            $response['message'] = 'Xoá thất bại!';
        }
    }
    echo json_encode($response);

?>