<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>

<div class="row">
    <?php foreach ($projects_with_post_c as $item): ?>
        <div class="col-md-4 mb-4">
            <a href="<?= site_url($item['type'] . 's/view/' . $item['id']) ?>" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-primary">
                            <?= esc($item['name']) ?>
                        </h5>
                        <p class="card-text text-muted">
                           
                                <strong>Assigned Head:</strong> Admin <br>

                            <?php if ($item['post_count'] > 0): ?>
                                <strong>Posts:</strong> <?= $item['post_count'] ?><br>
                            <?php endif; ?>
                        </p>
                        <p class="card-text">
                            <?= character_limiter(esc($item['description']), 120) ?>
                        </p>
                        <span class="badge bg-secondary text-capitalize">
                            <?= esc($item['type']) ?>
                        </span>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>
