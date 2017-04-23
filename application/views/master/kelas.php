<button class="btn btn-success" onclick="addKelas()"><i class="glyphicon glyphicon-plus"></i> Tambah Kelas</button><br><br>
<div class="panel panel-default">
  <div class="panel-heading">
    Table Kelas
  </div>

  <!-- /.panel-heading -->
  <div class="panel-body">
    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
      <thead>
        <tr>
          <th width="8%">No.</th>
          <th>Kelas</th>
          <th width="10%">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
          foreach ($result as $hasil) { ?>
            <tr>
              <td align="center"><?php echo $no++ ?>.</td>
              <td><?php echo $hasil['kelas'] ?></td>
              <td align="center">
                <a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a> &nbsp
                <a href="#" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
              </td>
            </tr>
          <?php }
         ?>
      </tbody>
    </table>
      <!-- /.table-responsive -->
  </div>
    <!-- /.panel-body -->
</div>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">Person Form</h3>
        </div>
        <div class="modal-body form">
            <form action="#" id="form" class="form-horizontal">
                <input type="hidden" value="" name="id"/> 
                <div class="form-body">
                  <div class="form-group">
                    <label class="control-label col-md-3">Kelas</label>
                    <div class="col-md-9">
                      <input name="kelas" placeholder="Kelas" class="form-control" type="text" required>
                    </div>
                  </div>
                    
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->