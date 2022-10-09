<?php
session_start();
include('db.php');

if(isset($_POST['id']) && isset($_POST['pw'])) {
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $pw = mysqli_real_escape_string($db, $_POST['pw']);

    
    
  
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
     
    else {
        $sql = "select * from member where mb_id = '$id'";
        $result = mysqli_query($db, $sql);
        
        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $hash = $row['password'];

            if(password_verify($pw, $hash)) {

                $_SESSION['mb_id'] = $row['mb_id'];
                
                header("location: member.php");
                exit();
            } 
            else {
                echo
                "<script>alert('비밀번호가 잘못입력되었습니다.');
                history.back();
                </script>";
            }
        

        }
        else {
            echo
            "<script>alert('아이디가 잘못입력되었습니다.');
            history.back();
            </script>";
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


