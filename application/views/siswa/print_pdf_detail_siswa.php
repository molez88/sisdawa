<!DOCTYPE html>
<html>
<head>
	<title>Print Detail Siswa</title>
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/smp.png">
</head>
<body>
	<img src="assets/img/brand1.png" width="100%"><br>
	<table>
		<tbody>
			<tr>
				<td colspan="3"><h4><strong>A. KETERANGAN AYAH KANDUNG</strong></h4></td>
			</tr>
			<tr>
  			<td width="25%">Nama</td>
  			<td>:</td>
  			<td width="73%"><?php echo $ayah_detail['ayah_nama'] ?></td>
  		</tr>
  		
  	</tbody>
	</table>
	<hr>
  			<img src="assets/img/siswa/<?php echo $siswa_detail['foto_siswa'] ?>" width="100%">
</body>
</html>