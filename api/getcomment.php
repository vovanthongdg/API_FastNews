<?php 
	require "connect.php";

    $array = array();	

	class Comment {
        
		function Comment($idcomment, $iduser,$idarticle, $username, $comment, $createtime){
			$this->idComment = $idcomment;
			$this->idUser = $iduser;
            $this->idArticle = $idarticle;
            $this->userName = $username
            $this->comment = $comment;
            $this->createTime = $createtime;
			
		}
	}

		$query = "SELECT id_comment, comment.id_user, id_article, comment, user.username
        FROM `comment`
        JOIN `user` ON user.id_user = comment.id_user
        ";
	

	$data = mysqli_query($conn,$query);

	while ($row = mysqli_fetch_assoc($data)) {
		array_push($array, new Comment($row['id_comment'],
											$row['id_user'],
                                            $row['id_article'],
                                            $row['username'],
                                            $row['comment'],
                                            $row['create_time'],
                                        ));
	}
    
    $info = array("success"=>true, "comment"=>$array);
    
	echo json_encode($info);
?>
