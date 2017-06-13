<!-- <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url() ?>siswa/siswa_input" enctype="multipart/form-data"> -->
<?php echo form_open_multipart('siswa/input',array('class'=> 'form-horizontal form-label-left')); ?>
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title">
        A. KETERANGAN TENTANG DIRI SISWA
      </h4>
    </div>

    <div class="panel-body row">
      <div class="col-md-9">
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">1.&nbsp;&nbsp;NIS</label>
          <div class="col-md-3 col-xs-12">
            <input type="text" class="form-control" id="nisn" name="nis" maxlength="4" required>
          </div>
            <em id="pesan" style="color: red"></em>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">2.&nbsp;&nbsp;Nama Lengkap</label>
          <div class="col-md-7 col-xs-12">
            <input type="text" class="form-control" name="nama" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">3.&nbsp;&nbsp;Jenis Kelamin</label>
          <div class="col-md-5 col-xs-12">
            <label class="radio-inline">
              <input type="radio" name="gender" value="L" required>Laki-laki
            </label>
            <label class="radio-inline">
              <input type="radio" name="gender" value="P">Perempuan
            </label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">4.&nbsp;&nbsp;Tempat dan Tanggal Lahir</label>
          <div class="col-md-3 col-xs-12">
            <input type="text" class="form-control" name="tmp_lahir" placeholder="Kota/Kabupaten" required>
          </div>
          <div class="col-md-3 col-xs-12 input-group date " data-date="" data-date-format="yyyy-mm-dd">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input class="form-control" type="text" name="tgl_lahir" placeholder="yyyy-mm-dd" readonly="readonly">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">5.&nbsp;&nbsp;Alamat</label>
          <div class="col-md-7 col-xs-12">
            <textarea type="text" class="form-control" name="alamat"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">6.&nbsp;&nbsp;Agama</label>
          <div class="col-md-7">
            <select class="form-control" name="id_agama" required>
            <option value="">[--Pilih Agama--]</option>
            <?php foreach ($agama as $agamas) { ?>
              <option value="<?php echo $agamas['id_agama'] ?>"><?php echo $agamas['agama'] ?></option>
            <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">7.&nbsp;&nbsp;Status Dalam Keluarga</label>
          <div class="col-md-7 col-xs-12">
            <select class="form-control" name="status_dakel" required>
              <option value="">[--Status dalam keluarga--]</option>
              <option value="Anak Kandung">Anak Kandung</option>
              <option value="Anak Tiri">Anak Tiri</option>
              <option value="Anak Angkat">Anak Angkat</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">8.&nbsp;&nbsp;Anak ke berapa</label>
          <div class="col-md-2 col-xs-12">
            <input type="number" class="form-control" name="anak_ke">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">9.&nbsp;&nbsp;Jumlah Saudara</label>
          <div class="col-md-2 col-xs-12">
            <input type="number" class="form-control" name="jml_saudara">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">10.&nbsp;&nbsp;No.Telp/HP</label>
          <div class="col-md-7 col-xs-12">
            <input type="text" class="form-control" id="telp" name="telp" maxlength="15">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">11.&nbsp;&nbsp;Email</label>
          <div class="col-md-7 col-xs-12">
            <input type="email" class="form-control" name="email">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">12.&nbsp;&nbsp;Riwayat Kesehatan</label>
          <div class="col-md-7 col-xs-12">
            <input type="text" class="form-control" name="riwayat_kesehatan">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">13.&nbsp;&nbsp;Tahun Masuk</label>
          <div class="col-md-7 col-xs-12">
            <input type="number" class="form-control" name="thn_masuk" required>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3">
        <img src="<?php echo base_url();?>assets/img/default.png" class="img-responsive">
        <input type="file" class="form-control" name="userfile" size="20">
      </div>
    </div>
  </div>
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title">
        B. KETERANGAN TENTANG AYAH KANDUNG
      </h4>
    </div>
      <div class="panel-body">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">14.&nbsp;&nbsp;Nama</label>
          <div class="col-md-5 col-xs-12">
            <input type="text" class="form-control" name="ayah_nama" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">15.&nbsp;&nbsp;Tempat dan Tanggal Lahir</label>
          <div class="col-md-2 col-xs-12">
            <input type="text" class="form-control" name="ayah_tmp_lahir" placeholder="Kota/Kabupaten">
          </div>
          <div class="col-md-2 col-xs-12 input-group date " data-date="" data-date-format="yyyy-mm-dd">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input class="form-control" type="text" name="ayah_tgl_lahir" placeholder="yyyy-mm-dd" readonly="readonly">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">16.&nbsp;&nbsp;Agama</label>
          <div class="col-md-5">
            <select class="form-control" name="ayah_id_agama" required>
            <option value="">[--Pilih Agama--]</option>
            <?php foreach ($agama as $agamas) { ?>
              <option value="<?php echo $agamas['id_agama'] ?>"><?php echo $agamas['agama'] ?></option>
            <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">17.&nbsp;&nbsp;Pendidikan</label>
          <div class="col-md-5">
            <select class="form-control" name="ayah_id_pendidikan" required>
            <option value="">[--Pilih Pendidikan--]</option>
            <?php foreach ($pendidikan as $pendidikans) { ?>
              <option value="<?php echo $pendidikans['id_pendidikan'] ?>"><?php echo $pendidikans['nama_pendidikan'] ?></option>
            <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">18.&nbsp;&nbsp;Pekerjaan</label>
          <div class="col-md-5">
            <select class="form-control" name="ayah_id_pekerjaan" required>
            <option value="">[--Pilih Pekerjaan--]</option>
            <?php foreach ($pekerjaan as $pekerjaans) { ?>
              <option value="<?php echo $pekerjaans['id_pekerjaan'] ?>"><?php echo $pekerjaans['nama_pekerjaan'] ?></option>
            <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">19.&nbsp;&nbsp;Penghasilan</label>
          <div class="col-md-5">
            <select class="form-control" name="ayah_id_penghasilan" required>
            <option value="">[--Pilih Penghasilan--]</option>
            <?php foreach ($penghasilan as $penghasilans) { ?>
              <option value="<?php echo $penghasilans['id_penghasilan'] ?>"><?php echo $penghasilans['penghasilan'] ?></option>
            <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">20.&nbsp;&nbsp;Alamat</label>
          <div class="col-md-5 col-xs-12">
            <textarea type="text" class="form-control" name="ayah_alamat"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">21.&nbsp;&nbsp;No. Telp/HP</label>
          <div class="col-md-5 col-xs-12">
            <input type="text" class="form-control numeric" name="ayah_telp" maxlength="15">
          </div>
        </div>
      </div>
  </div>
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title">
        C. KETERANGAN TENTANG IBU KANDUNG
      </h4>
    </div>
      <div class="panel-body">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">22.&nbsp;&nbsp;Nama</label>
          <div class="col-md-5 col-xs-12">
            <input type="text" class="form-control" name="ibu_nama" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">23.&nbsp;&nbsp;Tempat dan Tanggal Lahir</label>
          <div class="col-md-2 col-xs-12">
            <input type="text" class="form-control" name="ibu_tmp_lahir" placeholder="Kota/Kabupaten">
          </div>
          <div class="col-md-2 col-xs-12 input-group date " data-date="" data-date-format="yyyy-mm-dd">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input class="form-control" type="text" placeholder="yyyy-mm-dd" name="ibu_tgl_lahir" readonly="readonly">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">24.&nbsp;&nbsp;Agama</label>
          <div class="col-md-5">
            <select class="form-control" name="ibu_id_agama" required>
            <option value="">[--Pilih Agama--]</option>
            <?php foreach ($agama as $agamas) { ?>
              <option value="<?php echo $agamas['id_agama'] ?>"><?php echo $agamas['agama'] ?></option>
            <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">25.&nbsp;&nbsp;Pendidikan</label>
          <div class="col-md-5">
            <select class="form-control" name="ibu_id_pendidikan" required>
            <option value="">[--Pilih Pendidikan--]</option>
            <?php foreach ($pendidikan as $pendidikans) { ?>
              <option value="<?php echo $pendidikans['id_pendidikan'] ?>"><?php echo $pendidikans['nama_pendidikan'] ?></option>
            <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">26.&nbsp;&nbsp;Pekerjaan</label>
          <div class="col-md-5">
            <select class="form-control" name="ibu_id_pekerjaan" required>
            <option value="">[--Pilih Pekerjaan--]</option>
            <?php foreach ($pekerjaan as $pekerjaans) { ?>
              <option value="<?php echo $pekerjaans['id_pekerjaan'] ?>"><?php echo $pekerjaans['nama_pekerjaan'] ?></option>
            <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">27.&nbsp;&nbsp;Penghasilan</label>
          <div class="col-md-5">
            <select class="form-control" name="ibu_id_penghasilan" required>
            <option value="">[--Pilih Penghasilan--]</option>
            <?php foreach ($penghasilan as $penghasilans) { ?>
              <option value="<?php echo $penghasilans['id_penghasilan'] ?>"><?php echo $penghasilans['penghasilan'] ?></option>
            <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">28.&nbsp;&nbsp;Alamat</label>
          <div class="col-md-5 col-xs-12">
            <textarea type="text" class="form-control" name="ibu_alamat"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">29.&nbsp;&nbsp;No. Telp/HP</label>
          <div class="col-md-5 col-xs-12">
            <input type="text" class="form-control numeric" name="ibu_telp" maxlength="15" >
          </div>
        </div>
      </div>
  </div>
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title">
        D. KETERANGAN TENTANG WALI
      </h4>
    </div>
    
      <div class="panel-body">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">30.&nbsp;&nbsp;Nama</label>
          <div class="col-md-5 col-xs-12">
            <input type="text" class="form-control" name="wali_nama" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">31.&nbsp;&nbsp;Tempat dan Tanggal Lahir</label>
          <div class="col-md-2 col-xs-12">
            <input type="text" class="form-control" name="wali_tmp_lahir" placeholder="Kota/Kabupaten">
          </div>
          <div class="col-md-2 col-xs-12 input-group date " data-date="" data-date-format="yyyy-mm-dd">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input class="form-control" type="text" placeholder="yyyy-mm-dd" name="wali_tgl_lahir" readonly="readonly">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">32.&nbsp;&nbsp;Agama</label>
          <div class="col-md-5">
            <select class="form-control" name="wali_id_agama" required>
            <option value="">[--Pilih Agama--]</option>
            <?php foreach ($agama as $agamas) { ?>
              <option value="<?php echo $agamas['id_agama'] ?>"><?php echo $agamas['agama'] ?></option>
            <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">33.&nbsp;&nbsp;Pendidikan</label>
          <div class="col-md-5">
            <select class="form-control" name="wali_id_pendidikan" required>
            <option value="">[--Pilih Pendidikan--]</option>
            <?php foreach ($pendidikan as $pendidikans) { ?>
              <option value="<?php echo $pendidikans['id_pendidikan'] ?>"><?php echo $pendidikans['nama_pendidikan'] ?></option>
            <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">34.&nbsp;&nbsp;Pekerjaan</label>
          <div class="col-md-5">
            <select class="form-control" name="wali_id_pekerjaan" required>
            <option value="">[--Pilih Pekerjaan--]</option>
            <?php foreach ($pekerjaan as $pekerjaans) { ?>
              <option value="<?php echo $pekerjaans['id_pekerjaan'] ?>"><?php echo $pekerjaans['nama_pekerjaan'] ?></option>
            <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">35.&nbsp;&nbsp;Penghasilan</label>
          <div class="col-md-5">
            <select class="form-control" name="wali_id_penghasilan" required>
            <option value="">[--Pilih Penghasilan--]</option>
            <?php foreach ($penghasilan as $penghasilans) { ?>
              <option value="<?php echo $penghasilans['id_penghasilan'] ?>"><?php echo $penghasilans['penghasilan'] ?></option>
            <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">36.&nbsp;&nbsp;Alamat</label>
          <div class="col-md-5 col-xs-12">
            <textarea type="text" class="form-control" name="wali_alamat"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">37.&nbsp;&nbsp;No. Telp/HP</label>
          <div class="col-md-5 col-xs-12">
            <input type="text" class="form-control numeric" name="wali_telp" maxlength="15">
          </div>
        </div>
      </div>
  </div>

  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
      <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
      <button class="btn btn-default" type="reset"><i class="fa fa-undo"></i> Reset</button>
      <a href="<?php echo base_url() ?>siswa" class="btn btn-danger" type="button"><i class="fa fa-times"></i> Cancel</a>
    </div>
  </div>
</form>

<script type="text/javascript" src="<?php echo base_url() ?>assets/jquery-1.12.4.js"></script>
<script src="<?php echo base_url()?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery-ui.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<script>
  

  $(document).ready(function () {
    $(".input-group.date").datepicker({autoclose: true, todayHighlight: true});
    //called when key is pressed in textbox

    $("#nisn").keypress(function (e) {
       //if the letter is not digit then display error and don't type anything
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#pesan").html("Masukkan angka").show().fadeOut("slow");
            return false;
      }
     });
  });
</script>