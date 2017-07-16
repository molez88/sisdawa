<!-- <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url() ?>siswa/siswa_input" enctype="multipart/form-data"> -->

<?php echo form_open_multipart('siswa/update/'.$siswa_nis['nis'],array('class'=> 'form-horizontal form-label-left')); ?>
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
            <input type="text" class="form-control" id="nisn" name="nis" maxlength="4"  value="<?php echo $siswa_nis['nis'] ?>" readonly>
          </div>
            <em id="pesan" style="color: red"></em>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">2.&nbsp;&nbsp;Nama Lengkap</label>
          <div class="col-md-7 col-xs-12">
            <input type="text" class="form-control" name="nama" value="<?php echo $siswa_nis['nama_lengkap'] ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">3.&nbsp;&nbsp;Jenis Kelamin</label>
          <div class="col-md-5 col-xs-12">
            <label class="radio-inline">
              <input type="radio" name="gender" value="L" <?php if($siswa_nis['gender']=='L'){echo 'checked="checked"';}?> required >Laki-laki
            </label>
            <label class="radio-inline">
              <input type="radio" name="gender" value="P" <?php if($siswa_nis['gender']=='P'){echo 'checked="checked"';} ?> >Perempuan
            </label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">4.&nbsp;&nbsp;Tempat dan Tanggal Lahir</label>
          <div class="col-md-3 col-xs-12">
            <input type="text" class="form-control" name="tmp_lahir" placeholder="Kota/Kabupaten" value="<?php echo $siswa_nis['tempat_lahir'] ?>" required>
          </div>
          <div class="col-md-3 col-xs-12 input-group date " data-date="" data-date-format="yyyy-mm-dd">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input class="form-control" type="text" name="tgl_lahir" value="<?php echo $siswa_nis['tgl_lahir'] ?>" placeholder="yyyy-mm-dd" readonly="readonly">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">5.&nbsp;&nbsp;Alamat</label>
          <div class="col-md-7 col-xs-12">
            <textarea type="text" class="form-control" name="alamat"><?php echo $siswa_nis['alamat'] ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">6.&nbsp;&nbsp;Agama</label>
          <div class="col-md-7">
            <select class="form-control" name="id_agama" required>
            <option value="">[--Pilih Agama--]</option>
            <?php foreach ($agama as $agamas) { ?>
              <option <?php if($agamas['id_agama'] == $siswa_nis['id_agama']){ echo 'selected="selected"'; } ?> value="<?php echo $agamas['id_agama'] ?>"><?php echo $agamas['agama'] ?></option>
            <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">7.&nbsp;&nbsp;Status Dalam Keluarga</label>
          <div class="col-md-7 col-xs-12">
            <select class="form-control" name="status_dakel" required>
              <option value="">[--Status dalam keluarga--]</option>
              <option <?php if($siswa_nis['status_dakel'] == 'Anak Kandung'){ echo 'selected="selected"'; } ?> value="Anak Kandung">Anak Kandung</option>
              <option <?php if($siswa_nis['status_dakel'] == 'Anak Tiri'){ echo 'selected="selected"'; } ?> value="Anak Tiri">Anak Tiri</option>
              <option <?php if($siswa_nis['status_dakel'] == 'Anak Angkat'){ echo 'selected="selected"'; } ?> value="Anak Angkat">Anak Angkat</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">8.&nbsp;&nbsp;Anak ke berapa</label>
          <div class="col-md-2 col-xs-12">
            <input type="number" class="form-control" name="anak_ke" value="<?php echo $siswa_nis['anak_ke'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">9.&nbsp;&nbsp;Jumlah Saudara</label>
          <div class="col-md-2 col-xs-12">
            <input type="number" class="form-control" name="jml_saudara" value="<?php echo $siswa_nis['jml_saudara'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">10.&nbsp;&nbsp;No.Telp/HP</label>
          <div class="col-md-7 col-xs-12">
            <input type="text" class="form-control" id="telp" name="telp" maxlength="15" value="<?php echo $siswa_nis['telp'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">11.&nbsp;&nbsp;Email</label>
          <div class="col-md-7 col-xs-12">
            <input type="email" class="form-control" name="email" value="<?php echo $siswa_nis['email'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">12.&nbsp;&nbsp;Riwayat Kesehatan</label>
          <div class="col-md-7 col-xs-12">
            <input type="text" class="form-control" name="riwayat_kesehatan" value="<?php echo $siswa_nis['riwayat_kesehatan'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">13.&nbsp;&nbsp;Tahun Masuk</label>
          <div class="col-md-3 col-xs-12">
            <input type="text" class="form-control" id="thn_masuk" name="thn_masuk" value="<?php echo $siswa_nis['thn_masuk'] ?>" readonly>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3">
        <input type="hidden" name="path" value="<?php echo $siswa_nis['foto_siswa'] ?>">
        <?php if ($siswa_nis['foto_siswa']): ?>
          <img src="<?php echo base_url('assets/img/siswa/'.$siswa_nis['foto_siswa']);?>" class="img-responsive" style="height: 270px">
        <?php else: ?>
          <img src="<?php echo base_url('assets/img/default.png');?>" class="img-responsive" style="height: 270px">
        <?php endif; ?>
        
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
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">14.&nbsp;&nbsp;NIK</label>
          <div class="col-md-3 col-xs-12">
            <input type="text" class="form-control" id="nik_ayah" name="nik_ayah" value="<?php echo $siswa_nis['nik_ayah'] ?>" required>
          </div>
            <em id="pesan_nik_ayah" style="color: red"></em>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">14.&nbsp;&nbsp;Nama</label>
          <div class="col-md-5 col-xs-12">
            <input type="text" class="form-control" name="ayah_nama" value="<?php echo $siswa_nis['ayah_nama'] ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">15.&nbsp;&nbsp;Tempat dan Tanggal Lahir</label>
          <div class="col-md-2 col-xs-12">
            <input type="text" class="form-control" name="ayah_tmp_lahir" placeholder="Kota/Kabupaten" value="<?php echo $siswa_nis['ayah_tempat_lahir'] ?>">
          </div>
          <div class="col-md-2 col-xs-12 input-group date " data-date="" data-date-format="yyyy-mm-dd">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input class="form-control" type="text" name="ayah_tgl_lahir" placeholder="yyyy-mm-dd" readonly="readonly" value="<?php echo $siswa_nis['ayah_tgl_lahir'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">16.&nbsp;&nbsp;Agama</label>
          <div class="col-md-5">
            <select class="form-control" name="ayah_id_agama" required>
            <option value="">[--Pilih Agama--]</option>
            <?php foreach ($agama as $agamas) { ?>
              <option <option <?php if($agamas['id_agama'] == $siswa_nis['ayah_id_agama']){ echo 'selected="selected"'; } ?> value="<?php echo $agamas['id_agama'] ?>"><?php echo $agamas['agama'] ?></option>
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
              <option <option <option <?php if($pendidikans['id_pendidikan'] == $siswa_nis['ayah_id_pendidikan']){ echo 'selected="selected"'; } ?> value="<?php echo $pendidikans['id_pendidikan'] ?>"><?php echo $pendidikans['nama_pendidikan'] ?></option>
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
              <option <?php if($pekerjaans['id_pekerjaan'] == $siswa_nis['ayah_id_pekerjaan']){ echo 'selected="selected"'; } ?> value="<?php echo $pekerjaans['id_pekerjaan'] ?>"><?php echo $pekerjaans['nama_pekerjaan'] ?></option>
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
              <option <?php if($penghasilans['id_penghasilan'] == $siswa_nis['ayah_id_penghasilan']){ echo 'selected="selected"'; } ?> value="<?php echo $penghasilans['id_penghasilan'] ?>"><?php echo $penghasilans['penghasilan'] ?></option>
            <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">20.&nbsp;&nbsp;Alamat</label>
          <div class="col-md-5 col-xs-12">
            <textarea type="text" class="form-control" name="ayah_alamat"><?php echo $siswa_nis['ayah_alamat'] ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">21.&nbsp;&nbsp;No. Telp/HP</label>
          <div class="col-md-5 col-xs-12">
            <input type="text" class="form-control numeric" name="ayah_telp" maxlength="15" value="<?php echo $siswa_nis['ayah_telp'] ?>">
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
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">14.&nbsp;&nbsp;NIK</label>
          <div class="col-md-3 col-xs-12">
            <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" value="<?php echo $siswa_nis['nik_ibu'] ?>" required>
          </div>
            <em id="pesan_nik_ibu" style="color: red"></em>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">22.&nbsp;&nbsp;Nama</label>
          <div class="col-md-5 col-xs-12">
            <input type="text" class="form-control" name="ibu_nama" value="<?php echo $siswa_nis['ibu_nama'] ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">23.&nbsp;&nbsp;Tempat dan Tanggal Lahir</label>
          <div class="col-md-2 col-xs-12">
            <input type="text" class="form-control" name="ibu_tmp_lahir" placeholder="Kota/Kabupaten" value="<?php echo $siswa_nis['ibu_tempat_lahir'] ?>">
          </div>
          <div class="col-md-2 col-xs-12 input-group date " data-date="" data-date-format="yyyy-mm-dd">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input class="form-control" type="text" placeholder="yyyy-mm-dd" name="ibu_tgl_lahir" readonly="readonly" value="<?php echo $siswa_nis['ibu_tgl_lahir'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">24.&nbsp;&nbsp;Agama</label>
          <div class="col-md-5">
            <select class="form-control" name="ibu_id_agama" required>
            <option value="">[--Pilih Agama--]</option>
            <?php foreach ($agama as $agamas) { ?>
              <option <?php if($agamas['id_agama'] == $siswa_nis['ibu_id_agama']){ echo 'selected="selected"'; } ?> value="<?php echo $agamas['id_agama'] ?>"><?php echo $agamas['agama'] ?></option>
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
              <option <?php if($pendidikans['id_pendidikan'] == $siswa_nis['ibu_id_pendidikan']){ echo 'selected="selected"'; } ?> value="<?php echo $pendidikans['id_pendidikan'] ?>"><?php echo $pendidikans['nama_pendidikan'] ?></option>
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
              <option <?php if($pekerjaans['id_pekerjaan'] == $siswa_nis['ibu_id_pekerjaan']){ echo 'selected="selected"'; } ?> value="<?php echo $pekerjaans['id_pekerjaan'] ?>"><?php echo $pekerjaans['nama_pekerjaan'] ?></option>
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
              <option <?php if($penghasilans['id_penghasilan'] == $siswa_nis['ibu_id_penghasilan']){ echo 'selected="selected"'; } ?> value="<?php echo $penghasilans['id_penghasilan'] ?>"><?php echo $penghasilans['penghasilan'] ?></option>
            <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">28.&nbsp;&nbsp;Alamat</label>
          <div class="col-md-5 col-xs-12">
            <textarea type="text" class="form-control" name="ibu_alamat"><?php echo $siswa_nis['ibu_alamat'] ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">29.&nbsp;&nbsp;No. Telp/HP</label>
          <div class="col-md-5 col-xs-12">
            <input type="text" class="form-control numeric" name="ibu_telp" maxlength="15" value="<?php echo $siswa_nis['ibu_telp'] ?>">
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
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">14.&nbsp;&nbsp;NIK</label>
          <div class="col-md-3 col-xs-12">
            <input type="text" class="form-control" id="nik_wali" name="nik_wali" value="<?php echo $siswa_nis['nik_wali'] ?>" required>
          </div>
            <em id="pesan_nik_wali" style="color: red"></em>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">30.&nbsp;&nbsp;Nama</label>
          <div class="col-md-5 col-xs-12">
            <input type="text" class="form-control" name="wali_nama" value="<?php echo $siswa_nis['wali_nama'] ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">31.&nbsp;&nbsp;Tempat dan Tanggal Lahir</label>
          <div class="col-md-2 col-xs-12">
            <input type="text" class="form-control" name="wali_tmp_lahir" placeholder="Kota/Kabupaten" value="<?php echo $siswa_nis['wali_tempat_lahir'] ?>">
          </div>
          <div class="col-md-2 col-xs-12 input-group date " data-date="" data-date-format="yyyy-mm-dd">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input class="form-control" type="text" placeholder="yyyy-mm-dd" name="wali_tgl_lahir" value="<?php echo $siswa_nis['wali_tgl_lahir'] ?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">32.&nbsp;&nbsp;Agama</label>
          <div class="col-md-5">
            <select class="form-control" name="wali_id_agama" required>
            <option value="">[--Pilih Agama--]</option>
            <?php foreach ($agama as $agamas) { ?>
              <option <?php if($agamas['id_agama'] == $siswa_nis['wali_id_agama']){ echo 'selected="selected"'; } ?> value="<?php echo $agamas['id_agama'] ?>"><?php echo $agamas['agama'] ?></option>
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
              <option <?php if($pendidikans['id_pendidikan'] == $siswa_nis['wali_id_pendidikan']){ echo 'selected="selected"'; } ?> value="<?php echo $pendidikans['id_pendidikan'] ?>"><?php echo $pendidikans['nama_pendidikan'] ?></option>
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
              <option <?php if($pekerjaans['id_pekerjaan'] == $siswa_nis['wali_id_pekerjaan']){ echo 'selected="selected"'; } ?> value="<?php echo $pekerjaans['id_pekerjaan'] ?>"><?php echo $pekerjaans['nama_pekerjaan'] ?></option>
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
              <option <?php if($penghasilans['id_penghasilan'] == $siswa_nis['wali_id_penghasilan']){ echo 'selected="selected"'; } ?> value="<?php echo $penghasilans['id_penghasilan'] ?>"><?php echo $penghasilans['penghasilan'] ?></option>
            <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">36.&nbsp;&nbsp;Alamat</label>
          <div class="col-md-5 col-xs-12">
            <textarea type="text" class="form-control" name="wali_alamat"><?php echo $siswa_nis['wali_alamat'] ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left">37.&nbsp;&nbsp;No. Telp/HP</label>
          <div class="col-md-5 col-xs-12">
            <input type="text" class="form-control numeric" name="wali_telp" maxlength="15" value="<?php echo $siswa_nis['wali_notelp'] ?>">
          </div>
        </div>
      </div>
  </div>
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title">
        E. KETERANGAN LAINNYA
      </h4>
    </div>
    
      <div class="panel-body">
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">41.&nbsp;&nbsp;Kartu Perlindungan Sosial (KPS/PKH)</label>
          <div class="col-md-5 col-xs-12">
            <label class="radio-inline">
              <input type="radio" name="kps" value="Ya" <?php if($siswa_nis['kps']=='Ya'){echo 'checked="checked"';}?> required>Ya
            </label>
            <label class="radio-inline">
              <input type="radio" name="kps" value="Tidak" <?php if($siswa_nis['kps']=='Tidak'){echo 'checked="checked"';}?>>Tidak
            </label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">42.&nbsp;&nbsp;Kartu Keluarga Miskin (KKM)</label>
          <div class="col-md-5 col-xs-12">
            <label class="radio-inline">
              <input type="radio" name="kkm" value="Ya" <?php if($siswa_nis['kkm']=='Ya'){echo 'checked="checked"';}?> required>Ya
            </label>
            <label class="radio-inline">
              <input type="radio" name="kkm" value="Tidak" <?php if($siswa_nis['kkm']=='Tidak'){echo 'checked="checked"';}?>>Tidak
            </label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">43.&nbsp;&nbsp;Kartu Indonesia Pintar (KIP)</label>
          <div class="col-md-5 col-xs-12">
            <label class="radio-inline">
              <input type="radio" name="kip" value="Ya" <?php if($siswa_nis['kip']=='Ya'){echo 'checked="checked"';}?> required>Ya
            </label>
            <label class="radio-inline">
              <input type="radio" name="kip" value="Tidak" <?php if($siswa_nis['kip']=='Tidak'){echo 'checked="checked"';}?>>Tidak
            </label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">44.&nbsp;&nbsp;Kartu Menuju Sejahtera (KMS)</label>
          <div class="col-md-5 col-xs-12">
            <label class="radio-inline">
              <input type="radio" name="kms" value="Ya" <?php if($siswa_nis['kms']=='Ya'){echo 'checked="checked"';}?> required>Ya
            </label>
            <label class="radio-inline">
              <input type="radio" name="kms" value="Tidak" <?php if($siswa_nis['kms']=='Tidak'){echo 'checked="checked"';}?>>Tidak
            </label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left">45.&nbsp;&nbsp;Kartu Keluarga Sejahtera (KKS)</label>
          <div class="col-md-5 col-xs-12">
            <label class="radio-inline">
              <input type="radio" name="kks" value="Ya" <?php if($siswa_nis['kks']=='Ya'){echo 'checked="checked"';}?> required>Ya
            </label>
            <label class="radio-inline">
              <input type="radio" name="kks" value="Tidak" <?php if($siswa_nis['kks']=='Tidak'){echo 'checked="checked"';}?>>Tidak
            </label>
          </div>
        </div>
      </div>
  </div>
  

  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
      <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
      <button class="btn btn-default" type="reset"><i class="fa fa-undo"></i> Reset</button>
      <a href="<?php echo base_url('siswa') ?>"  type="button" class="btn btn-danger" type="button"><i class="fa fa-times"></i> Cancel</a>
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

    $("#nik_ayah").keypress(function (e) {
       //if the letter is not digit then display error and don't type anything
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#pesan_nik_ayah").html("Masukkan angka").show().fadeOut("slow");
            return false;
      }
     });
    $("#nik_ibu").keypress(function (e) {
       //if the letter is not digit then display error and don't type anything
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#pesan_nik_ibu").html("Masukkan angka").show().fadeOut("slow");
            return false;
      }
     });
    $("#nik_wali").keypress(function (e) {
       //if the letter is not digit then display error and don't type anything
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#pesan_nik_wali").html("Masukkan angka").show().fadeOut("slow");
            return false;
      }
     });

    $('#thn_masuk').datepicker({
     minViewMode: 2, format: 'yyyy', autoclose: true});
  });
</script>