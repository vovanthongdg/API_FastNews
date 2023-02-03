<?php
    require 'connect.php';

    // $save = $_POST['save'];
    $idbanner = $_POST['idbanner'];
    $urlimage = $_POST['urlimage'];
    $urlbanner = $_POST['urlbanner'];
    

    if(isset($idUser)) {
        $query = "UPDATE `banner` SET `url_image` = $urlimage, `url_banner` = $urlbanner WHERE id_banner = $idbanner";
        $dataup = mysqli_query($conn, $query);
        if($dataup){
            $response['success'] = true; 
            $response['message'] = 'Cập nhật thành công!'; 
            $response['user'] = $idbanner; 
        }else{
            $response['success'] = false; 
            $response['message'] = 'Cập nhật thất bại!';
        }
    }
    echo json_encode($response);

?>