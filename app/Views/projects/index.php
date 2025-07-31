<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
 <?php 
//  echo '<pre>';
//          print_r($projects);
//          echo '</pre>';
//          exit;
         ?>

<div class="row">
    <?php foreach ($projects_with_post_c as $project): ?>
        
        <div class="col-md-4 mb-4">
            <a href="<?= site_url('projects/view/' . $project['id']) ?>" class="text-decoration-none text-dark">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-primary"><?= esc($project['project_name']) ?></h5>
                    <p class="card-text text-muted">
                        <strong>Project Head:</strong> <?= esc($project['project_head']) ?><br>
                         <?php if ($project['post_count'] > 0): ?>
                            <strong>Posts:</strong> <?= $project['post_count'] ?><br>
                        <?php endif; ?>
                    </p>
                    <p class="card-text">
                        <?= character_limiter(esc($project['description']), 120) ?>
                    </p>
                </div>
            </div>
            </a>
        </div>
        
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>
