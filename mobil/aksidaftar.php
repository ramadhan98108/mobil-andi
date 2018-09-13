<?php
	include "conn.php";
	mysql_query("insert into admin values('$_POST[e]', '$_POST[u]', '".md5($_POST['p'])."', 'belum terdaftar')");
	header("location:login.php?error=bt");
?>