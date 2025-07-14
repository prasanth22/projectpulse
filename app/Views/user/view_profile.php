<?= $this->extend('layouts/base') ?>
<?= $this->section('content') ?>


  <div class="card shadow-sm p-4">
    <div class="d-flex align-items-center">
      <img src="<?= base_url('img/user.png') ?>" width="80" class="rounded-circle me-3">
      <div>
        <h4 class="mb-0"><?= esc($user['name']) ?></h4>
        <small class="text-muted"><?= esc($user['email']) ?></small><br>
        <small class="text-muted"><?= esc($user['mobile_number'] ?? 'N/A') ?></small>
      </div>
    </div>
    <hr>
    <?php if (session()->getFlashdata()) : ?>
    <?php foreach (['success', 'error', 'warning'] as $type): ?>
        <?php if ($msg = session()->getFlashdata($type)) : ?>
        <div class="alert alert-<?= $type ?> alert-dismissible fade show" role="alert">
            <?= $msg ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php endif; ?>
    <p><strong>Bio:</strong><br>Scientific Officer/Engineer-SB</p>
    <a href="<?= site_url('user/profile/edit') ?>" class="btn btn-outline-primary">Edit Profile</a>
  </div>


<?= $this->endSection() ?>
