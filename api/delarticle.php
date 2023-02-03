<?php
    require 'connect.php';

    // $save = $_POST['save'];
    $idarticle = $_POST['idarticle'];

    if(isset($idUser)) {
        $query = "DELETE FROM `articlesdetails` WHERE id_article = $idarticle";
        $datadel = mysqli_query($conn, $query);
        if($datadel){
            $response['success'] = true; 
            $response['message'] = 'Xoá thành công!'; 
            $response['article'] = $idarticle; 
        }else{
            $response['success'] = false; 
            $response['message'] = 'Xoá thất bại!';
        }
    }
    echo json_encode($response);

?>