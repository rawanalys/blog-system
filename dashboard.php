<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Postify | Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
</head>
<body>
<div class="header">
  <div class="title d-flex align-items-center">
  <img src="<?= base_url('assets/logo.png') ?>" alt="Logo" class="logo-icon"> Postify </div>
  <a href="<?= base_url('/posts/create') ?>" class="btn btn-orange">➕ New post</a>
</div>
<div class="content">
  <b>All Post</b>
  <div id="alert-container"></div>
  <?php if (session()->getFlashdata('success')): ?>
    <div class="flash-popup success">
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="flash-popup error">
      <?= session()->getFlashdata('error') ?>
    </div>
  <?php endif; ?>

  <table class="table custom-table">
    <thead>
      <tr>
        <th style="width: 55%;">Title</th>
        <th style="width: 15%;">Author</th>
        <th style="width: 15%;">Date</th>
        <th style="width: 15%;">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
          <tr>
            <td><?= esc($post['title']) ?></td>
            <td><?= esc($post['author_name']) ?></td>
            <td><?= date('Y-m-d', strtotime($post['created_at'])) ?></td>
            <td class="actions">
              <a href="<?= base_url('/posts/view/' . $post['id']) ?>">View</a>
              <a href="<?= base_url('/posts/edit/' . $post['id']) ?>">Edit</a>
              <a href="#" class="delete-post" data-id="<?= $post['id'] ?>">Delete</a>            
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr><td colspan="4" class="text-center">No posts found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<script>
  $(document).on('click', '.delete-post', function (e) {
    e.preventDefault();
    const postId = $(this).data('id');
    if (confirm('Are you sure you want to delete this post?')) {
      $.ajax({
        url: "<?= base_url('/posts/delete/') ?>" + postId,
        method: "GET",
        success: function (response) 
        {$('#alert-container').html(`<div class="flash-popup success">Post deleted successfully!</div>`);
        $(`a[data-id="${postId}"]`).closest('tr').remove();  
        },
        error: function () {
          alert('Failed to delete post. Please try again.');
        }
      });
    }
  });
</script>
</body>
</html>