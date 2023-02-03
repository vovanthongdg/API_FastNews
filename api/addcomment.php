<?php
    require 'connect.php';

    // $save = $_POST['save'];
    $iduser = $_POST['iduser'];
    $idarticle = $_POST['idarticle'];
    $comment = $_POST['comment'];


    if(isset($comment)) {
        $query = "INSERT INTO comment (`id_user`, `id_article`, `comment`) VALUES ('$iduser', '$idarticle', '$comment )";
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