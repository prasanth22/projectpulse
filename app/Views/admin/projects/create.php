<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Create Project</h2>

    <form action="<?= site_url('admin/projects/store') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label>Project Name</label>
            <input type="text" name="project_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label>Project Head</label>
            <select name="project_head" class="form-control" required>
                <option value="">Select</option>
                <?php foreach ($employees as $emp): ?>
                    <option value="<?= $emp['id'] ?>"><?= esc($emp['name']) ?> (<?= esc($emp['email']) ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>

        <button class="btn btn-primary">Create</button>
        <a href="<?= site_url('admin/projects') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>


<?= $this->endSection() ?>
