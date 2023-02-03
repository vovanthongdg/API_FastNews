<?php
require "connect.php";

$arraysearch = array();

class Search
{

    function Search($idarticle, $title, $summary, $urlimage)
    {
        $this->idArticle = $idarticle;
        $this->title = $title;
        $this->summary = $summary;
        $this->urlImage = $urlimage;
    }
}

if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $query = "SELECT id_article,title, summary, url_image
        FROM `articlesdetails`
        WHERE lower (articlesdetails.title) LIKE '%$keyword%'";


    $datasearch = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($datasearch)) {
        array_push($arraysearch, $search = new Search(
                                            $row['id_article'],
                                            $row['title'],
                                            $row['summary'],
                                            $row['url_image'],

        ));
    }
}

$info = array("success" => true, "news" => $arraysearch);

echo json_encode($info);
?>