<br />
<br />
<br />
<style>
	td{
	width:25%;
	text-align:center;
	padding:5px;
	}
	
	td a{
		text-decoration:none;
		padding:5px;
		display:block;
		width:100%;
		color:white;
		border-radius:3px;
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
<?php
	$query = mysql_query("select * from mobil");
	$q = mysql_num_rows($query);
	
	if($q > 0 ){
		while($r=mysql_fetch_array($query)){
		echo '
		<div style="float:left; margin-right:20px; width:30%; height:auto; border:3px solid black; border-radius:10px; background-color:#F3F3F3; margin-bottom:20px;">
		<img src="img/'.$r['gambar'].'" style="width:100%; border-radius:5px; height:220px;" /><br />
		<center><font><h2>'.$r['merk'].'</h2></font></center>
		<table cellpadding="0" border="0" style="width:90%;" align="center">
			<tr>
				<td><a href="index.php?l=lihat-mobil&id='.$r['kode_mobil'].'" style="background-color:orange;">Lihat</a></td>
				<td><a href="index.php?l=edit-mobil&id='.$r['kode_mobil'].'" style="background-color:orange;">Edit</a></td>
				<td><a href="hapus-mobil.php?id='.$r['kode_mobil'].'" style="background-color:orange;">Hapus</a></td>
				<td><a href="index.php?l=transaksi-mobil&id='.$r['kode_mobil'].'" style="background-color:orange;">Beli</a></td>
		</table>
		</div>
		';
		}
	}else{
		echo '<center><font>Tidak ada data yang ditemukan</font></center>';
	}
?>
		<div style="position:fixed; bottom:0; height:50px; width:80%; left:20%; text-align:center; margin-top:40px;">
		<a class="tb" href="index.php?l=tambah-mobil">+ Tambah Data</a>
		</div>
</blockquote>
</div>