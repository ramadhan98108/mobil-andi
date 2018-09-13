
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
	if(empty($_GET['id'])){header("location:pembeli.php");}
	$query = mysql_query("select * from pembeli where ktp = '".$_GET['id']."'");
	$q = mysql_num_rows($query);
	$r = mysql_fetch_array($query);
	if($q > 0){
		echo '
		<div style="width:100%; height:100%; background-color:#cecece;">
		<br style="clear:both;" />
			<div style="width:400px; height:330px; background-color:white; margin-left:auto; margin-right:auto; margin-top:120px;">
			<table border="0" cellpadding:0; cellspacing:0; align="center" style="width:95%;">
				<form action="edit-pembeli2.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="'.$r['ktp'].'">
				<tr>
					<td colspan="2" style="background-color:orange; text-align:center;">Edit data pembeli '.$r['nama_pembeli'].'</td>
				</tr>
				
				<tr>
					<td style="width:50%;">Nomor KTP</td>
					<td style="width:50%;"><input style="width:100%;" type="text" name="ktp" value="'.$r['ktp'].'" /></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Nama Pembeli</td>
					<td style="width:50%;"><input style="width:100%;" type="text" name="nama_pembeli" value="'.$r['nama_pembeli'].'" /></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Alamat Pembeli</td>
					<td style="width:50%;"><input style="width:100%;" type="text" name="alamat_pembeli" value="'.$r['alamat_pembeli'].'" /></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Telepon Pembeli</td>
					<td style="width:50%;"><input style="width:100%;" type="text" name="telelpon_pembeli" value="'.$r['telelpon_pembeli'].'" /></td>					
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