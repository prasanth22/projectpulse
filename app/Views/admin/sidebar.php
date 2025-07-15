<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/dashboard">
        <div class="sidebar-brand-text mx-3">ProjectPulse</div>
    </a>

    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="<?= site_url('/admin/dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/admin/users') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Manage Users</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/admin/projects') ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Manage Projects</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
</ul>
