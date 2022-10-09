<?php include  $_SERVER['DOCUMENT_ROOT']."/db_b.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>웹사이트 구현</title>
    <link rel="stylesheet" type="text/css" href="/board.css" />
</head>
<body>
<?php
 
  /* 검색 변수 */
  $catagory = $_GET['catgo'];
  $search_con = $_GET['search'];
?>
  <h1><?php echo $catagory; ?>에서 '<?php echo $search_con; ?>'검색결과</h1>
  <h4 style="margin-top:30px;"><a href="board.php">목록으로</a></h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120">작성자</th>
                <th width="100">작성일</th>
                <th width="100">조회수</th>
                <th width="100">추천수</th>
            </tr>
        </thead>
        <?php
          if($catagory == 'all') {
          
          $sql = mq("select * from board where (name like '%$search_con%') or (title like '%$search_con%') or (content like '%$search_con%')  order by idx desc");
          } 
          else if($catagory=='title' || 'name'|| 'content'){
            $sql = mq("select * from board where $catagory like '%$search_con%' order by idx desc");
          }
          while($board = $sql->fetch_array()){
           
          $title=$board["title"]; 
            if(strlen($title)>30)
              { 
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
              }
            $sql2 = mq("select * from reply where con_num='".$board['idx']."'");
            $rep_count = mysqli_num_rows($sql2);
        ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $board['idx']; ?></td>
          <td width="500"><?php 
          $lockimg = "<img src='/lock.png' alt='lock' title='lock' with='20' height='20' />";
          if($board['lock_post']=="1")
            { ?><a href='/lock.php?idx=<?php echo $board["idx"];?>'><?php echo $title, $lockimg;
              }else{  ?>
              <a href="/read.php?idx=<?php echo $board["idx"];?>"><?php echo $title;}?><span class="re_ct">[<?php echo $rep_count; ?>]</span></a></td>
          <td width="120"><?php echo $board['name']?></td>
          <td width="100"><?php echo $board['date']?></td>
          <td width="100"><?php echo $board['hit'] +1; ?></td>
          <td width="100"><?php echo $board['is_like'] ?></td>

        </tr>
      </tbody>

      <?php } ?>
    </table>
</body>
</html>
