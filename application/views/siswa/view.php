
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
    </div>
    
	</form><br>

<?php 
if(count($siswa)){ ?>
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Foto</th>
        <th>NISN</th>
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
          <td align="center"><img src="<?php echo base_url('assets/img/siswa/'.$result['foto_siswa']); ?>" class="img-responsive" height="100px" width="100px"></td>
          <td><?php echo $result['nisn'] ?></td>
          <td><?php echo $result['nama_lengkap'] ?></td>
          <td><?php echo $result['tempat_lahir'].', '.$result['tgl_lahir'] ?></td>
          <td><?php echo $result['gender'] ?></td>
          <td><?php echo $result['telp'] ?></td>
          <td>
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a> ||
            <a href="" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a> ||
            <a href="" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
          </td>
        </tr>
        
      <?php }
       ?>
    </tbody>
</table>
<?php }else{
  echo "data kosong";
}
?>