
<style>
td{
	font-family:calibri;
	padding:5px;
}
input{
	padding:5px;
}
</style>
		<div style="width:100%; height:100%; background-color:#cecece;">
		<br style="clear:both;" />
			<div style="width:400px; height:150px; background-color:white; margin-left:auto; margin-right:auto; margin-top:120px;">
			<table border="0" cellpadding="0" cellspacing="0" align="center" style="width:95%;">
				<form action="konfirmasi2.php?" method="post" enctype="multipart/form-data">
				<tr>
					<td colspan="2" style="background-color:orange; text-align:center;">Konfirmasi <b><?php echo $_GET['id'];?> </b>sebagai Admin</td>
				</tr>
				<?php
					$r=mysql_fetch_array(mysql_query("select * from admin where username = '$_GET[id]'"));
					if(empty($_GET['id'])){header("location:index.php?mobil");}
					echo '
					<input type="hidden" value="'.$r['email'].'" name="id">
				<tr>
					<td style="width:50%;">Email</td>
					<td style="width:50%;"><font>'.$r['email'].'</font></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Username</td>
					<td style="width:50%;"><font>'.$r['username'].'</font></td>					
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Konfirmasi" style="width:100%;"></td>
				</tr>';?>
				
			</table>
			</div>
		
		</div>