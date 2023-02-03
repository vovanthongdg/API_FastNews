<?php 
	require "connect.php";

    $arraysingle = array();	

	class Single {
        
		function Single($idarticle, $title, $summary,$namecategory, $namepage, $urlimage, $content, $linkarticle, $urlaudio, $createtime){
			$this->idArticle = $idarticle;
			$this->title = $title;
            $this->summary = $summary;
            $this->nameCategory = $namecategory;
            $this->namePage = $namepage;
            $this->urlImage = $urlimage;
            $this->content = $content;
            $this->linkArticle = $linkarticle;
            $this->urlAudio = $urlaudio;
            $this->createTime = $createtime;
			
		}
	}

    if (isset($_GET['idArticle'])) {
		$idArticle = $_GET['idArticle'];
		$query = "SELECT id_article,title, summary, categories.id_category,categories.name_category, pages.name_page, url_image, content, link_article, url_audio, create_time 
        FROM `articlesdetails`
        JOIN `categories` ON categories.id_category = articlesdetails.id_category
        JOIN `pages` ON pages.id_page = articlesdetails.id_page
        WHERE articlesdetails.id_article ='$idArticle'
        ";
	

	$datasingle = mysqli_query($conn,$query);

	while ($row = mysqli_fetch_assoc($datasingle)) {
		array_push($arraysingle, $single = new Single($row['id_article'],
											$row['title'],
                                            $row['summary'],
                                            $row['name_category'],
                                            $row['name_page'],
                                            $row['url_image'],
                                            $row['content'],
                                            $row['link_article'],
                                            $row['url_audio'],
                                            $row['create_time'],
                                        ));
	}
}
    
    $info = array("success"=>true, "news"=>$single);
    
	echo json_encode($info);
?>
