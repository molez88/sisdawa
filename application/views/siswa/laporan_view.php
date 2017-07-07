<!DOCTYPE html>
<html>
<head>
  <link href="<?php echo base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/smp.png">
</head>
<body>
<div class="col-md-10 col-md-offset-1">
  <img src="<?php echo base_url() ?>assets/img/brand1.png" class="img-responsive" width="100%;"><br>
<div id="print">
  <form class="form-inline" method="post" action="<?php echo base_url()?>siswa/laporansiswa">
    <table>
      <td width="120">
        <select name="kelas">
        <option value="">Semua Kelas</option>
        <?php foreach ($kelas->result_array() as $nkelas): ?>
          <option value="<?php echo $nkelas['id_kelas']; ?>"><?php echo $nkelas['nm_kelas']; ?></option>
        <?php endforeach ?>
        </select>
      </td>
      <td width="150">
        <select name="thn_akademik">
        <option value="">Tahun Akademik</option>
        <?php foreach ($thn_akademik->result_array() as $sthn_akademik): ?>
          <option value="<?php echo $sthn_akademik['id_th_akademik']; ?>"><?php echo $sthn_akademik['th_ajaran']; ?></option>
        <?php endforeach ?>
        </select>
      </td>
      <td width="100">
        <button type="submit">Cari</button>
      </td>
      <td width="860">
        <button onClick="document.getElementById('print').style.visibility = 'hidden'; window.print();" type="button">Print</button>
      </td>
      <td>
        <button type="button" onClick="location.href='<?php echo base_url() ?>siswa'">Cancel</button>
      </td>
    </table>
    
  </form>
  </div>
  <br>
<?php 
if(count($siswa)){ ?>
<table class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th width="10">No.</th>
        <th width="10">NIS</th>
        <th>Nama Lengkap</th>
        <th width="10">L/P</th>
        <th>Tempat dan Tanggal Lahir</th>
        <th>Alamat</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $no = 1;
      foreach ($siswa as $result) { ?>
        <tr>
          <td align="center"><?php echo $no++ ?>.</td>
          <td><?php echo $result['nis'] ?></td>
          <td><?php echo $result['nama_lengkap'] ?></td>
          <td align="center"><?php echo $result['gender'] ?></td>
          <td><?php echo $result['tempat_lahir'].', '.tgl_indo($result['tgl_lahir']) ?></td>
          <td><?php echo $result['alamat'];?></td>
        </tr>
        
      <?php }
       ?>
    </tbody>
</table>
<?php }else{ 
  echo "<script language=javascript>alert('Data tidak ada.');</script>";
  redirect('siswa/laporansiswa','refresh');
}
?>
</div>

</body>
</html>