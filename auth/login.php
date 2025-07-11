<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Postify | Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/auth.css') ?>">
</head>
<body>

<div class="header">
  <img src="<?= base_url('assets/logo.png') ?>" alt="Logo" class="logo-icon">
  Postify
</div>

<div class="form-container">
  <div class="auth-form">
    <div class="title"><b>Welcome Back</b></div>
    <p class="subtitle">Please enter your credentials to log in.</p>

    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success text-center">
        <?= session()->getFlashdata('success') ?>
      </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger text-center">
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('/auth/login') ?>">
      <div class="mb-3">
        <input type="email" name="email" class="form-control" style="background-color:rgb(240, 239, 239);" placeholder="Email" required>
      </div>

      <div class="mb-3">
        <input type="password" name="password" class="form-control" style="background-color:rgb(240, 239, 239);" placeholder="Password" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-orange">Login</button>
      </div>
    </form>
    <p class="text-center mt-3" style="font-size: 14px; color: #777;"> Don’t have an account?
    <a href="<?= base_url('/auth/register') ?>" style="color: #ff5722; font-weight: 500;">Register here</a>
    </p>
  </div>
</div>

<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>