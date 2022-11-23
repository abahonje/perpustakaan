<?= $this->extend('templates/layout');  ?>
<?= $this->section('content'); ?>
<div class="col-8">
    <?= session()->getFlashdata('kategori'); ?>
    <a href="/kategori/create" class="btn btn-primary px-4 mb-3"><i class="fas fa-plus"></i> Tambah Data Kategori</a>
    <table class="table table-striped">
        <thead>
            <tr class="bg-info">
                <th>No.</th>
                <th>Kategori</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($kategori as $kat) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $kat->kategori ?></td>
                    <td><?= $kat->keterangan ?></td>
                    <td>
                        <a href="/kategori/<?= $kat->id; ?>/edit" class="btn btn-success btn-sm">
                            <i class="fas fa-edit"></i></a>
                        <a href="/kategori/<?= $kat->id; ?>/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin data kategori ini akan dihapus?')">
                            <i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>