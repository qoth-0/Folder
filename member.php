<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>웹사이트 구현</title>
        <style>
        </style>
    </head>
    <body>
        <form action="logout.php" method="post">
        <h1>빡공팟_ 웹사이트 만들기</h1>
        <hr>
            <p style="float:right;  margin-top:-2px; margin-right:2px;">   
            <input type="image" src="top_01-1 (1).gif" alt="로그아웃" >    
            </p>
            <h3><?php echo $_SESSION['mb_id']; ?>님, 환영합니다.
            <ul style="list-style: none;">
                <li>
                    <a href="board.php">
                        <img src="l_board_07.gif" alt="비밀게시판">
                    </a>
                </li>        
                
            </ul>        
        
            

        </form>
        
    </body>
</html>