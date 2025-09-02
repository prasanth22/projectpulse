<style>
    body {
        background-color: #f8f9fa;
    }
    .editor-toolbar {
        position: sticky;
        top: 70px;
        background: #fff;
        padding: 8px 15px;
        z-index: 1001;
        border-bottom: 1px solid #ddd;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .editor-container {
        background: white;
        min-height: calc(120vh - 140px);
        padding: 20px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
        margin: 0 auto;
        max-width: 100%;
    }
    .editor-title {
        font-size: 1.8rem;
        border: none;
        outline: none;
        width: 100%;
        font-weight: bold;
        margin-bottom: 15px;
    }
    .note-toolbar {
        position: sticky !important;
        top: 118px;
        z-index: 1000;
        background: white;
        border-bottom: 1px solid #ddd;
    }
</style>

<form action="<?= site_url('posts/update/' . $post['id']) ?>" method="post" onsubmit="return validatePostForm()">
    <?= csrf_field() ?>

    <!-- Toolbar -->
    <div class="editor-toolbar">
        <div>
            <!-- Type -->
            <label class="me-2">
                <input type="radio" name="type" value="project" <?= $type === 'project' ? 'checked' : '' ?> disabled> Project
            </label>
            <label class="me-3">
                <input type="radio" name="type" value="topic" <?= $type === 'topic' ? 'checked' : '' ?> disabled> Topic
            </label>

            <!-- Project dropdown -->
            <select name="project_id" id="projectDropdown" class="form-select d-inline-block me-2 <?= $type !== 'project' ? 'd-none' : '' ?>" style="width:auto;" disabled>
                <option value="">Select Project</option>
                <?php foreach ($projects as $p): ?>
                    <option value="<?= $p['id'] ?>" <?= $type === 'project' && $post['project_topic_id'] == $p['id'] ? 'selected' : '' ?>>
                        <?= esc($p['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <!-- Topic dropdown -->
            <select name="topic_id" id="topicDropdown" class="form-select d-inline-block <?= $type !== 'topic' ? 'd-none' : '' ?>" style="width:auto;" disabled>
                <option value="">Select Topic</option>
                <?php foreach ($topics as $t): ?>
                    <option value="<?= $t['id'] ?>" <?= $type === 'topic' && $post['project_topic_id'] == $t['id'] ? 'selected' : '' ?>>
                        <?= esc($t['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <button type="submit" class="btn btn-success btn-sm">Update</button>
            <a href="<?= site_url('home') ?>" class="btn btn-secondary btn-sm">Cancel</a>
        </div>
    </div>

    <!-- Editor -->
    <div class="editor-container">
        <input type="text" name="title" value="<?= esc($post['title']) ?>" class="editor-title" required>
        <textarea id="summernote" name="content"><?= esc($post['content']) ?></textarea>
    </div>
</form>

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

<!-- Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function () {
    $('#summernote').summernote({
        height: 800,
        placeholder: 'Start writing your post...',
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['fontsize', 'color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'video', 'table', 'hr']],
            ['view', ['codeview', 'help']]
        ],
        callbacks: {
            onImageUpload: function(files) {
                for (let i = 0; i < files.length; i++) {
                    uploadImage(files[i]);
                }
            }
        }
    });

    $('input[name="type"]').on('change', function () {
        if ($(this).val() === 'project') {
            $('#projectDropdown').removeClass('d-none').val('<?= $post['project_topic_id'] ?>');
            $('#topicDropdown').addClass('d-none').val('');
        } else {
            $('#topicDropdown').removeClass('d-none').val('<?= $post['project_topic_id'] ?>');
            $('#projectDropdown').addClass('d-none').val('');
        }
    });

    $('.searchable-dropdown').select2({
      dropdownParent: $('#addQuestionModal'), // ensures it shows inside modal
      width: '100%',
      placeholder: "-- Select Project/Topic --",
      allowClear: true
    });

});

function uploadImage(file) {
    const data = new FormData();
    data.append("image", file);
    $.ajax({
        url: "<?= site_url('posts/upload_image') ?>",
        method: "POST",
        data: data,
        contentType: false,
        processData: false,
        success: function (url) {
            const imgNode = $('<img>').attr('src', url).css('width', '100%');
            $('#summernote').summernote('insertNode', imgNode[0]);
        },
        error: function () {
            alert("Image upload failed.");
        }
    });
}

function validatePostForm() {
    const type = $('input[name="type"]:checked').val();
    if (type === 'project' && !$('select[name="project_id"]').val()) {
        alert('Please select a project.');
        return false;
    }
    if (type === 'topic' && !$('select[name="topic_id"]').val()) {
        alert('Please select a topic.');
        return false;
    }
    const title = $('[name="title"]').val().trim();
    const content = $('#summernote').summernote('code').trim();
    if (!title || content === '' || content === '<p><br></p>') {
        alert('Title and content are required.');
        return false;
    }
    return true;
}
</script>
