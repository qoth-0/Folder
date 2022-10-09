<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
</head>
<body>
    <h1>빡공팟_ 웹사이트 만들기</h1>
    <hr>
    <h2>비밀 게시판</h2>
    <form action="write_server.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <table>
            <tr>
                <td><textarea name="title" id="utitle" rows="1" cols="50" placeholder="제목" required></textarea></td>
            </tr>
            <tr>
                <td><textarea name="name" id="uname" rows="1" cols="50" placeholder="작성자" required></textarea></td>
            </tr>
            <tr>
                <td><textarea name="content" id="ucontent" rows="20" cols="50" placeholder="내용" required></textarea></td>
            </tr> 
            <tr>
                <td><input type="file" value="1" name="b_file" /></td>
            </tr>
            <tr>
                <td><input type="password" name="pw" id="upw"  placeholder="비밀번호" required /></td>
            </tr>
            <tr>
                <td><input type="checkbox" value="1" name="lockpost" />해당글을 잠급니다.</td>
            </tr>
            <tr>
                <td><input type="submit" value="게시물 작성"></td>
            </tr>
        </table>
    </fieldset>
    </form>
    
    </body>
</html>