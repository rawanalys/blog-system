<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Postify | Register</title>
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
    <div class="title"><b>Create Account</b></div>
    <p class="subtitle">Enter your details to register.</p>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger text-center">
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('/auth/save') ?>">
      <div class="mb-3">
        <input type="text" name="name" class="form-control" style="background-color:rgb(240, 239, 239);" placeholder="Full Name" required>
      </div>

      <div class="mb-3">
        <input type="email" name="email" class="form-control" style="background-color:rgb(240, 239, 239);" placeholder="Email" required>
      </div>

      <div class="mb-3">
        <input type="password" name="password" class="form-control" style="background-color:rgb(240, 239, 239);" placeholder="Password" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-orange">Register</button>
      </div>
    </form>

    <p class="text-center mt-3" style="font-size: 14px; color: #777;"> Already have an account?
      <a href="<?= base_url('/auth') ?>" style="color: #ff5722; font-weight: 500;">Login here</a>
    </p>
  </div>
</div>

<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>