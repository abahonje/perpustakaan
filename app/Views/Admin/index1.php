<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/vendor/fontawesome/css/all.css">
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/dashboard1.css">

    <title><?= $title; ?></title>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand text-info display-5" href="#">PERPUS_SMKPN | DASHBOARD ADMIN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex ms-auto">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-info me-4 " type="submit">Search</button>
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

    <div class="row no-gutters mt-5 ">
        <div class="col-md-2 sidebar py-4 bg-dark">
            <ul class="nav flex-column ms-2">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/"><i class="fas fw fa-tachometer-alt"></i> Dashboard</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/siswa"><i class="fas fw fa-user-graduate"></i> Data Siswa</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/kategori"><i class="fas fw fa-wallet"></i> Data Kategori</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/buku"><i class="fas fw fa-book"></i> Data Buku</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/peminjaman"><i class="fas fw fa-stamp"></i> Data Peminjaman</a>
                    <hr class="bg-secondary">
                </li>
            </ul>
        </div>
        <div class="col-md-10 content p-4">
            <h1 class="display-6"><i class="fas fa-tachometer-alt"></i> DASHBOARD</h1>
            <hr>
            <div class="row">
                <div class="col-md-12 d-flex pt-3">
                    <div class="card bg-info me-4 shadow border-0" style="width: 20rem;">
                        <div class="card-body">
                            <i class="fas fa-user-graduate card-icon"></i>
                            <h4 class="card-title">SISWA</h4>
                            <p class="display-4 fw-bold">174</p>
                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                    <div class="card bg-warning me-4 shadow border-0" style="width: 20rem;">
                        <div class="card-body">
                            <i class="fas fa-book card-icon"></i>
                            <h4 class="card-title">BUKU</h4>
                            <p class="display-4 fw-bold">500</p>
                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                    <div class="card bg-danger shadow border-0" style="width: 20rem;">
                        <div class="card-body text-light">
                            <i class="fas fa-stamp card-icon"></i>
                            <h4 class="card-title">PEMINJAMAN</h4>
                            <p class="display-4 fw-bold">100</p>
                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="/vendor/bootstrap/js/jquery-3.6.1.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/dashboard.js"></script>

</body>

</html>