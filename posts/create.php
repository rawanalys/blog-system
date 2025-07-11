<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Post | Postify</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/summernote-lite.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
</head>
<body>

<div class="header">
  <div class="title d-flex align-items-center">
  <img src="<?= base_url('assets/logo.png') ?>" alt="Logo" class="logo-icon"> Postify </div>
  <div class="actions">
    <a href="<?= base_url('/dashboard') ?>">View Post</a>
    <a href="#" onclick="document.querySelector('form').reset(); return false;">Delete</a>
    <button type="submit" form="postForm" class="btn-save">Save Post</button>
  </div>
</div>

<div class="main-container">
  <form id="postForm" method="post" action="<?= base_url('/posts/store') ?>">
    <div class="form-title">Post Title</div>
    <input type="text" name="title" class="form-control form-control-title" placeholder="Enter title here" required>

    <textarea name="content" id="editor"></textarea>
  </form>
</div>

<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/js/summernote-lite.min.js') ?>"></script>
<script>
  $(document).ready(function () {
    $('#editor').summernote({
      height: 600,
      placeholder: 'Type or paste your content here!'
    });
  });
</script>

</body>
</html>