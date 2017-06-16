<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table>
    <thead>
      <tr>
        <th width="10">No.</th>
        <th width="10">NIS</th>
        <th>Nama Lengkap</th>
        <th width="10">L/P</th>
        <th>Tempat dan Tanggal Lahir</th>
        <th>No. Telp</th>
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
          <td><?php echo $result['telp'] ?></td>
        </tr>
        
      <?php }
       ?>
    </tbody>
</table>