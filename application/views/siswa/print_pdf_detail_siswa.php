<!DOCTYPE html>
<html>
<head>
	<title>Print Detail Siswa</title>
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/smp.png">
	<link href="<?php echo base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<img src="assets/img/brand2.png" width="100%"><br><br>

  <h4><b>A. KETERANGAN TENTANG DIRI SISWA</b></h4>
	<table cellpadding="2" cellspacing="2">
		<tbody>
			<tr>
        <td>NIS</span></td>
        <td width="3%">:</td>
        <td><?php echo $siswa_detail['nis'];?></td>
      </tr>
  		<tr>
  			<td>Nama</td>
  			<td>:</td>
  			<td><?php echo $siswa_detail['nama_lengkap'] ?></td>
  		</tr>
  		<tr>
  			<td>Jenis Kelamin</td>
  			<td>:</td>
  			<td>
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
  			<td>TTL</td>
  			<td>:</td>
  			<td><?php echo $siswa_detail['tempat_lahir'].', '.tgl_indo($siswa_detail['tgl_lahir']) ?></td>
  		</tr>
  		<tr>
  			<td>Agama</td>
  			<td>:</td>
  			<td><?php echo $siswa_detail['agama'] ?></td>
  		</tr>
  		<tr>
  			<td>Status dalam keluarga</td>
  			<td>:</td>
  			<td><?php echo $siswa_detail['status_dakel'] ?></td>
  		</tr>
  		<tr>
  			<td>Anak ke</td>
  			<td>:</td>
  			<td><?php echo $siswa_detail['anak_ke'] ?></td>
  		</tr>
  		<tr>
  			<td>Jumlah saudara</td>
  			<td>:</td>
  			<td><?php echo $siswa_detail['jml_saudara'] ?></td>
  		</tr>
  		<tr>
  			<td>Alamat</td>
  			<td>:</td>
  			<td><?php echo $siswa_detail['alamat'] ?></td>
  		</tr>
  		<tr>
  			<td>No.Telp/HP</td>
  			<td>:</td>
  			<td><?php echo $siswa_detail['telp'] ?></td>
  		</tr>
  		<tr>
  			<td>Email</td>
  			<td>:</td>
  			<td><?php echo $siswa_detail['email'] ?></td>
  		</tr>
  		<tr>
  			<td>Riwayat Kesehatan</td>
  			<td>:</td>
  			<td><?php echo $siswa_detail['riwayat_kesehatan']; ?></td>
  		</tr>
  		<tr>
  			<td>Tahun Masuk</td>
  			<td>:</td>
  			<td><?php echo $siswa_detail['thn_masuk']; ?></td>
  		</tr>
      <tr>
        <td>Kartu Perlindungan Sosial (KPS/PKH)</td>
        <td>:</td>
        <td><?php echo $siswa_detail['kps']; ?></td>
      </tr>
      <tr>
        <td>Kartu Keluarga Miskin (KKM)</td>
        <td>:</td>
        <td><?php echo $siswa_detail['kkm']; ?></td>
      </tr>
      <tr>
        <td>Kartu Indonesia Pintar (KIP)</td>
        <td>:</td>
        <td><?php echo $siswa_detail['kip']; ?></td>
      </tr>
      <tr>
        <td>Kartu Menuju Sejahtera (KMS)</td>
        <td>:</td>
        <td><?php echo $siswa_detail['kms']; ?></td>
      </tr>
      <tr>
        <td>Kartu Keluarga Sejahtera (KKS)</td>
        <td>:</td>
        <td><?php echo $siswa_detail['kks']; ?></td>
      </tr>
		</tbody>
	</table>
  <br>

  <h4><b>B. KETERANGAN AYAH KANDUNG</b></h4>
  <table cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td width="51%">NIK</span></td>
        <td width="3%">:</td>
        <td><?php echo $ayah_detail['nik_ayah'];?></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?php echo $ayah_detail['ayah_nama'];?></td>
      </tr>
      <tr>
        <td>TTL</td>
        <td>:</td>
        <td><?php echo $ayah_detail['ayah_tempat_lahir'].', '.tgl_indo($ayah_detail['ayah_tgl_lahir']) ?></td>
      </tr>
      <tr>
        <td>Agama</td>
        <td>:</td>
        <td><?php echo $ayah_detail['agama'] ?></td>
      </tr>
      <tr>
        <td>Pendidikan</td>
        <td>:</td>
        <td><?php echo $ayah_detail['nama_pendidikan'] ?></td>
      </tr>
      <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td><?php echo $ayah_detail['nama_pekerjaan'] ?></td>
      </tr>
      <tr>
        <td>Penghasilan</td>
        <td>:</td>
        <td><?php echo $ayah_detail['penghasilan'] ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $ayah_detail['ayah_alamat'] ?></td>
      </tr>
      <tr>
        <td>No.Telp/HP</td>
        <td>:</td>
        <td><?php echo $ayah_detail['ayah_telp'] ?></td>
      </tr>
      
    </tbody>
  </table>
  <br>

  <h4><b>C. KETERANGAN IBU KANDUNG</b></h4>
  <table cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td width="57%">NIK</span></td>
        <td width="3%">:</td>
        <td><?php echo $ibu_detail['nik_ibu'];?></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?php echo $ibu_detail['ibu_nama'];?></td>
      </tr>
      <tr>
        <td>TTL</td>
        <td>:</td>
        <td><?php echo $ibu_detail['ibu_tempat_lahir'].', '.tgl_indo($ibu_detail['ibu_tgl_lahir']) ?></td>
      </tr>
      <tr>
        <td>Agama</td>
        <td>:</td>
        <td><?php echo $ibu_detail['agama'] ?></td>
      </tr>
      <tr>
        <td>Pendidikan</td>
        <td>:</td>
        <td><?php echo $ibu_detail['nama_pendidikan'] ?></td>
      </tr>
      <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td><?php echo $ibu_detail['nama_pekerjaan'] ?></td>
      </tr>
      <tr>
        <td>Penghasilan</td>
        <td>:</td>
        <td><?php echo $ibu_detail['penghasilan'] ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $ibu_detail['ibu_alamat'] ?></td>
      </tr>
      <tr>
        <td>No.Telp/HP</td>
        <td>:</td>
        <td><?php echo $ibu_detail['ibu_telp'] ?></td>
      </tr>
      
    </tbody>
  </table>
  <br><br>

  <h4><b>D. KETERANGAN WALI</b></h4>
  <table cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td width="51%">NIK</span></td>
        <td width="3%">:</td>
        <td><?php echo $wali_detail['nik_wali'];?></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?php echo $wali_detail['wali_nama'];?></td>
      </tr>
      <tr>
        <td>TTL</td>
        <td>:</td>
        <td><?php echo $wali_detail['wali_tempat_lahir'].', '.tgl_indo($wali_detail['wali_tgl_lahir']) ?></td>
      </tr>
      <tr>
        <td>Agama</td>
        <td>:</td>
        <td><?php echo $wali_detail['agama'] ?></td>
      </tr>
      <tr>
        <td>Pendidikan</td>
        <td>:</td>
        <td><?php echo $wali_detail['nama_pendidikan'] ?></td>
      </tr>
      <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td><?php echo $wali_detail['nama_pekerjaan'] ?></td>
      </tr>
      <tr>
        <td>Penghasilan</td>
        <td>:</td>
        <td><?php echo $wali_detail['penghasilan'] ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $wali_detail['wali_alamat'] ?></td>
      </tr>
      <tr>
        <td>No.Telp/HP</td>
        <td>:</td>
        <td><?php echo $wali_detail['wali_notelp'] ?></td>
      </tr>
      
    </tbody>
  </table>
  <!-- <br><br><br><br><br>
  <div style="text-align: right;">
    <p style="margin-right: 5px">Kepala Sekolah</p> <br><br><br><br>
    M. Bakhrun Widada, S.T. <br>
    NBM. 649.742
  </div> -->
</body>
</html>