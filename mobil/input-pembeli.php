<?php
	include "conn.php";
			mysql_query("insert into pembeli values('".$_POST['ktp']."', '".$_POST['nama_pembeli']."', '".$_POST['alamat_pembeli']."', '".$_POST['telepon_pembeli']."')");
	header("location:index.php?l=pembeli");
?>