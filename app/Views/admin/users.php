<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h1 class="h3 mb-4 text-gray-800">Manage Users</h1>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<table class="table table-bordered table-hover">
    <thead class="table-primary">
        <tr>
            <th>Name</th><th>Email</th><th>Status</th><th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= esc($user['name']) ?></td>
            <td><?= esc($user['email']) ?></td>
            <td>
                <?= ucfirst($user['status']) ?>
            </td>
            <td>
                <?php if ($user['status'] == 'active'): ?>
                    <a href="/admin/users/block/<?= $user['id'] ?>" class="btn btn-sm btn-danger">Block</a>
                <?php else: ?>
                    <a href="/admin/users/activate/<?= $user['id'] ?>" class="btn btn-sm btn-success">Activate</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
