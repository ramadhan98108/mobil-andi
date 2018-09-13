<?php
	include ("conn.php");
	session_start();
	if(!isset($_SESSION['u'])){
		header("location:login.php");
	}
	if(empty($_GET['l'])){
		header("location:index.php?l=mobil");
	}
?>
<html>
	<head>
		<title>Speechless</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	
	<body>
		<div id="wrapper">
		
			<div id="sidebar">
			<div id="logo">
				<center><img src="img/logo.png" width="150" /><br />
				<font color="white" size="6" style="font-family:Brush Script MT;">Speechlelss Mobil</font></center>
			</div>
			<br />
			<center><form action="index.php" method="get">
			<input type="hidden" name="l" value="search">
			<input type="text" name="q" style="padding:6px; width:80%;" placeholder="cari sesuatu">
			<input type="submit" value="cari" style="padding:5px;">
			</form></center>
					<ul class="menu-sidebar">
						<li><font><img src="img/admin.png" /> <?php echo $_SESSION['u'];?></font></li>
						<li><a href="index.php?l=pemberitahuan"><img src="img/not.png" /> Pemberitahuan
						<?php $q=mysql_num_rows(mysql_query("select * from pemberitahuan"));
							echo "<font style='display:block; padding:5px; width:10px; background-color:orange; float:right; margin-top:-5px; margin-right:110px;'>".$q."</font>"
						?>
						</a></li>
						<li><a href="index.php?l=statistik"><img src="img/stat.png" /> Statistik</a></li>
						<li><a href="index.php?l=laporan"><img src="img/lap.png" /> Laporan</a></li>
						<li><a href="logout.php"><img src="img/log.png" /> Keluar</a></li>
					</ul>
			<div id="footer">
				<font color="white">Speechless Mobil<br />
				&copy; Speechless Group 2015
				</font>
			</div>
			</div>
			
			<div id="main">
				<div id="top">
				<menu class="menu">
					<ul>
						<li><a href="index.php?l=mobil" <?php if($_GET['l'] == "mobil"){echo "class='active'";}?>>Data Mobil</a></li>
						<li><a href="index.php?l=pembeli" <?php if($_GET['l'] == "pembeli"){echo "class='active'";}?>>Data Pembeli</a></li>
						<li><a href="index.php?l=paket" <?php if($_GET['l'] == "paket"){echo "class='active'";}?>>Data Paket</a></li>
						<li><a href="index.php?l=cicilan" <?php if($_GET['l'] == "cicilan"){echo "class='active'";}?>>Cicilan</a></li>
					</ul>
				</menu>
				</div>
				<?php
					if(!empty($_GET['l'])){
						if($_GET['l'] == "pembeli"){include "pembeli.php";}
						if($_GET['l'] == "tambah-pembeli"){include "tambah-pembeli.php";}
						if($_GET['l'] == "edit-pembeli"){include "edit-pembeli.php";}
						if($_GET['l'] == "mobil"){include "mobil.php";}
						if($_GET['l'] == "lihat-mobil"){include "lihat-mobil.php";}
						if($_GET['l'] == "edit-mobil"){include "edit-mobil.php";}
						if($_GET['l'] == "tambah-mobil"){include "tambah-mobil.php";}
						if($_GET['l'] == "search"){include "search.php";}
						if($_GET['l'] == "transaksi-mobil"){include "transaksi-mobil.php";}
						if($_GET['l'] == "beli-kredit"){include "beli-kredit.php";}
						if($_GET['l'] == "paket"){include "paket.php";}
						if($_GET['l'] == "tambah-paket"){include "tambah-paket.php";}
						if($_GET['l'] == "beli-cash"){include "beli-cash.php";}
						if($_GET['l'] == "cicilan"){include "cicilan.php";}
						if($_GET['l'] == "bayar-cicilan"){include "bayar-cicilan.php";}
						if($_GET['l'] == "statistik"){include "statistik.php";}
						if($_GET['l'] == "pemberitahuan"){include "pemberitahuan.php";}
						if($_GET['l'] == "konfirmasi"){include "konfirmasi.php";}
						if($_GET['l'] == "laporan"){include "kredit.php";}
					}
				?>
			</div>
		
		</div>
	</body>
	
</html>