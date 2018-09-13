
<style>
td{
	font-family:calibri;
	padding:5px;
}
input{
	padding:5px;
}
</style>
<?php
	if(empty($_GET['id'])){header("location:index.php?l=mobil");}
	$query = mysql_query("select * from mobil where kode_mobil = '".$_GET['id']."'");
	$q = mysql_num_rows($query);
	$r = mysql_fetch_array($query);
	if($q > 0){
		echo '
		<div style="width:100%; height:100%; background-image:url('; echo "'img/".$r['gambar']."');"; echo' background-size:100%, 100%; background-color:#cecece; background-repeat:;">
		<br style="clear:both;" />
			<div style="width:400px; height:330px; background-color:white; margin-left:auto; margin-right:auto; margin-top:120px;">
			<table border="0" cellpadding:0; cellspacing:0; align="center" style="width:95%;">
				<form action="edit-mobil2.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="'.$r['kode_mobil'].'">
				<tr>
					<td colspan="2" style="background-color:orange; text-align:center;">Edit data mobil '.$r['merk'].'</td>
				</tr>
				
				<tr>
					<td style="width:50%;">Kode Mobil</td>
					<td style="width:50%;"><input style="width:100%;" type="text" name="kode_mobil" value="'.$r['kode_mobil'].'" /></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Merk Mobil</td>
					<td style="width:50%;"><input style="width:100%;" type="text" name="merk" value="'.$r['merk'].'" /></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Tipe Mobil</td>
					<td style="width:50%;"><input style="width:100%;" type="text" name="type" value="'.$r['type'].'" /></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Warna Mobil</td>
					<td style="width:50%;"><input style="width:100%;" type="text" name="warna" value="'.$r['warna'].'" /></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Harga Mobil</td>
					<td style="width:50%;"><input style="width:100%;" type="text" name="harga_mobil" value="'.$r['harga_mobil'].'" /></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Gambar Mobil</td>
					<td style="width:50%;"><input type="file" name="gambar" /></td>					
				</tr>
				
				<tr>
					<td colspan="2"><input type="submit" value="Simpan" style="width:100%;"></td>
				</tr>
				
			</table>
			</div>
		
		</div>
		';
	}else{
			echo "<br />
<br />
<br /><center><font>Tidak ada data yang ditemukan</font></center>";
	}
?>