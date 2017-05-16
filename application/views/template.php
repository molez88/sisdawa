<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Sistem Data Siswa | SMP Muhammadiyah 2 Gamping</title>

		<!-- Bootstrap -->
		<link href="<?php echo base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="<?php echo base_url()?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<!-- iCheck -->
		<!-- <link href="<?php echo base_url()?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet"> -->
	
		
		
		<!-- bootstrap-daterangepicker -->
		<link href="<?php echo base_url()?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

		<!-- Custom Theme Style -->
		<link href="<?php echo base_url()?>assets/build/css/custom.min.css" rel="stylesheet">
	</head>

	<body class="nav-md">
		<div class="container body">
			<div class="main_container">
				<div class="col-md-3 left_col">
					<div class="left_col scroll-view">
						<div class="navbar nav_title" style="border: 0;">
							<a href="index.html" class="site_title"><span>Sistem Data Siswa</span></a>
						</div>

						<div class="clearfix"></div>

						<!-- menu profile quick info -->
						<div class="profile clearfix">
							<div class="profile_pic">
								<img src="<?php echo base_url()?>assets/production/images/img.jpg" alt="..." class="img-circle profile_img">
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
								<h3>General</h3>
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
									
									<li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="general_elements.html">General Elements</a></li>
											<li><a href="media_gallery.html">Media Gallery</a></li>
											<li><a href="typography.html">Typography</a></li>
											<li><a href="icons.html">Icons</a></li>
											<li><a href="glyphicons.html">Glyphicons</a></li>
											<li><a href="widgets.html">Widgets</a></li>
											<li><a href="invoice.html">Invoice</a></li>
											<li><a href="inbox.html">Inbox</a></li>
											<li><a href="calendar.html">Calendar</a></li>
										</ul>
									</li>
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
										<img src="<?php echo base_url()?>assets/production/images/img.jpg" alt=""><?php echo $this->session->userdata('nama'); ?>
										<span class=" fa fa-angle-down"></span>
									</a>
									<ul class="dropdown-menu dropdown-usermenu pull-right">
										<li><a href="javascript:;"> Profile</a></li>
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
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
            	<?php echo $konten; ?>
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
		
		<!-- bootstrap-daterangepicker -->
		<script src="<?php echo base_url()?>assets/vendors/moment/min/moment.min.js"></script>
		<script src="<?php echo base_url()?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
		<!-- data tables -->
		<link href="<?php echo base_url()?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

		<!-- Custom Theme Scripts -->
		<script src="<?php echo base_url()?>assets/build/js/custom.js"></script>
	
	</body>
</html>
