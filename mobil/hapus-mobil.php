<?php
	include ("conn.php");
	mysql_query("delete from mobil where kode_mobil = '".$_GET['id']."'");
	header("location:index.php?l=mobil");
?>