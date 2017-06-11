
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
        <button type="submit" class="btn btn-info"><li class="fa fa-search"></li> Cari</button>
      </div>

      <div class="col-md-1 col-md-offset-1">
        <a href="<?php echo base_url() ?>siswa/printtt" type="button" class="btn btn-default"><i class="glyphicon glyphicon-print"></i> Opsi Print</a>
      </div>

      <div class="col-md-2 col-md-offset-5">
        <a href="<?php echo base_url() ?>siswa/input" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Siswa</a>
      </div>
    </div>
    
    
	</form><br>
  
<?php 
if(count($siswa)){ ?>
<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Foto</th>
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
          <td><img src="<?php echo base_url('assets/img/siswa/'.$result['foto_siswa'])?>" class="img-responsive avatar-view" width="120px"></td>
          <td><?php echo $result['nis'] ?></td>
          <td><?php echo $result['nama_lengkap'] ?></td>
          <td><?php echo $result['tempat_lahir'].', '.tgl_indo($result['tgl_lahir']) ?></td>
          <td><?php echo $result['gender'] ?></td>
          <td><?php echo $result['telp'] ?></td>
          <td align="center">
            <a href="<?php echo base_url('siswa/detail/'.$result['nis'])?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-folder-open"></i> Detail</a>
            <a href="<?php echo base_url()?>siswa/update/<?php echo $result['nis'] ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <a href="<?php echo base_url('siswa/hapus/'.$result['nis'])?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
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
