<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/smp.png">
		<title>Sistem Data Siswa | SMP Muhammadiyah 2 Gamping</title>
		<!-- Bootstrap -->
		<link href="<?php echo base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- bootstrap-datepicker -->
    <link href="<?php echo base_url()?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="<?php echo base_url()?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

		<!-- datatables -->
		<link href="<?php echo base_url()?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

		<!-- Custom Theme Style -->
		<link href="<?php echo base_url()?>assets/build/css/custom.min.css" rel="stylesheet">

		<!-- nivo slider -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/nivoslider/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/nivoslider/themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/nivoslider/themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/nivoslider/themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/nivoslider/nivo-slider.css" type="text/css" media="screen" />
	</head>

	<body class="nav-md">
		<div class="container body">
			<div class="main_container">
				<div class="col-md-3 left_col">
					<div class="left_col scroll-view">
						<div class="navbar nav_title" style="border: 0;">
							<a href="<?php echo base_url(); ?>" class="site_title"><i class="fa fa-universal-access "></i><span> <strong>SISDAWA</strong></span></a>
						</div>

						<div class="clearfix"></div>

						<!-- menu profile quick info -->
						<div class="profile clearfix">
							<div class="profile_pic">
								<img src="<?php echo base_url('assets/img/smp.png')?>" alt="..." class="img-circle profile_img img-responsive">
							</div>
							<div class="profile_info">
								<span>Welcome,</span>
								<h2><?php echo $this->session->userdata('nama'); ?></h2>
							</div>
						</div>
						<!-- /menu profile quick info -->

						<br />

						<!-- sidebar menu -->
						<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
							<div class="menu_section">
								<ul class="nav side-menu">
									<li><a href="<?php echo site_url()?>"><i class="fa fa-home"></i> Home</a>
									</li>
									<?php if ($this->session->userdata('level') == 'admin'): ?>
									<li><a><i class="fa fa-database"></i> Master Data <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="<?php echo site_url(); ?>master/agama">Agama</a></li>
											<li><a href="<?php echo site_url(); ?>master/kelas">Kelas</a></li>
											<li><a href="<?php echo site_url(); ?>master/thnakademik">Tahun Akademik</a></li>
											<li><a href="<?php echo site_url(); ?>master/pendidikan">Pendidikan</a></li>
											<li><a href="<?php echo site_url(); ?>master/pekerjaan">Pekerjaan</a></li>
											<li><a href="<?php echo site_url(); ?>master/penghasilan">Penghasilan</a></li>
										</ul>
									</li>
									<?php endif; ?>
									<li><a><i class="fa fa-group"></i> Form Data Siswa <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="<?php echo base_url();?>siswa">Data Siswa</a></li>
											<li><a href="<?php echo base_url();?>transaksikelas">Kenaikan Kelas</a></li>
										</ul>
									</li>
									
								</ul>
							</div>
							<div class="menu_section">
								<ul class="nav side-menu">
									<?php if ($this->session->userdata('level') == 'admin'): ?>
									<li><a href="<?php echo site_url() ?>users"><i class="fa fa-user"></i> Users</a>
								<?php endif; ?>
								</ul>
							</div>

						</div>
						<!-- /sidebar menu -->
					</div>
				</div>

				<!-- top navigation -->
				<div class="top_nav">
					<div class="nav_menu">
						<nav>
							<div class="nav toggle">
								<a id="menu_toggle"><i class="fa fa-bars"></i></a>
							</div>

							<ul class="nav navbar-nav navbar-right">
								<li class="">
									<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<?php echo $this->session->userdata('nama'); ?>
										<span class=" fa fa-angle-down"></span>
									</a>
									<ul class="dropdown-menu dropdown-usermenu pull-right">
										<li><a href="<?php echo base_url('users/profile/'.$this->session->userdata('username')) ?>"> Profile</a></li>
										<li><a href="<?php echo base_url(); ?>users/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- /top navigation -->

				<!-- page content -->
				<div class="right_col" role="main">
          <div class="x_panel">
            <div class="x_title">
              <h2><?php echo $judul; ?></h2>
              <?php if ($kembali == TRUE): ?>
              	<ul class="nav navbar-right panel_toolbox">
	                <li>
	                	<button onClick="history.back();" class="btn btn-default"><i class="glyphicon glyphicon-backward"></i> Kembali</button>
	                </li>
	              </ul>
              <?php endif ?>
              
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

            	<?php 
            	if ($this->session->flashdata('insert_siswa')) { ?>
            		<p class="alert alert-success"><b><?php echo $this->session->flashdata('insert_siswa'); ?></b></p>
            	<?php }

            	if ($this->session->flashdata('update_siswa')) { ?>
            		<p class="alert alert-success"><b><?php echo $this->session->flashdata('update_siswa'); ?></b></p>
            	<?php }

            	if ($this->session->flashdata('delete_siswa')) { ?>
            		<p class="alert alert-success"><b><?php echo $this->session->flashdata('delete_siswa'); ?></b></p>
            	<?php }

            	if ($this->session->flashdata('insert_transaksi')) { ?>
            		<p class="alert alert-success"><b><?php echo $this->session->flashdata('insert_transaksi'); ?></b></p>
            	<?php }

            	if ($this->session->flashdata('delete_transaksi')) { ?>
            		<p class="alert alert-success"><b><?php echo $this->session->flashdata('delete_transaksi'); ?></b></p>
            	<?php }

            	if ($this->session->flashdata('image_error')) { ?>
            		<div class="alert alert-danger"><?php echo $this->session->flashdata('image_error'); ?></div>
            	<?php }

            	echo $konten; ?>
            </div>
          </div>
				</div>
				
				<!-- /page content -->

				<!-- footer content -->
				<footer>
					<div class="pull-right">
						Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>. Designed by Mukhlis Muas
					</div>
					<div class="clearfix"></div>
				</footer>
				<!-- /footer content -->
			</div>
		</div>

		<!-- jQuery -->
		<script src="<?php echo base_url()?>assets/jquery-2.1.4.min.js"></script>
		

		<!-- data tables -->
    <script src="<?php echo base_url()?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
		<!-- Bootstrap -->
		<script src="<?php echo base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url()?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<!-- Custom Theme Scripts -->
		<script src="<?php echo base_url()?>assets/build/js/custom.js"></script>

		<!-- nivoslider -->
		
		<script type="text/javascript" src="<?php echo base_url()?>assets/nivoslider/jquery.nivo.slider.js"></script>

		<script type="text/javascript"> 
		$(window).on('load', function() {
		    $('#slider').nivoSlider(); 
		}); 
		</script>

		
	</body>
</html>
