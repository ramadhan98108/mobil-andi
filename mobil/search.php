<br />
<br />
<br />
<style>
	th{
	text-align:center;
	padding:5px;
	background-color:orange;
	color:white;
	font-family:calibri;
	}
	
	td a{
		text-decoration:none;
		color:orange;
	}
	
	td{
		padding:5px;
	}
	
	.tb{
	display:block; width:100%; height:100%; background-color:orange; font-size:38px; text-decoration:none; color:white;-moz-transition:background-color 1s;
	}
	
	.tb:hover{
		background-color:black;
		-moz-transition:background-color 1s;
	}
</style>

<div style="width:100%; overflow-y:scroll; height:85%;">
<blockquote>
<h2>Pembeli</h2>
<table cellspacing="0" cellpadding="0" border="0" align="center" style="width:100%;">
			<tr>
				<th>Nomor KTP</th>
				<th>Nama Pembeli</th>
				<th>Alamat Pembeli</th>
				<th>Telepon Pembeli</th>
				<th>Aksi</th>
<?php
	include "conn.php";
	$query = mysql_query("select * from pembeli where ktp like '%".$_GET['q']."%' or nama_pembeli like '%".$_GET['q']."%' or alamat_pembeli like '%".$_GET['q']."%'");
	$q = mysql_num_rows($query);
	if($q > 0 ){
		while($r=mysql_fetch_row($query)){
		echo '<tr>';
		for($i=0;$i<=3;$i++){
			echo '<td align="center"><font>'.$r[$i].'</font></td>';
		}
		$ccl = mysql_num_rows(mysql_query("select * from kredit where ktp ='$r[0]'"));
		$qwe = mysql_fetch_row(mysql_query("select * from kredit where ktp ='$r[0]'"));
		echo '
		<td align="center"><a href="hapus-pembeli.php?id='.$r[0].'">Hapus</a> |
		<a href="index.php?l=edit-pembeli&id='.$r[0].'"> Edit</a>';
		if ($ccl > 0){
			echo ' |</font><a href="index.php?l=bayar-cicilan&id='.$qwe[0].'">  Bayar Cicilan</a>';
		}
		echo '</td>
		</tr>';
		}
	}else{
		echo '<tr><td colspan="5" align="center"><font>Tidak ada data yang ditemukan</font></td></tr>';
	}
?>
</table>
<hr />
<?php echo "<center><font>$q data ditemukan</font></center>";?>
<h2>Mobil</h2>
<table cellspacing="0" cellpadding="0" border="0" align="center" style="width:100%;">
			<tr>
				<th width="100px">Kode Mobil</th>
				<th>Merk Mobil</th>
				<th>Tipe</th>
				<th>Warna</th>
				<th>Harga</th>
				<th>Gambar</th>
				<th>Aksi</th>
<?php
	include "conn.php";
	$query = mysql_query("select * from mobil where kode_mobil like '%".$_GET['q']."%' or merk like '%".$_GET['q']."%' or type like '%".$_GET['q']."%' or harga_mobil like '%".$_GET['q']."%'");
	$q = mysql_num_rows($query);
	if($q > 0 ){
		while($r=mysql_fetch_row($query)){
		echo '<tr>';
		for($i=0;$i<=4;$i++){
			echo '<td align="center"><font>'.$r[$i].'</font></td>';
		}
		echo '
		<td align="center"><img src="img/'.$r[5].'" width="100px"></td>
		<td align="center"><a href="index.php?l=lihat-mobil&id='.$r[0].'">Lihat</a></td>
		</tr>';
		}
	}else{
		echo '<tr><td colspan="7" align="center"><font>Tidak ada data yang ditemukan</font></td></tr>';
	}
?>
</table>
<hr />
<?php echo "<center><font>$q data ditemukan</font></center>";?>
</blockquote>
</div>