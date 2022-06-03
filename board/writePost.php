<?php  
    include"lib.php";

    $name = $_POST['name'];
    $idx = $_POST['idx'];
    $subject = $_POST['subject'];
    $memo = $_POST['memo'];
    $pwd = $_POST['pwd'];

    // mysql 인젝션 방어
    $name = mysqli_real_escape_string($connect, $name);
    $idx = mysqli_real_escape_string($connect, $idx);
    $subject = mysqli_real_escape_string($connect, $subject);
    $name = mysqli_real_escape_string($connect, $name);
    $pwd = mysqli_real_escape_string($connect, $pwd);

    // 비밀번호 암호화


    if($idx) {

        $query = "select * from sign_board where idx='$idx' and pwd='$pwd'";
        $result = mysqli_query($connect, $query);
        $data = mysqli_fetch_array($result);

        if(!$data['idx']) {
            echo "
            <script>
            alert('비밀번호가 달라 수정이 불가능 합니다.');
            history.back(1);
            </script>
            ";
            exit;
        }

        $query = "update sign_board set name='$name',
        subject='$subject',
        memo='$memo'
        where idx='$idx'";
    
        mysqli_query($connect, $query);
        
    } else {
        $date = date("Y-m-d H:i:s");
        $ip = $_SERVER["REMOTE_ADDR"];
    
        $query = "insert into sign_board(name, subject, memo, date, ip, pwd) 
            values('$name', '$subject', '$memo', '$date', '$ip', '$pwd')";
    
        mysqli_query($connect, $query);
    }
?>

<script>
    location.href='list.php';
</script>


