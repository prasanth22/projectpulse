<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>All Projects</h2>
    <a href="<?= site_url('admin/projects/create') ?>" class="btn btn-primary mb-3">Add New Project</a>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Project Name</th>
                <th>Description</th>
                <th>Project Head</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?= $project['id'] ?></td>
                    <td><?= esc($project['project_name']) ?></td>
                    <td>
                        <?= word_limiter(strip_tags($project['description']), 10) ?>
                        <a href="<?= site_url('admin/projects/edit/' . $project['id']) ?>">Read more</a>
                    </td>
                    <td><?= esc($project['head_name']) ?></td>
                    <td>
                        <a href="<?= site_url('admin/projects/edit/'.$project['id']) ?>" class="btn btn-sm btn-info">Edit</a>
                        <a href="<?= site_url('admin/projects/delete/'.$project['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
