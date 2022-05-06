<?php

    header("Content-Type: application/json");

    include "db.php";

    $db->orderBy("RAND ()");
    $list = $db->get('dong', 100);

    echo json_encode($list);

?>