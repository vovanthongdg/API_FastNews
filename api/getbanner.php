<?php 
	require "connect.php";

    $arraybanner = array();	

	class Banners {
        
		function Banners($idbanner, $idadmin, $urlimage, $urlbanner, $createtime){
			$this->idBanner = $idbanner;
            $this->idAdmin = $idadmin;
			$this->urlImage = $urlimage;
            $this->urlBanner = $urlbanner;
            $this->createtime = $createtime;
			
		}
	}

    if (isset($_GET['idbanner'])) {
		$idBanner = $_GET['idbanner'];
		$query = "SELECT * 
        FROM `banner`
        WHERE id_banner ='$idBanner'
        ";
	

	$databanner = mysqli_query($conn,$query);

	while ($row = mysqli_fetch_assoc($databanner)) {
		array_push($arraybanner, $save = new Banners($row['id_banner'],
                                            $row['id_admin'],
											$row['url_image'],
                                            $row['url_banner'],
                                            $row['create_time'],
                                        ));
	}
}
    
    $info = array("success"=>true, "banner"=>$save);
    
	echo json_encode($info);
?>
