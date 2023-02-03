<?php 
	require "connect.php";

    $array = array();	

	class CmtbyAr {
        
		function CmtbyAr($idcomment, $iduser, $idarticle, $username, $comment, $createtime){
			$this->idComment = $idcomment;
            $this->idUser = $iduser;
			$this->idArticle = $idarticle;
            $this->username = $username;
            $this->comment = $comment;
            $this->createTime = $createtime;
			
		}
	}

    if (isset($_GET['idarticle'])) {
		$idArticle = $_GET['idarticle'];
		$query = "SELECT id_comment, comment.id_user, id_article, user.username, comment, comment.create_time 
        FROM `comment`
        JOIN `user` ON user.id_user = comment.id_user
        WHERE comment.id_article ='$idArticle'
        ";
	

	$data = mysqli_query($conn,$query);

	while ($row = mysqli_fetch_assoc($data)) {
		array_push($array, new CmtbyAr($row['id_comment'],
                                            $row['id_user']
                                            $row['id_article'],
											$row['username'],
                                            $row['comment'],
                                            $row['create_time'],
                                        ));
	}
}
    
    $info = array("success"=>true, "news"=>$array);
    
	echo json_encode($info);
?>
