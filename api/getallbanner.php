<?php 
	require "connect.php";

    $array = array();	

	class Video {
        
		function Video($idBanner, $idAdmin,$urlImage, $urlBanner, $createTime){
			$this->idBanner = $idBanner;
			$this->idAdmin = $idAdmin;
            $this->urlImage = $urlImage;
            $this->urlBanner = $urlBanner;
            $this->createTime = $createTime;
			
		}
	}

		$query = "SELECT * 
        FROM `banner`
        ";
	

	$data = mysqli_query($conn,$query);

	while ($row = mysqli_fetch_assoc($data)) {
		array_push($array, new Video($row['id_banner'],
											$row['id_admin'],
                                            $row['url_image'],
                                            $row['url_banner'],
                                            $row['create_time'],
                                        ));
	}
    
    $info = array("success"=>true, "banner"=>$array);
    
	echo json_encode($info);
?>
