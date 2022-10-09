<?php
	include $_SERVER['DOCUMENT_ROOT']."/db_b.php"; /* db load */
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>웹사이트 구현</title>
<link rel="stylesheet" type="text/css" href="/jquery-ui.css" />
<script type="text/javascript" src="/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/jquery-ui.js"></script>
<script type="text/javascript" src="/common1.js"></script>
<style>
    #board_read {
        width:900px;
        position: relative;
        word-break:break-all;
    }
    #user_info {
        font-size:14px;
    }
    #user_info ul li {
        float:left;
        margin-left:10px;
    }
    #bo_line {
        width:880px;
        height:2px;
        background: gray;
        margin-top:20px;
    }
    #bo_content {
        margin-top:20px;
    }
    #bo_ser {
        font-size:14px;
        color:#333;
        margin-top:30px;
        position: absolute;
        left: 0;
    }
    #bo_ser > ul > li {
        float:left;
        margin-left:10px;
    }
    .reply_view {
        width:900px;
        margin-top:150px; 
        word-break:break-all;
    }
    .dap_lo {
        font-size: 14px;
        padding:10px 0 15px 0;
        border-bottom: solid 1px gray;
    }
    .dap_to {
        margin-top:5px;
    }
    .rep_me {
        font-size:12px;
    }
    .rep_me ul li {
        float:left;
        width: 30px;
    }
    .dat_delete {
	    display:none;
    }	
    .dat_edit {
        display:none;
    }
    .dap_sm {
        position: absolute;
        top: 10px;
    }
    .dap_edit_t{
        width:520px;
        height:70px;
        position: absolute;
        top: 40px;
    }
    .re_mo_bt {
        position: absolute;
        top:40px;
        right: 5px;
        width: 90px;
        height: 72px;
    }
    #re_content {
        width:700px;
        height: 56px; 
    }
    .dap_ins {
        margin-top:50px;
    }
    .re_bt {
        position: absolute;
        width:100px;
        height:56px;
        font-size:16px;
        margin-left: 10px; 
    }
    #foot_box {
        height: 50px; 
    }
</style>
</head>
<body>
    <h1>빡공팟_ 웹사이트 만들기</h1>
    <hr>
    <h2>비밀 게시판</h2>
	<?php
		$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
		$hit = mysqli_fetch_array(mq("select * from board where idx ='".$bno."'"));
        $is_count = false;
        if (!isset($_COOKIE["board_{$bno}"])) {
            setcookie("board_{$bno}", $bno, time() + 60 * 60);
            $is_count = true;
        }

        if ($is_count) {
        $hit = mq("update board set hit = hit + 1 where idx = $bno");
        }
		$sql = mq("select * from board where idx='".$bno."'"); /* 받아온 idx값을 선택 */
		$board = $sql->fetch_array();

        
	?>
<!-- 글 불러오기 -->
<div id="board_read">
	<h2><?php echo $board['title']; ?></h2>
		<div id="user_info">
            
			<?php echo $board['name']; ?> <?php echo $board['date']; ?> 조회:<?php echo $board['hit'] + 1; ?> 추천:<?php echo $board['is_like']; ?>
            <a href="is_like.php?idx=<?php echo $board['idx']; ?>">추천하기</a>
				<div id="bo_line"></div>
			</div>
			<div id="bo_content">
				<?php echo nl2br("$board[content]"); ?>
			</div>
            <div>
				파일 : <a href="../../upload/<?php echo $board['file'];?>" download><?php echo $board['file']; ?></a>
			</div>
            
            
	<!-- 목록, 수정, 삭제 -->
	<div id="bo_ser">
	    <a href="board.php">목록으로</a></li>
		<a href="modify.php?idx=<?php echo $board['idx']; ?>">수정</a>
		<a href="delete.php?idx=<?php echo $board['idx']; ?>">삭제</a>
	</div>
</div>
<!--- 댓글 불러오기 -->
<div class="reply_view">
	<h3>댓글목록</h3>
		<?php
			$sql3 = mq("select * from reply where con_num='".$bno."' order by idx desc");
			while($reply = $sql3->fetch_array()){ 
		?>
		<div class="dap_lo">
			<div><b><?php echo $reply['name'];?></b></div>
			<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
			<div class="rep_me rep_menu">
				<a class="dat_edit_bt" href="#">수정</a>
				<a class="dat_delete_bt" href="#">삭제</a>
			</div>
			<!-- 댓글 수정 폼 dialog -->
			<div class="dat_edit">
				<form method="post" action="reply_modify.php">
					<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
					<input type="password" name="pw" class="dap_sm" placeholder="비밀번호" />
					<textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
					<input type="submit" value="수정하기" class="re_mo_bt">
				</form>
			</div>
			<!-- 댓글 삭제 비밀번호 확인 -->
			<div class='dat_delete'>
				<form action="reply_delete.php" method="post">
					<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
			 		<p>비밀번호<input type="password" name="pw" /> <input type="submit" value="확인"></p>
				 </form>
			</div>
		</div>
	<?php } ?>

	<!--- 댓글 입력 폼 -->
	<div class="dap_ins">
            <input type="hidden" name="bno" class="bno" value="<?php echo $bno; ?>">
			<input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디">
			<input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" placeholder="비밀번호">
			<div style="margin-top:10px; ">
				<textarea name="content" class="reply_content" id="re_content" ></textarea>
				<button id="rep_bt" class="re_bt">댓글</button>
			</div>
		</form>
	</div>
</div><!--- 댓글 불러오기 끝 -->
<div id="foot_box"></div>
</div>
</body>
</html>