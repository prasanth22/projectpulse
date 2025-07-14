<?= $this->extend('layouts/base') ?>
<?= $this->section('content') ?>

  <div class="card shadow-sm p-4">
    <h4 class="mb-3">Edit Profile</h4>
    <form action="<?= site_url('user/profile/update') ?>" method="post">
      <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?= esc($user['name']) ?>" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?= esc($user['email']) ?>" required>
      </div>
      <div class="mb-3">
        <label>Mobile</label>
        <input type="text" name="mobile" class="form-control" value="<?= esc($user['mobile_number'] ?? '') ?>">
      </div>
      <div class="mb-3">
        <label>Bio</label>
        <textarea name="bio" class="form-control" rows="3"><?= esc($user['bio'] ?? '') ?></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>

<?= $this->endSection() ?>
