<form class="form-horizontal" method="POST" action="<?php echo base_url() ?>transaksikelas/tambahtransaksi">
	<div class="panel-body row">
  <div class="col-md-7 col-sm-7">
    <div class="form-group">
      <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">1.&nbsp;&nbsp;NIS</label>
      <div class="col-md-3">
        <select class="form-control" name="nis" required>
        <option value="">NIS</option>
        <?php foreach ($siswa as $siswas) { ?>
          <option value="<?php echo $siswas['nis'] ?>"><?php echo $siswas['nis'] ?></option>
        <?php  } ?>
        </select>
      </div>
        <em id="pesan" style="color: red"></em>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">2.&nbsp;&nbsp;Kelas</label>
      <div class="col-md-3">
        <select class="form-control" name="id_kelas" required>
        <option value="">Kelas</option>
        <?php foreach ($kelas as $kelass) { ?>
          <option value="<?php echo $kelass['id_kelas'] ?>"><?php echo $kelass['nm_kelas'] ?></option>
        <?php  } ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">3.&nbsp;&nbsp;Tahun Ajaran</label>
      <div class="col-md-3">
        <select class="form-control" name="id_th_akademik" required>
        <option value="">Tahun Ajaran</option>
        <?php foreach ($th_akademik as $th_akademiks) { ?>
          <option value="<?php echo $th_akademiks['id_th_akademik'] ?>"><?php echo $th_akademiks['th_ajaran'] ?></option>
        <?php  } ?>
        </select>
      </div>
    </div>
  </div>
  </div>
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
      <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
      <button class="btn btn-default" type="reset"><i class="fa fa-undo"></i> Reset</button>
      <a href="<?php echo base_url() ?>transaksikelas" class="btn btn-danger" type="button"><i class="fa fa-times"></i> Cancel</a>
    </div>
  </div>
</form>