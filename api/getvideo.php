<?php 
	require "connect.php";

    $array = array();	

	class Video {
        
		function Video($idVideo, $title, $summary,$urlVideo,$urlImage, $createTime){
			$this->idVideo = $idVideo;
			$this->title = $title;
            $this->summary = $summary;
            $this->urlVideo = $urlVideo;
            $this->urlImage = $urlImage;
            $this->createTime = $createTime;
			
		}
	}

		$query = "SELECT * 
        FROM `lib_video`
        ";
	

	$data = mysqli_query($conn,$query);

	while ($row = mysqli_fetch_assoc($data)) {
		array_push($array, new Video($row['id_video'],
											$row['title'],
                                            $row['summary'],
                                            $row['url_video'],
                                            $row['url_image'],
                                            $row['create_time'],
                                        ));
	}
    
    $info = array("success"=>true, "videos"=>$array);
    
	echo json_encode($info);
?>
