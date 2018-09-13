<?php
	include "conn.php";
	if(!empty($_FILES['gambar']['name'])){
	$tipe = strrev(substr(strrev($_FILES['gambar']['name']),0,5));
	$rand = rand(0000000, 9999999);
	$a = substr($_FILES['gambar']['name'],0,5);
	$nama =$a.$rand.$tipe;
			mysql_query("insert into mobil values('$_POST[kode_mobil]', '$_POST[merk]', '$_POST[type]', '$_POST[warna]', '$_POST[harga_mobil]', '".$nama."')");
			move_uploaded_file($_FILES['gambar']['tmp_name'], "img/".$nama);
		}else{
			mysql_query("insert into mobil values('$_POST[kode_mobil]', '$_POST[merk]', '$_POST[type]', '$_POST[warna]', '$_POST[harga_mobil]', 'no.jpg')");
		}
	
	header("location:index.php?l=mobil");;
?>