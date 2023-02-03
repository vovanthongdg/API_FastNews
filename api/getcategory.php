<?php 
	require "connect.php";

	$query = "SELECT * FROM categories";
	$datacategory = mysqli_query($conn,$query);

	class Category {
        var $idCategory;
        var $nameCategory;

		function Category($idcategory,$namecategory){
			$this->idCategory = $idcategory;
			$this->nameCategory = $namecategory;
			
		}
	}

	$arraycategory = array();

	while ($row = mysqli_fetch_assoc($datacategory)) {
		array_push($arraycategory, new Category($row['id_category'],
											$row['name_category']));
	}
	echo json_encode($arraycategory);
	

?>

