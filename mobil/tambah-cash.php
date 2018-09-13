<?php
	include "conn.php";
	$d = date("Y-m-d");
	$r = mysql_fetch_row(mysql_query("select harga_mobil from mobil where kode_mobil = '".$_POST['kode_mobil']."'"));
	
	mysql_query("insert into pembeli values('$_POST[ktp]', '$_POST[nama_pembeli]', '$_POST[alamat_pembeli]', $_POST[telepon_pembeli])");
	mysql_query("insert into beli_cash values(null, '$_POST[ktp]', '$_POST[kode_mobil]', '$d', '$r[0]')");
	header("location:index.php?l=pembeli");
?>