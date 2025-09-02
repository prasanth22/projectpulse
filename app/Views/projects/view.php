<!-- Content Section -->
    <div class="col-md-12">

    <div class="row">
        <!-- Sidebar (Post Titles + Project Name) -->
        <div class="col-md-3">
        <div class="sticky-top" style="top: 70px;">
            <div class="bg-light rounded shadow-sm p-3 mb-3">
            <h6 class="text-primary fw-bold mb-3"><?= esc($project['name']) ?></h6>
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
            <div class="container">
            <div class="card shadow-sm p-4 position-relative">
                <div class="mb-3">
                    <button id="printBtn" class="btn btn-primary btn-sm">
                        <i class="bi bi-printer"></i> Print
                    </button>
                    <button id="pdfBtn" class="btn btn-success btn-sm">
                        <i class="bi bi-file-earmark-pdf"></i> Download PDF
                    </button>
                </div>

            
            <?php foreach ($posts as $index => $post): ?>
                <div class="post-content <?= $index === 0 ? '' : 'd-none' ?>" id="post-<?= $post['id'] ?>">
                    <h4><?= esc($post['title']) ?></h4>
                    <p><?= nl2br($post['content']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
        </div>
    </div>
    <!-- html2pdf.js CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const printBtn = document.getElementById('printBtn');
    const pdfBtn = document.getElementById('pdfBtn');

    // Print only the active post content
    printBtn.addEventListener('click', function () {
        const activePost = document.querySelector('.post-content:not(.d-none)');
        if (activePost) {
            const printWindow = window.open('', '', 'height=600,width=800');
            printWindow.document.write('<html><head><title>Print Post</title>');
            printWindow.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">');
            printWindow.document.write('</head><body>');
            printWindow.document.write(activePost.outerHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    });

    // PDF generation
    pdfBtn.addEventListener('click', function () {
        const activePost = document.querySelector('.post-content:not(.d-none)');
        if (activePost) {
            const opt = {
                margin: 10,
                filename: 'post.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };
            html2pdf().from(activePost).set(opt).save();
        }
    });
});

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
   

