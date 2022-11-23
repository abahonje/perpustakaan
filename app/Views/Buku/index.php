<?= $this->extend('templates/layout');  ?>
<?= $this->section('content'); ?>
<div class="col-12">
    <?= session()->getFlashdata('buku'); ?>
    <a href="/buku/create" class="btn btn-primary px-4 mb-3"><i class="fas fa-plus"></i> Tambah Data Buku</a>
    <table class="table table-striped">
        <thead>
            <tr class="bg-info">
                <th>No.</th>
                <th>Kode</th>
                <th>Judul</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($buku as $bk) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $bk->kode ?></td>
                    <td><?= $bk->judul ?></td>
                    <td><?= $bk->penerbit ?></td>
                    <td><?= $bk->tahun ?></td>
                    <td><?= $bk->stok ?></td>
                    <td>
                        <a href="/buku/<?= $bk->id; ?>/edit" class="btn btn-success btn-sm">
                            <i class="fas fa-edit"></i></a>
                        <a href="/buku/<?= $bk->id; ?>/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin data buku ini akan dihapus?')">
                            <i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>