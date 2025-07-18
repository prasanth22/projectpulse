    </div> <!-- /.row -->
  </main>

  <footer class="text-center text-muted mt-5 mb-4">
    &copy; <?= date('Y') ?> ProjectPulse. Built for NIC Collaboration.
  </footer>

  <!-- Add Post Modal -->
<div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <form action="<?= site_url('posts/create') ?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="addPostLabel">Create a Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="project_id" class="form-label">Select Project</label>
            <select class="form-select" name="project_id" required>
              <option value="">-- Select Project --</option>
              <?php foreach ($projects as $project): ?>
                <option value="<?= $project['id'] ?>"><?= esc($project['project_name']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Post Title</label>
            <input type="text" name="title" class="form-control" placeholder="What's your question or idea?" required>
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="5" placeholder="Add more context or explanation..." required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Post</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- At the very end of the HTML before </body> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
