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
            <a href="<?= site_url('posts/edit/' . $post['id']) ?>" 
               class="btn btn-sm btn-outline-primary position-absolute top-0 end-0 m-3">
                <i class="bi bi-pencil"></i> Edit
            </a>
        <?php endif; ?>

    <h3><?= esc($post['title']) ?></h3>
    <p class="text-muted mb-1">
      by <strong><?= esc($post['author_name']) ?></strong> (<?= esc($post['author_email']) ?>)
      in <strong><?= esc($post['name']) ?></strong>
    </p>
    <hr>
    <p><?= $post['content'] ?></p>
  </div>
</div>


<?= $this->endSection() ?>
