<div class="container">
	<?php 
	if ($this->session->flashdata('welcome')) { ?>
		<p class="alert alert-info"><b><?php echo $this->session->flashdata('welcome'); ?></b></p>
	<?php }
	?>
</div>

<div class="row">
<div class="col-md-7 col-sm-10 slider-wrapper theme-default">
	<div id="slider" class="nivoSlider">
		<img src="<?php echo base_url();?>assets/img/s.png" width="100%" class="img-responsive">
		<img src="<?php echo base_url();?>assets/img/2.png" width="100%" class="img-responsive">
		<img src="<?php echo base_url();?>assets/img/3.jpg" width="100%" class="img-responsive">
	</div>
	
</div>
<div class="col-md-5 col-sm-10">
	<h2><strong>Petunjuk penggunaan sistem</strong></h2>
	<hr>
	<div class="panel-group" id="accordion">
		<?php if ($this->session->userdata('level') == 'admin'): ?>
	  <div class="panel panel-info">
	      <div class="panel-heading">
	          <h4 class="panel-title">
	              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><b>Master Data</b></a>
	          </h4>
	      </div>
	      <div id="collapseOne" class="panel-collapse collapse in">
	          <div class="panel-body">
	              <p>
	              	Pilih menu Master Data untuk menambahkan data penting yang bersangkutan dengan sistem. <br>
	              	<ol type="1">
	              		<li>Menu Agama untuk menambahkan, mengedit, atau menghapus data yang ada di menu Agama</li>
	              		<li>Menu Kelas untuk menambahkan, mengedit, atau menghapus data yang ada di menu Kelas</li>
	              		<li>Menu Tahun Akademik untuk menambahkan, mengedit, atau menghapus data yang ada di menu Tahun Akademik</li>
	              		<li>Menu Pendidikan untuk menambahkan, mengedit, atau menghapus data yang ada di menu Pendidikan</li>
	              		<li>Menu Pekerjaan untuk menambahkan, mengedit, atau menghapus data yang ada di menu Pekerjaan</li>
	              		<li>Menu Penghasilan untuk menambahkan, mengedit, atau menghapus data yang ada di menu Penghasilan</li>
	              	</ol> 
	              </p>
	          </div>
	      </div>
	  </div>
	<?php endif; ?>
	  <div class="panel panel-info">
	      <div class="panel-heading">
	          <h4 class="panel-title">
	              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><b>Data Siswa</b></a>
	          </h4>
	      </div>
	      <div id="collapseTwo" class="panel-collapse collapse">
	          <div class="panel-body">
	              <p>
	              	Pilih menu <b>Form Data Siswa</b> untuk menambahkan, mengedit, atau menghapus data siswa. Fungsi melihat detail tentang siswa dan untuk print terdapat juga di menu tersebut.
	              </p>
	              <p>
	              	Pilih menu <b>Kenaikan Kelas</b> untuk kenaikan kelas pada siswa yang bersangkutan.
	              </p>
	          </div>
	      </div>
	  </div>
	  <?php if ($this->session->userdata('level') == 'admin'): ?>
	  <div class="panel panel-info">
	      <div class="panel-heading">
	          <h4 class="panel-title">
	              <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><b>User</b></a>
	          </h4>
	      </div>
	      <div id="collapseThree" class="panel-collapse collapse">
	          <div class="panel-body">
	              <p>
	              	Pilih <b>Menu User</b> untuk menambahkan pengguna yang bisa mengakses serta memberikan batasan akses untuk mengakses Sistem Data Siswa.
	              </p>
	          </div>
	      </div>
	  </div>
		<?php endif; ?>
		<div class="panel panel-info">
	      <div class="panel-heading">
	          <h4 class="panel-title">
	              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><b>Akun Pengguna</b></a>
	          </h4>
	      </div>
	      <div id="collapseFour" class="panel-collapse collapse">
	          <div class="panel-body">
	              <p>
	              	Pilih akun pengguna di pojok kanan atas untuk melihat detail pengguna serta terdapat juga menu logout untuk keluer dari sistem.
	              </p>
	          </div>
	      </div>
	  </div>
	</div>
</div>
<div class="col-md-5 col-sm-10">
	<div id="calendar"></div>
</div>
</div>