<?php

include('db.php');

if(isset($_POST['id']) && isset($_POST['pw']) && isset($_POST['r_pw']) && isset($_POST['email']))
{
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $pw = mysqli_real_escape_string($db, $_POST['pw']);
    $r_pw = mysqli_real_escape_string($db, $_POST['r_pw']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
   
  
    if(empty($id)){
        echo 
        "<script>alert('아이디를 입력하세요.');
        history.back();
        </script>";
    }

    else if(empty($pw)) {
        echo
        "<script>alert('비밀번호를 입력하세요.');
        history.back();
        </script>";
    }
    else if(empty($r_pw)) {
        echo
        "<script>alert('비밀번호를 확인하세요.');
        history.back();
        </script>";
    }

    else if($pw !== $r_pw) {
        echo
        "<script>alert('비밀번호가 일치하지 않습니다.');
        history.back();
        </script>";
    }
    else {
        $pw = password_hash($pw, PASSWORD_DEFAULT);
        $sql_same = "SELECT * FROM member where mb_id = '$id'";
        $order = mysqli_query($db, $sql_same);
        
        if(mysqli_num_rows($order) > 0) {
            echo
            "<script>alert('사용중인 아이디입니다.');
            history.back();
            </script>";

        }
        else {
            $sql_save = "insert into member(mb_id, password, email) values('$id','$pw', '$email')";
            $result = mysqli_query($db, $sql_save);

            if($result) {
                echo
                "<script>alert('성공적으로 가입되었습니다.');
                location.replace('login.php');
                </script>";

            }
            else {
                echo
                "<script>alert('가입에 실패하였습니다.');
                history.back();
                </script>";
            }
        }
    }
}
else {
    echo
    "<script>alert('오류가 발생하였습니다.');
    history.back();
    </script>";
}

?>


