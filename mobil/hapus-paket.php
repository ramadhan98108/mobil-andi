<?php
	include "conn.php";
	mysql_query("delete from paket_kredit where kode_paket= '".$_GET['id']."'");
	header("location:index.php?l=paket");
?>