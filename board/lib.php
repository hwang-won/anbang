<?php
    error_reporting(1);
    ini_set("display_errors", 1);
    
    $connect = mysqli_connect("localhost", "root", "971025", "test1");

    if(mysqli_connect_error()) {
        echo "오류";
        echo mysqli_connect_error();
    }
?>