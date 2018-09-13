<html>
	<head>
		<title>
			Login | Speechless Mobil
		</title>
	</head>
	
	<body>
		<div style="position:absolute; top:0; left:0; width:100%; height:100%; background-color:black;">
				<center><img src="img/logo.png" width="150" style="margin-top:50px;" /><br />
				<font color="white" size="6" style="font-family:Brush Script MT;">Speechlelss Mobil</font></center>
			
				<table border="0" align="center" width="300px" style="margin-top:50px;">
				<form action="aksilogin.php" method="post">
					<tr>
						<td><input type="text" name="u" placeholder="Username"  style="padding:10px; width:100%;"/></td>
					</tr>
					<tr>
						<td><input type="password" name="p" placeholder="Password" style="padding:10px; width:100%;"/></td>
					</tr>
					<tr>
						<td><input type="submit" value="Login" style="padding:5px; width:100%;"/></td>
					</tr>
					</form>
				</table>
				<br />
				<br />
				
				<?php
					if(!empty($_GET['error'])){
						if($_GET['error'] == "bm"){
							echo '<center><font color="red" face="calibri">Username tersebut belum terdaftar sebagai admin? daftar <a href="#" style="color:red;">disini</a></font></center>';
						}elseif($_GET['error'] == "bt"){
							echo '<center><font color="red" face="calibri">Anda harus menunggu konfirmasi dari web master</a></font></center>';	
						}else{
							header("location:login.php");
						}
					}else{
						echo '<center><font color="white" face="calibri">Belum terdaftar sebagai admin? daftar <a href="daftar-admin.php" style="color:white;">disini</a></font></center>';
					}
				?>
			<div style="width:100%; height:40px; background-color:white; position:fixed; left:0; bottom:0;">
				<center><font face="calibri">Speechless Mobil<br />
				&copy; Speechless Group 2015
				</font></center>
			</div>
		</div>
	</body>
	
</html>