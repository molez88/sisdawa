<form class="form-horizontal" method="POST" action="<?php echo base_url() ?>transaksikelas/tambahtransaksi">
	<div class="panel-body row">
  <div class="col-md-7 col-sm-7">
    <div class="form-group">
      <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">1.&nbsp;&nbsp;Username</label>
      <div class="col-md-7 col-xs-12">
        <input type="text" class="form-control" name="username" maxlength="20" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">2.&nbsp;&nbsp;Password</label>
      <div class="col-md-7 col-xs-12">
        <input type="text" class="form-control" name="assword" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">3.&nbsp;&nbsp;Nama</label>
      <div class="col-md-7 col-xs-12">
        <input type="text" class="form-control" name="nama" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">4.&nbsp;&nbsp;Email</label>
      <div class="col-md-7 col-xs-12">
        <input type="email" class="form-control" name="nisn" >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">5.&nbsp;&nbsp;Level</label>
      <div class="col-md-7">
        <select class="form-control" name="level" required>
          <option value="">Level</option>
          <option value="admin">Admin</option>
          <option value="operator">Operator</option>
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