 
<style>
td{
	font-family:calibri;
	padding:5px;
}
input{
	padding:5px;
}
</style>
<?php if(!empty($_GET['id'])){	
	if(empty($_GET['id'])){header("location:mobil.php");}
	$query = mysql_query("select * from mobil where kode_mobil = '".$_GET['id']."'");
	$q = mysql_num_rows($query);
	$r=mysql_fetch_array($query);
	if($q > 0){
echo '<div style="width:100%; height:100%; background-image:url('; echo "'img/".$r['gambar']."');"; echo'background-size:100%, 100%; background-color:#cecece;">';
}
}else{
echo '<div style="width:100%; height:100%; background-color:#cecece;">';
}
?>
		<br style="clear:both;" />
			<div style="width:400px; height:420px; background-color:white; margin-left:auto; margin-right:auto; margin-top:120px;">
			<table border="0" cellpadding="0" cellspacing="0" align="center" style="width:95%;">
				<form action="tambah-kredit.php" method="post" enctype="multipart/form-data">
				<tr>
					<td colspan="2" style="background-color:orange; text-align:center;">Beli Mobil</td>
				</tr>
				
				<tr>
					<td style="width:50%;">Nomor KTP</td>
					<td style="width:50%;"><input style="width:100%;" type="text" name="ktp" /></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Nama Pembeli</td>
					<td style="width:50%;"><input style="width:100%;" type="text" name="nama_pembeli" /></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Alamat Pembeli</td>
					<td style="width:50%;"><input style="width:100%;" type="text" name="alamat_pembeli" /></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Telepon Pembeli</td>
					<td style="width:50%;"><input style="width:100%;" type="text" name="telepon_pembeli" /></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Paket</td>
					<td style="width:50%;">
					<?php
						$query=mysql_query("select kode_paket, paket_jumlah_cicilan from paket_kredit");
						$q = mysql_num_rows($query);
						if($q >0){
						echo '<select name="paket">';
							while($r=mysql_fetch_array($query)){
								echo "<option value='".$r['kode_paket']."'>".$r['paket_jumlah_cicilan']." bulan</option>";
							}
						echo "</select>
						<a href='index.php?l=paket'><img src='img/help.png' title='lihat daftar paket'></a>
						";
						}else{
						echo '
						<input type="hidden" value="0" name="paket">
						<font>Tidak ada paket yang terbuat. <a href="index.php?l=tambah-paket" style="text-decoration:none; color:orange;">Tambah Paket</a></font>';
						}
					?>
					</td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Mobil</td>
					<td style="width:50%;">
					<?php
						$query=mysql_query("select merk, kode_mobil from mobil");
						$q = mysql_num_rows($query);
						if($q >0){
						echo '<select name="kode_mobil">';
							while($r=mysql_fetch_array($query)){
								echo "<option value='".$r['kode_mobil']."'";if($r['kode_mobil']==$_GET['id']){echo "selected";}echo">".$r['merk']."</option>";
							}
						echo "</select>
						<a href='index.php?l=lihat-mobil&id=".$_GET['id']."'><img src='img/help.png' title='lihat mobil lebih rinci'></a>
						";
						}else{
						echo '<font>Tidak ada mobil yang terdata. <a href="index.php?l=tambah-mobil" style="text-decoration:none; color:orange;">Tambah Mobil</a></font>';
						}
					?>
					</td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Fotokopi KTP</td>
					<td style="width:50%;">
						<input type="radio" name="fotokopi_ktp" value="1">Ya</input>
						<input type="radio" name="fotokopi_ktp" value="0" checked>Tidak</input>
					</td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Fotokopi KK</td>
					<td style="width:50%;">
						<input type="radio" name="fotokopi_kk" value="1">Ya</input>
						<input type="radio" name="fotokopi_kk" value="0" checked>Tidak</input>
					</td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Fotokopi Slip Gaji</td>
					<td style="width:50%;">
						<input type="radio" name="fotokopi_slip_gaji" value="1">Ya</input>
						<input type="radio" name="fotokopi_slip_gaji" value="0" checked>Tidak</input>
					</td>					
				</tr>
				
				<tr>
					<td colspan="2"><input type="submit" value="Simpan" style="width:100%;"></td>
				</tr>
				
			</table>
			</div>
		
		</div>