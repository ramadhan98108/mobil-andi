<?php 
include "conn.php";
	mysql_query("update admin set status= 'terdaftar' where email = '$_POST[id]'");
	header("location:index.php?mobil");
?>