<?php
header('Content-Type: text/html; charset=utf-8');
$db = mysqli_connect('localhost','root','psy7064011','board') or die('DB 접속 실패');
$db->set_charset("utf8");

function mq($sql)
	{
		global $db;
		return $db->query($sql);
	}
?>