    </div> <!-- /.row -->
  </main>

  <footer class="text-center text-muted mt-5 mb-4">
    &copy; <?= date('Y') ?> ProjectPulse. Built for NIC Collaboration.
  </footer>

<!-- Add Question Modal -->
<div class="modal fade" id="addQuestionModal" tabindex="-1" aria-labelledby="addQuestionLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <form action="<?= site_url('questions/create') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="addQuestionLabel">Ask a Question</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">

          <!-- Select Project/Topic -->
          <div class="mb-3">
            <label for="project_topic_id" class="form-label">Related To</label>
            <select class="form-select searchable-dropdown" name="project_topic_id" required>
              <option value="">-- Select Project/Topic --</option>
              <optgroup label="Projects">
                <?php foreach ($projects as $project): ?>
                  <option value="<?= $project['id'] ?>">📂 <?= esc($project['name']) ?></option>
                <?php endforeach; ?>
              </optgroup>
              <optgroup label="Topics">
                <?php foreach ($topics as $topic): ?>
                  <option value="<?= $topic['id'] ?>">📝 <?= esc($topic['name']) ?></option>
                <?php endforeach; ?>
              </optgroup>
            </select>
          </div>

          <!-- Question Content -->
          <div class="mb-3">
            <label for="content" class="form-label">Your Question</label>
            <textarea id="summernote" name="content" class="form-control" rows="5"
              placeholder="Write your question here..." required></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Ask Question</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function() {
    $('.searchable-dropdown').select2({
      dropdownParent: $('#addQuestionModal'), // ensures it shows inside modal
      width: '100%',
      placeholder: "-- Select Project/Topic --",
      allowClear: true
    });
  });
</script>





  </body>
</html>
