

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    
</head>
<body>
    <form action="login_server.php" method="post">
    <h1>빡공팟_ 웹사이트 만들기</h1>
    <hr>
        <h2>로그인</h2>
        <fieldset>
            <table>
                <tr>
                    <td><label>아이디<td><input name="id" type="text"></td></label></td>
                    
                </tr>
                <tr>
                    <td><label>비밀번호<td><input name="pw" type="password"></td></label></td>
                    
                </tr>
                
            </table>
            <input type="button" value="회원가입" onclick="location.href = 'join.php'">
            <input type="submit" name="login_btn" value="로그인" >
        </fieldset>
    </form>
</body>
</html>