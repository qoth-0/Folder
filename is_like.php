<?php

include $_SERVER['DOCUMENT_ROOT']."/db_b.php";

$bno = $_GET['idx'];
$is_like= "select is_like from board where idx='$bno';";
$result = mysqli_query($db, $is_like);
$is_like = mq("update board set is_like = is_like + 1 where idx = $bno");

    echo
    "<script>alert('추천되었습니다.');
    location.replace('board.php');
    </script>";

    ?>

