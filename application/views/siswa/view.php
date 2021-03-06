<div class="row">
  <div class="col-lg-5" style="clear:both;">
    <form class="form-inline" method="post" action="<?php echo base_url()?>siswa">
      <div class="col-lg-2">
        <select class="form-control" name="kelas" autofocus>
        <option value="">Semua Kelas</option>
        <?php foreach ($kelas->result_array() as $nkelas): ?>
          <option value="<?php echo $nkelas['id_kelas']; ?>"><?php echo $nkelas['nm_kelas']; ?></option>
        <?php endforeach ?>
        </select>
      </div>
      <div class="col-lg-2 col-lg-offset-2">
        <select class="form-control" name="thn_akademik" autofocus>
        <option value="">Tahun Akademik</option>
        <?php foreach ($thn_akademik->result_array() as $sthn_akademik): ?>
          <option value="<?php echo $sthn_akademik['id_th_akademik']; ?>"><?php echo $sthn_akademik['th_ajaran']; ?></option>
        <?php endforeach ?>
        </select>
      </div>
      <div class="col-lg-1 col-lg-offset-3">
        <button type="submit" class="btn btn-info"><li class="fa fa-search"></li> Cari</button>
      </div>
      
    </form>
  </div>
  <div class="col-lg-2 col-lg-offset-1">
    <a href="<?php echo base_url() ?>siswa/laporansiswa" type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
  </div>
  <div class="col-lg-2 col-lg-offset-2">
    <a href="<?php echo base_url() ?>siswa/input" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Siswa</a>
  </div>
</div>
<br>
<?php 
if(count($siswa)){ ?>

<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th width="120">Foto</th>
        <th>NIS</th>
        <th>Nama Lengkap</th>
        <th width="10">L/P</th>
        <th>Tempat dan Tanggal Lahir</th>
        <th>Alamat</th>
        <th width="180">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach ($siswa as $result) { ?>
        <tr>
          <td>
            <?php if($result['foto_siswa']){ ?>
              <img src="<?php echo base_url('assets/img/siswa/'.$result['foto_siswa'])?>" class="img-responsive avatar-view" style="height: 155px; width: 140px">
            <?php 
            }else{ ?>
              <img src="<?php echo base_url('assets/img/default.png')?>" class="img-responsive avatar-view" width="120px">
            <?php } ?>
            
          </td>
          <td><?php echo $result['nis'] ?></td>
          <td><?php echo $result['nama_lengkap'] ?></td>
          <td><?php echo $result['gender'] ?></td>
          <td><?php echo $result['tempat_lahir'].', '.tgl_indo($result['tgl_lahir']) ?></td>
          <td><?php echo $result['alamat'];?></td>
          <td align="center">
            <a href="<?php echo base_url('siswa/detail/'.$result['nis'])?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Detail</a>
            <a href="<?php echo base_url()?>siswa/update/<?php echo $result['nis'] ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
            <a href="<?php echo base_url('siswa/hapus/'.$result['nis'])?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
          </td>
        </tr>
        
      <?php }
       ?>
    </tbody>
</table>

<a href="<?php base_url()?>siswa/printtt" type="button">Print</a>
<?php }else{ ?>
  <div class="panel panel-default">
    <div class="panel-body">
      <h4 align="center">Data tidak ditemukan</h4>
    </div>
  </div>
<?php }
?>
