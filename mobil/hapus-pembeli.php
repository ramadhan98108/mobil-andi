<?php
	include "conn.php";
	mysql_query("delete from pembeli where ktp = '".$_GET['id']."'");
	header("location:index.php?l=pembeli");
?>