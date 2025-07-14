<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<!-- Flash messages -->
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('error') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> 
  <?php endif; ?>

  <!-- Your post cards, etc. -->
  <?php foreach ($posts as $post): ?>
        <div class="post-card mb-4 p-3 bg-white rounded shadow-sm">
          <h5 class="post-title"><?= esc($post['title']) ?></h5>
          <p class="mb-1 text-muted">by <span class="author"><?= esc($post['author_name']) ?></span> in <strong><?= esc($post['project_name']) ?></strong></p>
          <p>
            <?= esc(word_limiter($post['content'], 60)) ?>
            <a href="<?= site_url('posts/view/' . $post['id']) ?>" class="text-primary text-decoration-none">Read more</a>
          </p>
        </div>
      <?php endforeach; ?>

<?= $this->endSection() ?>
