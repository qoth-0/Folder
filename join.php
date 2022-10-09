<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    
</head>
<body>
    <form action="server.php" method="post">
    <h1>빡공팟_ 웹사이트 만들기</h1>
    <hr>
        <h2>회원가입</h2>
        <fieldset>
            <table>
                <tr>
                    <td><label>아이디<td><input name="id" type="text"></td></label></td>
                    
                </tr>
                <tr>
                    <td><label>비밀번호<td><input name="pw" type="password"></td></label></td>
                    
                </tr>
                <tr>
                    <td><label>비밀번호 확인<td><input name="r_pw" type="password"></td></label></td>
                    
                </tr>
                <tr>
                    <td><label for="email">이메일</label></td></label></td>
                    <td><input type="email" name="email" value="" /></td>
                </tr>
            </table>
            <input type="button" value="뒤로가기" onclick="history.back()">
            <input type="submit" value="가입하기" >
        </fieldset>
    </form>
</body>
</html>