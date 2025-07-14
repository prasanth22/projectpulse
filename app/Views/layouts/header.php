<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ProjectPulse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
  </head>
  <body>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm sticky-top">
    <div class="container">
      <a class="navbar-brand text-primary" href="<?= site_url('home') ?>">ProjectPulse</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" href="<?= site_url('home') ?>">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Answer</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Projects</a></li>
        </ul>
        
        <button class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#addPostModal">
          Add Content
        </button>

        <div class="dropdown">
          <a class="dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
            <img src="<?= base_url('img/user.png') ?>" alt="Profile" class="rounded-circle" width="40" height="40">
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li class="px-3 py-2">
              <strong><?= esc($user['name']) ?></strong><br>
              <small class="text-muted"><?= esc($user['email']) ?></small>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= site_url('user/profile') ?>">Profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item text-danger" href="<?= site_url('logout') ?>">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <main class="container mt-4">
    <div class="row">
