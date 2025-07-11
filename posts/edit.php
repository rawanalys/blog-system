<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Post | Postify</title>
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
    <a href="<?= base_url('/posts/delete/' . $post['id']) ?>" onclick="return confirm('Delete this post?')">Delete</a>
    <button type="submit" form="editForm" class="btn-save">Save Post</button>
  </div>
</div>

<div class="main-container">
  <form id="editForm" method="post" action="<?= base_url('/posts/update/' . $post['id']) ?>">
    <div class="form-title">Post Title</div>
    <input type="text" name="title" class="form-control form-control-title" value="<?= esc($post['title']) ?>" required>

    <textarea name="content" id="editor"><?= esc($post['content']) ?></textarea>
  </form>
</div>

<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/js/summernote-lite.min.js') ?>"></script>
<script>
  $(document).ready(function () {
    $('#editor').summernote({
      height: 600
    });
  });
</script>

</body>
</html>