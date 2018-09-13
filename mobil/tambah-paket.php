
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
			<div style="width:400px; height:170px; background-color:white; margin-left:auto; margin-right:auto; margin-top:120px;">
			<table border="0" cellpadding="0" cellspacing="0" align="center" style="width:95%;">
				<form action="input-paket.php" method="post" enctype="multipart/form-data">
				<tr>
					<td colspan="2" style="background-color:orange; text-align:center;">Tambah data paket</td>
				</tr>
				
				<tr>
					<td style="width:50%;">Uang Muka</td>
					<td style="width:50%;"><input style="width:100%;" type="text" name="uang_muka" /></td>					
				</tr>
				
				<tr>
					<td style="width:50%;">Jumlah Cicilan</td>
					<td style="width:50%;">
					<select name="paket_jumlah_cicilan">
						<option value="12">12 Bulan</option>
						<option value="24">24 Bulan</option>
						<option value="36">36 Bulan</option>
					</select>
					</td>					
				</tr>
				
				<tr>
					<td colspan="2"><input type="submit" value="Simpan" style="width:100%;"></td>
				</tr>
				
			</table>
			</div>
		
		</div>