<?php
	include $_SERVER['DOCUMENT_ROOT']."/db_b.php";
   
	$bno = $_GET['idx'];
	$sql = mq("select * from board where idx='$bno';");
	$board = $sql->fetch_array();
 ?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" href="/css/style.css" />
</head>
    <body>
        <h1>빡공팟_ 웹사이트 만들기</h1>
        <hr>
        <h2>비밀 게시판</h2>
        <form action="modify_server.php?idx=<?php echo $bno; ?>" method="post" enctype="multipart/form-data">
        <fieldset>
            <table>
                <tr>
                    <td><textarea name="title" id="utitle" rows="1" cols="50" placeholder="제목" required><?php echo $board['title']; ?></textarea></td>
                </tr>
                <tr>
                    <td><textarea name="name" id="uname" rows="1" cols="50" placeholder="작성자" required><?php echo $board['name']; ?></textarea></td>
                </tr>
                <tr>
                    <td><textarea name="content" id="ucontent" rows="20" cols="50" placeholder="내용" required><?php echo $board['content']; ?></textarea></td>
                </tr>
                
                <tr>
                    <td><input type="submit" value="게시물 수정"></td>
                </tr>
            </table>
        </fieldset>
        
        </form>
         
    </body>
</html>