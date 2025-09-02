<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Create Project / Topic</h2>

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

    <form action="<?= site_url('admin/projects_topics/store') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label d-block">Type</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="type-project" value="project" required>
                <label class="form-check-label" for="type-project">Project</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="type-topic" value="topic">
                <label class="form-check-label" for="type-topic">Topic</label>
            </div>
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3" id="project-head-section" style="display: none;">
            <label>Project Head</label>
            <select name="project_head" class="form-control" id="project-head-select">
                <option value="">Select</option>
                <?php foreach ($employees as $emp): ?>
                    <option value="<?= $emp['id'] ?>"><?= esc($emp['name']) ?> (<?= esc($emp['email']) ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Hidden input used only if topic is selected -->
        <input type="hidden" name="project_head" value="1" id="default-head" disabled>

        <button class="btn btn-primary">Create</button>
        <a href="<?= site_url('admin/projects_topics') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const projectRadio = document.getElementById('type-project');
        const topicRadio = document.getElementById('type-topic');
        const headSection = document.getElementById('project-head-section');
        const headSelect = document.getElementById('project-head-select');
        const defaultHeadInput = document.getElementById('default-head');

        function toggleHeadSection() {
            if (projectRadio.checked) {
                headSection.style.display = 'block';
                headSelect.disabled = false;
                headSelect.setAttribute('required', 'required');
                defaultHeadInput.disabled = true;
            } else if (topicRadio.checked) {
                headSection.style.display = 'none';
                headSelect.disabled = true;
                headSelect.removeAttribute('required');
                defaultHeadInput.disabled = false;
            }
        }

        projectRadio.addEventListener('change', toggleHeadSection);
        topicRadio.addEventListener('change', toggleHeadSection);

        // Initial state if the form is reloaded
        toggleHeadSection();
    });
</script>

<?= $this->endSection() ?>
