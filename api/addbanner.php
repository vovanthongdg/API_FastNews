<?php
    require 'connect.php';

    // $save = $_POST['save'];
    $idadmin = $_POST['idadmin'];
    $urlImage = $_POST['urlimage'];
    $urlBanner = $_POST['urlbanner'];


    if(isset($idadmin)) {
        $query = "INSERT INTO banner (id_admin, url_image, url_banner) VALUES ($idadmin, $urlImage, $urlBanner)";
        $datainsert = mysqli_query($conn, $query);
        if($datainsert){
            $response['success'] = true; 
            $response['message'] = 'Lưu thành công!';  
        }else{
            $response['success'] = false; 
            $response['message'] = 'Lưu thất bại!';
        }
    }
    echo json_encode($response);

?>