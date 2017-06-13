<form class="form-horizontal" method="post" action="<?php echo base_url() ?>users/tambahusers">
	<div class="panel-body row">
  <div class="col-md-7 col-sm-7">
    <div class="form-group">
      <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">Username</label>
      <div class="col-md-7 col-xs-12">
        <input type="text" class="form-control" name="username" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">Password</label>
      <div class="col-md-7 col-xs-12">
        <input type="text" class="form-control" name="password" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">Nama</label>
      <div class="col-md-7 col-xs-12">
        <input type="text" class="form-control" name="nama" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">Email</label>
      <div class="col-md-7 col-xs-12">
        <input type="email" class="form-control" name="email" >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">Level</label>
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
      <a href="<?php echo base_url() ?>users" class="btn btn-danger" type="button"><i class="fa fa-times"></i> Cancel</a>
    </div>
  </div>
</form>