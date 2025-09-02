<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>

<div class="container mt-3">

  <!-- Question Section -->
  <div class="card mb-4">
    <div class="card-body">
      <h4 class="card-title"><?= esc($question['content']) ?></h4>
      <p class="text-muted">
        Asked by <strong><?= esc($question['author_name'] ?? 'Unknown') ?></strong>
        on <?= date('M d, Y H:i', strtotime($question['created_at'])) ?>
      </p>
    </div>
  </div>

  <!-- Answers Section -->
  <div class="d-flex justify-content-between align-items-center mb-3">
  <h5><?= count($answers) ?> Answer<?= count($answers) !== 1 ? 's' : '' ?></h5>

  <?php if ($userAnswer): ?>
    <!-- User already answered -->
    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editAnswerModal">
      <i class="bi bi-pencil-square"></i> Edit Your Answer
    </button>
  <?php else: ?>
    <!-- User has not answered yet -->
    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addAnswerModal">
      <i class="bi bi-pencil"></i> Write Answer
    </button>
  <?php endif; ?>
</div>

  <?php if (empty($answers)): ?>
    <p class="text-muted">No one has answered this question yet. Be the first!</p>
  <?php else: ?>
    <?php foreach ($answers as $answer): ?>
      <div class="card mb-3">
        <div class="card-body">
          <p><?= esc($answer['content']) ?></p>
          <div class="text-muted small">
            Answered by <strong><?= esc($answer['author_name'] ?? 'Unknown') ?></strong>
            on <?= date('M d, Y H:i', strtotime($answer['created_at'])) ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>

</div>

<!-- Add Answer Modal -->
<div class="modal fade" id="addAnswerModal" tabindex="-1" aria-labelledby="addAnswerLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <form action="<?= site_url('answers/store') ?>" method="post">
        <input type="hidden" name="question_id" value="<?= $question['id'] ?>">
        <div class="modal-header">
          <h5 class="modal-title" id="addAnswerLabel">Your Answer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <textarea name="content" class="form-control" rows="5"
            placeholder="Write your answer here..." required></textarea>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Post Answer</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php if ($userAnswer): ?>
<div class="modal fade" id="editAnswerModal" tabindex="-1" aria-labelledby="editAnswerLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <form action="<?= site_url('answers/update/' . $userAnswer['id']) ?>" method="post">
        <?= csrf_field() ?>
        <div class="modal-header">
          <h5 class="modal-title" id="editAnswerLabel">Edit Your Answer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <textarea name="content" class="form-control" rows="5" required><?= esc($userAnswer['content']) ?></textarea>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Update Answer</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endif; ?>


<?= $this->endSection() ?>