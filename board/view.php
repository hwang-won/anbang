<?php
    include "lib.php";
    $idx = $_GET['idx'];
    $idx = mysqli_real_escape_string($connect, $idx);

    $query = "select * from sign_board where idx='$idx'";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>안방</title>
</head>
<body>
    <body>
        <!-- navbar -->
        <nav id="navbar">
            <div class="navbar__logo">
                <i></i>
                <a href="../index.html">안방</a>
            </div>
            <div>
                <ul class="navbar__menu">
                    <a href="../index.html">
                        <li class="navbar__menu__item">지도</li>
                    </a>
                    <a href="list.php">
                        <li class="navbar__menu__item">게시판</li>
                    </a>
                </ul>
            </div>
            <div>
                로그인
            </div>
        </nav>
    
        <!-- section (board) -->
        <section id="board">
            <div class="board__list">
                <form action="writePost.php" method="post">
                <table class="board__list__write">
                    <tr>
                        <th>이름</th>
                        <td><?php echo $data['name']?></td>
                    </tr>
                    <tr>
                        <th>제목</th>
                        <td><?php echo $data['subject']?></td>
                    </tr>
                    <tr>
                        <th>내용</th>
                        <td><?php echo nl2br($data['memo'])?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="list.php">목록</a>

                            <div style="float:right;">
                                <a href="#" onclick="chkPassword();">삭제</a>
                                <a href="write.php?idx=<?php echo $idx?>">수정</a>
                            </div>
                        </td>
                    </tr>
                </table>
                </form>
                <script>
                    function chkPassword() {
                        var a = prompt('비밀번호를 입력해 주세요');
                        
                        if(a) {
                            location.href='del.php?idx=<?php echo $idx?>&pwd='+a;
                        } else {
                            alert('비밀번호를 입력해야 삭제가 가능합니다.'); 
                        }
                    }
                </script>
            </div>
        </section>
    </body>
</body>
</html>