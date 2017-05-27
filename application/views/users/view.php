<a href="<?php echo base_url() ?>users/tambahusers" type="button" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah User</a>
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
            <th>Username</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Level</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          foreach ($user as $users) { ?>
            <tr>
              <td><?php echo $users['username'] ?></td>
              <td><?php echo $users['nama'] ?></td>
              <td><?php echo $users['email'] ?></td>
              <td><?php echo $users['level'] ?></td>
              <td width="15%">
                <a href="<?php echo base_url('users/editusers/'.$users['username']) ?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a href="" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
              </td>
            </tr>
          <?php }
           ?>
        </tbody>
    </table>
  </div>
</div>
