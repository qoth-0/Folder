<?php
include $_SERVER['DOCUMENT_ROOT']."/db_b.php";
$rno = $_POST['rno'];//댓글번호
$sql = mq("select * from reply where idx='".$rno."'"); //reply테이블에서 idx가 rno변수에 저장된 값을 찾음
$reply = $sql->fetch_array();

$bno = $_POST['b_no']; //게시글 번호
$sql2 = mq("select * from board where idx='".$bno."'");//board테이블에서 idx가 bno변수에 저장된 값을 찾음
$board = $sql2->fetch_array();

$pwk = $_POST['pw'];
$bpw = $reply['pw'];

if(password_verify($pwk, $bpw)) 
	{
        $sql3 = mq("update reply set content='".$_POST['content']."' where idx = '".$rno."'");//reply테이블의 idx가 rno변수에 저장된 값의 content를 선택해서 값 저장
        echo "<script>alert('수정되었습니다.');</script>";
    ?> 
    <script type="text/javascript">location.replace("read.php?idx=<?php echo $bno; ?>");</script>
    <?php 
	}else{
		echo "<script>alert('비밀번호가 틀립니다');history.back();</script>";
	}
 ?>


