<?php
    require 'connect.php';

    // $save = $_POST['save'];
    $idUser = $_POST['iduser'];
    $idArticle = $_POST['idarticle'];

    if(isset($idUser)) {
        $query = "INSERT IGNORE INTO savenews (id_user, id_article) VALUES ('$idUser', '$idArticle' )";
        $datainsert = mysqli_query($conn, $query);
        if($datainsert){
            $response['success'] = true; 
            $response['message'] = 'Lưu thành công!'; 
            $response['user'] = $idUser; 
        }else{
            $response['success'] = false; 
            $response['message'] = 'Lưu thất bại!';
        }
    }
    echo json_encode($response);

?>