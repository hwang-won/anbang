<?php  
    include"lib.php";

    $name = $_POST['name'];
    $idx = $_POST['idx'];
    $subject = $_POST['subject'];
    $memo = $_POST['memo'];

    $name = mysqli_real_escape_string($connect, $name);
    $idx = mysqli_real_escape_string($connect, $idx);
    $subject = mysqli_real_escape_string($connect, $subject);
    $memo = mysqli_real_escape_string($connect, $memo);

    if($idx) {
        $query = "update sign_board set name='$name',
        subject='$subject',
        memo='$memo'
        where idx='$idx'";
    
        mysqli_query($connect, $query);
        
    } else {
        $date = date("Y-m-d H:i:s");
        $ip = $_SERVER["REMOTE_ADDR"];
    
        $query = "insert into sign_board(name, subject, memo, date, ip) 
            values('$name', '$subject', '$memo', '$date', '$ip')";
    
        mysqli_query($connect, $query);
    }
?>

<script>
    location.href='list.php';
</script>


