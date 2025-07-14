<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Welcome to Admin Dashboard</h2>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Projects</h5>
                    <p class="card-text fs-4"><?= esc($projectCount) ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text fs-4"><?= esc($userCount) ?></p>
                </div>
            </div>
        </div>
    </div>

    <h4>Recent Projects</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Project</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recentProjects as $project): ?>
                <tr>
                    <td><?= $project['id'] ?></td>
                    <td><?= esc($project['project_name']) ?></td>
                    <td>
                        <?= word_limiter(strip_tags($project['description']), 10) ?>
                        <a href="<?= base_url('admin/projects/edit/' . $project['id']) ?>">Read more</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?= $this->endSection() ?>
