var table;
    $(document).ready(function() {
      table = $('#dataTables-example').DataTable({
        responsive: true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [],
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ]
      });

      var url = "<?php echo base_url('master/agama/addAgama')?>";
      $("#addAgama").click(function() {
        $("#crudAgama").load(url);
      });

    });

    function addKelas(){
      save_method = 'add';
      $('#form')[0].reset();
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Tambah Kelas'); // Set Title to Bootstrap modal title
    }

    function reload_table(){
      table.ajax.reload(); //reload datatable ajax 
    }

    function save()
    {
      $('#btnSave').text('saving...'); //change button text
      $('#btnSave').attr('disabled',true); //set button disable 
      var url;

      if(save_method == 'add') {
          url = "<?php echo site_url('master/kelas/addKelas')?>";
      }

      // ajax adding data to database
      $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

          if(data.status) //if success close modal and reload ajax table
          {
            $('#modal_form').modal('hide');
            reload_table();
          }
          
          $('#btnSave').text('save'); //change button text
          $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error adding / update data');
          $('#btnSave').text('save'); //change button text
          $('#btnSave').attr('disabled',false); //set button enable 

        }
      });
    }