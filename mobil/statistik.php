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
<h2>Penjualan mobil : Cash</h2>
<table cellspacing="0" cellpadding="0" border="0" align="center" style="width:100%;">
			<tr>
				<th>Jumlah Penjualan Mobil</th>
				<th>Keuntungan</th>
				<th>Penjualan Pertama</th>
				<th>Penjualan Terakhir</th>
<?php
	include "conn.php";
	$query = mysql_query("select * from beli_cash");
	$q = mysql_num_rows($query);
	if($q > 0 ){
	$keuntungan = mysql_fetch_row(mysql_query("select sum(cash_bayar) from beli_cash"));
	$pertama = mysql_fetch_row(mysql_query("select cash_tanggal from beli_cash order by cash_tanggal desc"));
	$terakhir = mysql_fetch_row(mysql_query("select cash_tanggal from beli_cash order by cash_tanggal asc"));
		echo '<tr>';
		echo '<td align="center"><font>'.$q.' mobil</font></td>';
		echo '<td align="center"><font>Rp. '.$keuntungan[0].',00</font></td>';
		echo '<td align="center"><font>'.$pertama[0].'</font></td>';
		echo '<td align="center"><font>'.$terakhir[0].'</font></td>
		</tr>';
	}else{
		echo '<tr><td colspan="5" align="center"><font>Tidak ada data yang ditemukan</font></td></tr>';
	}
?>
</table>
<hr />

<h2>Penjualan mobil : Kredit</h2>
<table cellspacing="0" cellpadding="0" border="0" align="center" style="width:100%;">
			<tr>
				<th>Jumlah Kreditur</th>
				<th>Banyak Kredit Belum Terbayar</th>
				<th>Kredit Pertama</th>
				<th>Kredit Terakhir</th>
<?php
	$query = mysql_query("select * from bayar_cicilan");
	$q = mysql_num_rows($query);
	if($q > 0 ){
	$keuntungan = mysql_fetch_row(mysql_query("select sum(cicillan_sisa_harga) from bayar_cicilan"));
	$pertama = mysql_fetch_row(mysql_query("select tanggal_kredit from kredit order by tanggal_kredit desc"));
	$terakhir = mysql_fetch_row(mysql_query("select tanggal_kredit from kredit order by tanggal_kredit asc"));
		echo '<tr>';
		echo '<td align="center"><font>'.$q.' orang</font></td>';
		echo '<td align="center"><font>Rp. '.$keuntungan[0].',00</font></td>';
		echo '<td align="center"><font>'.$pertama[0].'</font></td>';
		echo '<td align="center"><font>'.$terakhir[0].'</font></td>
		</tr>';
	}else{
		echo '<tr><td colspan="5" align="center"><font>Tidak ada data yang ditemukan</font></td></tr>';
	}
?>
</table>
<hr />

<h2>Mobil dan Pembeli</h2>
<table cellspacing="0" cellpadding="0" border="0" align="center" style="width:45%; float:left;">
			<tr>
				<th>Jumlah Mobil</th>
				<th>Mobil Termahal</th>
				<th>Mobil Terbaru</th>
<?php
	$query = mysql_query("select * from mobil");
	$q = mysql_num_rows($query);
	if($q > 0 ){
	$max = mysql_fetch_row(mysql_query("select max(harga_mobil) from mobil"));
	$baru = mysql_fetch_row(mysql_query("select gambar from mobil order by gambar asc"));
		echo '<tr>';
		echo '<td align="center"><font>'.$q.' mobil</font></td>';
		echo '<td align="center"><font>Rp. '.$max[0].',00</font></td>';
		echo '<td align="center"><img src="img/'.$baru[0].'" style="height:100px;"/></td>
		</tr>';
	}else{
		echo '<tr><td colspan="5" align="center"><font>Tidak ada data yang ditemukan</font></td></tr>';
	}
?>
</table>

<div style="width:45%; float:right;">
	<p style="font-size:20px;" align="justify">Statistik menampilkan seluruh kejadian yang telah terjadi di Speechless Mobil guna mempermudah administrator untuk mengelola website.<br /><br />~ Luthfi Rahmad Hidayattullah</p>
</div>
<div style="clear:both;">
</div>
<hr />

</blockquote>
</div>