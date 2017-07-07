
	<form class="form-inline" method="post" action="<?php echo base_url()?>transaksikelas">
    <div class="row">
      <div class="col-md-2">
        <select class="form-control" name="kelas">
        <option value="">Semua Kelas</option>
        <?php foreach ($kelas->result_array() as $nkelas): ?>
          <option value="<?php echo $nkelas['id_kelas']; ?>"><?php echo $nkelas['nm_kelas']; ?></option>
        <?php endforeach ?>
        </select>
      </div><div class="col-md-2">
        <select class="form-control" name="th_akademik">
        <option value="">Tahun Akademik</option>
        <?php foreach ($thakademik->result_array() as $thakademiks): ?>
          <option value="<?php echo $thakademiks['id_th_akademik']; ?>"><?php echo $thakademiks['th_ajaran']; ?></option>
        <?php endforeach ?>
        </select>
      </div>
      <div class="col-md-1">
        <button type="submit" class="btn btn-info"><li class="fa fa-search"></li> Cari</button>
      </div>

      <div class="col-md-2 col-md-offset-5">
        <a href="<?php echo base_url() ?>transaksikelas/tambahtransaksi" class="btn btn-success"><i class="fa fa-plus"></i> Kenaikan Kelas</a>
      </div>
    </div>
    
    
	</form><br>

<?php 
if(count($transaksi)){ ?>
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th width="10">No.</th>
        <th>NIS</th>
        <th>Nama Lengkap</th>
        <th>Kelas</th>
        <th>Tahun Ajaran</th>
        <th width="10">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($transaksi as $transaksis) { ?>
        <tr>
          <td align="center"><?php echo $no++ ?>.</td>
          <td><?php echo $transaksis['nis'] ?></td>
          <td><?php echo $transaksis['nama_lengkap'] ?></td>
          <td><?php echo $transaksis['nm_kelas'] ?></td>
          <td><?php echo $transaksis['th_ajaran'] ?></td>
          <td align="center">
            <a href="<?php echo base_url('transaksikelas/hapus/'.$transaksis['id_transaksi_kelas'])?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
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
