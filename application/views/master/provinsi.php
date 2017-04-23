<div class="panel panel-default">
  <div class="panel-heading">
    Table Provinsi
  </div>

  <!-- /.panel-heading -->
  <div class="panel-body">
    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
      <thead>
        <tr>
          <th width="8%">No.</th>
          <th>Provinsi</th>
          <th>Kabupaten</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
          foreach ($result as $hasil) { ?>
            <tr>
              <td align="center"><?php echo $no++ ?>.</td>
              <td><?php echo $hasil['provinsi'] ?></td>
              <td><?php echo $hasil['kabupaten'] ?></td>
            </tr>
          <?php }
         ?>
      </tbody>
    </table>
      <!-- /.table-responsive -->
  </div>
    <!-- /.panel-body -->
</div>
