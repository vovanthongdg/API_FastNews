<?php
require "connect.php";

$array = array();

class GetByDay
{

    function GetByDay($idarticle, $title, $summary, $urlimage)
    {
        $this->idArticle = $idarticle;
        $this->title = $title;
        $this->summary = $summary;
        $this->urlIamge = $urlimage;
    }
}


    $query = "SELECT id_article,title, summary, url_image
        FROM `articlesdetails`
        ORDER BY create_time DESC";


    $data = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($data)) {
        array_push($array, $search = new GetByDay(
                                            $row['id_article'],
                                            $row['title'],
                                            $row['summary'],
                                            $row['url_image'],

        ));
}

$info = array("success" => true, "news" => $array);

echo json_encode($info);
?>