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
		color:black;
	}
	
	td{
		padding:5px;
		background-color:#cecece;
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
	include "conn.php";
	$query = mysql_query("select * from pemberitahuan order by id desc");
	$q = mysql_num_rows($query);
	if($q > 0 ){
		while($r=mysql_fetch_row($query)){
		if($r[1] == "admin" && $r[3]=="telah terdaftar"){
		echo '<table cellspacing="0" cellpadding="0" border="0" align="center" style="width:100%; margin-bottom:1px;"><tr>
		<td width="50px" align="center"><img src="img/admin.png" /></td>
		<td align="center"><font>'.$r[2].' telah terdaftar sebagai admin.</font></td></tr>
		</table>';
		}
		elseif($r[1] == "admin" && $r[3]=="Menunggu konfirmasi"){
		echo '<table cellspacing="0" cellpadding="0" border="0" align="center" style="width:100%; margin-bottom:1px;"><tr>
		<td width="50px" align="center"><img src="img/admin.png" /></td>
		<td align="center"><a href="index.php?l=konfirmasi&id='.$r[2].'" style="display:block; width:100%; height:100%;">'.$r[2].' ingin mendaftar sebagai admin.</font></td></tr>
		</table>';
		}
		
		elseif($r[1] == "mobil" && $r[3] == "insert"){
		$q=mysql_fetch_array(mysql_query("select * from mobil where kode_mobil = '".$r[2]."'"));
		echo '<table cellspacing="0" cellpadding="0" border="0" align="center" style="width:100%; margin-bottom:1px;"><tr>
		<td width="50px" align="center"><img src="img/ok.png" /></td>
		<td align="center"><a href="index.php?l=lihat-mobil&id='.$q[0].'" style="display:block; width:100%; height:100%;">mobil '.$q[1].' telah berhasil ditambahkan.</font></td></tr>
		</table>';
		}elseif($r[1] == "mobil" && $r[3] == "update"){
		$q=mysql_fetch_array(mysql_query("select * from mobil where kode_mobil = '".$r[2]."'"));
		echo '<table cellspacing="0" cellpadding="0" border="0" align="center" style="width:100%; margin-bottom:1px;"><tr>
		<td width="50px" align="center"><img src="img/ok.png" /></td>
		<td align="center"><a href="index.php?l=lihat-mobil&id='.$q[0].'" style="display:block; width:100%; height:100%;">mobil '.$q[1].' telah berhasil diupdate.</font></td></tr>
		</table>';
		}elseif($r[1] == "mobil" && $r[3] == "delete"){
		$q=mysql_fetch_array(mysql_query("select * from mobil where kode_mobil = '".$r[2]."'"));
		echo '<table cellspacing="0" cellpadding="0" border="0" align="center" style="width:100%; margin-bottom:1px;"><tr>
		<td width="50px" align="center"><img src="img/del.png" /></td>
		<td align="center"><a href="index.php?l=mobil" style="display:block; width:100%; height:100%;">mobil '.$q[1].' telah berhasil dhapus.</font></td></tr>
		</table>';
		}
		elseif($r[1] == "cicilan" && $r[3] == "insert"){
		$q=mysql_fetch_array(mysql_query("select * from bayar_cicilan, kredit, pembeli where bayar_cicilan.kode_kredit = kredit.kode_kredit and kredit.ktp = pembeli.ktp and bayar_cicilan.kode_cicilan = '".$r[2]."'"));
		echo '<table cellspacing="0" cellpadding="0" border="0" align="center" style="width:100%; margin-bottom:1px;"><tr>
		<td width="50px" align="center"><img src="img/cicil.png" /></td>
		<td align="center"><a href="index.php?l=pembeli" style="display:block; width:100%; height:100%;"> '.$q['nama_pembeli'].' telah membayar cicilan.</font></td></tr>
		</table>';
		}
		
		}
	}else{
		echo '<tr><td colspan="5" align="center"><font>Tidak ada data yang ditemukan</font></td></tr>';
	}
?>
<hr />
</blockquote>
</div>