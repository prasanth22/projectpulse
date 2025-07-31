<!-- Content Section -->
    <div class="col-md-12">

    <div class="row">
        <!-- Sidebar (Post Titles + Project Name) -->
        <div class="col-md-3">
        <div class="sticky-top" style="top: 70px;">
            <div class="bg-light rounded shadow-sm p-3 mb-3">
            <h6 class="text-primary fw-bold mb-3"><?= esc($project['project_name']) ?></h6>
            <ul class="list-group" id="postList">
                <?php foreach ($posts as $index => $post): ?>
                <li class="list-group-item post-title-1 <?= $index === 0 ? 'active-title' : '' ?>" data-id="<?= $post['id'] ?>">
                    <?= esc($post['title']) ?>
                </li>
                <?php endforeach; ?>
            </ul>
            </div>
        </div>
        </div>


        <!-- Post Content -->
        <div class="col-md-9">
            
            <?php foreach ($posts as $index => $post): ?>
                <div class="post-content <?= $index === 0 ? '' : 'd-none' ?>" id="post-<?= $post['id'] ?>">
                    <h4><?= esc($post['title']) ?></h4>
                    <p><?= nl2br($post['content']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const postTitles = document.querySelectorAll('.post-title-1');
        const postContents = document.querySelectorAll('.post-content');

        postTitles.forEach(title => {
            title.addEventListener('click', function () {
                // Remove active class from all titles
                postTitles.forEach(t => t.classList.remove('active-title'));
                this.classList.add('active-title');

                // Hide all post contents
                postContents.forEach(content => content.classList.add('d-none'));

                // Show the selected post
                const postId = this.getAttribute('data-id');
                const activePost = document.getElementById('post-' + postId);
                if (activePost) {
                    activePost.classList.remove('d-none');
                }
            });
        });
    });
</script>

</div>
    </div>
   

