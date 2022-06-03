<?php
    include "lib.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css" />
    <script src="https://kit.fontawesome.com/7395e48b31.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
    <title>안방</title>
</head>
    <body>
        <!-- navbar -->
        <nav id="navbar">
            <div class="navbar__logo">
                <i class="fas fa-seedling"></i>
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
        </nav>
    
        <!-- section (board) -->
        <section id="board">
            <div class="board__list">
                <table class="board__list__table">
                    <tr>
                        <th> No. </th>
                        <th> 제목 </th>
                        <th> 작성자 </th>
                        <th> 작성일자</th>
                    </tr>
                    <?php 
                        $query = "select * from sign_board order by idx desc";
                        $result = mysqli_query($connect, $query);

                        while($data = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td> <?php echo $data['idx']?> </td>
                            <td> <a href="view.php?idx=<?php echo $data['idx']?>"> <?php echo $data['subject']?></a></td>
                            <td> <?php echo $data['name']?> </td>
                            <td> <?php echo $data['date']?> </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </section>
        <section id="write">
            <div class="board__write">
                <a href="write.php">글쓰기</a>
            </div>
        </section>
    </body>
</html>