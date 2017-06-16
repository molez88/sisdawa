<div class="row">
	<div class="col-lg-3">
		<div class="panel panel-info">
			<div class="panel-body" style="text-align: center">
				<div class="profile_img">
					<?php if($siswa_detail['foto_siswa']){ ?>
              <img src="<?php echo base_url('assets/img/siswa/'.$siswa_detail['foto_siswa'])?>" class="img-responsive avatar-view">
            <?php 
            }else{ ?>
              <img src="<?php echo base_url('assets/img/default.png')?>" class="img-responsive avatar-view">
            <?php } ?>
				
				</div>
				<strong><h3><?php echo $siswa_detail['nama_lengkap'] ?></h3></strong>
				<?php echo $siswa_detail['nis']?>
				<hr>
				<h2>
					<i class="fa fa-phone"></i> 
					<?php if(empty($siswa_detail['telp'])){
						echo "xxxxxxxxx";}else{
							echo $siswa_detail['telp'];
						}
					?>
				</h2>
			</div>
		</div>
		<div style="float: left;">
			<a href="<?php echo base_url() ?>siswa" type="button" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
		</div>
		<div style="float: right;">
			<a href="<?php echo base_url()?>siswa/update/<?php echo $siswa_detail['nis'] ?>" type="button" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
		</div>
		
		
	</div>
	<div class="col-lg-9">
		<div id="content">
      <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
          <li class="active"><a href="#tab-1" data-toggle="tab">Data Siswa</a></li>
          <li><a href="#tab-2" data-toggle="tab">Orang Tua Siswa</a></li>
          <li><a href="#tab-3" data-toggle="tab">Wali Siswa</a></li>
      </ul>
      <div id="my-tab-content" class="tab-content">
          <div class="tab-pane active" id="tab-1">
	          <div class="container">
	          	<table class="table">
	          		<tbody>
	          			<tr>
		          			<td width="25%">NIS</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $siswa_detail['nis'] ?></td>
		          		</tr>
		          		<tr>
		          		<tr>
		          			<td width="25%">Nama</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $siswa_detail['nama_lengkap'] ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Jenis Kelamin</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $siswa_detail['gender'] ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Tempat dan Tanggal Lahir</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $siswa_detail['tempat_lahir'].', '.tgl_indo($siswa_detail['tgl_lahir']) ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Agama</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $siswa_detail['agama'] ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Status anak dalam keluarga</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $siswa_detail['status_dakel'] ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Anak ke berapa</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $siswa_detail['anak_ke'] ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Jumlah saudara</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $siswa_detail['jml_saudara'] ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Alamat</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $siswa_detail['alamat'] ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">No.Telp/HP</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $siswa_detail['telp'] ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Email</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $siswa_detail['email'] ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Riwayat Kesehatan</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $siswa_detail['riwayat_kesehatan']; ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Tahun Masuk</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $siswa_detail['thn_masuk']; ?></td>
		          		</tr>
	          		</tbody>
	          		
	          	</table>
	          </div>
          </div>
          <div class="tab-pane" id="tab-2">
          	<div class="container">
	          	<table class="table">
	          		<tbody>
	          			<tr>
	          				<td colspan="3"><h4><strong>A. KETERANGAN AYAH KANDUNG</strong></h4></td>
	          			</tr>
	          			<tr>
		          			<td width="25%">Nama</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $ayah_detail['ayah_nama'] ?></td>
		          		</tr>
		          		<tr>
		          		<tr>
		          			<td width="25%">Tempat dan tanggal lahir</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $ayah_detail['ayah_tempat_lahir'].', '.tgl_indo($ayah_detail['ayah_tgl_lahir']) ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Agama</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $ayah_detail['agama'] ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Pendidikan</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $ayah_detail['nama_pendidikan'] ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Pekerjaan</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $ayah_detail['nama_pekerjaan'] ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Penghasilan</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $ayah_detail['penghasilan'] ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Alamat</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $ayah_detail['ayah_alamat'] ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">No.Telp/HP</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $ayah_detail['ayah_telp'] ?></td>
		          		</tr>
		          		<tr>
	          				<td colspan="3"><h4><strong>B. KETERANGAN IBU KANDUNG</strong></h4></td>
	          			</tr>
		          		<tr>
		          			<td width="25%">Nama</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $ibu_detail['ibu_nama'] ?></td>
		          		</tr>
		          		<tr>
		          		<tr>
		          			<td width="25%">Tempat dan tanggal lahir</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $ibu_detail['ibu_tempat_lahir'].', '.tgl_indo($ayah_detail['ibu_tgl_lahir']) ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Agama</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $ibu_detail['agama'] ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Pendidikan</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $ibu_detail['nama_pendidikan'] ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Pekerjaan</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $ibu_detail['nama_pekerjaan'] ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Penghasilan</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $ibu_detail['penghasilan'] ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">Alamat</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $ibu_detail['ibu_alamat'] ?></td>
		          		</tr>
		          		<tr>
		          			<td width="25%">No.Telp/HP</td>
		          			<td>:</td>
		          			<td width="73%"><?php echo $ibu_detail['ibu_telp'] ?></td>
		          		</tr>
	          		</tbody>
	          		
	          	</table>
	          </div>
          </div>
          <div class="tab-pane" id="tab-3">
          	<div class="container">
          		<table class="table">
          			<tr>
		        			<td width="25%">Nama</td>
		        			<td>:</td>
		        			<td width="73%"><?php echo $wali_detail['wali_nama'] ?></td>
		        		</tr>
		        		<tr>
		        		<tr>
		        			<td width="25%">Tempat dan tanggal lahir</td>
		        			<td>:</td>
		        			<td width="73%"><?php echo $wali_detail['wali_tempat_lahir'].', '.tgl_indo($wali_detail['wali_tgl_lahir']) ?></td>
		        		</tr>
		        		<tr>
		        			<td width="25%">Agama</td>
		        			<td>:</td>
		        			<td width="73%"><?php echo $wali_detail['agama'] ?></td>
		        		</tr>
		        		<tr>
		        			<td width="25%">Pendidikan</td>
		        			<td>:</td>
		        			<td width="73%"><?php echo $wali_detail['nama_pendidikan'] ?></td>
		        		</tr>
		        		<tr>
		        			<td width="25%">Pekerjaan</td>
		        			<td>:</td>
		        			<td width="73%"><?php echo $wali_detail['nama_pekerjaan'] ?></td>
		        		</tr>
		        		<tr>
		        			<td width="25%">Penghasilan</td>
		        			<td>:</td>
		        			<td width="73%"><?php echo $wali_detail['penghasilan'] ?></td>
		        		</tr>
		        		<tr>
		        			<td width="25%">Alamat</td>
		        			<td>:</td>
		        			<td width="73%"><?php echo $wali_detail['wali_alamat'] ?></td>
		        		</tr>
		        		<tr>
		        			<td width="25%">No.Telp/HP</td>
		        			<td>:</td>
		        			<td width="73%"><?php echo $wali_detail['wali_notelp'] ?></td>
		        		</tr>
          		</table>
          	</div>
          	
            
          </div>
      </div>
    </div>
	</div>
</div>