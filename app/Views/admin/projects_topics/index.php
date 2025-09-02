<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>All Projects/Topics</h2>
    <a href="<?= site_url('admin/projects_topics/create') ?>" class="btn btn-primary mb-3">Add New Project/Topic</a>

    <!-- Flash Message -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <!-- Projects Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Project Title</th>
                <th>Description</th>
                <th>Project Head</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?= $project['id'] ?></td>
                    <td><?= esc($project['name']) ?></td>
                    <td><?= word_limiter(strip_tags($project['description']), 10) ?></td>
                    <td><?= esc($project['head_name']) ?></td>
                    <td>
                        <a href="<?= site_url('admin/projects_topics/edit/'.$project['id']) ?>" class="btn btn-sm btn-info">Edit</a>
                        <a href="<?= site_url('admin/projects_topics/delete/'.$project['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this project?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <hr class="my-5">

    <!-- Topics Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Topic Title</th>
                <th>Description</th>
                <th>Assigned Head</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($topics as $topic): ?>
                <tr>
                    <td><?= $topic['id'] ?></td>
                    <td><?= esc($topic['name']) ?></td>
                    <td><?= word_limiter(strip_tags($topic['description']), 10) ?></td>
                    <td><?= esc($topic['head_name']) ?></td>
                    <td>
                        <a href="<?= site_url('admin/projects_topics/edit/'.$topic['id']) ?>" class="btn btn-sm btn-info">Edit</a>
                        <a href="<?= site_url('admin/projects_topics/delete/'.$topic['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this topic?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
