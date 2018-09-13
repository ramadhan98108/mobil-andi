<style>
td{
	font-family:calibri;
}

td a{
		text-decoration:none;
		padding:5px;
		display:block;
		width:100%;
		color:white;
		border-radius:3px;
	}
</style>
<?php
	if(empty($_GET['id'])){header("location:mobil.php");}
	$query = mysql_query("select * from mobil where kode_mobil = '".$_GET['id']."'");
	$q = mysql_num_rows($query);
	$r=mysql_fetch_array($query);
	if($q > 0){
		echo'
		<div style="width:100%; height:100%; background-image:url('; echo "'img/".$r['gambar']."');"; echo'background-size:100%, 100%; background-color:#cecece;">
		<div style="position:absolute; bottom:0; right:0; background-color:#FFFFFF; width:350px; height:300px;">
		<center><h2>'.$r['merk'].'<h2></center>
		<blockquote>
		<table>
			<tr>
				<td width="150px">Kode Mobil</td>
				<td width="50px">:</td>
				<td width="150px">'.$r['kode_mobil'].'</td>
			</tr>
			
			<tr>
				<td>Harga Mobil</td>
				<td>:</td>
				<td>Rp. '.$r['harga_mobil'].',-</td>
			</tr>
			
			<tr>
				<td>Tipe Mobil</td>
				<td>:</td>
				<td>'.$r['type'].'</td>
			</tr>
			
			<tr>
				<td>Warna Mobil</td>
				<td>:</td>
				<td>'.$r['warna'].'</td>
			</tr>
		</table>
		</blockquote>
		<hr />
		<table cellpadding="0" border="0" style="width:90%;" align="center">
			<tr>
				<td style="width:25%; text-align:center;"><a href="index.php?l=lihat-mobil&id='.$r['kode_mobil'].'" style="background-color:orange;">Lihat</a></td>
				<td style="width:25%; text-align:center;"><a href="index.php?l=edit-mobil&id='.$r['kode_mobil'].'" style="background-color:orange;">Edit</a></td>
				<td style="width:25%; text-align:center;"><a href="hapus-mobil.php?id='.$r['kode_mobil'].'" style="background-color:orange;">Hapus</a></td>
				<td style="width:25%; text-align:center;"><a href="index.php?l=transaksi-mobil&id='.$r['kode_mobil'].'" style="background-color:orange;">Beli</a></td>
		</table>
		<br />
		<center><font>Speechless Mobil</font></center>
		</div>
		</div>
		';
	}

?>