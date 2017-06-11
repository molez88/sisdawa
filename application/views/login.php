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
    <link href="<?php echo base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url();?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/build/css/custom.min.css" rel="stylesheet">
  </head>
  <body class="login">
    <div>
      <div class="login_wrapper">

        <div class="animate form login_form">
          <section class="login_content">
          
          
            <?php echo form_open('users/login'); ?>
              <h2>SISTEM DATA SISWA</h2>
              <h3>SMP Muhammadiyah 2 Gamping</h3>
              <br>
              <div class="form-group has-feedback">
                <input type="text" name="username" class="form-control" placeholder="Username" required= />
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password" required />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div>
                <button class="btn btn-primary submit btn-block">Login</button>
              </div>

              <div class="clearfix"></div>

              
            </form>
          </section>

          <?php if ($this->session->flashdata('gagal_login')): ?>
            <div class="alert alert-danger"><strong><?php echo $this->session->flashdata('gagal_login'); ?></strong></div>
          <?php endif ?>
        </div>

        
      </div>
    </div>
  </body>
</html>
