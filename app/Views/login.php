<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Simkeu | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>template/plugins/fontawesome-free/css/all.min.css" />
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url(); ?>template/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>template/dist/css/adminlte.min.css" />
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="<?= base_url(); ?>login"><b>LOGIN</b></a>
    </div>
    <!-- /.login-logo -->

    <?php if (session()->getFlashdata('error')) : ?>
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error!</strong> <?= session()->getFlashdata('error'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg"></p>

        <form action="<?= base_url(); ?>proses-login" method="POST">
          <div class="input-group mb-3">
            <input type="username" class="form-control" name="username" placeholder="Username" required />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </form>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url(); ?>template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url(); ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>template/dist/js/adminlte.min.js"></script>
</body>

</html>