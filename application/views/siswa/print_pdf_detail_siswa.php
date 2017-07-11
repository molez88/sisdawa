<!DOCTYPE html>
<html>
<head>
	<title>Print Detail Siswa</title>
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/smp.png">
	<link href="<?php echo base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<img src="assets/img/brand2.png" width="100%"><br><br>
	
  <h4><strong>A. KETERANGAN TENTANG DIRI SISWA</strong></h4>
	<table>
		<tbody>
			<tr>
  			<td width="25%">NIS</td>
  			<td>:</td>
  			<td width="73%"><?php echo $siswa_detail['nis'] ?></td>
  		</tr>
  		<tr>
  		<tr>
  			<td width="25%">Nama</td>
  			<td>:</td>
  			<td width="73%"><?php echo $siswa_detail['nama_lengkap'] ?></td>
  		</tr>
  		<tr>
  			<td width="25%">Jenis Kelamin</td>
  			<td>:</td>
  			<td width="73%">
  				<?php 
  				if ($siswa_detail['gender'] == 'L') {
  					echo "Laki-laki";
  				}else if($siswa_detail['gender'] == 'P'){
  					echo "Perempuan";
  				}else{
  					echo "-";
  				} ?>
  				
  			</td>
  		</tr>
  		<tr>
  			<td width="25%">Tempat dan Tanggal Lahir</td>
  			<td>:</td>
  			<td width="73%"><?php echo $siswa_detail['tempat_lahir'].', '.tgl_indo($siswa_detail['tgl_lahir']) ?></td>
  		</tr>
  		<tr>
  			<td width="25%">Agama</td>
  			<td>:</td>
  			<td width="73%"><?php echo $siswa_detail['agama'] ?></td>
  		</tr>
  		<tr>
  			<td width="25%">Status anak dalam keluarga</td>
  			<td>:</td>
  			<td width="73%"><?php echo $siswa_detail['status_dakel'] ?></td>
  		</tr>
  		<tr>
  			<td width="25%">Anak ke berapa</td>
  			<td>:</td>
  			<td width="73%"><?php echo $siswa_detail['anak_ke'] ?></td>
  		</tr>
  		<tr>
  			<td width="25%">Jumlah saudara</td>
  			<td>:</td>
  			<td width="73%"><?php echo $siswa_detail['jml_saudara'] ?></td>
  		</tr>
  		<tr>
  			<td width="25%">Alamat</td>
  			<td>:</td>
  			<td width="73%"><?php echo $siswa_detail['alamat'] ?></td>
  		</tr>
  		<tr>
  			<td width="25%">No.Telp/HP</td>
  			<td>:</td>
  			<td width="73%"><?php echo $siswa_detail['telp'] ?></td>
  		</tr>
  		<tr>
  			<td width="25%">Email</td>
  			<td>:</td>
  			<td width="73%"><?php echo $siswa_detail['email'] ?></td>
  		</tr>
  		<tr>
  			<td width="25%">Riwayat Kesehatan</td>
  			<td>:</td>
  			<td width="73%"><?php echo $siswa_detail['riwayat_kesehatan']; ?></td>
  		</tr>
  		<tr>
  			<td width="25%">Tahun Masuk</td>
  			<td>:</td>
  			<td width="73%"><?php echo $siswa_detail['thn_masuk']; ?></td>
  		</tr>
		</tbody>
	</table>
</body>
</html>