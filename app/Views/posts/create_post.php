
<style>
    body {
        background-color: #f8f9fa;
    }

    /* Sticky main toolbar (below navbar) */
    .editor-toolbar {
        position: sticky;
        top: 70px; /* height of navbar */
        background: #fff;
        padding: 8px 15px;
        z-index: 1001;
        border-bottom: 1px solid #ddd;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Full-width editor */
    .editor-container {
        background: white;
        min-height: calc(120vh - 140px); /* full height minus nav+toolbar */
        padding: 20px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
        margin: 0 auto;
        max-width: 100%;
    }

    /* Title styling */
    .editor-title {
        font-size: 1.8rem;
        border: none;
        outline: none;
        width: 100%;
        font-weight: bold;
        margin-bottom: 15px;
    }

    /* Make Summernote toolbar sticky */
    .note-toolbar {
        position: sticky !important;
        top: 118px; /* navbar (70px) + main toolbar (48px) */
        z-index: 1000;
        background: white;
        border-bottom: 1px solid #ddd;
    }
</style>

<form action="<?= site_url('posts/create') ?>" method="post" onsubmit="return validatePostForm()">
    <?= csrf_field() ?>

    <!-- Main Toolbar -->
    <div class="editor-toolbar">
        <div>
            <!-- Type -->
            <label class="me-2">
                <input type="radio" name="type" value="project" checked> Project
            </label>
            <label class="me-3">
                <input type="radio" name="type" value="topic"> Topic
            </label>

            <!-- Dropdowns -->
            <select name="project_id" id="projectDropdown" class="form-select d-inline-block me-2" style="width:auto;">
                <option value="">Select Project</option>
                <?php foreach ($projects as $p): ?>
                    <option value="<?= $p['id'] ?>"><?= esc($p['name']) ?></option>
                <?php endforeach; ?>
            </select>

            <select name="topic_id" id="topicDropdown" class="form-select d-inline-block d-none" style="width:auto;">
                <option value="">Select Topic</option>
                <?php foreach ($topics as $t): ?>
                    <option value="<?= $t['id'] ?>"><?= esc($t['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Buttons -->
        <div>
            <button type="submit" class="btn btn-success btn-sm">Publish</button>
            <a href="<?= site_url('home') ?>" class="btn btn-secondary btn-sm">Cancel</a>
        </div>
    </div>

    <!-- Editor Body -->
    <div class="editor-container">
        <!-- Title -->
        <input type="text" name="title" placeholder="Enter post title..." class="editor-title" required>

        <!-- Content -->
        <textarea id="summernote" name="content"></textarea>
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


    // Toggle dropdowns
    $('input[name="type"]').on('change', function () {
        if ($(this).val() === 'project') {
            $('#projectDropdown').removeClass('d-none');
            $('#topicDropdown').addClass('d-none').val('');
        } else {
            $('#topicDropdown').removeClass('d-none');
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
