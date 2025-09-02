<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<!-- Flash messages -->
<?php if (session()->getFlashdata('success')) : ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')) : ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('error') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<div class="container mt-4">

  <?php if (!empty($questions)): ?>
      <?php foreach ($questions as $q): ?>
          <div class="card mb-3">
              <div class="card-body">
                  <h5>
                      <a href="<?= site_url('answers/view/' . $q['id']) ?>">
                          <?= esc($q['content']) ?>
                      </a>
                  </h5>
              
                  <small>
                      Asked by <strong><?= esc($q['author_name']) ?></strong> 
                      in <em><?= esc($q['project_topic_title']) ?></em> 
                      on <?= date('M d, Y', strtotime($q['created_at'])) ?>
                  </small>
                  <br>

                  <?php if ($q['total_answers'] == 0): ?>
                      <span class="badge bg-warning">Unanswered</span>
                  <?php else: ?>
                      <span class="badge bg-success"><?= $q['total_answers'] ?> Answers</span>
                  <?php endif; ?>

                  <!-- Answer button -->
                    <button 
                    class="btn btn-sm btn-primary mt-2 answer-btn" 
                    data-bs-toggle="modal" 
                    data-bs-target="#answerQuestionModal"
                    data-question-id="<?= $q['id'] ?>"
                    data-question-text="<?= esc($q['content']) ?>">
                    Answer
                    </button>

              </div>
          </div>
      <?php endforeach; ?>
  <?php else: ?>
      <p>No questions yet.</p>
  <?php endif; ?>
</div>

<!-- Answer Question Modal -->
<div class="modal fade" id="answerQuestionModal" tabindex="-1" aria-labelledby="answerQuestionLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <form action="<?= site_url('answers/store') ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="question_id" id="answer_question_id">

        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <!-- Question preview -->
          <div class="mb-3">
            <label class="form-label">Question</label>
            <p id="answer_question_text" class="fw-bold"></p>
          </div>

          <!-- Answer Content -->
          <div class="mb-3">
            <label for="answer_content" class="form-label">Your Answer</label>
            <textarea id="summernoteAnswer" name="content" class="form-control" rows="5"
              placeholder="Write your answer here..." required></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Post Answer</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function () {
  const answerButtons = document.querySelectorAll(".answer-btn");
  const questionIdInput = document.getElementById("answer_question_id");
  const questionText = document.getElementById("answer_question_text");

  answerButtons.forEach(btn => {
    btn.addEventListener("click", function () {
      const qId = this.getAttribute("data-question-id");
      const qText = this.getAttribute("data-question-text");

      questionIdInput.value = qId;
      questionText.textContent = qText;
    });
  });
});
</script>


<?= $this->endSection() ?>
