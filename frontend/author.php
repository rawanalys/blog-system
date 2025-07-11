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
  <title><?= esc($author['name']) ?> | Author Posts</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/blog.css') ?>">
</head>
<body>

<div class="header-wrapper">
  <div></div> 
  <div class="header">
    <img src="<?= base_url('assets/logo.png') ?>" class="logo-icon" alt="Postify">Postify
  </div>
</div>

<div class="post-container">
  <div style="text-align: center; margin-bottom: 50px;">
    <div style="font-size: 20px; color: #555;">Author</div>
    <div style="font-size: 30px;"><?= esc($author['name']) ?></div>
    <div style="font-size: 20px; color: #555;"><?= count($posts) ?> Posts</div>
  </div>

  <?php if (!empty($posts)): ?>
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
          <?= date('F d, Y', strtotime($post['created_at'])) ?>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p style="text-align: center; color: #777;">No posts found for this author.</p>
  <?php endif; ?>
</div>

</body>
</html>