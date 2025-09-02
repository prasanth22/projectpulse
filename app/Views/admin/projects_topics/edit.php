<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Edit <?= ucfirst($project['type']) ?></h2>

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

    <form action="<?= site_url('admin/projects_topics/update/'.$project['id']) ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label>Type</label><br>
            <div class="form-check form-check-inline">
                <input type="radio" name="type" id="type_project" class="form-check-input" value="project"
                    <?= $project['type'] === 'project' ? 'checked' : '' ?> disabled>
                <label for="type_project" class="form-check-label">Project</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="type" id="type_topic" class="form-check-input" value="topic"
                    <?= $project['type'] === 'topic' ? 'checked' : '' ?> disabled>
                <label for="type_topic" class="form-check-label">Topic</label>
            </div>
            <input type="hidden" name="type" value="<?= $project['type'] ?>">
        </div>

        <div class="mb-3">
            <label><?= ucfirst($project['type']) ?> Title</label>
            <input type="text" name="name" class="form-control" value="<?= esc($project['name']) ?>" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4" required><?= esc($project['description']) ?></textarea>
        </div>

        <div class="mb-3">
        <label>Project Head</label>
        <select name="project_head" class="form-control" required <?= $project['type'] === 'topic' ? 'readonly' : '' ?>>
            <?php if ($project['type'] === 'topic'): ?>// Only admin ?>
                        <option value="1" selected>
                            Admin
                        </option>
            <?php else: ?>
                <?php foreach ($employees as $emp): ?>
                    <option value="<?= $emp['id'] ?>" <?= $emp['id'] == $project['project_head'] ? 'selected' : '' ?>>
                        <?= esc($emp['name']) ?> (<?= esc($emp['email']) ?>)
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>


        <button class="btn btn-primary">Update</button>
        <a href="<?= site_url('admin/projects_topics') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?= $this->endSection() ?>
