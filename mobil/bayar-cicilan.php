
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
	if(empty($_GET['id'])){header("location:index.php?l=cicilan");}
	$query = mysql_query("select * from kredit, bayar_cicilan, mobil,paket_kredit where paket_kredit.kode_paket=kredit.kode_paket and bayar_cicilan.kode_kredit = kredit.kode_kredit and kredit.kode_mobil = mobil.kode_mobil and kredit.kode_kredit= '".$_GET['id']."'");
	$q = mysql_num_rows($query);
	$r = mysql_fetch_array($query);
	$e=mysql_fetch_array(mysql_query("select nama_pembeli from pembeli where ktp='$r[1]'"));
	if($q > 0){
		echo '
		<div style="width:100%; height:100%; background-image:url('; echo "'img/".$r['gambar']."');"; echo' background-size:100%, 100%; background-color:#cecece; background-repeat:;">
		<br style="clear:both;" />
			<div style="width:400px; height:400px; background-color:white; margin-left:auto; margin-right:auto; margin-top:120px;">
			<table border="0" cellpadding:0; cellspacing:0; align="center" style="width:95%;">
				<form action="aksi-cicilan.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="'.$r['kode_cicilan'].'">
				<tr>
					<td colspan="2" style="background-color:orange; text-align:center;">Bayar Cicilan untuk '.$e['0'].'</td>
				</tr>
				
				<tr>
					<td style="width:50%;">Kode Cicilan</td>
					<td style="width:50%;"><font>'.$r['kode_cicilan'].'</font></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Kode Kredit</td>
					<td style="width:50%;"><font>'.$r['kode_kredit'].'</font></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Cicilan Terakhir</td>
					<td style="width:50%;"><font>'.$r['tanggal_cicilan'].'</font></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Jumlah Cicilan</td>
					<td style="width:50%;"><font>'.$r['jumlah_cicilan'].' kali</font></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Cicilan ke</td>
					<td style="width:50%;"><font>'.$r['cicilan_ke'].'</font></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Sisa Cicilan</td>
					<td style="width:50%;"><font>'.$r['cicilan_sisa_ke'].' kali</font></td>					
				</tr>';
				$sisa =  $r['cicillan_sisa_harga']-$r['uang_muka'];
				echo '<tr>
					<td style="width:50%;">Cicilan kurang</td>
					<td style="width:50%;"><font>Rp. '.$r['cicillan_sisa_harga'].'</font></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Bunga</td>
					<td style="width:50%;"><font>'.$r['bunga'].' %</font></td>					
				</tr>
				';
				$bunga = $r['bunga']/100;
				$nc = ((($r['harga_mobil'] - $r['uang_muka'])/$r['jumlah_cicilan'])+($bunga*$r['harga_mobil']));
				echo'<tr>
					<td style="width:50%;">Nilai Cicilan</td>
					<td style="width:50%;"><font><b>Rp. '.$nc.'</b></font></td>					
				</tr>
				<input type="hidden" name="nilai_cicilan" value="'.$nc.'">
				<input type="hidden" name="cicilan_sisa_ke" value="'.$r['cicilan_sisa_ke'].'">
				<input type="hidden" name="cicilan_ke" value="'.$r['cicilan_ke'].'">
				<input type="hidden" name="cicillan_sisa_harga" value="'.$r['cicillan_sisa_harga'].'">
				';
				
				$cicil = $r['cicilan_ke'] + 1;
				echo '<tr>
					<td colspan="2"><input type="submit" value="Bayar Cicilan ke-'.$cicil.'" style="width:100%;"></td>
				</tr>
				
			</table>
			<font>* setelah menekan tombol di atas akan otomatis mencetak laporan.</font>
			</div>
		
		</div>
		';
	}else{
			echo "<br />
<br />
<br /><center><font>Tidak ada data yang ditemukan</font></center>";
	}
?>