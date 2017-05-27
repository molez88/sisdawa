
	<form class="form-inline" method="post" action="<?php echo base_url()?>siswa">
    <div class="row">
      <div class="col-md-2">
        <select class="form-control" name="kelas">
        <option value="">Semua Kelas</option>
        <?php foreach ($kelas->result_array() as $nkelas): ?>
          <option value="<?php echo $nkelas['id_kelas']; ?>"><?php echo $nkelas['nm_kelas']; ?></option>
        <?php endforeach ?>
        </select>
      </div>
      <div class="col-md-1">
        <button type="submit" class="btn btn-success"><li class="fa fa-search"></li> Cari</button>
      </div>

      <div class="col-md-2 col-md-offset-7">
        <a href="<?php echo base_url() ?>siswa/siswa_input" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Siswa</a>
      </div>
    </div>
    
    
	</form><br>
  
<?php 
if(count($siswa)){ ?>
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>NIS</th>
        <th>Nama Lengkap</th>
        <th>Tempat dan Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>No. Telp</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach ($siswa as $result) { ?>
        <tr>
          <td><?php echo $result['nisn'] ?></td>
          <td><?php echo $result['nama_lengkap'] ?></td>
          <td><?php echo $result['tempat_lahir'].', '.tgl_indo($result['tgl_lahir']) ?></td>
          <td><?php echo $result['gender'] ?></td>
          <td><?php echo $result['telp'] ?></td>
          <td align="center">
            <a href="<?php echo base_url('siswa/siswa_detail/'.$result['nisn'])?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-folder-open"></i> Detail</a>
            <a href="<?php echo base_url()?>siswa/siswa_update/<?php echo $result['nisn'] ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <a href="<?php echo base_url('siswa/siswa_hapus/'.$result['nisn'])?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
          </td>
        </tr>
        
      <?php }
       ?>
    </tbody>
</table>
<?php }else{ ?>
  <div class="panel panel-default">
    <div class="panel-body">
      <h4 align="center">Data tidak ditemukan</h4>
    </div>
  </div>
<?php }
?>

<div class="col-md-1">
  <button class="btn btn-default" type="button" name="print" value="Print" onclick="printPage('datatable-responsive');"><li class="fa fa-print"></li> Print</a>
</div>
<script type="text/javascript">
function printPage(id)
{
   var html="<html>";
   html+= document.getElementById(id).innerHTML;
   html+="</html>";

   var printWin = window.open('','','');
   printWin.document.write(html);
   printWin.document.close();
   printWin.focus();
   printWin.print();
   printWin.close();
}
</script>