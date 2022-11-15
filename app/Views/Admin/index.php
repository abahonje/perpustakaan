<?= $this->extend('templates/layout') ?>
<?= $this->section('content'); ?>
<div class="col-md-12 d-flex">
    <div class="card bg-info border-0 shadow me-4" style="width: 20rem;">
        <div class="card-body">
            <i class="fas fa-user-graduate icon-card"></i>
            <h4 class="card-title">SISWA</h4>
            <p class="display-4 fw-bold text-light">150</p>
            <a href="/siswa" class="btn btn-primary">Selengkapnya</a>
        </div>
    </div>
    <div class="card bg-warning border-0 shadow me-4" style="width: 20rem;">
        <div class="card-body">
            <i class="fas fa-book icon-card"></i>
            <h4 class="card-title">BUKU</h4>
            <p class="display-4 fw-bold text-light">250</p>
            <a href="/buku" class="btn btn-primary">Selengkapnya</a>
        </div>
    </div>
    <div class="card bg-danger border-0 shadow" style="width: 20rem;">
        <div class="card-body">
            <i class="fas fa-stamp icon-card"></i>
            <h4 class="card-title">PEMINJAMAN</h4>
            <p class="display-4 fw-bold text-light">50</p>
            <a href="/peminjaman" class="btn btn-primary">Selengkapnya</a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>