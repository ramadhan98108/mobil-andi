<?php
	include "conn.php";
	$d = date("Y-m-d");
	mysql_query("insert into pembeli values('$_POST[ktp]', '$_POST[nama_pembeli]', '$_POST[alamat_pembeli]', $_POST[telepon_pembeli])");
	mysql_query("insert into kredit values(null, '$_POST[ktp]', '$_POST[paket]', '$_POST[kode_mobil]', '$d', '$_POST[fotokopi_ktp]', '$_POST[fotokopi_kk]', '$_POST[fotokopi_slip_gaji]')");
	$r=mysql_fetch_row(mysql_query("select kode_kredit from kredit where ktp='$_POST[ktp]' and kode_mobil='$_POST[kode_mobil]'"));
	$q=mysql_fetch_row(mysql_query("select paket_jumlah_cicilan,uang_muka from paket_kredit where kode_paket='$_POST[paket]'"));
	$e=mysql_fetch_row(mysql_query("select harga_mobil from mobil where kode_mobil='$_POST[kode_mobil]'"));
	$qwe=$e[0]-$q[1];
	mysql_query("insert into bayar_cicilan values(null, '$r[0]', '$d', '$q[0]', 0, '$q[0]', '$qwe')");
	header("location:index.php?l=pembeli");
?>