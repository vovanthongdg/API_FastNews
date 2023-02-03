<?php 
	require "connect.php";

    $array = array();	

	class User {
        
		function User($iduser, $email,$username, $password, $createtime){
			$this->idUser = $iduser;
			$this->email = $email;
            $this->username = $username;
            $this->password = $password;
            $this->createTime = $createtime;
			
		}
	}

		$query = "SELECT *
        FROM `user`
        ";
	

	$data = mysqli_query($conn,$query);

	while ($row = mysqli_fetch_assoc($data)) {
		array_push($array, new User  ($row['id_user'],
											$row['email'],
                                            $row['username'],
                                            $row['password'],
                                            $row['create_time'],
                                        ));
	}
    
    $info = array("success"=>true, "comment"=>$array);
    
	echo json_encode($info);
?>
