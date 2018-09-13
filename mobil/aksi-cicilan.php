<?php
	include "conn.php";
	$d = date("Y-m-d");
	$jc = $_POST['cicilan_sisa_ke'] - 1;
	$ck = $_POST['cicilan_ke'] + 1;
	$csk = $_POST['cicillan_sisa_harga']-$_POST['nilai_cicilan'];
	mysql_query("update bayar_cicilan
				set tanggal_cicilan = '$d',
				cicilan_sisa_ke = '$jc',
				cicilan_ke = '$ck',
				cicillan_sisa_harga = '$csk'
				where kode_cicilan = '$_POST[id]'
	");
	header("location:index.php?l=pembeli");
?>