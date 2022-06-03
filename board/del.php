<?php  
    include"lib.php";

    $idx = $_GET['idx'];
    $pwd = $_GET['pwd'];


    $idx = mysqli_real_escape_string($connect, $idx);
    $pwd = mysqli_real_escape_string($connect, $pwd);

    $query = "select * from sign_board where idx='$idx' and pwd='$pwd'";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);
    
    if(!$data['idx']) {
        echo "
        <script>
        alert('비밀번호가 달라 삭제가 불가능 합니다.');
        history.back(1);
        </script>
        ";
        exit;
    }

    $query = "delete from sign_board where idx='$idx' ";

    mysqli_query($connect, $query);
?>

<script>
    location.href='list.php';
</script>


