<div class="col-md-2 sidebar pt-4 bg-dark">
    <ul class="nav flex-column ms-2">
        <li class="nav-item">
            <a class="nav-link <?= ($menu == 'dashboard') ? 'active' : ''; ?>" aria-current="page" href="#"><i class="fas fw fa-tachometer-alt"></i> Dashboard</a>
            <hr class="text-secondary">
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($menu == 'siswa') ? 'active' : ''; ?>" href="/siswa"><i class="fas fw fa-user-graduate"></i> Data Siswa</a>
            <hr class="text-secondary">
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($menu == 'kategori') ? 'active' : ''; ?>" href="/kategori"><i class="fas fw fa-wallet"></i> Data Kategori</a>
            <hr class="text-secondary">
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($menu == 'buku') ? 'active' : ''; ?>" href="/buku"><i class="fas fw fa-book"></i> Data Buku</a>
            <hr class="text-secondary">
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($menu == 'peminjaman') ? 'active' : ''; ?>" href="/peminjaman"><i class="fas fw fa-stamp"></i> Data Peminjaman</a>
            <hr class="text-secondary">
        </li>
    </ul>
</div>