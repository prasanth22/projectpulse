<!-- Sidebar -->
 
 
<div class="col-md-3">
  <!-- Set lower z-index for sticky sidebar -->
  <div class="sticky-top" style="top: 90px; z-index: 1020;">
  
    <!-- Trending Projects -->
    <div class="mb-4 p-3 bg-white rounded shadow-sm">
      <h6 class="text-primary">Trending Projects</h6>
      <?php if (!empty($trendingProjects)) { ?>
        <ul class="list-unstyled mb-0">
          <?php foreach ($trendingProjects as $project) { ?>
            <li>
              <a href="<?= site_url('projects/view/' . $project['id']) ?>" class="text-decoration-none text-dark">
                <?= esc($project['project_name']) ?>
              </a>
            </li>
          <?php } ?>
        </ul>
      <?php } else { ?>
        <p class="text-muted mb-0">No trending projects at the moment.</p>
      <?php } ?>
    </div>

    <!-- Help Section -->
    <div class="p-3 bg-white rounded shadow-sm">
      <h6 class="text-primary">Need Help?</h6>
      <ul class="list-unstyled mb-0">
        <li><a href="#" class="text-decoration-none text-dark">Admin Queries FAQ</a></li>
        <li><a href="#" class="text-decoration-none text-dark">How to Post</a></li>
        <li><a href="#" class="text-decoration-none text-dark">Permission Roles</a></li>
      </ul>
    </div>

  </div>
</div>
