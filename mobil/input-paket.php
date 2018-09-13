<?php
	include "conn.php";
	if($_POST['paket_jumlah_cicilan'] == 12){
		$q = 1;
	}elseif($_POST['paket_jumlah_cicilan'] == 24){
		$q = 2;
	}else{
		$q = 3;
	}
	
	$a = 100/$_POST['paket_jumlah_cicilan'];
	mysql_query("insert into paket_kredit values(null, '100', '$_POST[uang_muka]', '$_POST[paket_jumlah_cicilan]', '$q', '$a')");
	header("location:index.php?l=paket");
?>