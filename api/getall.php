<?php
require "connect.php";

$arrayarticle = array();

class All
{
    function All($idarticle, $title, $summary, $idcategory,$namecategory, $pagename, $urlimage, $content, $linkarticle, $createtime)
    {
        $this->idArticle = $idarticle;
        $this->title = $title;
        $this->summary = $summary;
        $this->idCategory = $idcategory;
        $this->nameCategory = $namecategory;
        $this->pageName = $pagename;
        $this->urlImage = $urlimage;
        $this->content = $content;
        $this->linkArticle = $linkarticle;
        $this->createTime = $createtime;
    }
}


$query = "SELECT id_article,title, summary, categories.id_category,categories.name_category, pages.name_page, url_image, content, link_article, create_time 
                FROM `articlesdetails` 
                JOIN categories on articlesdetails.id_category=categories.id_category
                JOIN pages ON articlesdetails.id_page=pages.id_page";


$dataarticle = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($dataarticle)) {
    array_push($arrayarticle, new All(
        $row['id_article'],
        $row['title'],
        $row['summary'],
        $row['id_category'],
        $row['name_category'],
        $row['name_page'],
        $row['url_image'],
        $row['content'],
        $row['link_article'],
        $row['create_time'],
    ));
}

$info = array("success"=>true, "news"=>$arrayarticle);

echo json_encode($info);

?>
