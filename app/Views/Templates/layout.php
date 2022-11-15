<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/vendor/fontawesome/css/all.css">
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/dashboard.css">

    <title>PERPUS_PN | <?= $title; ?></title>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand text-info" href="#">PERPUS_SMKPN | DASHBOARD ADMIN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex ms-auto">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-info me-4" type="submit">Search</button>
                </form>
                <div class="icon-notif mx-3">
                    <a href="" class="text-info me-3" title="Pesan Email" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fas fa-envelope"></i></a>
                    <a href="" class="text-info me-3" title="Notifikasi" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fas fa-bell"></i></a>
                    <a href="" class="text-info" title="Sign Out" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End of Navbar -->

    <div class="row no-gutters mt-5">
        <?= $this->include('templates/sidebar'); ?>
        <div class="col-md-10 content p-4">
            <h1 class="display-6 text-uppercase"><i class="<?= $icon; ?>"></i> <?= $title; ?></h1>
            <hr class="bg-secondary mb-4">
            <div class="row">
                <?= $this->renderSection('content'); ?>
            </div>
        </div>
    </div>


    <script src="/vendor/bootstrap/js/jquery-3.6.1.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/dashboard.js"></script>
    <?= $this->renderSection('script'); ?>

</body>

</html>