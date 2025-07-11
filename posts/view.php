<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= esc($post['title']) ?> | Postify</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/blog.css') ?>">
</head>
<style>
    .header {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        font-size: 28px;
        font-weight: bold;
        color: #e52f1b;
        margin-bottom: 30px;
        font-family: 'Segoe UI', sans-serif;
    }
</style>
<body>

<div class="header">
  <img src="<?= base_url('assets/logo.png') ?>" alt="Logo" class="logo-icon">
  Postify
</div>

<div class="post-box">
  <div class="post-title"><?= esc($post['title']) ?></div>
  <div class="post-meta">
    Published on: <?= date('F d, Y', strtotime($post['created_at'])) ?>
    <span class="author">Written by: <?= esc($author['name']) ?></span>
  </div>

  <div class="post-content">
    <?= $post['content'] ?>
  </div>
</div>

</body>
</html>