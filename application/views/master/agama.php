<button class="btn btn-success" onclick="add()"><i class="glyphicon glyphicon-plus"></i> Tambah Agama</button>
<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
<br><br>

<div class="panel panel-default">
  <div class="panel-heading">
      Table Agama
  </div>
  <!-- /.panel-heading -->
  <div class="panel-body">
    <table width="100%" class="table table-striped table-bordered table-hover" id="table">
        <thead>
          <tr>
            <th width="7%">No.</th>
            <th>Agama</th>
            <th width="10%">Aksi</th>
          </tr>
        </thead>
        
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
            <h3 class="modal-title">Form Agama</h3>
        </div>
        <div class="modal-body form">
            <form action="#" id="form" class="form-horizontal">
                <input type="hidden" value="" name="id"/> 
                <div class="form-body">
                  <div class="form-group">
                      <label class="control-label col-md-3">Agama</label>
                      <div class="col-md-9">
                          <input name="agama" placeholder="First Name" class="form-control" type="text">
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

<script type="text/javascript">
  $(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo site_url('master/agama/list_agama')?>",
          "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    $("input").change(function(){
      $(this).parent().parent().removeClass('has-error');
      $(this).next().empty();
    });
     

  });

  function add(){
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
  }

  function edit_agama(id){
    save_method = 'update';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();

    //Ajax Load data from ajax
    $.ajax({
      url : "<?php echo site_url('master/agama/editAgama/')?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('[name="id"]').val(data.id);
        $('[name="agama"]').val(data.agama);
        $('#modal_form').modal('show');
        $('.modal-title').text('Form Agama'); // Set title to Bootstrap modal title

      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error get data from ajax');
      }
    });
  }

  function reload_table(){
    table.ajax.reload(null,false); //reload datatable ajax 
  }

  function save()
  {
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
      url = "<?php echo site_url('master/agama/addAgama')?>";
    }else{
      url = "<?php echo site_url('master/agama/updateAgama')?>";
    }

    // ajax adding data to database
    $.ajax({
      url : url,
      type: "POST",
      data: $('#form').serialize(),
      dataType: "JSON",
      success: function(data){

        if(data.status) //if success close modal and reload ajax table
        {
            $('#modal_form').modal('hide');
            reload_table();
        }
        else
        {
          for (var i = 0; i < data.inputerror.length; i++) 
          {
              $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
              $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
          }
        }
        $('#btnSave').text('save'); //change button text
        $('#btnSave').attr('disabled',false); //set button enable 


      },
      error: function (jqXHR, textStatus, errorThrown){
        alert('Error adding / update data');
        $('#btnSave').text('save'); //change button text
        $('#btnSave').attr('disabled',false); //set button enable 
      }
    });
  }

  function delete_agama(id){
    if(confirm('Are you sure delete this data?')){
      // ajax delete data to database
      $.ajax({
        url : "<?php echo site_url('master/agama/deleteAgama')?>/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            //if success reload ajax table
            $('#modal_form').modal('hide');
            reload_table();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error deleting data');
        }
      });

    }
  }
</script>