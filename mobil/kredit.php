<br />
<br />
<br />
<style>
	th{
	width:20%;
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
<h2>Pembeli Kredit</h2>
<table cellspacing="0" cellpadding="0" border="0" align="center" style="width:100%;">
			<tr>
				<th>Nomor KTP</th>
				<th>Nama Pembeli</th>
				<th>Alamat Pembeli</th>
				<th>Mobil</th>
				<th>Harga Mobil</th>
				<th>Gambar Mobil</th>
<?php
	include "conn.php";
	$query = mysql_query("select * from pembeli, kredit, mobil where kredit.kode_mobil = mobil.kode_mobil and kredit.ktp = pembeli.ktp");
	$q = mysql_num_rows($query);
	if($q > 0 ){
		while($r=mysql_fetch_array($query)){
		echo '<tr>';
		echo '<td align="center"><font>'.$r['ktp'].'</font></td>';
		echo '<td align="center"><font>'.$r['nama_pembeli'].'</font></td>';
		echo '<td align="center"><font>'.$r['alamat_pembeli'].'</font></td>';
		echo '<td align="center"><font>'.$r['merk'].'</font></td>';
		echo '<td align="center"><font>'.$r['harga_mobil'].'</font></td>';
		echo '<td align="center"><img src="img/'.$r['gambar'].'" width="100px" /></td>';
		
		echo '
		</tr>';
		}
	}else{
		echo '<tr><td colspan="5" align="center"><font>Tidak ada data yang ditemukan</font></td></tr>';
	}
?>
</table>
<hr />


<h2>Pembeli Cash</h2>
<table cellspacing="0" cellpadding="0" border="0" align="center" style="width:100%;">
			<tr>
				<th>Nomor KTP</th>
				<th>Nama Pembeli</th>
				<th>Alamat Pembeli</th>
				<th>Mobil</th>
				<th>Harga Mobil</th>
				<th>Gambar Mobil</th>
<?php
	include "conn.php";
	$query = mysql_query("select * from pembeli, beli_cash, mobil where beli_cash.kode_mobil = mobil.kode_mobil and beli_cash.ktp = pembeli.ktp");
	$q = mysql_num_rows($query);
	if($q > 0 ){
		while($r=mysql_fetch_array($query)){
		echo '<tr>';
		echo '<td align="center"><font>'.$r['ktp'].'</font></td>';
		echo '<td align="center"><font>'.$r['nama_pembeli'].'</font></td>';
		echo '<td align="center"><font>'.$r['alamat_pembeli'].'</font></td>';
		echo '<td align="center"><font>'.$r['merk'].'</font></td>';
		echo '<td align="center"><font>'.$r['harga_mobil'].'</font></td>';
		echo '<td align="center"><img src="img/'.$r['gambar'].'" width="100px" /></td>';
		
		echo '
		</tr>';
		}
	}else{
		echo '<tr><td colspan="5" align="center"><font>Tidak ada data yang ditemukan</font></td></tr>';
	}
?>
</table>
<hr />
 <?php if(!empty($_GET['l'])){
	echo '<a href="kredit.php"><input type="button" value="Cetak"></a>';
 }else{
	echo '<input type="submit"onclick="print();" value="Cetak">';
 }?>

</blockquote>
</div>