<?php

    header("Content-Type: application/json");

    $lat1 = $_GET['lat1'];
    $lng1 = $_GET['lng1'];
    $lat2 = $_GET['lat2'];
    $lng2 = $_GET['lng2'];
    $level = $_GET['level'];


    include "db.php";

//    $query = "select * from dong
//        where lat>='$lat1' and lng>='$lng1'
//        and lat<='$lat2' and lng<= '$lng2'
//    ";

    $limit = 10;
    if($level==1) $limit = 50;
    if($level>=2) $limit = 100;



    $db->where ("( lat>=? and lng>=? and lat<=? and lng<=? )", Array($lat1,$lng1,$lat2,$lng2));
    $db->orderBy("RAND ()");
    $list = $db->get('dong', $limit);

    echo json_encode($list);

?>