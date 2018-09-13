 <?php
	include "conn.php";
	if(!empty($_FILES['gambar']['name'])){
		mysql_query("update mobil set kode_mobil = '".$_POST['kode_mobil']."',
								merk = '".$_POST['merk']."',
								type = '".$_POST['type']."',
								warna = '".$_POST['warna']."',
								harga_mobil = '".$_POST['harga_mobil']."',
								gambar = '".$_FILES['gambar']['name']."'
								where kode_mobil = '".$_POST['id']."'
		");
		move_uploaded_file($_FILES['gambar']['tmp_name'], "img/".$_FILES['gambar']['name']);
	}else{
		mysql_query("update mobil set kode_mobil = '".$_POST['kode_mobil']."',
								merk = '".$_POST['merk']."',
								type = '".$_POST['type']."',
								warna = '".$_POST['warna']."',
								harga_mobil = '".$_POST['harga_mobil']."'
								where kode_mobil = '".$_POST['id']."'
		");
	}
	header("location:index.php?l=mobil");
 ?>