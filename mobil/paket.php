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
<table cellspacing="0" cellpadding="0" border="0" align="center" style="width:100%;">
			<tr>
				<th>Kode Paket</th>
				<th>Harga Paket</th>
				<th>Uang Muka</th>
				<th>Paket Jumlah Cicilan</th>
				<th>Bunga</th>
				<th>Nilai Cicilan</th>
				<th>Aksi</th>
<?php
	include "conn.php";
	$query = mysql_query("select * from paket_kredit");
	$q = mysql_num_rows($query);
	if($q > 0 ){
		while($r=mysql_fetch_row($query)){
		echo '<tr>';
			echo '<td align="center"><font>'.$r[0].'</font></td>';
			echo '<td align="center"><font>'.$r[1].' %</font></td>';
			echo '<td align="center"><font>Rp. '.$r[2].'</font></td>';
			echo '<td align="center"><font>'.$r[3].' bulan</font></td>';
			echo '<td align="center"><font>'.$r[4].' %</font></td>';
			echo '<td align="center"><font>'.$r[5].' %</font></td>';
		echo '
		<td align="center"><a href="hapus-paket.php?id='.$r[0].'">Hapus</a></td>
		</tr>';
		}
	}else{
		echo '<tr><td colspan="5" align="center"><font>Tidak ada data yang ditemukan</font></td></tr>';
	}
?>
</table>
<hr />
<p>
*Paket digunakan untuk menghitung jumlah cicilan, bunga, serta nilai cicilan yang akan dibayar pembeli setiap bulannya berdasarkan mobil yang akan dibeli.
<br /> % = dihitung dari harga cash mobil.
</p>
<div style="position:fixed; bottom:0; height:50px; width:80%; left:20%; text-align:center; margin-top:40px;">
		<a class="tb" href="index.php?l=tambah-paket">+ Tambah Data</a>
		</div>
</blockquote>
</div>