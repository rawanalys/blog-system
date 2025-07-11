<?php
function first_sentence($text) {
  $plain = strip_tags($text);              
  $periodPos = strpos($plain, '.');        
  return $periodPos !== false
      ? substr($plain, 0, $periodPos + 1)  
      : word_limiter($plain, 7);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Postify | Home</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/blog.css') ?>">
</head>
<body>

<div class="header-wrapper">
  <div></div> 
  <div class="header">
    <img src="<?= base_url('assets/logo.png') ?>" class="logo-icon" alt="Postify">
    Postify
  </div>
  <div class="login-btn">
    <a href="<?= base_url('/auth') ?>" class="btn btn-outline-danger btn-sm">Login</a>
  </div>
</div>

<div class="post-container">
  <?php foreach ($posts as $post): ?>
    <div class="post-box">
      <div class="post-title">
        <a href="<?= base_url('/posts/view/' . $post['id']) ?>">
          <?= esc($post['title']) ?>
        </a>
      </div>
      <div class="post-content">
        <?= esc(first_sentence($post['content'])) ?>
      </div>
      <div class="post-meta">
        <?= date('F d, Y', strtotime($post['created_at'])) ?>,
        <span class="author">
          <a href="<?= base_url('/author/' . $post['user_id']) ?>"><?= esc($post['author_name']) ?></a>
        </span>
      </div>
    </div>
  <?php endforeach; ?>
</div>

</body>
</html>