<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title ?? 'Admin Panel' ?> - ProjectPulse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SB Admin 2 CSS -->
    <link href="/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/admin/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        /* Override primary color with NIC light blue */
        .bg-gradient-primary {
            background-color: #4ea8ff !important;
            background-image: none !important;
        }
        .text-primary {
            color: #4ea8ff !important;
        }
        .btn-primary {
            background-color: #4ea8ff !important;
            border-color: #4ea8ff !important;
        }
        .btn-primary:hover {
            background-color: #2b8bd6 !important;
        }
    </style>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?= view('admin/sidebar') ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <!-- Topbar -->
            <?= view('admin/topbar') ?>
            <!-- End of Topbar -->

            <!-- Main Content -->
            <div class="container-fluid">
                <?= $this->renderSection('content') ?>
            </div>

        </div>

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto text-center">
                <span>© <?= date('Y') ?> ProjectPulse Admin Panel</span>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
</div>

<!-- JS Scripts -->
<script src="/admin/vendor/jquery/jquery.min.js"></script>
<script src="/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="/admin/js/sb-admin-2.min.js"></script>

</body>
</html>
