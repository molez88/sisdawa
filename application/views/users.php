<button class="btn btn-success" onclick="add()"><i class="glyphicon glyphicon-plus"></i> Tambah User</button>
<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
<br><br>

<div class="panel panel-default">
  <div class="panel-heading">
      Table User
  </div>
  <!-- /.panel-heading -->
  <div class="panel-body">
    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th width="7%">No.</th>
            <th>Username</th>
            <th>Password</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Foto</th>
            <th width="10%">Aksi</th>
          </tr>
        </thead>
        
    </table>
  </div>
</div>
<!-- Bootstrap modal -->
<!-- <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Form User</h3>
        </div>
        <div class="modal-body form">
            <form action="#" id="form" class="form-horizontal">
                <input type="hidden" value="" name="id_agama"/> 
                <div class="form-body">
                  <div class="form-group">
                      <label class="control-label col-md-3">User</label>
                      <div class="col-md-9">
                          <input name="agama" placeholder="User" class="form-control" type="text">
                          <span class="help-block"></span>
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
<script src="<?php echo base_url()?>assets/jquery-2.1.4.min.js"></script>
<script>
	$(document).ready(function() {
		$('#datatable-responsive').DataTable({
			"processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('users/list_users')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -2 ], //2 last column (photo)
                "orderable": false, //set not orderable
            },
        ],
		});
	});
</script>