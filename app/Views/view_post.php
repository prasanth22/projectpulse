<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<!-- Flash messages -->
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

<div class="container">
  <div class="card shadow-sm p-4 position-relative">

    <!-- Edit Button (Top Right) -->
    <?php if ($canEdit): ?>
      <button class="btn btn-sm btn-outline-primary position-absolute top-0 end-0 m-3"
              data-bs-toggle="modal" data-bs-target="#editPostModal">
        <i class="bi bi-pencil"></i> Edit
      </button>
    <?php endif; ?>

    <h3><?= esc($post['title']) ?></h3>
    <p class="text-muted mb-1">
      by <strong><?= esc($post['author_name']) ?></strong> (<?= esc($post['author_email']) ?>)
      in <strong><?= esc($post['project_name']) ?></strong>
    </p>
    <hr>
    <p><?= $post['content'] ?></p>
  </div>
</div>

<!-- Edit Modal --><!-- Full-size Edit Modal -->
<div class="modal fade" id="editPostModal" tabindex="-1" aria-labelledby="editPostModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"> <!-- Large modal for full form -->
    <form action="<?= site_url('posts/update/' . $post['id']) ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="mb-3">
            <label for="title">Post Title</label>
            <input type="text" name="title" class="form-control" value="<?= esc($post['title']) ?>" required>
          </div>

          <div class="mb-3">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" rows="8" required><?= esc($post['content']) ?></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update Post</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection() ?>
