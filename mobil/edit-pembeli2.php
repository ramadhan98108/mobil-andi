 <?php
	include "conn.php";
		mysql_query("update pembeli set ktp = '".$_POST['ktp']."',
								nama_pembeli = '".$_POST['nama_pembeli']."',
								alamat_pembeli = '".$_POST['alamat_pembeli']."',
								telelpon_pembeli = '".$_POST['telelpon_pembeli']."'
								where ktp = '".$_POST['id']."'
		");
	header("location:index.php?l=pembeli");
 ?>