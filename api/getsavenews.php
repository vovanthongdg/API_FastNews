<?php 
	require "connect.php";

    $arraysave = array();	

	class SaveNews {
        
		function SaveNews($iduser, $idarticle, $title, $summary, $urlimage, $createtime){
			$this->idUser = $iduser;
            $this->idArticle = $idarticle;
			$this->title = $title;
            $this->summary = $summary;
            $this->urlImage = $urlimage;
            $this->createTime = $createtime;
			
		}
	}

    if (isset($_GET['idUser'])) {
		$idUser = $_GET['idUser'];
		$query = "SELECT savenews.id_user, savenews.id_article, articlesdetails.title, articlesdetails.summary, articlesdetails.url_image, articlesdetails.create_time 
        FROM `savenews`
        JOIN `articlesdetails` ON articlesdetails.id_article = savenews.id_article
        WHERE savenews.id_user ='$idUser'
        ";
	

	$datasave = mysqli_query($conn,$query);

	while ($row = mysqli_fetch_assoc($datasave)) {
		array_push($arraysave, $save = new SaveNews($row['id_user'],
                                            $row['id_article'],
											$row['title'],
                                            $row['summary'],
                                            $row['url_image'],
                                            $row['create_time'],
                                        ));
	}
}
    
    $info = array("success"=>true, "news"=>$save);
    
	echo json_encode($info);
?>
